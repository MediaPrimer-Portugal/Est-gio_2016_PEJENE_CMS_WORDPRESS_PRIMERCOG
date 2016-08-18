<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Portfolio_Gallery_Install
{

    /**
     * Install Portfolio Gallery.
     */
    public static function install()
    {
        if (!defined('PORTFOLIO_GALLERY_INSTALLING')) {
            define('PORTFOLIO_GALLERY_INSTALLING', true);
        }
        self::create_tables();
        // Flush rules after install
        flush_rewrite_rules();
        // Trigger action
        do_action('portfolio_gallery_installed');
    }

    private static function create_tables()
    {
        global $wpdb;

/// creat database tables

        $sql_huge_itportfolio_images = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "huge_itportfolio_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `portfolio_id` varchar(200) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `sl_url` text DEFAULT NULL,
  `sl_type` text NOT NULL,
  `link_target` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  `published_in_sl_width` tinyint(4) unsigned DEFAULT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5";

        $sql_huge_itportfolio_portfolios = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "huge_itportfolio_portfolios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sl_height` int(11) unsigned DEFAULT NULL,
  `sl_width` int(11) unsigned DEFAULT NULL,
  `pause_on_hover` text,
  `portfolio_list_effects_s` text,
  `description` text,
  `param` text,
  `sl_position` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` text,
  `categories` text NOT NULL,
  `ht_show_sorting` text NOT NULL,
  `ht_show_filtering` text NOT NULL,
  `autoslide` varchar(5) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
)   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ";

        $table_name = $wpdb->prefix . "huge_itportfolio_images";
        $sql_2 = "
INSERT INTO 

`" . $table_name . "` (`id`, `name`, `portfolio_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `ordering`, `published`, `published_in_sl_width`) VALUES
(1, 'Cutthroat & Cavalier', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/1.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/1.2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 0, 1, NULL),
(2, 'Nespresso', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '" . "https://vimeo.com/76602135" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/9.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/9.2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'video', 'on', 1, 1, NULL),
(3, 'Nexus', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/3.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/3.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/3.2.jpg" . ":" . "https://www.youtube.com/watch?v=YMQdfGFK5XQ" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 2, 1, NULL),
(4, 'De7igner', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><h7>Dolor sit amet</h7><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/4.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/4.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/4.2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 3, 1, NULL),
(5, 'Autumn / Winter Collection', '1', '<h6>Lorem Ipsum</h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 4, 1, NULL),
(6, 'Retro Headphones', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/6.jpg" . ";" . "https://vimeo.com/80514062" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/6.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/6.2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 5, 1, NULL),
(7, 'Take Fight', '1', '<h6>Lorem Ipsum</h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident , sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/7.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/7.2.jpg" . ";" . "https://www.youtube.com/watch?v=SP3Dgr9S4pM" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/7.3.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 6, 1, NULL),
(8, 'The Optic', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/8.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/8.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/8.3.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 7, 1, NULL),
(9, 'Cone Music', '1', '<ul><li>lorem ipsumdolor sit amet</li><li>lorem ipsum dolor sit amet</li></ul><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/5.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/5.1.jpg" . ";" . Portfolio_Gallery()->plugin_url() . "/assets/images/Front_images/projects/5.2.jpg" . ";', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 8, 1, NULL)";


        $table_name = $wpdb->prefix . "huge_itportfolio_portfolios";


        $sql_3 = "

INSERT INTO `$table_name` (`id`, `name`, `sl_height`, `sl_width`, `pause_on_hover`, `portfolio_list_effects_s`, `description`, `param`, `sl_position`, `ordering`, `published`) VALUES
(1, 'My First Portfolio', 375, 600, 'on', '2', '4000', '1000', 'center', 1, '300')";


        $wpdb->query($sql_huge_itportfolio_images);
        $wpdb->query($sql_huge_itportfolio_portfolios);

        if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "huge_itportfolio_images")) {
            $wpdb->query($sql_2);
        }
        if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "huge_itportfolio_portfolios")) {
            $wpdb->query($sql_3);
        }

        global $wpdb;

        $imagesAllFieldsInArray = $wpdb->get_results("DESCRIBE " . $wpdb->prefix . "huge_itportfolio_images", ARRAY_A);
        $forUpdate = 0;
        foreach ($imagesAllFieldsInArray as $portfoliosField) {
            if ($portfoliosField['Field'] == 'category') {
                // "ka category field.<br>";
                $forUpdate = 1;
                $catValues = $wpdb->get_results("SELECT category FROM " . $wpdb->prefix . "huge_itportfolio_images");
                $needToUpdate = 0;
                foreach ($catValues as $catValue) {
                    if ($catValue->category !== '') {
                        $needToUpdate = 1;
                        //echo "category field - y datark chi.<br>";
                    }
                }
                if ($needToUpdate == 0) {
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,My Third Category,' WHERE id='1'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,' WHERE id='2'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Third Category,' WHERE id='3'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,My Second Category,' WHERE id='4'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,My Third Category,' WHERE id='5'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Third Category,' WHERE id='6'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,' WHERE id='7'");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,' WHERE id='8'");
                }

                break;
            }
        }
        if ($forUpdate == '0') {
            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_images ADD category text");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,My Third Category,' WHERE id='1'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,' WHERE id='2'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Third Category,' WHERE id='3'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,My Second Category,' WHERE id='4'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,My Third Category,' WHERE id='5'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Third Category,' WHERE id='6'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My Second Category,' WHERE id='7'");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_images SET category = 'My First Category,' WHERE id='8'");
        }

        $productPortfolio = $wpdb->get_results("DESCRIBE " . $wpdb->prefix . "huge_itportfolio_portfolios", ARRAY_A);
        $isUpdate = 0;
        foreach ($productPortfolio as $prodPortfolio) {
            if ($prodPortfolio['Field'] == 'categories' && $prodPortfolio['Type'] == 'text') {
                $isUpdate = 1;

                $allCats = $wpdb->get_results("SELECT categories FROM " . $wpdb->prefix . "huge_itportfolio_portfolios");
                $needToUpdateAllCats = 0;
                foreach ($allCats as $AllCatsVal) {
                    if ($AllCatsVal->categories !== '') {
                        $needToUpdateAllCats = 1;
                    }
                }
                if ($needToUpdateAllCats == 0) {
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET categories = 'My First Category,My Second Category,My Third Category,' ");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET ht_show_sorting = 'off' ");
                    $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET ht_show_filtering = 'off' ");
                }

                break;
            }
        }
        if ($isUpdate == '0') {
            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios ADD categories text");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET categories = 'My First Category,My Second Category,My Third Category,'");

            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios ADD ht_show_sorting text");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET ht_show_sorting = 'off'");

            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios ADD ht_show_filtering text");
            $wpdb->query("UPDATE " . $wpdb->prefix . "huge_itportfolio_portfolios SET ht_show_filtering = 'off'");
        }
        ////////////////////////////////////////////////////////////////////////
        $portfoliosAllFieldsInArray1 = $wpdb->get_results("DESCRIBE " . $wpdb->prefix . "huge_itportfolio_portfolios", ARRAY_A);
        $fornewUpdate1 = 0;
        foreach ($portfoliosAllFieldsInArray1 as $portfoliosField) {
            if ($portfoliosField['Field'] == 'show_loading') {
                $fornewUpdate1 = 1;
            }
        }
        if ($fornewUpdate1 != 1) {
            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios  ADD `show_loading` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  'on'");
            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios  ADD `loading_icon_type` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '1'");
        }

        $portfoliosAllFieldsInArray2 = $wpdb->get_results("DESCRIBE " . $wpdb->prefix . "huge_itportfolio_portfolios", ARRAY_A);
        $fornewUpdate2 = 0;
        foreach ($portfoliosAllFieldsInArray2 as $portfoliosField2) {
            if ($portfoliosField2['Field'] == 'autoslide') {
                $fornewUpdate2 = 1;
            }
        }
        if ($fornewUpdate2 != 1) {
            $wpdb->query("ALTER TABLE " . $wpdb->prefix . "huge_itportfolio_portfolios  ADD `autoslide` VARCHAR( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  'on'");
        }

        $table_name = $wpdb->prefix . "huge_itportfolio_images";
        $query = "SELECT id,image_url,portfolio_id FROM ".$table_name." WHERE portfolio_id=1";
        $images_url = $wpdb->get_results($query);
        foreach($images_url as $image_url){
            if(strpos($image_url->image_url,'portfolio-gallery/Front_images') > -1){
                $new_url = str_replace('portfolio-gallery/Front_images','portfolio-gallery/assets/images/Front_images',$image_url->image_url);
                $wpdb->query($wpdb->prepare("UPDATE ".$table_name." SET image_url= %s WHERE id=%d",$new_url,$image_url->id));
            }
        }
    }


}