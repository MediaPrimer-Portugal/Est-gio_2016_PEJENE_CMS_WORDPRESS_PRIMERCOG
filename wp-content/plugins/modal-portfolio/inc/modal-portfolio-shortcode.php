<?php
// Gestion du shortcode
add_shortcode('modal-portfolio', 'modal_portfolio_shortcode');
function modal_portfolio_shortcode($args) {
	// Valeurs par défauts
	$args = shortcode_atts(
				array(
					'parents' => false,
					'categorie_parente' => '', // En français
					'parent_cat' => '' // En anglais
				), $args, 'modal-portfolio'
			);

	// Récupération des arguments du shortcode
	$parents = $args['parents'];
	if(empty($args['categorie_parente'])) {
		$catParente	= $args['parent_cat'];
	} else {
		$catParente	= $args['categorie_parente'];
	}
	
	// Début du contenu
	$content = '';
	
	// Si les filtres sont affichés
	if(get_option("modal_portfolio_filters") == true) {
	$content.= '<div id="filters" class="button-group">'."\n";
	
	// Si on affiche le filtre "tout" (all)
	if(get_option('modal_portfolio_allFilter') == true) {
		$content.= '<button class="button is-checked" data-filter="*">'.__('All', 'modal-portfolio').'</button>'."\n";
	}

	// Filtrage de la catégorie (récupération de l'ID courant)
	$allfilters = get_terms('project-cat');

	// Vérifie qu'il n'y a aucun filtre enfant
	foreach($allfilters as $filter) {
		$verif = array();
		if($filter->parent != 0) {
			$verif = $filter;
		}
	}
	if(empty($verif) && $parents == false) {
		$parents = true;
	}

	// Récupérer l'ID de la catégorie parente
	foreach($allfilters as $filter) {
		// Si on ne garde que les catégories enfants
		if($parents == false || $parents == 0) {
			// Ajoute uniquement les catégories enfants dans un tableau
			if($filter->parent != 0 && empty($catParente)) {
				$filtersWithoutParents[] = $filter;
			}
		}

		// Si on doit récupérer uniquement les catégories enfants d'une catégorie
		if($filter->slug == $catParente && $filter->parent == 0) {
			$IDcat = $filter->term_id;
		}
		
		// Liste des ID issues d'une catégorie précise
		if($filter->parent == $IDcat || $filter->term_id == $IDcat) {
			$IDs[] = $filter->term_id;
		}
	}

	// Liste des filtres finaux
	if($parents == false || $parents == 0) {
		if(isset($IDcat) && !empty($IDcat)) {
			// On ne conserve que les enfants (filtres "enfants")
			$args = array(
				'child_of' => $IDcat
			);
			$filters = get_terms('project-cat', $args);
		} else {
			if($filter->parent != 0 && empty($catParente)) {
				$filters = $filtersWithoutParents;
			} else {
				$filters = array();
			}
		}
	} else {
		if(isset($IDcat) && !empty($IDcat)) {
			// On relie tous les ID à conserver (filtres à afficher)
			array_push($IDs, $IDcat);
			$args = array(
				'include' => $IDs
			);
			$filters = get_terms('project-cat', $args);
		} else {
			$filters = $allfilters;
		}
	}

	// Filtrage final (après tri et sélection des catégories restantes)
	foreach($filters as $filter) {
		$content.= '<button class="button" data-filter=".'.$filter->slug.'">'.$filter->name.'</button>'."\n";
	}
				
	$content.= '</div>'."\n";
	}
	
	// Début de l'affichage d'isotope
    $content.= '<div class="isotope">'."\n";

	// Récupération des "posts" du Portfolio
	$atts = array(
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'post_type' => 'portfolio'
	);
	$portfolioPosts = get_posts($atts);

	// Catégorie parente (si désirée)
	if($parents == true || $parents == 1) {
		$parentTerm = get_terms('project-cat', array("include" => $IDcat));
	}

	// On récupère les catégories pour chaque ID (post)
	$allPosts = array();
	foreach($portfolioPosts as $posts) {
		$filter = wp_get_post_terms($posts->ID, 'project-cat');
		if(!empty($filter)) {
			foreach($filter as $filtre) {
				// Récupère la totalité des ID de filtres utiles (parents + enfants)
				$totalIds[$posts->ID][] = $filtre->term_id;

				// Permet de récupérer uniquement les informations nécessaires
				if(isset($IDcat) && !empty($IDcat)) {
					if($filtre->parent == 0 && $filtre->term_id == $IDcat) {
						// On dédoublonne les ID doubles !
						if(!array_key_exists($posts->ID, $allPosts)) {
							$allPosts[$posts->ID] = (array)$posts;
						}
						// On ajoute les informations de filtres dans les "posts"
						$allPosts[$posts->ID]['categories'] = $filter;				
					}
					if($filtre->parent == $IDcat || in_array($filtre->parent, $IDs)) {
						// On dédoublonne les ID doubles !
						if(!array_key_exists($posts->ID, $allPosts)) {
							$allPosts[$posts->ID] = (array)$posts;
						}
						// On ajoute les informations de filtres dans les "posts"
						$allPosts[$posts->ID]['categories'] = $filter;
						
						// S'il faut afficher les catégories parentes
						if($parents == true || $parents == 1) {
							// On ajoute les informations de la catégorie parente
							if(!in_array($filtre->parent, $totalIds[$posts->ID])) {
								$allPosts[$posts->ID]['categories'][] = $parentTerm[0];
							}
						}
					}
				} else {
					if($filtre->parent != 0 && empty($catParente)) {
						// Récupération de toutes les références
						$allPosts[$posts->ID] = (array)$posts;

						// On ajoute les informations de filtres dans les "posts"
						$allPosts[$posts->ID]['categories'] = $filter;
						
						// S'il faut afficher les catégories parentes
						if($parents == true || $parents == 1) {
							// On ajoute les informations de la catégorie parente
							if(!in_array($filtre->parent, $totalIds[$posts->ID])) {
								$allPosts[$posts->ID]['categories'][] = $parentTerm[0];
							}
						}
					} else {
						if($filtre->parent == 0 && ($parents == true || $parents == 1)) {
							$allPosts[$posts->ID] = (array)$posts;
							$allPosts[$posts->ID]['categories'] = $filter;
						}
					}
				}
			}
		} else {
			$allPosts[] = (array) $posts;
		}
	}

	// On boucle pour afficher chaque item du portfolio
	$nb = 1;	
	foreach($allPosts as $posts) {
 		// Récupération des données utiles
		$title_portfolio = get_post_meta($posts['ID'], 'portfolio_title', true);
		$video_portfolio = get_post_meta($posts['ID'], 'portfolio_video', true);
		$slugs = "";
		$names = "";
		if(!empty($posts['categories'])) {
			foreach($posts['categories'] as $categorie) {
				$slugs.= $categorie->slug." ";
				$names.= $categorie->name.", ";
			}
			$slugs = substr($slugs, 0, -1);
			$names = substr($names, 0, -2);
		}
		$content.= display_shortcode_html($posts, $slugs, $names, $title_portfolio, $video_portfolio, $nb);
		$nb++;
	}
    $content.= '</div>'."\n";

	// Retourne le contenu
	return $content;
}

