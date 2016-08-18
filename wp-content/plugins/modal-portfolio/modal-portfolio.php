<?php
/*
 * Plugin Name: Modal Portfolio
 * Plugin URI: http://www.internet-formation.fr
 * Description: Portfolio avec photos, description, titre et filtres en responsive avec de multiples options (responsive portfolio with images, description, title and filters (with multiple settings)
 * Version: 1.5
 * Author: Mathieu Chartier
 * Author URI: http://www.mathieu-chartier.com
*/
// Version du plugin
global $modal_portfolio_version;
$modal_portfolio_version = "1.5";

// Gestion des langues
function modal_portfolio_lang() {
	$path = dirname(plugin_basename(__FILE__)).'/lang/';
	load_plugin_textdomain('modal-portfolio', NULL, $path);
}
add_action('plugins_loaded', 'modal_portfolio_lang');

// Fonction lancée lors de l'activation ou de la desactivation de l'extension
register_activation_hook( __FILE__, 'modal_portfolio_installation');
register_deactivation_hook( __FILE__, 'modal_portfolio_desinstallation');

// Réglages par défaut (enregistrement des options)
function modal_portfolio_installation() {
	global $modal_portfolio_version;

	// Valeurs par défaut
	add_option("modal_portfolio_filters", true);
	add_option("modal_portfolio_allFilter", true);
	add_option("modal_portfolio_text_modal", true);
	add_option("modal_portfolio_title_modal", true);
	add_option("modal_portfolio_title_thumbnail", true);
	add_option("modal_portfolio_thumbnail_default", true);
	add_option("modal_portfolio_close_button", true);
	add_option("modal_portfolio_modalOpacity", 70);
	add_option("modal_portfolio_overlayCloseClick", true);
	add_option("modal_portfolio_colorOverlay", "#666666");
	add_option("modal_portfolio_overlayDuration", 200);
	add_option("modal_portfolio_hideShowDuration", 400);
	add_option("modal_portfolio_openEffect", "fadeIn");
	add_option("modal_portfolio_thumbnailsEffect", true);
	add_option("modal_portfolio_openUpEffect", "easeOutQuad");
	add_option("modal_portfolio_openDownEffect", "easeInQuad");
	add_option("modal_portfolio_openUpDuration", 600);
	add_option("modal_portfolio_openDownDuration", 300);
	add_option("modal_portfolio_css_path", plugins_url().'/modal-portfolio/css/portfolio.css');
	add_option("modal_portfolio_styleType", 0);
	add_option("modal_portfolio_effectsSource", "bottom");
	add_option("modal_portfolio_effectsHeight", "45");
	add_option("modal_portfolio_colorOverall", "#FFFFFF");
	add_option("modal_portfolio_bgcolorOverall", "#242424");
	add_option("modal_portfolio_effectsPadding", "5");
	add_option("modal_portfolio_effectsAlign", "left");
	add_option("modal_portfolio_cornersTypeModal", true);
	add_option("modal_portfolio_cornersRadiusModal", "5px 5px 5px 5px");
	add_option("modal_portfolio_widthThumbnails", "31%");
	add_option("modal_portfolio_marginThumbnails", "1%");
	add_option("modal_portfolio_widthModal", "60%");
	add_option("modal_portfolio_heightModal", "60%");
	add_option("modal_portfolio_widthModalCol1", "44%");
	add_option("modal_portfolio_widthModalCol2", "54%");
	add_option("modal_portfolio_marginRightModalCol1", "2%");
	add_option("modal_portfolio_bgcolorLinkFilter", "#242424");
	add_option("modal_portfolio_bgcolorHoverFilter", "#FFFFFF");
	add_option("modal_portfolio_colorLinkFilter", "#FFFFFF");
	add_option("modal_portfolio_colorHoverFilter", "#242424");
	add_option("modal_portfolio_borderWidth", "1");
	add_option("modal_portfolio_borderStyle", "solid");
	add_option("modal_portfolio_borderColor", "#242424");
	add_option("modal_portfolio_cornersTypeFilter", true);
	add_option("modal_portfolio_cornersRadiusFilter", "5px 5px 5px 5px");
	add_option("modal_portfolio_marginFilter", ".3em .3em");
	
	// Prise en compte de la version en cours
	add_option("modal_portfolio_version", $modal_portfolio_version);
}

