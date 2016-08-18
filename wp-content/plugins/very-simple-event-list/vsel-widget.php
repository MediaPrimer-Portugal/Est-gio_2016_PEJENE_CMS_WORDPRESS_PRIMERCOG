<?php

class vsel_widget extends WP_Widget {

	// Constructor 
	function vsel_widget() {
		$widget_ops = array( 'classname' => 'vsel_widget', 'description' => __('Display your events in a widget.', 'very-simple-event-list') );
		parent::__construct( 'vsel_widget', __('Very Simple Event List', 'very-simple-event-list'), $widget_ops );
	}


	// Set widget and title in dashboard
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'vsel_title' => '',
			'vsel_text' => '',
			'vsel_attributes' => '',
			'vsel_all_events_link' => '',
			'vsel_all_events_label' => ''
		));
		$vsel_title = !empty( $instance['vsel_title'] ) ? $instance['vsel_title'] : __('Very Simple Event List', 'very-simple-event-list'); 
		$vsel_text = $instance['vsel_text'];
		$vsel_attributes = $instance['vsel_attributes'];
		$vsel_all_events_link = $instance['vsel_all_events_link'];
		$vsel_all_events_label = $instance['vsel_all_events_label'];

		?> 
		<p> 
		<label for="<?php echo $this->get_field_id( 'vsel_title' ); ?>"><?php _e('Title', 'very-simple-event-list'); ?>:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_title' ); ?>" name="<?php echo $this->get_field_name( 'vsel_title' ); ?>" type="text" maxlength='50' value="<?php echo esc_attr( $vsel_title ); ?>">
 		</p> 
		<p>
		<label for="<?php echo $this->get_field_id('vsel_text'); ?>"><?php _e('Information', 'very-simple-event-list'); ?>:</label>
		<textarea class="widefat monospace" rows="6" cols="20" id="<?php echo $this->get_field_id('vsel_text'); ?>" name="<?php echo $this->get_field_name('vsel_text'); ?>"><?php echo esc_textarea( $vsel_text ); ?></textarea>
		</p>
		<p> 
		<label for="<?php echo $this->get_field_id( 'vsel_attributes' ); ?>"><?php _e('Shortcode', 'very-simple-event-list'); ?>:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_attributes' ); ?>" name="<?php echo $this->get_field_name( 'vsel_attributes' ); ?>" type="text" maxlength='200' value="<?php echo esc_attr( $vsel_attributes ); ?>">
 		</p> 
		<p> 
		<label for="<?php echo $this->get_field_id( 'vsel_all_events_link' ); ?>"><?php _e('Link to all events', 'very-simple-event-list'); ?>:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_all_events_link' ); ?>" name="<?php echo $this->get_field_name( 'vsel_all_events_link' ); ?>" type="text" maxlength='150' placeholder='Example: mydomain.com/events' value="<?php echo esc_url( $vsel_all_events_link ); ?>">
 		</p> 
		<p> 
		<label for="<?php echo $this->get_field_id( 'vsel_all_events_label' ); ?>"><?php _e('Link label', 'very-simple-event-list'); ?>:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_all_events_label' ); ?>" name="<?php echo $this->get_field_name( 'vsel_all_events_label' ); ?>" type="text" maxlength='100' placeholder='Example: All events' value="<?php echo esc_attr( $vsel_all_events_label ); ?>">
 		</p> 
		<p><?php _e( 'Info about shortcodes', 'very-simple-event-list' ); ?>: <a href="https://wordpress.org/plugins/very-simple-event-list/installation" target="_blank"><?php _e( 'Installation', 'very-simple-event-list' ); ?></a></p>
		<p><?php _e( 'Hide elements in widget', 'very-simple-event-list' ); ?>: <a href="<?php echo admin_url( 'options-general.php?page=vsel' ); ?>"><?php _e( 'Settings', 'very-simple-event-list' ); ?></a></p>
		<?php 
	}


	// Update widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags to remove HTML 
		$instance['vsel_title'] = strip_tags( $new_instance['vsel_title'] );
		$instance['vsel_text'] = strip_tags( $new_instance['vsel_text'] );
		$instance['vsel_attributes'] = strip_tags( $new_instance['vsel_attributes'] );
		$instance['vsel_all_events_link'] = esc_url_raw( $new_instance['vsel_all_events_link'] );
		$instance['vsel_all_events_label'] = strip_tags( $new_instance['vsel_all_events_label'] );

		return $instance;
	}


	// Display widget with event list in frontend 
	function widget( $args, $instance ) {

		if ( empty( $instance['vsel_all_events_label'] ) ) { 
			$instance['vsel_all_events_label'] = esc_attr__( 'All events', 'very-simple-event-list' );
		}

		echo $args['before_widget']; 

		if ( !empty( $instance['vsel_title'] ) ) { 
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['vsel_title'] ). $args['after_title']; 
		} 
		if ( !empty( $instance['vsel_text'] ) ) { 
			echo '<div class="vsel-meta-text">';
			echo wpautop( esc_textarea($instance['vsel_text']) );
			echo '</div>';
		}
		if ( !empty( $instance['vsel_attributes'] ) ) { 
			echo do_shortcode( $instance['vsel_attributes'] );
		}
		if ( !empty( $instance['vsel_all_events_link'] ) ) { 
			echo '<div class="vsel-all-events">' . sprintf( '<a href="%1$s">%2$s</a>', esc_url($instance['vsel_all_events_link']), esc_attr($instance['vsel_all_events_label']) ) . '</div>';
		} 

		echo $args['after_widget']; 
	}

}

?>