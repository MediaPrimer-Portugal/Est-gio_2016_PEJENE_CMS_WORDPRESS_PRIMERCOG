<?php
if ( ! function_exists( 'wpsp_get_defaults' ) ) :
/** 
 * Set all of our defaults
 * @since 0.1
 */
function wpsp_get_defaults()
{
	$defaults = array(
		'wpsp_author'             => '',
		'wpsp_author_location'	  => 'below-post',
		'wpsp_columns'			  => 'col-6',
		'wpsp_columns_gutter'	  => '2em',
		'wpsp_content_type' 	  => 'excerpt',
		'wpsp_date_location'	  => 'below-title',
		'wpsp_exclude_current'	  => false,
		'wpsp_excerpt_length'	  => 30,
		'wpsp_post_id' 			  => '',
		'wpsp_exclude_post_id' 			  => '',
		'wpsp_ignore_sticky_posts' => false,
		'wpsp_image'			  => true,
		'wpsp_image_alignment'	  => 'center',
		'wpsp_image_height'        => '',
		'wpsp_image_location'	  => 'below-title',
		'wpsp_image_lightbox'		=> false,
		'wpsp_image_gallery'		=> false,
		'wpsp_image_overlay_color' => '',
		'wpsp_image_overlay_icon' => '',
		'wpsp_image_width'         => '',
		'wpsp_include_title'       => true,
		'wpsp_include_terms'       => false,
		'wpsp_include_author'      => false,
		'wpsp_include_date'        => true,
		'wpsp_inner_wrapper'       => 'article',
		'wpsp_inner_wrapper_class' => '',
		'wpsp_inner_wrapper_style' => '',
		'wpsp_itemtype'			   => 'CreativeWork',
		'wpsp_meta_key'            => '',
		'wpsp_meta_value'          => '',
		'wpsp_offset'              => 0,
		'wpsp_order'               => 'DESC',
		'wpsp_orderby'             => 'date',
		'wpsp_pagination'          => false,
		'wpsp_post_meta_bottom_style' => 'stack',
		'wpsp_post_meta_top_style' => 'inline',
		'wpsp_post_status'         => 'publish',
		'wpsp_post_type'           => 'post',
		'wpsp_posts_per_page'      => 10,
		'wpsp_read_more_text'	  => '',
		'wpsp_tax_operator'        => 'IN',
		'wpsp_tax_term'            => '',
		'wpsp_taxonomy'            => 'category',
		'wpsp_terms_location'       => 'below-post',
		'wpsp_wrapper'             => 'section',
		'wpsp_wrapper_class'       => '',
		'wpsp_wrapper_id'          => false,
		'wpsp_wrapper_style'       => '',
		'wpsp_no_results'		   => __( 'Sorry, no posts were found.','wp-show-posts' ),
		'wpsp_ajax_pagination'     => false,
		'wpsp_masonry'			  => false,
		'wpsp_social_sharing'	  => false,
		'wpsp_social_sharing_alignment' => 'right',
		'wpsp_twitter'			  => false,
		'wpsp_facebook'			  => false,
		'wpsp_googleplus'		  => false,
		'wpsp_pinterest'		  => false,
		'wpsp_love'				  => false,
		'wpsp_featured_post'		  => false,
		'wpsp_image_hover_effect'  => '',
		'wpsp_read_more_style'  	  => 'hollow',
		'wpsp_read_more_color'  	  => 'black',
		'wpsp_border'			  => '',
		'wpsp_padding' 			  => '',
		'wpsp_filter'			  => false
	);
		
	return apply_filters( 'wpsp_defaults', $defaults );
}
endif;