<?php
/**
 * Template Part: About Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */
?>

<section class="section section-dark" id="about">
  <div class="container">
    <div class="about-layout">
      <div>
        <div class="section-tag tag-accent"><?php esc_html_e( 'The Studio Ethos', 'emergescale' ); ?></div>
        <h2><?php esc_html_e( 'Where Engineering Rigor Meets Creative Distinction', 'emergescale' ); ?></h2>
        <p>
          <?php esc_html_e( 'At EmergeScale, we believe that modern digital presence cannot rely on bloated off-the-shelf templates. We engineer bespoke WordPress solutions and digital applications designed to perform under high traffic, convert visitors into qualified buyers, and grow seamlessly alongside your enterprise.', 'emergescale' ); ?>
        </p>

        <div class="about-features-list">
          <div class="about-feature-item">
            <div class="about-feature-icon">
              <?php echo emergescale_icon( 'zap' ); ?>
            </div>
            <div>
              <h4><?php esc_html_e( 'Performance-First Engineering', 'emergescale' ); ?></h4>
              <p><?php esc_html_e( 'Sub-second page speeds, minimal asset weight, and strict adherence to Google Core Web Vitals best practices.', 'emergescale' ); ?></p>
            </div>
          </div>

          <div class="about-feature-item">
            <div class="about-feature-icon">
              <?php echo emergescale_icon( 'layout' ); ?>
            </div>
            <div>
              <h4><?php esc_html_e( 'Bespoke UI/UX Design Systems', 'emergescale' ); ?></h4>
              <p><?php esc_html_e( 'Every layout, interaction, and component is tailored to your brand identity, eliminating generic aesthetic fatigue.', 'emergescale' ); ?></p>
            </div>
          </div>

          <div class="about-feature-item">
            <div class="about-feature-icon">
              <?php echo emergescale_icon( 'trending-up' ); ?>
            </div>
            <div>
              <h4><?php esc_html_e( 'Organic Search Dominance', 'emergescale' ); ?></h4>
              <p><?php esc_html_e( 'Semantic HTML5 structure, automated schema markup, and crawl-optimized URL architecture that search engines reward.', 'emergescale' ); ?></p>
            </div>
          </div>

          <div class="about-feature-item">
            <div class="about-feature-icon">
              <?php echo emergescale_icon( 'shield' ); ?>
            </div>
            <div>
              <h4><?php esc_html_e( 'Content Management Independence', 'emergescale' ); ?></h4>
              <p><?php esc_html_e( 'Full WordPress dashboard manageability so your marketing team can update copy, media, and articles without developer dependency.', 'emergescale' ); ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Visual Card -->
      <div class="about-visual-card">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
          <div style="font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: var(--color-text-light);">
            <?php esc_html_e( 'The EmergeScale Standard', 'emergescale' ); ?>
          </div>
          <span style="background: rgba(183, 243, 74, 0.15); color: var(--color-accent); font-size: 0.75rem; font-weight: 700; padding: 0.3rem 0.75rem; border-radius: var(--radius-full);">
            <?php esc_html_e( 'V1.0 Certified', 'emergescale' ); ?>
          </span>
        </div>

        <p style="font-size: 0.95rem; margin-bottom: 2rem;">
          <?php esc_html_e( 'We build clean, maintainable PHP code following WordPress VIP coding standards, robust input sanitization, and scalable database queries.', 'emergescale' ); ?>
        </p>

        <ul style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem;">
          <li style="display: flex; align-items: center; gap: 0.6rem; color: var(--color-text-light); font-size: 0.9rem;">
            <span style="color: var(--color-accent);"><?php echo emergescale_icon( 'check' ); ?></span>
            <span><?php esc_html_e( 'Zero Bloat: No slow commercial builder plugins', 'emergescale' ); ?></span>
          </li>
          <li style="display: flex; align-items: center; gap: 0.6rem; color: var(--color-text-light); font-size: 0.9rem;">
            <span style="color: var(--color-accent);"><?php echo emergescale_icon( 'check' ); ?></span>
            <span><?php esc_html_e( '100% Mobile Responsive across all viewports', 'emergescale' ); ?></span>
          </li>
          <li style="display: flex; align-items: center; gap: 0.6rem; color: var(--color-text-light); font-size: 0.9rem;">
            <span style="color: var(--color-accent);"><?php echo emergescale_icon( 'check' ); ?></span>
            <span><?php esc_html_e( 'Native WordPress REST API & AJAX handlers', 'emergescale' ); ?></span>
          </li>
          <li style="display: flex; align-items: center; gap: 0.6rem; color: var(--color-text-light); font-size: 0.9rem;">
            <span style="color: var(--color-accent);"><?php echo emergescale_icon( 'check' ); ?></span>
            <span><?php esc_html_e( 'Modern PHP 8+ and security nonce protection', 'emergescale' ); ?></span>
          </li>
        </ul>

        <div class="about-stat-row">
          <div>
            <div style="font-family: var(--font-heading); font-size: 2rem; font-weight: 800; color: var(--color-accent);">
              100/100
            </div>
            <div style="font-size: 0.8125rem; color: var(--color-text-light-muted); margin-top: 0.25rem;">
              <?php esc_html_e( 'Target PageSpeed Score', 'emergescale' ); ?>
            </div>
          </div>
          <div>
            <div style="font-family: var(--font-heading); font-size: 2rem; font-weight: 800; color: var(--color-text-light);">
              &lt;24h
            </div>
            <div style="font-size: 0.8125rem; color: var(--color-text-light-muted); margin-top: 0.25rem;">
              <?php esc_html_e( 'Consultation Turnaround', 'emergescale' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
