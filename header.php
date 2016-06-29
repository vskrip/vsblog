<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="top-header container-fluid clearfix">
      <div class="top-header-inner container">
          <div class="row">
              <div class="col-md-4">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
                  <?php
                  if( has_custom_logo() )
                  {
                      the_custom_logo();
                  }
                  else
                  {
                      echo esc_attr( get_bloginfo( 'name' ) );
                      echo "<br />";
                      echo esc_attr( get_bloginfo( 'description' ) );
                  }
                  ?>
                  </a>
              </div>
              
              <div class="col-md-8">
                  <?php
                  if ( is_active_sidebar( 'sidebar_header' ) )
                  {
                      dynamic_sidebar( 'sidebar_header' );
                  }
                  ?>
              </div>
  
          </div>
      </div>
  </div>
  
  <?php if ( has_nav_menu( 'primary' ) ) : ?>
  <div class="container">
    <nav id="navbar" class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php esc_attr_e( 'Toggle navigation', 'vsblog' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'primary',
                    'depth'             =>  2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'vsblog_bootstrap_navwalker::vsblog_fallback',
                    'walker'            => new vsblog_bootstrap_navwalker()
                ));
            ?>
        </div>
    </nav>
  </div>
  <?php endif; ?>
  
  <?php if ( get_header_image() && is_front_page()) : ?>
  <div class="container-fluid front-header">
      <div class="container">
          <div class="row">
              <div class="col-md-12 align-center">
                  <img class="img-responsive" 
                       src="<?php esc_url( header_image() ); ?>" 
                       height="<?php echo get_custom_header()->height; ?>" 
                       width="<?php echo get_custom_header()->width; ?>" 
                       alt="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" 
                  />
              </div>
          </div>
      </div>
  </div>
  <?php endif; ?>
  
  
  <div class="content container-fluid clearfix">
      <div class="content-inner container">
          <div class="row">