<?php
/**
 * Template Name: Services Breakdown Page
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="page-hero">
  <div class="container">
    <div class="section-tag tag-accent"><?php esc_html_e( 'Our Capabilities', 'emergescale' ); ?></div>
    <h1><?php esc_html_e( 'End-to-End Digital Engineering & Design', 'emergescale' ); ?></h1>
    <p class="hero-subtitle text-light-muted">
      <?php esc_html_e( 'From custom WordPress architectures to scalable mobile products, we deliver solutions engineered to solve complex operational challenges and dominate markets.', 'emergescale' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/services' ); ?>
<?php get_template_part( 'template-parts/portfolio' ); ?>
<?php get_template_part( 'template-parts/contact-cta' ); ?>

<?php
get_footer();
