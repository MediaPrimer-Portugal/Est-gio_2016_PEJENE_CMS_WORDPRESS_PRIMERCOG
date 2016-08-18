jQuery(document).ready(function($){
    // Variable de la librairie des médias
    var portfolio_video_frame;
 
    // On lance la fonction au clic sur le bouton
    $('#portfolio_video_button').click(function(e){
        // Sécurité
        e.preventDefault();
 
        // On réouvre la frame si elle existe déjà...
        if(portfolio_video_frame) {
            portfolio_video_frame.open();
            return;
        }
 
        // Personnalisation de la librairie des médias (plein d'options possibles)
        portfolio_video_frame = wp.media.frames.portfolio_video_frame = wp.media({
            title: portfolio_video.title,
            button: {text: portfolio_video.button},
            library: {type: 'video'},
			multiple: false
        });
 
        // Permet de sélectionner les médias
        portfolio_video_frame.on('select', function(){
            // Récupère l'attachment et passe l'information en JSON
            var media_attachment = portfolio_video_frame.state().get('selection').first().toJSON();
 
            // Ajoute l'URL du média dans l'input destiné à cet effet (optionnel en réalité)
            $('#portfolio_video').val(media_attachment.url);
        });
 
        // Ouvre la fenêtre des médias si ce n'est toujours pas le cas.
        portfolio_video_frame.open();
    });
});