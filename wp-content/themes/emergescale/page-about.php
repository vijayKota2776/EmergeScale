<?php
/**
 * Template Name: About Studio Page
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="page-hero">
  <div class="container">
    <div class="section-tag tag-accent"><?php esc_html_e( 'About EmergeScale', 'emergescale' ); ?></div>
    <h1><?php esc_html_e( 'Engineering Digital Authority & High-Growth Platforms', 'emergescale' ); ?></h1>
    <p class="hero-subtitle text-light-muted">
      <?php esc_html_e( 'We are a technology and design studio specializing in bespoke WordPress architectures, robust web apps, mobile solutions, and strategic brand ecosystems.', 'emergescale' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/about' ); ?>

<section class="section" style="background-color: var(--color-surface);">
  <div class="container">
    <div class="section-header">
      <div class="section-tag tag-accent"><?php esc_html_e( 'Our Core Methodology', 'emergescale' ); ?></div>
      <h2><?php esc_html_e( 'How We Partner With Clients', 'emergescale' ); ?></h2>
    </div>

    <div class="services-grid">
      <div class="service-card">
        <div class="service-card-top">
          <div class="service-icon-box">01</div>
          <span class="service-highlight-pill"><?php esc_html_e( 'Discovery', 'emergescale' ); ?></span>
        </div>
        <h3><?php esc_html_e( 'Technical Architecture & Scoping', 'emergescale' ); ?></h3>
        <p><?php esc_html_e( 'We analyze your current digital footprint, user journeys, performance bottlenecks, and business objectives to establish an ironclad roadmap.', 'emergescale' ); ?></p>
      </div>

      <div class="service-card">
        <div class="service-card-top">
          <div class="service-icon-box">02</div>
          <span class="service-highlight-pill"><?php esc_html_e( 'Execution', 'emergescale' ); ?></span>
        </div>
        <h3><?php esc_html_e( 'High-Fidelity UI/UX & Clean PHP', 'emergescale' ); ?></h3>
        <p><?php esc_html_e( 'We craft bespoke design systems in Figma and translate them into modular, optimized PHP and CSS without relying on heavy page-builder plugins.', 'emergescale' ); ?></p>
      </div>

      <div class="service-card">
        <div class="service-card-top">
          <div class="service-icon-box">03</div>
          <span class="service-highlight-pill"><?php esc_html_e( 'Deployment', 'emergescale' ); ?></span>
        </div>
        <h3><?php esc_html_e( 'Performance Audit & Knowledge Transfer', 'emergescale' ); ?></h3>
        <p><?php esc_html_e( 'We run automated Core Web Vitals checks, verify security headers, configure SEO metadata, and empower your team with intuitive dashboard management.', 'emergescale' ); ?></p>
      </div>
    </div>
  </div>
</section>

<?php get_template_part( 'template-parts/testimonials' ); ?>
<?php get_template_part( 'template-parts/contact-cta' ); ?>

<?php
get_footer();
