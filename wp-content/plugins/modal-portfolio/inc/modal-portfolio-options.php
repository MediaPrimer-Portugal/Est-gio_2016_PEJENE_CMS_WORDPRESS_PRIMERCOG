<?php
// Mise à jour des données par défaut
function modal_portfolio_update() {
	// Réglages de base
	$modal_portfolio_filters						= sanitize_text_field($_POST['modal_portfolio_filters']);
	$modal_portfolio_allFilter					= sanitize_text_field($_POST['modal_portfolio_allFilter']);
	$modal_portfolio_text_modal			= sanitize_text_field($_POST['modal_portfolio_text_modal']);
	$modal_portfolio_title_modal			= sanitize_text_field($_POST['modal_portfolio_title_modal']);
	$modal_portfolio_title_thumbnail		= sanitize_text_field($_POST['modal_portfolio_title_thumbnail']);
	$modal_portfolio_thumbnail_default	= sanitize_text_field($_POST['modal_portfolio_thumbnail_default']);
	$modal_portfolio_close_button			= sanitize_text_field($_POST['modal_portfolio_close_button']);
	
	// Réglages de effets jQuery
	$modalOpacity		= sanitize_text_field($_POST['modal_portfolio_modalOpacity']);
	$overlayCloseClick	= sanitize_text_field($_POST['modal_portfolio_overlayCloseClick']);
	$colorOverlay		= sanitize_text_field($_POST['modal_portfolio_colorOverlay']);
	$overlayDuration	= sanitize_text_field($_POST['modal_portfolio_overlayDuration']);
	$hideShowDuration	= sanitize_text_field($_POST['modal_portfolio_hideShowDuration']);
	$openEffect			= sanitize_text_field($_POST['modal_portfolio_openEffect']);
	$thumbnailsEffect	= sanitize_text_field($_POST['modal_portfolio_thumbnailsEffect']);
	$openUpEffect		= sanitize_text_field($_POST['modal_portfolio_openUpEffect']);
	$openDownEffect		= sanitize_text_field($_POST['modal_portfolio_openDownEffect']);
	$openUpDuration		= sanitize_text_field($_POST['modal_portfolio_openUpDuration']);
	$openDownDuration	= sanitize_text_field($_POST['modal_portfolio_openDownDuration']);

	// Mise à jour des informations
	update_option("modal_portfolio_filters", $modal_portfolio_filters);
	update_option("modal_portfolio_allFilter", $modal_portfolio_allFilter);
	update_option("modal_portfolio_text_modal", $modal_portfolio_text_modal);
	update_option("modal_portfolio_title_modal", $modal_portfolio_title_modal);
	update_option("modal_portfolio_title_thumbnail", $modal_portfolio_title_thumbnail);
	update_option("modal_portfolio_thumbnail_default", $modal_portfolio_thumbnail_default);
	update_option("modal_portfolio_close_button", $modal_portfolio_close_button);
	update_option("modal_portfolio_modalOpacity", $modalOpacity);
	update_option("modal_portfolio_overlayCloseClick", $overlayCloseClick);
	update_option("modal_portfolio_colorOverlay", $colorOverlay);
	update_option("modal_portfolio_overlayDuration", $overlayDuration);
	update_option("modal_portfolio_hideShowDuration", $hideShowDuration);
	update_option("modal_portfolio_openEffect", $openEffect);
	update_option("modal_portfolio_thumbnailsEffect", $thumbnailsEffect);
	update_option("modal_portfolio_openUpEffect", $openUpEffect);
	update_option("modal_portfolio_openDownEffect", $openDownEffect);
	update_option("modal_portfolio_openUpDuration", $openUpDuration);
	update_option("modal_portfolio_openDownDuration", $openDownDuration);
}