// Fonction d'affichage (afin d'éviter les redondances d'utilisation)
function display_shortcode_html($posts, $slugs, $names, $title_portfolio = '', $video_portfolio = '', $nb = 0) {
	$content = '<div class="element-item transition '.$slugs.'" data-category="transition">'."\n";
	$content.= '<div class="modal-portfolio modal-pf '.$slugs.'" id="'.$posts['ID']."-".$nb.'">'."\n";

	// Affiche une image par défaut si nécessaire
	$post_thumbnail_id = get_post_thumbnail_id($posts['ID']);
	if(get_option("modal_portfolio_thumbnail_default") == true) {
		if(!empty($post_thumbnail_id)) {
			$content.= get_the_post_thumbnail($posts['ID'], 'medium')."\n";
		} else {
			$content.= '<img src="'.plugins_url('../img/pas-image.jpg', __FILE__ ).'" alt="Image - '.$title_portfolio.'"/>';
		}
	} else {
		$content.= get_the_post_thumbnail($posts['ID'], 'medium')."\n";
	}
	
	// Affichage conditionnel des effets de texte au survol
	if(get_option("modal_portfolio_title_thumbnail") == true) {
		$content.= '<div class="ref-label">'."\n";
		if(!empty($title_portfolio) || !empty($names)) {
		$content.= '<div class="ref-label-text">'."\n";
			if(!empty($title_portfolio)) {
			$content.= '<div class="ref-text-title">'.$title_portfolio.'</div>'."\n";
			}
			if(!empty($names)) {
			$content.= '<div class="ref-text-category">'.$names.'</div>'."\n";
			}
			$content.= '</div>'."\n";
			$content.= '<div class="ref-label-bg"></div>'."\n";
		}
		$content.= '</div>'."\n";
	}
	
	$content.= '</div>'."\n";
	$content.= '</div>'."\n";
	
	$content.= '<div class="hidden-modal modal-pf-'.$posts['ID']."-".$nb.'">'."\n";
	
	// Affichage conditionnel du titre de la modale
	if(get_option("modal_portfolio_title_modal") == true) {
		$content.= '<h2>'.apply_filters('the_title', get_post_field('post_title', $posts['ID'])).'</h2>'."\n";
	}
	
	$content.= '<div class="modal-pf-bloc">'."\n";
	if(!empty($video_portfolio)) {
		if(preg_match('#youtu[.]?be#i', $video_portfolio)) {
			preg_match('#[\\?\\&]v[i\/]?=([^\\?\\&]+)#i', $video_portfolio, $matches);
			$videoID = $matches[1];
			$videoLink = '<div class="modal-pf-img portfolio-video">';
			$videoLink.= '<div class="portfolio-video-wrap">';
			$videoLink.= '<img src="'.plugins_url('img/16x9.png', dirname(__FILE__)).'" alt="responsive-video" class="ratio"/>';
			$videoLink.= '<iframe src="//www.youtube.com/embed/'.$videoID.'" frameborder="0" allowfullscreen></iframe>';
			$videoLink.= '</div>';
			$videoLink.= '</div>';
		} elseif(preg_match('#(dailymotion|dai.ly)#i', $video_portfolio)) {
			preg_match('#(dailymotion.com/video|dai.ly)/([^_]+)#i', $video_portfolio, $matches);
			$videoID = $matches[2];
			$videoLink = '<div class="modal-pf-img portfolio-video">';
			$videoLink.= '<div class="portfolio-video-wrap">';
			$videoLink.= '<img src="'.plugins_url('img/16x9.png', dirname(__FILE__)).'" alt="responsive-video" class="ratio"/>';
			$videoLink.= '<iframe src="//www.dailymotion.com/embed/video/'.$videoID.'" frameborder="0" allowfullscreen></iframe>';
			$videoLink.= '</div>';
			$videoLink.= '</div>';
		} elseif(preg_match('#(vimeo)#i', $video_portfolio)) {
			preg_match('#(vimeo.com)/([^_]+)#i', $video_portfolio, $matches);
			$videoID = $matches[2];
			$videoLink = '<div class="modal-pf-img portfolio-video">';
			$videoLink.= '<div class="portfolio-video-wrap">';
			$videoLink.= '<img src="'.plugins_url('img/16x9.png', dirname(__FILE__)).'" alt="responsive-video" class="ratio"/>';
			$videoLink.= '<iframe src="//player.vimeo.com/video/'.$videoID.'" allowfullscreen></iframe>';
			$videoLink.= '</div>';
			$videoLink.= '</div>';
		} else {
			$videoLink = '<video controls="controls" autobuffer="autobuffer">';
			$videoLink.= '<source src="'.$video_portfolio.'">';
			$videoLink.= __('Video format not supported by your browser, you can ', 'modal-portfolio').'<a href="'.$video_portfolio.'">'.__('download the video', 'modal-portfolio').'</a>.';
			$videoLink.= '</video>';
		}
		// $media = get_attached_media('video', $posts['ID']); // Tableau des vidéos liées à l'item
		$content.= '<div class="modal-pf-img portfolio-video">';
		$content.= $videoLink;		
		$content.= "</div>\n";
	} else {
		$content.= '<div class="modal-pf-img">'.get_the_post_thumbnail($posts['ID'], 'large').'</div>'."\n";
	}
	
	// Affichage conditionnel de la description dans la modale
	if(get_option("modal_portfolio_text_modal") == true) {
		// $texteComplet.= apply_filters('the_content', get_post_field('post_content', $posts['ID']));
		$texteComplet = wpautop(get_post_field('post_content', $posts['ID'])); // Pour contrer les problèmes avec PageBuilder et apply_filters()
		$content.= '<div class="modal-pf-content">'.$texteComplet.'</div>'."\n";
	}
	
	$content.= '<div class="clear"></div>'."\n";
	$content.= '</div>'."\n";
	
	// Affichage conditionnel du bouton de fermeture
	if(get_option("modal_portfolio_close_button") == true) {
		$content.= '<div class="modal-pf-close"><button class="simplemodal-close">'.__('Close', 'modal-portfolio').'</button></div>'."\n";
	}
	
	$content.= '<div class="clear"></div>'."\n";
	$content.= '</div>'."\n";
	
	// Retourne le résultat (contenu du shortcode)
	return $content;
}
?>