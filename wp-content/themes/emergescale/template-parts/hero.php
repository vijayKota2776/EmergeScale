<?php
/**
 * Template Part: Hero Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$whatsapp_num   = emergescale_get_opt( 'emergescale_whatsapp', '+1234567890' );
$clean_whatsapp = preg_replace( '/[^0-9]/', '', $whatsapp_num );
$cta_link       = emergescale_get_opt( 'emergescale_cta_link', '#contact' );
?>

<section class="hero-section" id="hero">
  <div class="hero-glow-bg" aria-hidden="true"></div>
  <div class="hero-grid-pattern" aria-hidden="true"></div>

  <div class="container hero-content">
    <div class="hero-badge">
      <span class="pulse-dot" aria-hidden="true"></span>
      <span><?php esc_html_e( 'Accepting Select Client Engagements — Q4 & Q1', 'emergescale' ); ?></span>
    </div>

    <h1 class="hero-title">
      Architecting Digital Experiences That Drive <span class="text-gradient">Exponential Growth</span>
    </h1>

    <p class="hero-subtitle">
      <?php esc_html_e( 'EmergeScale is an elite digital engineering studio. We partner with ambitious brands to build bespoke WordPress platforms, high-performance web applications, mobile products, and commanding brand identities.', 'emergescale' ); ?>
    </p>

    <div class="hero-cta-group">
      <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn-primary btn-lg">
        <span><?php esc_html_e( 'Schedule a Consultation', 'emergescale' ); ?></span>
        <?php echo emergescale_icon( 'arrow-right' ); ?>
      </a>

      <a href="#portfolio" class="btn btn-dark btn-lg">
        <span><?php esc_html_e( 'View Featured Work', 'emergescale' ); ?></span>
        <?php echo emergescale_icon( 'arrow-up-right' ); ?>
      </a>

      <a href="https://wa.me/<?php echo esc_attr( $clean_whatsapp ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
        <?php echo emergescale_icon( 'whatsapp' ); ?>
        <span><?php esc_html_e( 'WhatsApp Direct', 'emergescale' ); ?></span>
      </a>
    </div>

    <!-- Live Performance Metrics Card -->
    <div class="hero-stats-bar">
      <div class="stat-item">
        <div class="stat-number">140<span class="stat-accent">+</span></div>
        <div class="stat-label"><?php esc_html_e( 'Enterprise Projects Shipped', 'emergescale' ); ?></div>
      </div>

      <div class="stat-item">
        <div class="stat-number">$48<span class="stat-accent">M+</span></div>
        <div class="stat-label"><?php esc_html_e( 'Client Revenue Generated', 'emergescale' ); ?></div>
      </div>

      <div class="stat-item">
        <div class="stat-number">&lt;0.8<span class="stat-accent">s</span></div>
        <div class="stat-label"><?php esc_html_e( 'Average LCP Page Speed', 'emergescale' ); ?></div>
      </div>

      <div class="stat-item">
        <div class="stat-number">99.4<span class="stat-accent">%</span></div>
        <div class="stat-label"><?php esc_html_e( 'Client Satisfaction Rate', 'emergescale' ); ?></div>
      </div>
    </div>
  </div>
</section>
