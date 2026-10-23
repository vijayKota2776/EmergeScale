<?php
/**
 * Template Part: Portfolio / Case Studies Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$case_studies = emergescale_get_case_studies();
?>

<section class="section" id="portfolio" style="background-color: var(--color-surface-muted);">
  <div class="container">
    <div class="section-header">
      <div class="section-tag tag-accent"><?php esc_html_e( 'Selected Case Studies', 'emergescale' ); ?></div>
      <h2><?php esc_html_e( 'Measurable Impact Delivered Through Technical Precision', 'emergescale' ); ?></h2>
      <p>
        <?php esc_html_e( 'Explore sample engagements showcasing our engineering standards, UI/UX aesthetics, and business-focused results.', 'emergescale' ); ?>
      </p>
    </div>

    <!-- Category Filters -->
    <div class="portfolio-filter-bar">
      <button type="button" class="filter-btn is-active" data-filter="all"><?php esc_html_e( 'All Projects', 'emergescale' ); ?></button>
      <button type="button" class="filter-btn" data-filter="web"><?php esc_html_e( 'Web Development', 'emergescale' ); ?></button>
      <button type="button" class="filter-btn" data-filter="mobile"><?php esc_html_e( 'Mobile Apps', 'emergescale' ); ?></button>
      <button type="button" class="filter-btn" data-filter="design"><?php esc_html_e( 'UI/UX & Branding', 'emergescale' ); ?></button>
      <button type="button" class="filter-btn" data-filter="seo"><?php esc_html_e( 'Technical SEO', 'emergescale' ); ?></button>
    </div>

    <!-- Portfolio Grid -->
    <div class="portfolio-grid">
      <?php foreach ( $case_studies as $project ) : ?>
        <article class="portfolio-card" data-category="<?php echo esc_attr( $project['filter'] ); ?>">
          <div class="portfolio-card-banner">
            <span class="portfolio-metric-badge"><?php echo esc_html( $project['impact'] ); ?></span>
          </div>

          <div class="portfolio-card-body">
            <div class="portfolio-meta">
              <span class="portfolio-category"><?php echo esc_html( $project['category'] ); ?></span>
              <span class="portfolio-year"><?php echo esc_html( $project['year'] ); ?></span>
            </div>

            <h3><?php echo esc_html( $project['title'] ); ?></h3>
            <p style="margin: 0.75rem 0 1.25rem; font-size: 0.95rem;"><?php echo esc_html( $project['summary'] ); ?></p>

            <div class="portfolio-tags">
              <?php foreach ( $project['tags'] as $tag ) : ?>
                <span class="portfolio-tag"><?php echo esc_html( $tag ); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div style="text-align: center; margin-top: 3.5rem;">
      <a href="#contact" class="btn btn-primary btn-lg">
        <span><?php esc_html_e( 'Build Your Custom Solution', 'emergescale' ); ?></span>
        <?php echo emergescale_icon( 'arrow-right' ); ?>
      </a>
      <div style="margin-top: 1rem;">
        <span class="demo-disclaimer-pill">
          <?php echo emergescale_icon( 'shield' ); ?>
          <?php esc_html_e( 'Illustrative Demonstration Case Studies for Client Presentation', 'emergescale' ); ?>
        </span>
      </div>
    </div>
  </div>
</section>