// Quand l'extension est désactivée, les options sont supprimées...
function modal_portfolio_desinstallation() {
	// Suppression des options
	delete_option("modal_portfolio_filters");
	delete_option("modal_portfolio_allFilter");
	delete_option("modal_portfolio_text_modal");
	delete_option("modal_portfolio_title_modal");
	delete_option("modal_portfolio_title_thumbnail");
	delete_option("modal_portfolio_thumbnail_default");
	delete_option("modal_portfolio_close_button");
	delete_option("modal_portfolio_modalOpacity");
	delete_option("modal_portfolio_overlayCloseClick");
	delete_option("modal_portfolio_colorOverlay");
	delete_option("modal_portfolio_overlayDuration");
	delete_option("modal_portfolio_hideShowDuration");
	delete_option("modal_portfolio_openEffect");
	delete_option("modal_portfolio_thumbnailsEffect");
	delete_option("modal_portfolio_openUpEffect");
	delete_option("modal_portfolio_openDownEffect");
	delete_option("modal_portfolio_openUpDuration");
	delete_option("modal_portfolio_openDownDuration");
	delete_option("modal_portfolio_css_path");
	delete_option("modal_portfolio_styleType");
	delete_option("modal_portfolio_effectsSource");
	delete_option("modal_portfolio_effectsHeight");
	delete_option("modal_portfolio_colorOverall");
	delete_option("modal_portfolio_bgcolorOverall");
	delete_option("modal_portfolio_effectsPadding");
	delete_option("modal_portfolio_effectsAlign");
	delete_option("modal_portfolio_cornersTypeModal");
	delete_option("modal_portfolio_cornersRadiusModal");
	delete_option("modal_portfolio_widthThumbnails");
	delete_option("modal_portfolio_marginThumbnails");
	delete_option("modal_portfolio_widthModal");
	delete_option("modal_portfolio_heightModal");
	delete_option("modal_portfolio_widthModalCol1");
	delete_option("modal_portfolio_widthModalCol2");
	delete_option("modal_portfolio_marginRightModalCol1");
	delete_option("modal_portfolio_bgcolorLinkFilter");
	delete_option("modal_portfolio_bgcolorHoverFilter");
	delete_option("modal_portfolio_colorLinkFilter");
	delete_option("modal_portfolio_colorHoverFilter");
	delete_option("modal_portfolio_borderWidth");
	delete_option("modal_portfolio_borderStyle");
	delete_option("modal_portfolio_borderColor");
	delete_option("modal_portfolio_cornersTypeFilter");
	delete_option("modal_portfolio_cornersRadiusFilter");
	delete_option("modal_portfolio_marginFilter");
	
	// Suppression de la version du plugin
	delete_option("modal_portfolio_version");
}

// Quand le plugin est mise à jour, on relance la fonction
function modal_portfolio_upgrade() {
    global $modal_portfolio_version;
    if(get_site_option('modal_portfolio_version') != $modal_portfolio_version) {
		// Nouvelles données v1.3
		if(!get_option('modal_portfolio_styleType')) {
			update_option("modal_portfolio_styleType", 0);
			update_option("modal_portfolio_effectsSource", "bottom");
			update_option("modal_portfolio_effectsHeight", "45");
			update_option("modal_portfolio_colorOverall", "#FFFFFF");
			update_option("modal_portfolio_bgcolorOverall", "#242424");
			update_option("modal_portfolio_effectsPadding", "5");
			update_option("modal_portfolio_effectsAlign", "left");
			update_option("modal_portfolio_cornersTypeModal", true);
			update_option("modal_portfolio_cornersRadiusModal", "5px 5px 5px 5px");
			update_option("modal_portfolio_widthThumbnails", "31%");
			update_option("modal_portfolio_marginThumbnails", "1%");
			update_option("modal_portfolio_bgcolorLinkFilter", "#242424");
			update_option("modal_portfolio_bgcolorHoverFilter", "#FFFFFF");
			update_option("modal_portfolio_colorLinkFilter", "#FFFFFF");
			update_option("modal_portfolio_colorHoverFilter", "#242424");
			update_option("modal_portfolio_borderWidth", "1");
			update_option("modal_portfolio_borderStyle", "solid");
			update_option("modal_portfolio_borderColor", "#242424");
			update_option("modal_portfolio_cornersTypeFilter", true);
			update_option("modal_portfolio_cornersRadiusFilter", "5px 5px 5px 5px");
			update_option("modal_portfolio_marginFilter", ".3em .3em");
		}
		// Nouvelles données v1.4
		if(!get_option('modal_portfolio_widthModal')) {
			update_option("modal_portfolio_widthModal", "60%");
			update_option("modal_portfolio_heightModal", "60%");
			update_option("modal_portfolio_widthModalCol1", "44%");
			update_option("modal_portfolio_widthModalCol2", "54%");
			update_option("modal_portfolio_marginRightModalCol1", "2%");
		}
		// Nouvelles données v1.5
		if(!get_option('modal_portfolio_widthModal')) {
			update_option("modal_portfolio_thumbnail_default", true);
		}
		
		// Mise à jour de la version du plugin en cours
        update_option("modal_portfolio_version", $modal_portfolio_version);
    }
}
add_action('plugins_loaded', 'modal_portfolio_upgrade');

