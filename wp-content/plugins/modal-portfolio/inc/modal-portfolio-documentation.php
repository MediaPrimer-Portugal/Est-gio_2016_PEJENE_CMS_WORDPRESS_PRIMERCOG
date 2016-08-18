<?php
// Fonction d'affichage de la page d'aide et de réglages de l'extension
function modal_portfolio_documentation() {
?>
<div class="wrap modal-portfolio-admin">
	<h2><span class="icon"><span><?php _e('Readme', 'modal-portfolio'); ?></h2><br/>
	<div class="text">
	<?php _e('<strong>Modal portfolio</strong> is an image gallery plugin constituting a portfolio with filters and style effects.<br/>The extension uses a system shortcode <strong>[modal-portfolio]</strong> with options (described below).', 'modal-portfolio'); ?>
	<br/>
	<?php _e('The following documentation describes the installation and overall operation of the plugin.', 'modal-portfolio'); ?>
	<br/>
	<?php _e('<em>N.B.: contact <a href="http://blog.internet-formation.fr/" target="_blank">Mathieu Chartier</a>, the creator of the plugin, for more information.</em>', 'modal-portfolio'); ?>
	<br/>
	</div>
    <div class="block">
        <div class="col first-col">
           	<h4><?php _e('Plugin customization', 'modal-portfolio'); ?></h4>
        	<p class="tr"><?php _e('1. Set the general options', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Show blocks and manage desired effects', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Choose preferential blocks to display', 'modal-portfolio'); ?></li>
                    <li><?php _e('Optimize block display with customizable jQuery effects', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<h4><?php _e('Screenshots', 'modal-portfolio'); ?></h4>
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-1.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-1.png',__FILE__); ?>" alt="Capture Modal Portfolio 1"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
    <div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('2. Create portfolio categories', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Fast and simple installation !', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Create parent and child categories (if desired).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Be careful not to do too many offspring (categories and subcategories, no more ...).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Note: the plugin works well on both levels but may have some problems when there are several levels of subcategories if you do not check parent categories ...', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-2.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-2.png',__FILE__); ?>" alt="Capture Modal Portfolio 2"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
	<div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('3. Add the adapted shortcode [modal-portfolio]', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Several options', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Use the shortcode [modal-portfolio] to display all.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Use the shortcode [modal-portfolio categorie_parente="category_name"] or [modal-portfolio parent_cat="category_name"] to display only the references of the selected category.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Use the shortcode [modal-portfolio parents=1] to display the items of parent categories and the corresponding filters (hidden by default).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Pair the two options if necessary as in the attached capture.', 'modal-portfolio'); ?></li>
                </ol>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-3.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-3.png',__FILE__); ?>" alt="Capture Modal Portfolio 3"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
	<div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('4. Add the items', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Fast and simple installation :', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Add a title to your portfolio item.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Complete the description if you use the feature.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Add a title for the thumbnail overview (optional).', 'modal-portfolio'); ?></li>
                    <li><?php _e('Choose the post_thumbnail for the portfolio.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Add a video to display in the modal window (optional).', 'modal-portfolio'); ?></li>
                </ol>
				<p><?php _e('Note: the video replaces the post thumbnail in the modal window.', 'modal-portfolio'); ?></p>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-4.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-4.png',__FILE__); ?>" alt="Capture Modal Portfolio 4"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
	<div class="block">
        <div class="col first-col">
        	<p class="tr"><?php _e('5. Adapt the CSS', 'modal-portfolio'); ?></p>
            <div class="tr-info">
            	<p><?php _e('Method 1:', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Display the path to your own CSS in options.', 'modal-portfolio'); ?></li>
                    <li><?php _e('Create the corresponding stylesheet in your theme.', 'modal-portfolio'); ?></li>
                    <li><?php _e('NB: leave blank if you do not want to use a particular style sheet ...', 'modal-portfolio'); ?></li>
                </ol>
				<p><?php _e('Method 2:', 'modal-portfolio'); ?></p>
                <ol>
                    <li><?php _e('Personalize the plugin stylesheet in the style options.', 'modal-portfolio'); ?></li>
                </ol>
            	<p><?php _e('List of the CSS classes and IDs', 'modal-portfolio'); ?></p>
                <ul>
                    <li><strong>.modal-portfolio</strong> : <?php _e('Complete block for a reference', 'modal-portfolio'); ?></li>
                    <li><strong>.ref-label</strong> : <?php _e('block information of a thumbnail', 'modal-portfolio'); ?></li>
                    <li><strong>.ref-label-bg</strong> : <?php _e('thumbnail background (jQuery effect)', 'modal-portfolio'); ?></li>
                    <li><strong>.ref-label-text</strong> : <?php _e('thumbnail title', 'modal-portfolio'); ?></li>
                    <li><strong>.ref-text-category</strong> : <?php _e('thumbnail category', 'modal-portfolio'); ?></li>
                    <li><strong>#filters</strong> : <?php _e('block containing filters', 'modal-portfolio'); ?></li>
                    <li><strong>.button</strong> : <?php _e('filter bouton', 'modal-portfolio'); ?></li>
                    <li><strong>.is-checked</strong> : <?php _e('current filter button', 'modal-portfolio'); ?></li>
                    <li><strong>.isotope</strong> : <?php _e('block containing all references and modal', 'modal-portfolio'); ?></li>
                    <li><strong>.element-item</strong> : <?php _e('thumbnail block (with title and category)', 'modal-portfolio'); ?></li>
                    <li><strong>.hidden-modal</strong> : <?php _e('class of default hidden modal', 'modal-portfolio'); ?></li>
                    <li><strong>#simplemodal-container</strong> : <?php _e('complete block of the modal (with closing cross, etc.)', 'modal-portfolio'); ?></li>
                    <li><strong>.simplemodal-overlay</strong> : <?php _e('background class (overlay)', 'modal-portfolio'); ?></li>
                    <li><strong>.simplemodal-wrap</strong> : <?php _e('modal block (content)', 'modal-portfolio'); ?></li>
                    <li><strong>.simplemodal-data</strong> : <?php _e('block in .simple-modal-wrap', 'modal-portfolio'); ?></li>
                    <li><strong>.portfolio-video</strong> : <?php _e('block containing the video', 'modal-portfolio'); ?></li>
                    <li><strong>.modalCloseImg</strong> : <?php _e('CSS class of the modal closing cross', 'modal-portfolio'); ?></li>
                    <li><strong>.modal-bloc</strong> : <?php _e('block that contains the information from the modal window', 'modal-portfolio'); ?></li>
                    <li><strong>.modal-img</strong> : <?php _e('class of the image displayed in the modal window', 'modal-portfolio'); ?></li>
                    <li><strong>.modal-content</strong> : <?php _e('class of content displayed in the modal', 'modal-portfolio'); ?></li>
                    <li><strong>.modal-close</strong> : <?php _e('class of the block containing the "Close" button', 'modal-portfolio'); ?></li>
                </ul>
            </div>
        </div>
        <div class="col">
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-6.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-6.png',__FILE__); ?>" alt="Capture Modal Portfolio 6"/></a></p>
        	<p class="tr"><a href="<?php echo plugins_url('../screenshot-10.png',__FILE__); ?>" target="_blank"><img src="<?php echo plugins_url('../screenshot-10.png',__FILE__); ?>" alt="Capture Modal Portfolio 10"/></a></p>
        </div>
		<div class="clear"></div>
    </div>
</div>
<?php
} // Fin de la fonction Callback
?>