<?php
/*
 * Plugin Name: Very Simple Event List
 * Description: This is a very simple plugin to display a list of events. Use a shortcode to display events on a page or use the widget. For more info please check readme file.
 * Version: 4.9
 * Author: Guido van der Leest
 * Author URI: http://www.guidovanderleest.nl
 * License: GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: very-simple-event-list
 * Domain Path: /translation
 */


// load plugin text domain
function vsel_init() { 
	load_plugin_textdomain( 'very-simple-event-list', false, dirname( plugin_basename( __FILE__ ) ) . '/translation' );
}
add_action('plugins_loaded', 'vsel_init');


// enqueue css script
function vsel_frontend_scripts() {	
	if(!is_admin())	{
		wp_enqueue_style('vsel_style', plugins_url('/css/vsel-style.css',__FILE__));
	}
}
add_action('wp_enqueue_scripts', 'vsel_frontend_scripts');


// the sidebar widget
function register_vsel_widget() {
	register_widget( 'vsel_widget' );
}
add_action( 'widgets_init', 'register_vsel_widget' );


// set datepicker date formats for Europe and US 
function vsel_datepicker_dateformat( $dateformat ) { 
	if ($dateformat == 'j F Y' || $dateformat == 'd/m/Y' || $dateformat == 'd-m-Y') {
		$dateformat = 'dd-mm-yy'; 
	} else {
		$dateformat = 'yy-mm-dd'; 
	}
	return $dateformat; 
}


