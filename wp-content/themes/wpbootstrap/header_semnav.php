<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php bloginfo('name') ?></title>
    
    <?php wp_enqueue_script("jquery"); ?>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>

</head>
<body>    

<div class="page-header">
  <div class="row">
                <div class="span3">
                      <button type="button" class="btn btn-primary">
                        <span class="icon-user"  aria-hidden="true"></span>Profissionais
                      </button>              
                    <p>
                        <img id="img_logo" href="http://localhost/primercog_wp/" src="http://localhost/primercog_wp/wp-content/themes/wpbootstrap/img/primerCOG_logo.svg" alt="primercog" >
                    </p>   
                </div>
                <div class="span6 hidden-phone">
                    <p class ="titles_header"> Envelhecimento Saudável
                    </p>
                    <p class="sub_titles_header"> Plataforma para a estimulação, manutenção, monitorização e reabilitação cognitiva
                    </p>
                </div>
                <div class="span3">
                  <button type="button" class="btn_enter" class="btn btn-primart btn-lg">
                   <span aria-hidden="true"></span>Entrar</button>
                </div>

  </div>
</div>
<nav class="navbar navbar-default navbar-full bg-faded" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> <a class="navbar-brand" href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?> </a> </div>

      <?php
      wp_nav_menu( array(
            'menu' => 'menu',
            'theme_location' => 'primary',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'exCollapsingNavbar',
            'items_wrap' => my_nav_wrap(),
            'container_id' => 'exCollapsingNavbar',
            'menu_class' => 'nav navbar-default',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker())
      );
      ?>
 </div>
</nav>

<div class="container">