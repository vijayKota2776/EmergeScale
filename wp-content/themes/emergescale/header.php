<?php
/**
 * Header Template for EmergeScale Theme
 *
 * @package EmergeScale
 * @version 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#primary-content" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
  <?php esc_html_e( 'Skip to content', 'emergescale' ); ?>
</a>

<header id="masthead" class="site-header" role="banner">
  <div class="container header-container">
    <div class="header-branding">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
          <span>Emerge<span class="accent-text">Scale</span></span>
          <span class="logo-dot" aria-hidden="true"></span>
        </a>
      <?php endif; ?>
    </div>

    <nav id="site-navigation" class="primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'emergescale' ); ?>">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'nav-links',
          'container'      => false,
          'depth'          => 2,
          'fallback_cb'    => false,
        ) );
      } else {
        // High quality fallback menu
        ?>
        <ul class="nav-links">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link is-active"><?php esc_html_e( 'Home', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="nav-link"><?php esc_html_e( 'Services', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>" class="nav-link"><?php esc_html_e( 'Our Work', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="nav-link"><?php esc_html_e( 'About', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>" class="nav-link"><?php esc_html_e( 'Reviews', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="nav-link"><?php esc_html_e( 'Contact', 'emergescale' ); ?></a></li>
        </ul>
        <?php
      }
      ?>
    </nav>

    <div class="header-actions">
      <?php 
        $cta_link = emergescale_get_opt( 'emergescale_cta_link', home_url( '/#contact' ) );
      ?>
      <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-primary btn-sm">
        <span><?php esc_html_e( 'Start a Project', 'emergescale' ); ?></span>
        <?php echo emergescale_icon( 'arrow-right' ); ?>
      </a>

      <button type="button" class="mobile-toggle" aria-controls="mobile-drawer" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'emergescale' ); ?>">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="mobile-drawer" class="mobile-drawer" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile Navigation Menu', 'emergescale' ); ?>">
  <div class="mobile-nav-links">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'Home', 'emergescale' ); ?></a>
    <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'Services', 'emergescale' ); ?></a>
    <a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'Our Work', 'emergescale' ); ?></a>
    <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'About Studio', 'emergescale' ); ?></a>
    <a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'Client Reviews', 'emergescale' ); ?></a>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="mobile-nav-link"><?php esc_html_e( 'Contact Us', 'emergescale' ); ?></a>
  </div>

  <div style="margin-top: 2rem; display: flex; flex-direction: column; gap: 1rem;">
    <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-primary btn-lg" style="width: 100%;">
      <span><?php esc_html_e( 'Book Consultation', 'emergescale' ); ?></span>
      <?php echo emergescale_icon( 'arrow-right' ); ?>
    </a>
    <?php 
      $whatsapp = emergescale_get_opt( 'emergescale_whatsapp', '+1234567890' );
      $clean_whatsapp = preg_replace( '/[^0-9]/', '', $whatsapp );
    ?>
    <a href="https://wa.me/<?php echo esc_attr( $clean_whatsapp ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp" style="width: 100%;">
      <?php echo emergescale_icon( 'whatsapp' ); ?>
      <span><?php esc_html_e( 'Chat on WhatsApp', 'emergescale' ); ?></span>
    </a>
  </div>
</div>

<main id="primary-content" role="main">
