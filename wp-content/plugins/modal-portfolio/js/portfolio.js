(function($) {
    $(function() {
		// Récupération des variables dynamiques transmises via WordPress
		var modalOpacity = parametres.modalOpacity;
		var overlayCloseClick = parametres.overlayCloseClick;
		var colorOverlay = parametres.colorOverlay;
		var overlayDuration = parametres.overlayDuration;
		var hideShowDuration = parametres.hideShowDuration;
		var openEffect = parametres.openEffect;
		var thumbnailsEffect = parametres.thumbnailsEffect;
		var openUpEffect = parametres.openUpEffect;
		var openDownEffect = parametres.openDownEffect;
		var openUpDuration = parametres.openUpDuration;
		var openDownDuration = parametres.openDownDuration;
		var activeDynamicCSS = parametres.activeDynamicCSS;
		var positionEffect = parametres.positionEffect;
		var heightEffect = parametres.heightEffect;

		// Lancement de Isotope
		var $container = $('.isotope').imagesLoaded(function() {
			$container.isotope({
				itemSelector: '.element-item',
				layoutMode: 'fitRows'
			});
			//$container.isotope('layout');
		});

		$(window).on('load', function(){
			$('.isotope').isotope('layout');
		});

		// Gestion des filtres Isotope
        $('#filters').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $container.isotope({filter:filterValue});
			
			// Ajoute la class "is-checked"
			$('#filters button').removeClass('is-checked');
			$(this).addClass('is-checked');
        });

        // Gestion de la modale (http://www.ericmmartin.com/projects/simplemodal/)
		$('.element-item .modal-pf').click(function(e) {
			// Récupération de l'ID unique (pour chaque modale différenciée)
			var item = $(this).attr("id");

			// Paramètres pour la modale
			var options = {
				overlayClose:overlayCloseClick,
				overlayCss:{backgroundColor:colorOverlay},
				opacity:modalOpacity,
				autoResize:true,
				zIndex:99999,
				onOpen:function(dialog) {
					dialog.overlay.slideDown(overlayDuration, function() {
						if(openEffect == "slideDown") {
							dialog.container.slideDown(hideShowDuration);
						} else if(openEffect == "slideUp") {
							dialog.container.slideUp(hideShowDuration);
						} else if(openEffect == "fadeIn") {
							dialog.container.fadeIn(hideShowDuration);
						} else if(openEffect == "fadeOut") {
							dialog.container.fadeOut(hideShowDuration);
						} else {
							dialog.container.show(hideShowDuration);
						}
					});
					dialog.data.show(hideShowDuration);
				},
				onClose:function(dialog) {
					dialog.data.fadeOut(hideShowDuration, function () {
						dialog.container.hide(hideShowDuration, function () {
							dialog.overlay.slideUp(overlayDuration, function () {
								$.modal.close();
							});
						});
					});
				}
			};
			
			// Affichage de la modale selon les paramètres prédéfinis
			$('.modal-pf-'+item).modal(options);
			return false;
		});
		
		// Animation des titres et "caption" sur les images
		if(thumbnailsEffect == true) {
			if(positionEffect == "top") {
				var jsonOptions1 = {top: 0};
				var jsonOptions2 = {top: "-"+heightEffect};
				var jsonImgOptions1 = {bottom: -25};
				var jsonImgOptions2 = {bottom: 0};
			} else if(positionEffect == "bottom") {
				var jsonOptions1 = {bottom: 0};
				var jsonOptions2 = {bottom: "-"+heightEffect};
				var jsonImgOptions1 = {top: -25};
				var jsonImgOptions2 = {top: 0};
			}

			// Si le CSS dynamique est activé (sinon non)
			if(activeDynamicCSS == true) {
				$('.modal-portfolio').hover(
					function () {
						$(this).find('.ref-label').stop().animate(jsonOptions1, openUpDuration, openUpEffect);
						$(this).find('img').stop().animate(jsonImgOptions1, 100, openUpEffect);				
					},
					function () {
						$(this).find('.ref-label').stop().animate(jsonOptions2, openDownDuration, openDownEffect);
						$(this).find('img').stop().animate(jsonImgOptions2, 100, openDownEffect);
					}
				);
			} else {
				$('.modal-portfolio').hover(
					function () {
						$(this).find('.ref-label').stop().animate({bottom: 0}, openUpDuration, openUpEffect);
						$(this).find('img').stop().animate({top: -25}, 100, openUpEffect);				
					},
					function () {
						$(this).find('.ref-label').stop().animate({bottom: -45}, openDownDuration, openDownEffect);
						$(this).find('img').stop().animate({top: 0}, 100, openDownEffect);
					}
				);				
			}
		} else {
			$('.modal-portfolio').find('.ref-label').css({bottom: 0});	
		}
    });
})(jQuery);