// enqueue datepicker script
function vsel_enqueue_date_picker(){ 
	global $wp_locale; 
	global $post_type; 

	if( 'event' != $post_type ) 
	return;
	wp_enqueue_script( 'vsel_datepicker_script', plugins_url( '/js/vsel-datepicker.js' , __FILE__ ), array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'), '1.0', true ); 
	wp_enqueue_style('vsel_datepicker_style', plugins_url( '/css/vsel-datepicker.css',__FILE__));

	// datepicker args
	$vsel_datepicker_args = array(
		'prevText' => __( 'Prev', 'very-simple-event-list' ),
		'nextText' => __( 'Next', 'very-simple-event-list' ),
		'monthNames' => array_values( $wp_locale->month ), 
		'monthNamesShort' => array_values( $wp_locale->month_abbrev ), 
		'dayNames' => array_values( $wp_locale->weekday ), 
		'dayNamesShort' => array_values( $wp_locale->weekday_abbrev ), 
		'dayNamesMin' => array_values( $wp_locale->weekday_initial ),
		'dateFormat' => vsel_datepicker_dateformat( get_option( 'date_format' ) )
	);

	// localize script with data for datepicker
	wp_localize_script( 'vsel_datepicker_script', 'objectL10n', $vsel_datepicker_args );
}
add_action( 'admin_enqueue_scripts', 'vsel_enqueue_date_picker' ); 


// create eventspage in dashboard
function vsel_custom_postype() { 
	$vsel_labels = array( 
		'name' => __( 'Events', 'very-simple-event-list' ), 
		'all_items' => __( 'All Events', 'very-simple-event-list' ), 
		'singular_name' => __( 'Event', 'very-simple-event-list' ), 
		'add_new' => __( 'Add New', 'very-simple-event-list' ), 
		'add_new_item' => __( 'Add New Event', 'very-simple-event-list' ), 
		'edit_item' => __( 'Edit Event', 'very-simple-event-list' ), 
		'new_item' => __( 'New Event', 'very-simple-event-list' ), 
		'view_item' => __( 'View Event', 'very-simple-event-list' ), 
		'search_items' => __( 'Search Events', 'very-simple-event-list' ), 
		'not_found' => __( 'No events found', 'very-simple-event-list' ), 
		'not_found_in_trash' => __( 'No events found in Trash', 'very-simple-event-list' ), 
	); 
	$vsel_args = array( 
		'label' => __( 'Events', 'very-simple-event-list' ), 
		'labels' => $vsel_labels, 
		'public' => true, 
		'can_export' => true, 
		'show_in_nav_menus' => false, 
		'show_ui' => true, 
		'capability_type' => 'post', 
		'taxonomies' => array('event_cat'),
 		'supports'=> array('title', 'thumbnail', 'editor'), 
	); 
	register_post_type( 'event', $vsel_args); 
}
add_action( 'init', 'vsel_custom_postype' ); 


// create event categories
function vsel_taxonomy() { 
	register_taxonomy( 'event_cat', 'event', array( 'label' => __( 'Event Categories', 'very-simple-event-list' ), 'hierarchical' => true, ) ); 
}
add_action( 'init', 'vsel_taxonomy' ); 


// create metabox
function vsel_metabox() { 
	add_meta_box( 
		'vsel-event-metabox', 
		__( 'Event Info', 'very-simple-event-list' ), 
		'vsel_metabox_callback', 
		'event', 
		'side', 
		'default' 
	); 
} 
add_action( 'add_meta_boxes', 'vsel_metabox' );


function vsel_metabox_callback( $post ) { 
	// generate a nonce field 
	wp_nonce_field( 'vsel_meta_box', 'vsel_nonce' ); 
	
	// get previously saved meta values (if any) 
	$event_start_date = get_post_meta( $post->ID, 'event-start-date', true );
	$event_date = get_post_meta( $post->ID, 'event-date', true );
	$event_time = get_post_meta( $post->ID, 'event-time', true ); 
	$event_location = get_post_meta( $post->ID, 'event-location', true ); 
	$event_link = get_post_meta( $post->ID, 'event-link', true ); 
	$event_link_label = get_post_meta( $post->ID, 'event-link-label', true ); 
	$event_link_target = get_post_meta( $post->ID, 'event-link-target', true ); 

	// get date if saved else set it to current date 
	$event_start_date = !empty( $event_start_date ) ? $event_start_date : time(); 
	$event_date = !empty( $event_date ) ? $event_date : time(); 

	// set dateformat to match datepicker 
	$dateformat = get_option( 'date_format' );
	if ($dateformat == 'j F Y' || $dateformat == 'd/m/Y' || $dateformat == 'd-m-Y') {
		$dateformat = 'd-m-Y'; 
	} else {
		$dateformat = 'Y-m-d'; 
	}

	// metabox fields
	?> 
	<p><label for="vsel-start-date"><?php _e( 'Start date', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-start-date" type="text" name="vsel-start-date" required maxlength="10" placeholder="Date format: use datepicker" value="<?php echo date_i18n( $dateformat, esc_attr( $event_start_date ) ); ?>" /></p>
	<p><label for="vsel-date"><?php _e( 'End date', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-date" type="text" name="vsel-date" required maxlength="10" placeholder="Date format: use datepicker" value="<?php echo date_i18n( $dateformat, esc_attr( $event_date ) ); ?>" /></p>
	<p><label for="vsel-time"><?php _e( 'Time', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-time" type="text" name="vsel-time" maxlength="100" placeholder="Example: 16.00 - 18.00" value="<?php echo esc_attr( $event_time ); ?>" /></p>
	<p><label for="vsel-location"><?php _e( 'Location', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-location" type="text" name="vsel-location" maxlength="100" placeholder="Example: Times Square" value="<?php echo esc_attr( $event_location ); ?>" /></p>
	<p><label for="vsel-link"><?php _e( 'Link', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-link" type="text" name="vsel-link" maxlength="150" placeholder="Example: wordpress.org" value="<?php echo esc_url( $event_link ); ?>" /></p>
	<p><label for="vsel-link-label"><?php _e( 'Link label', 'very-simple-event-list' ); ?></label> 
	<input class="widefat" id="vsel-link-label" type="text" name="vsel-link-label" maxlength="100" placeholder="Example: More info" value="<?php echo esc_attr( $event_link_label ); ?>" /></p>
	<p><input class="checkbox" id="vsel-link-target" type="checkbox" name="vsel-link-target" value="yes" <?php checked( $event_link_target, 'yes' ); ?> /> 
	<label for="vsel-link-target"><?php _e('Open link in new window', 'very-simple-event-list'); ?></label></p>
	<?php 
}


// save event
function vsel_save_event_info( $post_id ) { 
	// check if nonce is set
	if ( ! isset( $_POST['vsel_nonce'] ) ) {
		return;
	}
	// verify that nonce is valid
	if ( ! wp_verify_nonce( $_POST['vsel_nonce'], 'vsel_meta_box' ) ) {
		return;
	}
	// if this is an autosave, our form has not been submitted, so do nothing
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// check user permissions
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	// checking values and save fields 
	if ( isset( $_POST['vsel-start-date'] ) ) { 
		update_post_meta( $post_id, 'event-start-date', sanitize_text_field(strtotime( $_POST['vsel-start-date'] ) ) ); 
	} 
	if ( isset( $_POST['vsel-date'] ) ) { 
		update_post_meta( $post_id, 'event-date', sanitize_text_field(strtotime( $_POST['vsel-date'] ) ) ); 
	} 
	if ( isset( $_POST['vsel-time'] ) ) { 
		update_post_meta( $post_id, 'event-time', sanitize_text_field( $_POST['vsel-time'] ) ); 
	} 
	if ( isset( $_POST['vsel-location'] ) ) { 
		update_post_meta( $post_id, 'event-location', sanitize_text_field( $_POST['vsel-location'] ) ); 
	} 
	if ( isset( $_POST['vsel-link'] ) ) { 
		update_post_meta( $post_id, 'event-link', esc_url_raw( $_POST['vsel-link'] ) ); 
	} 
	if ( isset( $_POST['vsel-link-label'] ) ) { 
		update_post_meta( $post_id, 'event-link-label', sanitize_text_field( $_POST['vsel-link-label'] ) ); 
	} 
	if ( isset( $_POST['vsel-link-target'] ) ) { 
		update_post_meta( $post_id, 'event-link-target', 'yes' ); 
	} else {
		update_post_meta( $post_id, 'event-link-target', 'no' ); 
	} 
} 
add_action( 'save_post', 'vsel_save_event_info' );


// dashboard event columns
function vsel_custom_columns( $defaults ) { 
	unset( $defaults['date'] );
	$defaults['event_start_date'] = __( 'Start date', 'very-simple-event-list' ); 
	$defaults['event_date'] = __( 'End date', 'very-simple-event-list' ); 
	$defaults['event_time'] = __( 'Time', 'very-simple-event-list' ); 
	$defaults['event_location'] = __( 'Location', 'very-simple-event-list' ); 
	return $defaults; 
} 
add_filter( 'manage_event_posts_columns', 'vsel_custom_columns', 10 );

function vsel_custom_columns_content( $column_name, $post_id ) { 
	if ( 'event_start_date' == $column_name ) { 
		$start_date = get_post_meta( $post_id, 'event-start-date', true ); 
		if(!empty( $start_date ) ) { 
			echo date_i18n( get_option( 'date_format' ), $start_date ); 
		}
	} 
	if ( 'event_date' == $column_name ) { 
		$date = get_post_meta( $post_id, 'event-date', true ); 
		if(!empty( $date ) ) { 
			echo date_i18n( get_option( 'date_format' ), $date ); 
		}
	} 
	if ( 'event_time' == $column_name ) { 
		$time = get_post_meta( $post_id, 'event-time', true ); 
		echo $time; 
	} 
	if ( 'event_location' == $column_name ) { 
		$location = get_post_meta( $post_id, 'event-location', true ); 
		echo $location; 
	} 
} 
add_action( 'manage_event_posts_custom_column', 'vsel_custom_columns_content', 10, 2 );


// make event date column sortable
function vsel_column_register_sortable( $columns ) {
	$columns['event_start_date'] = 'event-start-date';
	$columns['event_date'] = 'event-date';
	return $columns;
}
add_filter( 'manage_edit-event_sortable_columns', 'vsel_column_register_sortable' );

function vsel_start_date_column_orderby( $vars ) {
	if(is_admin()) {
		if ( isset( $vars['orderby'] ) && 'event-start-date' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => 'event-start-date',
				'orderby' => 'meta_value_num'
			) );
		}
	}
	return $vars;
}
add_filter( 'request', 'vsel_start_date_column_orderby' );

function vsel_date_column_orderby( $vars ) {
	if(is_admin()) {
		if ( isset( $vars['orderby'] ) && 'event-date' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => 'event-date',
				'orderby' => 'meta_value_num'
			) );
		}
	}
	return $vars;
}
add_filter( 'request', 'vsel_date_column_orderby' );


// add class to pagination
function vsel_prev_posts() { 
	return 'class="prev"'; 
} 
add_filter('previous_posts_link_attributes', 'vsel_prev_posts', 10); 

function vsel_next_posts() { 
	return 'class="next"'; 
}
add_filter('next_posts_link_attributes', 'vsel_next_posts', 10); 


// include files
include 'vsel-upcoming.php';
include 'vsel-past.php';
include 'vsel-widget.php';
include 'vsel-options.php';
include 'vsel-single.php';

?>