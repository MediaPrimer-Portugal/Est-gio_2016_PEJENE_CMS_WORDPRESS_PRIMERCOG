<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title> <?php bloginfo('name') ?></title>

    <script src="https://code.jquery.com/jquery-1.4.1.min.js"></script>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>

</head>
<body>    


<div class="jumbotron">
  <div class="container text-center">
  </div>
</div>

<nav class="navbar navbar-default" class="nav nav-tabs" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#important-id-for-collapsing" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
    </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'menu',
                'theme_location'    => 'primary',
                'menu_class'        =>'nav navbar-default',
                'walker'            => new wp_bootstrap_navwalker()
            ));
        ?>

</nav>



<div class="container">