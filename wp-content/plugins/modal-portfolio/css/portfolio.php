<?php
header("Content-type: text/css; charset=UTF-8");
header('Cache-Control: max-age=31536000, must-revalidate');

// Nécessaire pour récupérer les variables de WordPress
include_once('../../../../wp-load.php');

// Récupération des variables
$bgcouleurEffetSurvol = get_option("modal_portfolio_bgcolorOverall");
$couleurEffetSurvol = get_option("modal_portfolio_colorOverall");
$paddingEffet = get_option("modal_portfolio_effectsPadding");
$alignementEffet = get_option("modal_portfolio_effectsAlign");
$directionEffetSurvol = get_option("modal_portfolio_effectsSource");
$hauteurEffetSurvol = get_option("modal_portfolio_effectsHeight");
$largeurVignettes = get_option("modal_portfolio_widthThumbnails");
$margeVignettes = get_option("modal_portfolio_marginThumbnails");
$bgcouleurFiltre = get_option("modal_portfolio_bgcolorLinkFilter");
$bgcouleurFiltreHover = get_option("modal_portfolio_bgcolorHoverFilter");
$couleurFiltre = get_option("modal_portfolio_colorLinkFilter");
$largeurModale = get_option("modal_portfolio_widthModal");
$hauteurModale = get_option("modal_portfolio_heightModal");
$largeurCol1 = get_option("modal_portfolio_widthModalCol1");
$largeurCol2 = get_option("modal_portfolio_widthModalCol2");
$margeDroiteCol1 = get_option("modal_portfolio_marginRightModalCol1");
$couleurFiltreHover = get_option("modal_portfolio_colorHoverFilter");
$widthFiltreBorder = get_option("modal_portfolio_borderWidth");
$styleFiltreBorder = get_option("modal_portfolio_borderStyle");
$couleurFiltreBorder = get_option("modal_portfolio_borderColor");
$margeFiltres = get_option("modal_portfolio_marginFilter");
if(get_option("modal_portfolio_cornersTypeModal") == true) {
	$typeCoinsModale = 'border-radius:'.get_option("modal_portfolio_cornersRadiusModal").';';
} else {
	$typeCoinsModale = '';
}
if(get_option("modal_portfolio_cornersTypeFilter") == true) {
	$typeCoins = 'border-radius:'.get_option("modal_portfolio_cornersRadiusFilter").';';
} else {
	$typeCoins = '';
}
?>
.clear {clear:both; line-height:0}
#filters, .isotope {-webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box}

