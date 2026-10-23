<?php
/**
 * 404 Error Page Template
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="section-dark error-404-container">
  <div class="container" style="max-width: 720px;">
    <div class="section-tag tag-accent"><?php esc_html_e( 'Error 404', 'emergescale' ); ?></div>
    
    <div class="error-404-code">404</div>

    <h1 style="color: var(--color-text-light); margin-bottom: 1rem;">
      <?php esc_html_e( 'Endpoint Not Found', 'emergescale' ); ?>
    </h1>

    <p style="color: var(--color-text-light-muted); font-size: 1.15rem; margin-bottom: 2.5rem;">
      <?php esc_html_e( 'The resource or page you requested cannot be located in the current system routing. It may have moved or been decommissioned.', 'emergescale' ); ?>
    </p>

    <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; flex-wrap: wrap;">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
        <?php echo emergescale_icon( 'arrow-right' ); ?>
        <span><?php esc_html_e( 'Return to Homepage', 'emergescale' ); ?></span>
      </a>

      <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="btn btn-dark btn-lg">
        <span><?php esc_html_e( 'Explore Services', 'emergescale' ); ?></span>
      </a>

      <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-secondary btn-lg">
        <span><?php esc_html_e( 'Contact Support', 'emergescale' ); ?></span>
      </a>
    </div>
  </div>
</div>

<?php
get_footer();
