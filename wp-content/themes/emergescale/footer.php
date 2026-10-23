<?php
/**
 * Footer Template for EmergeScale Theme
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$contact_email = emergescale_get_opt( 'emergescale_email', 'hello@emergescale.com' );
$whatsapp_num  = emergescale_get_opt( 'emergescale_whatsapp', '+1234567890' );
$clean_whatsapp = preg_replace( '/[^0-9]/', '', $whatsapp_num );
$location      = emergescale_get_opt( 'emergescale_location', 'San Francisco & Remote Worldwide' );
?>

</main><!-- #primary-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
          <span>Emerge<span class="accent-text">Scale</span></span>
          <span class="logo-dot" aria-hidden="true"></span>
        </a>
        <p>
          <?php esc_html_e( 'Architecting high-performance digital experiences that drive market authority, user retention, and enterprise growth.', 'emergescale' ); ?>
        </p>

        <div class="footer-status-pill">
          <span class="footer-status-dot"></span>
          <span><?php esc_html_e( 'Status: Available for Q4/Q1 Projects', 'emergescale' ); ?></span>
        </div>
      </div>

      <div class="footer-col">
        <h3 class="footer-heading"><?php esc_html_e( 'Capabilities', 'emergescale' ); ?></h3>
        <ul class="footer-nav-list">
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Web Development', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Mobile App Engineering', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'SEO & Organic Growth', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'UI/UX Design Systems', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Brand Identity & Strategy', 'emergescale' ); ?></a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3 class="footer-heading"><?php esc_html_e( 'Navigation', 'emergescale' ); ?></h3>
        <ul class="footer-nav-list">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'About Studio', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>"><?php esc_html_e( 'Featured Case Studies', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>"><?php esc_html_e( 'Client Feedback', 'emergescale' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Inquiry & Consultation', 'emergescale' ); ?></a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3 class="footer-heading"><?php esc_html_e( 'Direct Connect', 'emergescale' ); ?></h3>
        <div style="display: flex; flex-direction: column; gap: 0.85rem;">
          <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-text-light);">
            <?php echo emergescale_icon( 'mail' ); ?>
            <span><?php echo esc_html( $contact_email ); ?></span>
          </a>

          <a href="https://wa.me/<?php echo esc_attr( $clean_whatsapp ); ?>" target="_blank" rel="noopener noreferrer" style="display: flex; align-items: center; gap: 0.5rem; color: #25D366; font-weight: 600;">
            <?php echo emergescale_icon( 'whatsapp' ); ?>
            <span><?php esc_html_e( 'Instant WhatsApp Chat', 'emergescale' ); ?></span>
          </a>

          <p style="font-size: 0.875rem; margin-top: 0.5rem;">
            <strong><?php esc_html_e( 'Location:', 'emergescale' ); ?></strong><br>
            <?php echo esc_html( $location ); ?>
          </p>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div>
        <p style="font-size: 0.875rem; color: var(--color-text-light-muted);">
          &copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong>EmergeScale</strong>. <?php esc_html_e( 'All rights reserved. Design with purpose. Build for growth.', 'emergescale' ); ?>
        </p>
      </div>
      <div>
        <span class="demo-disclaimer-pill" style="margin-top: 0;">
          <?php echo emergescale_icon( 'shield' ); ?>
          <?php esc_html_e( 'Demonstration Portfolio & Client Concept Website', 'emergescale' ); ?>
        </span>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