// Inclusion des menus personnalisés
include('inc/modal-portfolio-menus.php');

// Inclusion de la metabox supplémentaire (titre de la vignette)
include('inc/modal-portfolio-metaboxes.php');

// Inclusion du shortcode
include('inc/modal-portfolio-shortcode.php');

// Activation des images à la Une pour le portfolio (obligatoire !)
add_theme_support('post-thumbnails', array('portfolio'));

// Liste des scripts et CSS utiles
function modal_portfolio_scripts() {
    wp_enqueue_script('isotope', plugins_url().'/modal-portfolio/js/isotope.min.js', array('jquery'), '2.2.0', true);
    wp_enqueue_script('image-loaded', plugins_url().'/modal-portfolio/js/imagesloaded.min.js', array('jquery'), '3.1.8', true);
    wp_enqueue_script('simplemodal', plugins_url().'/modal-portfolio/js/jquery.simplemodal.1.4.4.min.js', array('jquery'), '1.4.4', true);
	wp_enqueue_script("jquery-effects-core");
	
	// Variables passées au fichier portfolio.js
	$params = array(
		'modalOpacity'		=> get_option("modal_portfolio_modalOpacity"),
		'overlayCloseClick'	=> get_option("modal_portfolio_overlayCloseClick"),
		'colorOverlay'		=> get_option("modal_portfolio_colorOverlay"),
		'overlayDuration'	=> get_option("modal_portfolio_overlayDuration"),
		'hideShowDuration'	=> get_option("modal_portfolio_hideShowDuration"),
		'openEffect'		=> get_option("modal_portfolio_openEffect"),
		'thumbnailsEffect'	=> get_option("modal_portfolio_thumbnailsEffect"),
		'openUpEffect'		=> get_option("modal_portfolio_openUpEffect"),
		'openDownEffect'	=> get_option("modal_portfolio_openDownEffect"),
		'openUpDuration'	=> get_option("modal_portfolio_openUpDuration"),
		'openDownDuration'	=> get_option("modal_portfolio_openDownDuration"),
		'activeDynamicCSS'	=> get_option("modal_portfolio_styleType"),
		'positionEffect'	=> get_option("modal_portfolio_effectsSource"),
		'heightEffect'		=> get_option("modal_portfolio_effectsHeight"),
	);
    wp_enqueue_script('portfolio-script', plugins_url().'/modal-portfolio/js/portfolio.js', array('jquery'), '1.0', true);
	wp_localize_script('portfolio-script', 'parametres', $params);
	
	// Ajout de la feuille de style désirée !
	if(get_option('modal_portfolio_css_path') == plugins_url().'/modal-portfolio/css/portfolio.php' || get_option('modal_portfolio_css_path') == plugins_url().'/modal-portfolio/css/portfolio.css') {
		if(get_option('modal_portfolio_styleType') == 1) {
			wp_enqueue_style('modal-portfolio', plugins_url().'/modal-portfolio/css/portfolio.php');
		} else {
			wp_enqueue_style('modal-portfolio', plugins_url().'/modal-portfolio/css/portfolio.css');
		}
	} elseif(trim(get_option('modal_portfolio_css_path')) != '') {
		wp_enqueue_style('modal-portfolio', get_option('modal_portfolio_css_path'));
	}
}
add_action('wp_enqueue_scripts', 'modal_portfolio_scripts');

// Ajout d'une feuille de style pour l'admin
function modal_portfolio_admin_scripts_CSS() {
	// Style côté backoffice
	$style	= plugins_url('css/modal-portfolio-admin.css', __FILE__);
	wp_enqueue_style('modal-portfolio-admin', $style, 15);
	
	// Style du slider range
	wp_enqueue_style("range-style", plugins_url('css/jquery-ui.css', __FILE__));
	
	// Ajout des scripts utiles pour le plugin
	wp_enqueue_script('iris-colorpicker-script', plugins_url('/js/iris.min.js', __FILE__), array('jquery', 'jquery-ui'), false, true);
	wp_enqueue_script('colorpicker-script', plugins_url('/js/colorpicker-script.js', __FILE__), array('wp-color-picker'), false, true);
	wp_enqueue_script('jquery-ui-slider');
}
add_action('admin_enqueue_scripts', 'modal_portfolio_admin_scripts_CSS');
?>