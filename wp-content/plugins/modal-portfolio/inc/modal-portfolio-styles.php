<?php
// Mise à jour des données par défaut
function modal_portfolio_update_styles() {
	// Réglages de base
	$modal_portfolio_css_path				= sanitize_text_field($_POST['modal_portfolio_css_path']);
	$modal_portfolio_styleType				= sanitize_text_field($_POST['modal_portfolio_styleType']);
	$modal_portfolio_effectsSource			= sanitize_text_field($_POST['modal_portfolio_effectsSource']);
	$modal_portfolio_effectsHeight			= sanitize_text_field($_POST['modal_portfolio_effectsHeight']);
	$modal_portfolio_colorOverall			= sanitize_text_field($_POST['modal_portfolio_colorOverall']);
	$modal_portfolio_bgcolorOverall			= sanitize_text_field($_POST['modal_portfolio_bgcolorOverall']);
	$modal_portfolio_effectsPadding			= sanitize_text_field($_POST['modal_portfolio_effectsPadding']);
	$modal_portfolio_effectsAlign			= sanitize_text_field($_POST['modal_portfolio_effectsAlign']);
	$modal_portfolio_cornersTypeModal		= sanitize_text_field($_POST['modal_portfolio_cornersTypeModal']);
	$modal_portfolio_cornersRadiusModal		= sanitize_text_field($_POST['modal_portfolio_cornersRadiusModal']);
	$modal_portfolio_widthThumbnails		= sanitize_text_field($_POST['modal_portfolio_widthThumbnails']);
	$modal_portfolio_marginThumbnails		= sanitize_text_field($_POST['modal_portfolio_marginThumbnails']);
	$modal_portfolio_widthModal				= sanitize_text_field($_POST['modal_portfolio_widthModal']);
	$modal_portfolio_heightModal			= sanitize_text_field($_POST['modal_portfolio_heightModal']);
	$modal_portfolio_widthModalCol1			= sanitize_text_field($_POST['modal_portfolio_widthModalCol1']);
	$modal_portfolio_widthModalCol2			= sanitize_text_field($_POST['modal_portfolio_widthModalCol2']);
	$modal_portfolio_marginRightModalCol1	= sanitize_text_field($_POST['modal_portfolio_marginRightModalCol1']);
	$modal_portfolio_bgcolorLinkFilter		= sanitize_text_field($_POST['modal_portfolio_bgcolorLinkFilter']);
	$modal_portfolio_bgcolorHoverFilter		= sanitize_text_field($_POST['modal_portfolio_bgcolorHoverFilter']);
	$modal_portfolio_colorLinkFilter		= sanitize_text_field($_POST['modal_portfolio_colorLinkFilter']);
	$modal_portfolio_colorHoverFilter		= sanitize_text_field($_POST['modal_portfolio_colorHoverFilter']);
	$modal_portfolio_borderWidth			= sanitize_text_field($_POST['modal_portfolio_borderWidth']);
	$modal_portfolio_borderStyle			= sanitize_text_field($_POST['modal_portfolio_borderStyle']);
	$modal_portfolio_borderColor			= sanitize_text_field($_POST['modal_portfolio_borderColor']);
	$modal_portfolio_cornersTypeFilter		= sanitize_text_field($_POST['modal_portfolio_cornersTypeFilter']);
	$modal_portfolio_cornersRadiusFilter	= sanitize_text_field($_POST['modal_portfolio_cornersRadiusFilter']);
	$modal_portfolio_marginFilter			= sanitize_text_field($_POST['modal_portfolio_marginFilter']);

	// Mise à jour des données
	update_option("modal_portfolio_css_path", $modal_portfolio_css_path);
	update_option("modal_portfolio_styleType", $modal_portfolio_styleType);
	update_option("modal_portfolio_effectsSource", $modal_portfolio_effectsSource);
	update_option("modal_portfolio_effectsHeight", $modal_portfolio_effectsHeight);
	update_option("modal_portfolio_colorOverall", $modal_portfolio_colorOverall);
	update_option("modal_portfolio_bgcolorOverall", $modal_portfolio_bgcolorOverall);
	update_option("modal_portfolio_effectsPadding", $modal_portfolio_effectsPadding);
	update_option("modal_portfolio_effectsAlign", $modal_portfolio_effectsAlign);
	update_option("modal_portfolio_cornersTypeModal", $modal_portfolio_cornersTypeModal);
	update_option("modal_portfolio_cornersRadiusModal", $modal_portfolio_cornersRadiusModal);
	update_option("modal_portfolio_widthThumbnails", $modal_portfolio_widthThumbnails);
	update_option("modal_portfolio_marginThumbnails", $modal_portfolio_marginThumbnails);
	update_option("modal_portfolio_widthModal", $modal_portfolio_widthModal);
	update_option("modal_portfolio_heightModal", $modal_portfolio_heightModal);
	update_option("modal_portfolio_widthModalCol1", $modal_portfolio_widthModalCol1);
	update_option("modal_portfolio_widthModalCol2", $modal_portfolio_widthModalCol2);
	update_option("modal_portfolio_marginRightModalCol1", $modal_portfolio_marginRightModalCol1);
	update_option("modal_portfolio_bgcolorLinkFilter", $modal_portfolio_bgcolorLinkFilter);
	update_option("modal_portfolio_bgcolorHoverFilter", $modal_portfolio_bgcolorHoverFilter);
	update_option("modal_portfolio_colorLinkFilter", $modal_portfolio_colorLinkFilter);
	update_option("modal_portfolio_colorHoverFilter", $modal_portfolio_colorHoverFilter);
	update_option("modal_portfolio_borderWidth", $modal_portfolio_borderWidth);
	update_option("modal_portfolio_borderStyle", $modal_portfolio_borderStyle);
	update_option("modal_portfolio_borderColor", $modal_portfolio_borderColor);
	update_option("modal_portfolio_cornersTypeFilter", $modal_portfolio_cornersTypeFilter);
	update_option("modal_portfolio_cornersRadiusFilter", $modal_portfolio_cornersRadiusFilter);
	update_option("modal_portfolio_marginFilter", $modal_portfolio_marginFilter);
}

