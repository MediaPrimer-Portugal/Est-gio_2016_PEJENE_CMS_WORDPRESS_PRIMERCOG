<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php bloginfo('name') ?></title>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>

</head>
<body>    

<div class="page-header">
  <div class="row">
    <div class="col-xs-6">
        <img  id="logoheader" src="/wp-content/themes/wpbootstrap/img/primerCOG_logo.svg" alt="primercog" />
    </div>
    <div class="col-xs-6">
      <button type="button" class="btn_enter" class="btn btn-primart btn-lg">Entrar</button>

        <form class="form-inline pull-xs-right">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-lg" class="active">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utentes
          </button>
          <button type="button" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profissionais
          </button>
        </div>
        </form>
    </div>
       <!-- 
        <div class="input-group" id="search">
          <input type="text" class="form-control" placeholder="Procurar por...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Procurar</button>
          </span>
        </div> -->
  </div>

  </div>


<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                'primary' => __( 'Primary Menu', 'wpbootstrap' ),
                'theme_location'    => 'primary',
                'depth'             => 0,
                'menu_class'        =>'nav navbar-default',
                'container'         => 'false',
                'walker'            => new wp_bootstrap_navwalker()
            ));
        ?>
  </div> 
</nav>


<div class="container">