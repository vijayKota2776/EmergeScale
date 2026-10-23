<?php
/**
 * Template Name: Our Work & Portfolio Page
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="page-hero">
  <div class="container">
    <div class="section-tag tag-accent"><?php esc_html_e( 'Portfolio & Case Studies', 'emergescale' ); ?></div>
    <h1><?php esc_html_e( 'Demonstrated Impact Across High-Stakes Platforms', 'emergescale' ); ?></h1>
    <p class="hero-subtitle text-light-muted">
      <?php esc_html_e( 'Discover how our tailored WordPress engineering, mobile applications, and design systems deliver measurable ROI for growing enterprises.', 'emergescale' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/portfolio' ); ?>
<?php get_template_part( 'template-parts/testimonials' ); ?>
<?php get_template_part( 'template-parts/contact-cta' ); ?>

<?php
get_footer();