// Fonction CallBack (de add_submenu_page) pour les options du plugin
function modal_portfolio_styles() {
	// Déclenche la fonction de mise à jour (upload)
	if(isset($_POST['modal_portfolio_action']) && $_POST['modal_portfolio_action'] == __('Save', 'modal-portfolio')) {
		modal_portfolio_update_styles();
	}

	/*---------------------------------------------------------------------*/
	/*----------------------- Affichage des options -----------------------*/
	/*---------------------------------------------------------------------*/
	echo '<div class="wrap modal-portfolio-admin">';
	echo '<h2 class="icon">'; _e('Modal Portfolio Styles', 'modal-portfolio'); echo '</h2><br/>';
?>
<script type="application/javascript">
jQuery(document).ready(function($) {  
	if(jQuery("#modal_portfolio_styleType").val() == true) {
		jQuery(".disabled").css("display", "block");
	} else {
		jQuery(".disabled").css("display", "none");
	}
	jQuery("#modal_portfolio_styleType").on("change", function() {
		if(jQuery(this).val() == true) {
			jQuery(".disabled").css("display", "block");
		} else {
			jQuery(".disabled").css("display", "none");
		}
	});
});
</script>
<div class="block">
    <!-- Formulaire de mise à jour des données -->
    <form method="post" action="">
    <div class="col first-col">
        <h4><?php _e('CSS Settings', 'modal-portfolio'); ?></h4>
		<p class="tr">
			<input type="text" name="modal_portfolio_css_path" id="modal_portfolio_css_path" value="<?php echo get_option("modal_portfolio_css_path"); ?>" />
            <label for="modal_portfolio_css_path"><strong><?php _e('URL of the CSS file of the theme', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('The option allows to choose another if desired style sheet (leave empty to not use CSS)', 'modal-portfolio'); ?><br/><?php echo plugins_url().'/modal-portfolio/css/portfolio.css '.__('by default.', 'modal-portfolio'); ?></em>
        </p>
        <p class="tr">
            <select name="modal_portfolio_styleType" id="modal_portfolio_styleType">
                <option value="1" <?php if(get_option("modal_portfolio_styleType") == true) { echo 'selected="selected"'; } ?>><?php _e('Yes', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_styleType") == false) { echo 'selected="selected"'; } ?>><?php _e('No', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_styleType"><strong><?php _e('Use dynamic CSS?', 'modal-portfolio'); ?></strong></label>
            <br/><em><?php _e('If "yes" is selected, the plugin uses a file style.php instead of style.css (and makes the right options used).', 'modal-portfolio'); ?></em>
        </p>

    	<p class="submit">
        	<input type="submit" name="modal_portfolio_action" class="button-primary" value="<?php _e('Save', 'modal-portfolio'); ?>" />
        </p>
		
		<div class="disabled">
			<h4><?php _e('Style of the effects', 'modal-portfolio'); ?></h4>
			<p class="tr">
				<input type="text" id="modal_portfolio_colorOverall" name="modal_portfolio_colorOverall" value="<?php echo get_option('modal_portfolio_colorOverall'); ?>"/>
				<label for="modal_portfolio_colorOverall"><strong><?php _e('Color of the rollover effect', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<input type="text" id="modal_portfolio_bgcolorOverall" name="modal_portfolio_bgcolorOverall" value="<?php echo get_option('modal_portfolio_bgcolorOverall'); ?>"/>
				<label for="modal_portfolio_bgcolorOverall"><strong><?php _e('Background-color of the rollover effect', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<select name="modal_portfolio_effectsSource" id="modal_portfolio_effectsSource">
					<option value="top" <?php if(get_option("modal_portfolio_effectsSource") == "top") { echo 'selected="selected"'; } ?>><?php _e('top', 'modal-portfolio'); ?></option>
					<option value="bottom" <?php if(get_option("modal_portfolio_effectsSource") == "bottom") { echo 'selected="selected"'; } ?>><?php _e('bottom', 'modal-portfolio'); ?></option>
				</select>
				<label for="modal_portfolio_effectsSource"><strong><?php _e('Positioning the rollover effect over thumbnails', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<input type="number" id="modal_portfolio_effectsHeight" name="modal_portfolio_effectsHeight" value="<?php echo get_option('modal_portfolio_effectsHeight'); ?>"/>
				<label for="modal_portfolio_effectsHeight"><strong><?php _e('Height of the effect (in px)', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<input type="number" id="modal_portfolio_effectsPadding" name="modal_portfolio_effectsPadding" value="<?php echo get_option('modal_portfolio_effectsPadding'); ?>"/>
				<label for="modal_portfolio_effectsPadding"><strong><?php _e('Global padding of the effect (in px)', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<select name="modal_portfolio_effectsAlign" id="modal_portfolio_effectsAlign">
					<option value="left" <?php if(get_option("modal_portfolio_effectsAlign") == "left") { echo 'selected="selected"'; } ?>><?php _e('left', 'modal-portfolio'); ?></option>
					<option value="center" <?php if(get_option("modal_portfolio_effectsAlign") == "center") { echo 'selected="selected"'; } ?>><?php _e('center', 'modal-portfolio'); ?></option>
					<option value="right" <?php if(get_option("modal_portfolio_effectsAlign") == "right") { echo 'selected="selected"'; } ?>><?php _e('right', 'modal-portfolio'); ?></option>
					<option value="justify" <?php if(get_option("modal_portfolio_effectsAlign") == "justify") { echo 'selected="selected"'; } ?>><?php _e('justify', 'modal-portfolio'); ?></option>
				</select>
				<label for="modal_portfolio_effectsAlign"><strong><?php _e('Text alignment in the rollover effect', 'modal-portfolio'); ?></strong></label>
			</p>
			
			<h4><?php _e('Style of the thumbnails', 'modal-portfolio'); ?></h4>
			<p class="tr">
				<input type="text" id="modal_portfolio_widthThumbnails" name="modal_portfolio_widthThumbnails" value="<?php echo get_option('modal_portfolio_widthThumbnails'); ?>"/>
				<label for="modal_portfolio_widthThumbnails"><strong><?php _e('Width of the thumbnails', 'modal-portfolio'); ?></strong></label>
			</p>
			<p class="tr">
				<input type="text" id="modal_portfolio_marginThumbnails" name="modal_portfolio_marginThumbnails" value="<?php echo get_option('modal_portfolio_marginThumbnails'); ?>"/>
				<label for="modal_portfolio_marginThumbnails"><strong><?php _e('Margin of the thumbnails', 'modal-portfolio'); ?></strong></label>
			</p>

			<p class="submit">
				<input type="submit" name="modal_portfolio_action" class="button-primary" value="<?php _e('Save', 'modal-portfolio'); ?>" />
			</p>
		</div>
	</div>
	
	<div class="col disabled">
        <h4><?php _e('Style of the modal window', 'modal-portfolio'); ?></h4>
        <p class="tr">
            <select name="modal_portfolio_cornersTypeModal" id="modal_portfolio_cornersTypeModal">
                <option value="1" <?php if(get_option("modal_portfolio_cornersTypeModal") == true) { echo 'selected="selected"'; } ?>><?php _e('Rounded corners', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_cornersTypeModal") == false) { echo 'selected="selected"'; } ?>><?php _e('Square corners', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_cornersTypeModal"><strong><?php _e('Type of corners for the modal window', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_cornersRadiusModal" name="modal_portfolio_cornersRadiusModal" value="<?php echo get_option('modal_portfolio_cornersRadiusModal'); ?>"/>
            <label for="modal_portfolio_cornersRadiusModal"><strong><?php _e('Border radius (if "rounded corners")', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_widthModal" name="modal_portfolio_widthModal" value="<?php echo get_option('modal_portfolio_widthModal'); ?>"/>
            <label for="modal_portfolio_widthModal"><strong><?php _e('Width of the modal window', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_heightModal" name="modal_portfolio_heightModal" value="<?php echo get_option('modal_portfolio_heightModal'); ?>"/>
            <label for="modal_portfolio_heightModal"><strong><?php _e('Height of the modal window', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_widthModalCol1" name="modal_portfolio_widthModalCol1" value="<?php echo get_option('modal_portfolio_widthModalCol1'); ?>"/>
            <label for="modal_portfolio_widthModalCol1"><strong><?php _e('Width of the left column in the modal window', 'modal-portfolio'); ?></strong></label>
			<br/><em><?php _e('The width of the left column corresponds to the width of the image or video.', 'modal-portfolio'); ?></em>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_widthModalCol2" name="modal_portfolio_widthModalCol2" value="<?php echo get_option('modal_portfolio_widthModalCol2'); ?>"/>
            <label for="modal_portfolio_widthModalCol2"><strong><?php _e('Width of the right column in the modal window', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_marginRightModalCol1" name="modal_portfolio_marginRightModalCol1" value="<?php echo get_option('modal_portfolio_marginRightModalCol1'); ?>"/>
            <label for="modal_portfolio_marginRightModalCol1"><strong><?php _e('Margin-right of the left column (space between the columns)', 'modal-portfolio'); ?></strong></label>
        </p>

		<h4><?php _e('Style of the filters', 'modal-portfolio'); ?></h4>
		<p class="tr">
            <input type="text" id="modal_portfolio_bgcolorLinkFilter" name="modal_portfolio_bgcolorLinkFilter" value="<?php echo get_option('modal_portfolio_bgcolorLinkFilter'); ?>"/>
            <label for="modal_portfolio_colorLinkFilter"><strong><?php _e('Link button background-color', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_bgcolorHoverFilter" name="modal_portfolio_bgcolorHoverFilter" value="<?php echo get_option('modal_portfolio_bgcolorHoverFilter'); ?>"/>
            <label for="modal_portfolio_colorHoverFilter"><strong><?php _e('Hover button background-color', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_colorLinkFilter" name="modal_portfolio_colorLinkFilter" value="<?php echo get_option('modal_portfolio_colorLinkFilter'); ?>"/>
            <label for="modal_portfolio_colorLinkFilter"><strong><?php _e('Link button color', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_colorHoverFilter" name="modal_portfolio_colorHoverFilter" value="<?php echo get_option('modal_portfolio_colorHoverFilter'); ?>"/>
            <label for="modal_portfolio_colorHoverFilter"><strong><?php _e('Hover button color', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="number" id="modal_portfolio_borderWidth" name="modal_portfolio_borderWidth" value="<?php echo get_option('modal_portfolio_borderWidth'); ?>" class="shortInput"/>
            <select name="modal_portfolio_borderStyle" id="modal_portfolio_borderStyle" class="shortSelect">
                <option value="none" <?php if(get_option("modal_portfolio_borderStyle") == "none") { echo 'selected="selected"'; } ?>><?php _e('none', 'modal-portfolio'); ?></option>
                <option value="solid" <?php if(get_option("modal_portfolio_borderStyle") == "solid") { echo 'selected="selected"'; } ?>><?php _e('solid', 'modal-portfolio'); ?></option>
                <option value="dotted" <?php if(get_option("modal_portfolio_borderStyle") == "dotted") { echo 'selected="selected"'; } ?>><?php _e('dotted', 'modal-portfolio'); ?></option>
                <option value="dashed" <?php if(get_option("modal_portfolio_borderStyle") == "dashed") { echo 'selected="selected"'; } ?>><?php _e('dashed', 'modal-portfolio'); ?></option>
                <option value="double" <?php if(get_option("modal_portfolio_borderStyle") == "double") { echo 'selected="selected"'; } ?>><?php _e('double', 'modal-portfolio'); ?></option>
                <option value="groove" <?php if(get_option("modal_portfolio_borderStyle") == "groove") { echo 'selected="selected"'; } ?>><?php _e('groove', 'modal-portfolio'); ?></option>
                <option value="ridge" <?php if(get_option("modal_portfolio_borderStyle") == "ridge") { echo 'selected="selected"'; } ?>><?php _e('ridge', 'modal-portfolio'); ?></option>
                <option value="inset" <?php if(get_option("modal_portfolio_borderStyle") == "inset") { echo 'selected="selected"'; } ?>><?php _e('inset', 'modal-portfolio'); ?></option>
                <option value="outset" <?php if(get_option("modal_portfolio_borderStyle") == "outset") { echo 'selected="selected"'; } ?>><?php _e('outset', 'modal-portfolio'); ?></option>
            </select>
            <input type="text" id="modal_portfolio_borderColor" name="modal_portfolio_borderColor" value="<?php echo get_option('modal_portfolio_borderColor'); ?>" class="shortInput"/>
            <label class="shortLabel"><strong><?php _e('Borders style', 'modal-portfolio'); ?></strong></label>
        </p>
        <p class="tr">
            <select name="modal_portfolio_cornersTypeFilter" id="modal_portfolio_cornersTypeFilter">
                <option value="1" <?php if(get_option("modal_portfolio_cornersTypeFilter") == true) { echo 'selected="selected"'; } ?>><?php _e('Rounded corners', 'modal-portfolio'); ?></option>
                <option value="0" <?php if(get_option("modal_portfolio_cornersTypeFilter") == false) { echo 'selected="selected"'; } ?>><?php _e('Square corners', 'modal-portfolio'); ?></option>
            </select>
            <label for="modal_portfolio_cornersTypeFilter"><strong><?php _e('Type of corners', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_cornersRadiusFilter" name="modal_portfolio_cornersRadiusFilter" value="<?php echo get_option('modal_portfolio_cornersRadiusFilter'); ?>"/>
            <label for="modal_portfolio_cornersRadiusFilter"><strong><?php _e('Border radius (if "rounded corners")', 'modal-portfolio'); ?></strong></label>
        </p>
		<p class="tr">
            <input type="text" id="modal_portfolio_marginFilter" name="modal_portfolio_marginFilter" value="<?php echo get_option('modal_portfolio_marginFilter'); ?>"/>
            <label for="modal_portfolio_marginFilter"><strong><?php _e('Margin of the filters', 'modal-portfolio'); ?></strong></label>
        </p>
	</div>
    </form>
	<div class="clear"></div>
</div>
<?php
echo '</div>'; // Fin de la page d'admin
}
?>