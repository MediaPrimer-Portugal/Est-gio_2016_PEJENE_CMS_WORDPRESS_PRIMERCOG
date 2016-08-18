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


  <nav class="navbar navbar-default">
    <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only"><?php _e('Toggle navigation' , 'ultrabootstrap' ); ?></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="logo-tag">
                  
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( has_custom_logo()): the_custom_logo(); else: ?>
                    <h1 class="site-title" style="color:<?php echo "#". $header_text_color;?>"><?php echo bloginfo( 'name' ); ?></h1>
                    <h2 class="site-description" style="color:<?php echo "#". $header_text_color;?>"><?php bloginfo('description'); ?></h2><?php endif; ?></a>                     
                  
                </div>
            </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form  class="navbar-form navbar-right" role="search">
              <ul class="nav pull-right">
                <div class="main-search">
                  <button class="btn btn-search" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-search"></i>
                  </button>
                  <div class="search-box collapse" id="collapseExample">
                      <div class="well search-well">
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                      <input type="text" class="form-control" placeholder="Search a keyword" value="<?php echo get_search_query(); ?>" name="s">
                                    </form>
                      </div>
                  </div>
                </div>
              </ul>
            </form>
                
            <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 8,
                        'container'         => 'div',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
            </div> <!-- /.end of collaspe navbar-collaspe -->
  </div> <!-- /.end of container -->
  </nav>




<div class="container">