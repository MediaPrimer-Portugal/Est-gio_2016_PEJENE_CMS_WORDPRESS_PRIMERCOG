<!doctype html>  

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>
	
<body <?php body_class(); ?>>

	<div id="content-wrapper">
		<header>		
			<div class="page-header">
			  <div class="row">
			                <div class="col-xs-12 col-sm-3">
			                      <button type="button" class="btn btn-primary">
			                        <span class="icon-user"  href="http://localhost/primercog_wp/"  aria-hidden="true"></span>Profissionais
			                      </button>              
			                    <p>
			                        <img id="img_logo" href="http://localhost/primercog_wp/" src="http://localhost/primercog_wp/wp-content/themes/wpbootstrap/img/primerCOG_logo.svg" alt="primercog" >
			                    </p>   
			                </div>
			                <div class="col-xs-12 col-sm-6">
			                    <p class ="titles_header"> Envelhecimento Saudável
			                    </p>
			                    <p class="sub_titles_header"> Plataforma para a estimulação, manutenção, monitorização e reabilitação cognitiva
			                    </p>
			                </div>
			                <div class="col-xs-12 col-sm-3 ">
			                  <button type="button" class="btn_enter" class="btn btn-primart btn-lg">
			                   <span aria-hidden="true"></span>Entrar</button>
			                </div>
			  </div>
			</div>

			<nav class="navbar navbar-default navabar-inverse navbar-static-top">
				<div class="container">
		  
					<div class="navbar-header">
						<?php if (has_nav_menu("main_nav")): ?>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-responsive-collapse">
		    				<span class="sr-only"><?php _e('Navigation', 'simple-bootstrap'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php endif ?>
					</div>

					<?php if (has_nav_menu("main_nav")): ?>
					<div id="navbar-responsive-collapse" class="collapse navbar-collapse">
						<?php
						    simple_bootstrap_display_main_menu();
						?>

					</div>
					<?php endif ?>

				</div>
			</nav>
	</header>
		
		<div id="page-content">
			<div class="container">
