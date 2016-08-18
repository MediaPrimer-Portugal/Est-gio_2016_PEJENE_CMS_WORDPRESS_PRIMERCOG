<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<script>
	jQuery(document).ready(function () {
		popupsizes(jQuery('#light_box_size_fix'));
		function popupsizes(checkbox){
			if(checkbox.is(':checked')){
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .fixed-size').css({'display':'block'});
			}else {
				jQuery('.lightbox-options-block .fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'block'});
			}
		}
		jQuery('#light_box_size_fix').change(function(){
			popupsizes(jQuery(this));
		});


		jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
			jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
			jQuery(this).val(parseInt(data.value));
		});
	});
</script>
<div class="wrap">
	<?php require(PORTFOLIO_GALLERY_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'portfolio-gallery-admin-free-banner.php');?>
	<div style="margin-left: -20px;" id="poststuff">
		<p class="pro_info">
			These features are available in the Professional version of the plugin only.
			<a href="http://huge-it.com/portfolio-gallery/" target="_blank" class="button button-primary">Enable</a>
		</p>
		<img style="width: 100%;" src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/lightbox_options.jpg';?>">
	</div>
</div>

<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>