/* Classes générales du portfolio */
.modal-portfolio {overflow:hidden; position:relative; background:#FFF; cursor:pointer}
.modal-portfolio img {max-width:100%; position:relative}
.modal-portfolio .ref-label {position:absolute; width:100%; height:<?php echo $hauteurEffetSurvol; ?>px; <?php echo $directionEffetSurvol; ?>:-<?php echo $hauteurEffetSurvol; ?>px; z-index:500;}
.modal-portfolio .ref-label-bg {width:100%; height:100%; position:absolute; top:0; left:0}
.modal-portfolio .ref-label-text {font-size:.9em; color:<?php echo $couleurEffetSurvol; ?>; height:<?php echo $hauteurEffetSurvol-($paddingEffet*2); ?>px; padding:<?php echo $paddingEffet; ?>px; line-height:1.3em; background:<?php echo $bgcouleurEffetSurvol; ?>; text-align:<?php echo $alignementEffet; ?>}
.modal-portfolio .ref-text-category {display:block; font-family:helvetica, arial, sans-serif; font-size:.8em}

/* Rendu des filtres */
#filters {text-align:center; font-size:.9em}
#filters .button{margin:<?php echo $margeFiltres; ?>; background-color:<?php echo $bgcouleurFiltre; ?>; border:<?php echo $widthFiltreBorder."px ".$styleFiltreBorder." ".$couleurFiltreBorder; ?>; <?php echo $typeCoins; ?> color:<?php echo $couleurFiltre; ?>; cursor:pointer; display:inline-block; padding:.3em 1em; -webkit-transition:all 400ms linear; -moz-transition:all 400ms linear; -ms-transition:all 400ms linear; -o-transition:all 400ms linear; transition:all 400ms linear}
#filters .button:hover {background-color:<?php echo $bgcouleurFiltreHover; ?>; color:<?php echo $couleurFiltreHover; ?>; box-shadow:0 5px 8px -3px #333}
#filters .is-checked {background-color:<?php echo $bgcouleurFiltreHover; ?>; color:<?php echo $couleurFiltreHover; ?>}
.isotope {margin-top:1em}
.isotope:after {content:''; display:block; clear:both}
.isotope .element-item {margin:<?php echo $margeVignettes; ?>; width:<?php echo $largeurVignettes; ?>; height:auto; float:left}
.isotope .element-item img {width:100%; height:auto; -webkit-transition:all 400ms linear; -moz-transition: all 400ms linear; -ms-transition: all 400ms linear; -o-transition:all 400ms linear; transition: all 400ms linear}

/* Cache la modale par défaut */
.hidden-modal {display:none;}

/* Rendu de la modale (général) */
#simplemodal-container {height:<?php echo $hauteurModale; ?>; width:<?php echo $largeurModale; ?>; color:#333; background-color:#FFF; border:2px solid #666; <?php echo $typeCoinsModale; ?> position:relative}
#simplemodal-container .simplemodal-data {padding:8px}
#simplemodal-container a.modalCloseImg {background:url(../img/2x.png) no-repeat; width:25px; height:24px; display:inline; z-index:3200; position:absolute; top:-15px; right:-16px; cursor:pointer}

/* Rendu du contenu de la modale */
#simplemodal-container h2 {padding:.5em 1em 1em; color:#332c2c; border-bottom:1px solid #e5e5e5; margin-bottom:1em}
#simplemodal-container .modal-pf-bloc {padding-bottom:1em; border-bottom:1px solid #e5e5e5}
#simplemodal-container .modal-pf-bloc .modal-pf-img {float:left; width:<?php echo $largeurCol1; ?>; margin:.2em <?php echo $margeDroiteCol1; ?> 0 0}
#simplemodal-container .modal-pf-bloc .modal-pf-img img {width:100%}
#simplemodal-container .modal-pf-bloc .modal-pf-img video {width:100%; max-width:100%; height:auto}
#simplemodal-container .modal-pf-bloc .modal-pf-img .portfolio-video{width:100%;height:100%;padding:0}
#simplemodal-container .modal-pf-bloc .modal-pf-img .portfolio-video-wrap{position:relative;}
#simplemodal-container .modal-pf-bloc .modal-pf-img .portfolio-video-wrap .ratio {display:block;width:100%;height:auto;}
#simplemodal-container .modal-pf-bloc .modal-pf-img .portfolio-video-wrap iframe {position:absolute;top:0;left:0;width:100%; height:100%;}
#simplemodal-container .modal-pf-bloc .modal-pf-content {float:right; width:<?php echo $largeurCol2; ?>}
#simplemodal-container .modal-pf-bloc .modal-pf-content p {margin-bottom:.6em}
#simplemodal-container .modal-pf-close button {position:absolute; bottom:1em; left:1em; background-color:#fff; border:1px solid #ccc; color:#333; border-radius:5px; font-size:.9em; padding:.3em .6em; cursor:pointer}
#simplemodal-container .modal-close button:hover {background-color:#e6e6e6}

/* Responsive */
@media (max-width:1024px) {
#simplemodal-container {font-size:.9em; height:65%; width:65%;}
}
@media (max-width:768px) {
#simplemodal-container {font-size:.9em; height:75%; width:75%;}
#simplemodal-container .modal-pf-bloc {padding-bottom:2.3em; border-bottom:0}
#simplemodal-container .modal-pf-bloc .modal-pf-img {float:none; width:98%; margin:.2em auto 1em}
#simplemodal-container .modal-pf-bloc .modal-pf-img img {display:block; margin:0 auto}
#simplemodal-container .modal-pf-bloc .modal-pf-content {float:none; width:100%; padding:.2em; margin-top:1em}
#simplemodal-container .modal-pf-close button {left:auto; bottom:.5em; right:1em}
}
@media (max-width:480px) {
#simplemodal-container {font-size:.8em; height:85%; width:85%;}
}