// Fonction CallBack (de add_submenu_page) pour les options du plugin
function modal_portfolio_options() {
	// Déclenche la fonction de mise à jour (upload)
	if(isset($_POST['modal_portfolio_action']) && $_POST['modal_portfolio_action'] == __('Save', 'modal-portfolio')) {
		modal_portfolio_update();
	}

	/*---------------------------------------------------------------------*/
	/*----------------------- Affichage des options -----------------------*/
	/*---------------------------------------------------------------------*/
	echo '<div class="wrap modal-portfolio-admin">';
	echo '<h2 class="icon">'; _e('Modal Portfolio Settings', 'modal-portfolio'); echo '</h2><br/>';
	echo '<div class="text">';
	_e('<strong>Modal portfolio</strong> is an extension to display a photo gallery (portfolio) with modal (pop- in) possibly containing a customizable description.', 'modal-portfolio'); echo "<br/>";
	_e('Just use the shortcode <strong>[modal-portfolio]</strong> with or without options to display the references (<em>see documentation (readme section) for additional options</em>).', 'modal-portfolio'); echo "<br/>";
	_e('Multiple options are permitted to customize to best display in the modal:', 'modal-portfolio'); echo '<br/>';
	echo '<ol>';
	echo '<li>'; _e('[modal-portfolio] to display all.', 'modal-portfolio'); echo '</li>';
	echo '<li>'; _e('[modal-portfolio parents=1] to display the items of parent categories and the corresponding filters.', 'modal-portfolio'); echo '</li>';
	echo '<li>'; _e('[modal-portfolio parent_cat="category_name"] or [modal-portfolio categorie_parente="category_name"] to show the child categories of items "category_name".', 'modal-portfolio'); echo '</li>';
	echo '</ol>';
	_e('<em>N.B.: contact <a href="http://blog.internet-formation.fr/" target="_blank">Mathieu Chartier</a>, the creator of the plugin (French), for more information.</em>', 'modal-portfolio'); 
	echo '<br/>';
	echo '</div>';
?>
<script type="application/javascript">
    jQuery(document).ready(function($) {  
		$("#slider-range-min").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_modalOpacity"); ?>,
			min: 0,
			max: 100,
			slide: function(event, ui) {
				$("#modal_portfolio_modalOpacity").val(ui.value);
			}
		});
		$("#modal_portfolio_modalOpacity").val($("#slider-range-min").slider("value"));

		$("#slider-range-min1").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_overlayDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_overlayDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_overlayDuration").val($("#slider-range-min1").slider("value"));

		$("#slider-range-min2").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_hideShowDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_hideShowDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_hideShowDuration").val($("#slider-range-min2").slider("value"));
		
		$("#slider-range-min3").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_openUpDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_openUpDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_openUpDuration").val($("#slider-range-min3").slider("value"));
		
		$("#slider-range-min4").slider({
			range: "min",
			value: <?php echo get_option("modal_portfolio_openDownDuration"); ?>,
			min: 0,
			max: 5000,
			step: 10,
			slide: function(event, ui) {
				$("#modal_portfolio_openDownDuration").val(ui.value);
			}
		});
		$("#modal_portfolio_openDownDuration").val($("#slider-range-min4").slider("value"));
	});
