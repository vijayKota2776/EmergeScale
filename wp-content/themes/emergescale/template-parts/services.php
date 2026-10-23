<?php
/**
 * Template Part: Services Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$services = emergescale_get_services();
?>

<section class="section" id="services">
  <div class="container">
    <div class="section-header">
      <div class="section-tag tag-accent"><?php esc_html_e( 'Core Capabilities', 'emergescale' ); ?></div>
      <h2><?php esc_html_e( 'Comprehensive Digital Solutions Built To Scale', 'emergescale' ); ?></h2>
      <p>
        <?php esc_html_e( 'We combine technical rigor with creative distinction across five core disciplines to deliver measurable competitive advantage.', 'emergescale' ); ?>
      </p>
    </div>

    <div class="services-grid">
      <?php foreach ( $services as $service ) : ?>
        <div class="service-card" id="<?php echo esc_attr( $service['id'] ); ?>">
          <div class="service-card-top">
            <div class="service-icon-box">
              <?php echo emergescale_icon( $service['icon'] ); ?>
            </div>
            <span class="service-highlight-pill"><?php echo esc_html( $service['highlight'] ); ?></span>
          </div>

          <h3><?php echo esc_html( $service['title'] ); ?></h3>
          <p><?php echo esc_html( $service['description'] ); ?></p>

          <div class="service-checklist">
            <?php foreach ( $service['deliverables'] as $item ) : ?>
              <div class="checklist-item">
                <?php echo emergescale_icon( 'check' ); ?>
                <span><?php echo esc_html( $item ); ?></span>
              </div>
            <?php endforeach; ?>
          </div>

          <a href="#contact" class="btn btn-secondary btn-sm" style="margin-top: auto;">
            <span><?php esc_html_e( 'Inquire About Service', 'emergescale' ); ?></span>
            <?php echo emergescale_icon( 'arrow-right' ); ?>
          </a>
        </div>
      <?php endforeach; ?>

      <!-- 6th card: Custom Enterprise Engagements -->
      <div class="service-card" style="background: var(--color-dark-bg); color: var(--color-text-light); border-color: var(--color-dark-border);">
        <div class="service-card-top">
          <div class="service-icon-box" style="background-color: var(--color-accent); color: var(--color-primary);">
            <?php echo emergescale_icon( 'zap' ); ?>
          </div>
          <span class="service-highlight-pill" style="background: rgba(183,243,74,0.15); color: var(--color-accent);">
            <?php esc_html_e( 'Tailored', 'emergescale' ); ?>
          </span>
        </div>

        <h3 style="color: var(--color-text-light);"><?php esc_html_e( 'Custom Enterprise Solutions', 'emergescale' ); ?></h3>
        <p style="color: var(--color-text-light-muted);">
          <?php esc_html_e( 'Have complex technical architecture, legacy WordPress modernization, multi-tenant databases, or custom CRM integrations? We build tailored full-stack solutions.', 'emergescale' ); ?>
        </p>

        <div class="service-checklist" style="border-top-color: var(--color-dark-border);">
          <div class="checklist-item" style="color: var(--color-text-light);">
            <?php echo emergescale_icon( 'check' ); ?>
            <span><?php esc_html_e( 'Legacy WordPress Refactoring', 'emergescale' ); ?></span>
          </div>
          <div class="checklist-item" style="color: var(--color-text-light);">
            <?php echo emergescale_icon( 'check' ); ?>
            <span><?php esc_html_e( 'Multi-Cloud & API Orchestration', 'emergescale' ); ?></span>
          </div>
          <div class="checklist-item" style="color: var(--color-text-light);">
            <?php echo emergescale_icon( 'check' ); ?>
            <span><?php esc_html_e( 'High-Concurrency Caching & Security', 'emergescale' ); ?></span>
          </div>
        </div>

        <a href="#contact" class="btn btn-primary btn-sm" style="margin-top: auto;">
          <span><?php esc_html_e( 'Discuss Custom Scope', 'emergescale' ); ?></span>
          <?php echo emergescale_icon( 'arrow-right' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>
