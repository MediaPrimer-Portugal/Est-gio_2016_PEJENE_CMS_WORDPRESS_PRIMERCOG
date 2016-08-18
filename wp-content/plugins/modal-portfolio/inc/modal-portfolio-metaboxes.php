<?php
// Gestion des nouvelles metabox personnalisées
function add_portfolio_metabox() {
	// Ajoute la metabox de personnalisation des titres de vignettes
	add_meta_box('portfolio_ref_title', __('The thumbnail title', 'modal-portfolio'), 'portfolio_ref_title', 'portfolio', 'normal', 'high');
	
	// Ajoute la metabox d'upload vidéo
	if(current_user_can('upload_files')){
		add_meta_box('portfolio_ref_video', __('Add a video (overwrites the post thumbnail)', 'modal-portfolio'), 'portfolio_ref_video', 'portfolio', 'normal', 'high');
	}
}

// Ajout du formulaire correspondant à la metabox personnalisée pour le titre de la vignette (callback)
function portfolio_ref_title() {
	global $post;

	// Noncename nécessaire pour savoir d'où proviennent les données
	wp_nonce_field('portfolio_metabox', 'portfolio_metabox_nonce');
	
	// Récupère les données si le champ a déjà été rempli...
	$title_portfolio = get_post_meta($post->ID, 'portfolio_title', true);
	
	// Affiche le champ de formulaire supplémentaire
	echo '<p><em>'.__('Title displayed when hovering the thumbnail in the references page (Porfolio)', 'modal-portfolio')."</em></p>\n";
	echo '<input type="text" name="portfolio_title" value="'.esc_attr($title_portfolio).'" class="widefat" />';
}

// Ajout du formulaire correspondant à la metabox personnalisée pour l'ajout de vidéo (callback)
function portfolio_ref_video() {
	global $post;
	
	// Noncename nécessaire pour savoir d'où proviennent les données
	wp_nonce_field('portfolio_video_metabox', 'portfolio_video_metabox_nonce');
	
	// Récupère les données si le champ a déjà été rempli...
	$video_portfolio = get_post_meta($post->ID, 'portfolio_video', true);
	
	// Affiche le champ de formulaire supplémentaire
	echo "<p>".__('Add a video using the media gallery or external URL:', 'modal-portfolio');
	echo "<br/><em>".__('- HTML 5 video formats supported (webm, mp4 and ogg).', 'modal-portfolio');
	echo "<br/>".__('- Videos from YouTube, Dailymotion and Vimeo (copy the video link in the field in this case).', 'modal-portfolio')."</em></p>\n";
	echo "<p>".__('Note: if this field is filled, it takes the place of the post thumbnail (used by default).', 'modal-portfolio')."</p>\n";
    echo '<p><input type="button" id="portfolio_video_button" class="button" value="'.__("Add a video", "modal-portfolio").'"/></p>';
    echo '<p><input type="text" name="portfolio_video" id="portfolio_video" value="'.esc_attr($video_portfolio).'" class="widefat" placeholder="'.__('Video URL', 'modal-portfolio').'" /></p>';
}

// Ajoute le Javascript pour la galerie des médias
function js_portfolio_enqueue() {
    global $typenow;
	// Uniquement si le type est portfolio !
    if($typenow == 'portfolio') {
        wp_enqueue_media();
		
		// Galerie des médias personnalisée
		$args = array(
			'title' => __('Select or add a video', 'modal-portfolio'),
			'button' => __('Use this video', 'modal-portfolio')
		);
 
        // Ajoute les scripts JS utiles
        wp_register_script('metabox-video', plugins_url('js/metabox-video.min.js', dirname(__FILE__)), array('jquery', 'media-upload'));
        wp_localize_script('metabox-video', 'meta_video', $args);
        wp_enqueue_script('metabox-video');
    }
}
add_action('admin_enqueue_scripts', 'js_portfolio_enqueue');

// Gestion de l'enregistrement de la metabox personnalisée
function save_portfolio_metabox() {
	global $post;

	// Vérifie que le noncename est valide !
	if(!wp_verify_nonce($_POST['portfolio_metabox_nonce'], 'portfolio_metabox')) {
		return $post->ID;
	}
	if(!wp_verify_nonce($_POST['portfolio_video_metabox_nonce'], 'portfolio_video_metabox')) {
		return $post->ID;
	}

	// Vérifie les permissions des utilisateurs
	if(!current_user_can('edit_post', $post->ID)) {
		return $post->ID;
	}

	// Récupère l'information du champ personnalisé
	$titre_vignette = sanitize_text_field($_POST['portfolio_title']);
	$ajout_video = $_POST['portfolio_video'];

	// Adapte les données en fonction de l'existence du champ personnalisé
	if(get_post_meta($post->ID, 'portfolio_title', false)) {
		update_post_meta($post->ID, 'portfolio_title', $titre_vignette);
	} else {
		add_post_meta($post->ID, 'portfolio_title', $titre_vignette);
	}
	if(get_post_meta($post->ID, 'portfolio_video', false)) {
		update_post_meta($post->ID, 'portfolio_video', $ajout_video);
	} else {
		add_post_meta($post->ID, 'portfolio_video', $ajout_video);
	}
	
	// Supprime le champ personnalisé (donnée uniquement) s'il est vide
	if(!$titre_vignette) {
		delete_post_meta($post->ID, 'portfolio_title');
	}
	if(!$ajout_video) {
		delete_post_meta($post->ID, 'portfolio_video');
	}
}
add_action('save_post', 'save_portfolio_metabox');
?>