</script>
<div class="block">
    <div class="col first-col">
    <!-- Formulaire de mise à jour des données -->
    <form method="post" action="">
        <h4><?php _e('General Settings', 'modal-portfolio'); ?></h4>
        <p class="tr">
            <select name="modal_portfolio_thumbnail_default" id="modal_portfolio_filters">
                <option value="1" <?php if(get_option("modal_portfolio_thumbnail_default") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_thumbnail_default") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_thumbnail_default"><strong><?php _e('Display a default image?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option to display an image when the reference has none (recommended).', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_filters" id="modal_portfolio_filters">
                <option value="1" <?php if(get_option("modal_portfolio_filters") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_filters") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_filters"><strong><?php _e('Display filters?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option to hide the category filters portfolios.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_allFilter" id="modal_portfolio_allFilter">
                <option value="1" <?php if(get_option("modal_portfolio_allFilter") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_allFilter") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_allFilter"><strong><?php _e('Show the "All" filter?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('This option allows to hide the filter that displays all references.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_text_modal" id="modal_portfolio_text_modal">
                <option value="1" <?php if(get_option("modal_portfolio_text_modal") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_text_modal") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_text_modal"><strong><?php _e('Show description in modal window?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option allows you to change the modal window to display the image with or without description.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_title_modal" id="modal_portfolio_title_modal">
                <option value="1" <?php if(get_option("modal_portfolio_title_modal") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_title_modal") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_title_modal"><strong><?php _e('Show title in the modal window?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option allows you to change the modal window to display the image with or without title.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_title_thumbnail" id="modal_portfolio_title_thumbnail">
                <option value="1" <?php if(get_option("modal_portfolio_title_thumbnail") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_title_thumbnail") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_title_thumbnail"><strong><?php _e('Show title and category when hovering thumbnail?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option to hide text effects when hovering the thumbnail.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_close_button" id="modal_portfolio_close_button">
                <option value="1" <?php if(get_option("modal_portfolio_close_button") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_close_button") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_close_button"><strong><?php _e('View the "Close" button in the modal window?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option to hide the close button.', 'modal-portfolio'); ?></em>
        </p>

    	<p class="submit">
        	<input type="submit" name="modal_portfolio_action" class="button-primary" value="<?php _e('Save', 'modal-portfolio'); ?>" />
        </p>
	</div>
	
	<div class="col">
        <h4><?php _e('Customizing jQuery effects', 'modal-portfolio'); ?></h4>
		<p class="tr3">
			<span id="slider-range-min"></span>
            <input type="text" value="<?php echo get_option("modal_portfolio_modalOpacity"); ?>" name="modal_portfolio_modalOpacity" id="modal_portfolio_modalOpacity"/>
            <label for="modal_portfolio_modalOpacity"><strong><?php _e('Background opacity (overlay)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Ability to hide the background by setting the value to 0.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_overlayCloseClick" id="modal_portfolio_overlayCloseClick">
                <option value="1" <?php if(get_option("modal_portfolio_overlayCloseClick") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_overlayCloseClick") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_overlayCloseClick"><strong><?php _e('Close modal clicking on the overlay?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option closes the modal window without pressing the "Close" button.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr2">
            <input type="text" id="modal_portfolio_colorOverlay" name="modal_portfolio_colorOverlay" value="<?php echo get_option('modal_portfolio_colorOverlay'); ?>"/>
            <label for="modal_portfolio_colorOverlay"><strong><?php _e('Background color (overlay)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('You can hide the overlay emptying the field.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min1"></span>
            <input type="text" name="modal_portfolio_overlayDuration" id="modal_portfolio_overlayDuration"/>
            <label for="modal_portfolio_overlayDuration"><strong><?php _e('Display duration of the overlay (in ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Select the number of milliseconds helpful to show the overlay.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min2"></span>
            <input type="text" name="modal_portfolio_hideShowDuration" id="modal_portfolio_hideShowDuration"/>
            <label for="modal_portfolio_hideShowDuration"><strong><?php _e('Duration of effect to display the modal window and the contents (in ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Select the number of milliseconds to display the modal window and the content', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openEffect" id="modal_portfolio_openEffect">
                <option value="aucun" <?php if(get_option("modal_portfolio_openEffect") == "aucun") { echo 'selected="selected"'; } ?>><?php _e('None', 'modal-portfolio'); ?></option>
                <option value="fadeIn" <?php if(get_option("modal_portfolio_openEffect") == "fadeIn") { echo 'selected="selected"'; } ?>><?php _e('fadeIn', 'modal-portfolio'); ?></option>
                <option value="fadeOut" <?php if(get_option("modal_portfolio_openEffect") == "fadeOut") { echo 'selected="selected"'; } ?>><?php _e('fadeOut', 'modal-portfolio'); ?></option>
                <option value="slideUp" <?php if(get_option("modal_portfolio_openEffect") == "slideUp") { echo 'selected="selected"'; } ?>><?php _e('SlideUp', 'modal-portfolio'); ?></option>
                <option value="slideDown" <?php if(get_option("modal_portfolio_openEffect") == "slideDown") { echo 'selected="selected"'; } ?>><?php _e('slideDown', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_openEffect"><strong><?php _e('Effect of style applied to the opening of the modal window', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Only the opening jQuery effect considers this option!', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_thumbnailsEffect" id="modal_portfolio_thumbnailsEffect">
                <option value="1" <?php if(get_option("modal_portfolio_thumbnailsEffect") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_thumbnailsEffect") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_thumbnailsEffect"><strong><?php _e('Apply effect to the title thumbnail?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Blocks jQuery effects on thumbnail title', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openUpEffect" id="modal_portfolio_openUpEffect">
			<?php
				// Liste des effets de jQuery easing
				$easingEffects = array(__("None", 'modal-portfolio'), "jswing", "def", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce");
				foreach($easingEffects as $effect) {
			?>
                <option value="<?php echo $effect; ?>" <?php if(get_option("modal_portfolio_openUpEffect") == $effect) { echo 'selected="selected"'; } ?>><?php echo $effect; ?></option>
			<?php
				}
			?>
            </select>
            <label for="modal_portfolio_openUpEffect"><strong><?php _e('First effect applied to the text of the thumbnail', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Effect applied when hovering the thumbnail !', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min3"></span>
            <input type="text" name="modal_portfolio_openUpDuration" id="modal_portfolio_openUpDuration"/>
            <label for="modal_portfolio_openUpDuration"><strong><?php _e('Duration of the first effect (in ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Select the number of milliseconds for the first useful effect.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <select name="modal_portfolio_openDownEffect" id="modal_portfolio_openDownEffect">
			<?php
				// Liste des effets de jQuery easing
				$easingEffects = array(__("None", 'modal-portfolio'), "jswing", "def", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce");
				foreach($easingEffects as $effect) {
			?>
                <option value="<?php echo $effect; ?>" <?php if(get_option("modal_portfolio_openDownEffect") == $effect) { echo 'selected="selected"'; } ?>><?php echo $effect; ?></option>
			<?php
				}
			?>
            </select>
            <label for="modal_portfolio_openDownEffect"><strong><?php _e('Second effect applied to the thumbnail text', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Effect applied after hovering the thumbnail', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr3">
			<span id="slider-range-min4"></span>
            <input type="text" name="modal_portfolio_openDownDuration" id="modal_portfolio_openDownDuration"/>
            <label for="modal_portfolio_openDownDuration"><strong><?php _e('Duration of the second effect (in ms)', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('Select the number of milliseconds for the second useful effect.', 'modal-portfolio'); ?></em>
        </p>
    </form>
	</div>
	<div class="clear"></div>
</div>
<?php
echo '</div>'; // Fin de la page d'admin
}
?>