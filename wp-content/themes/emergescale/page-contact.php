<?php
/**
 * Template Name: Contact & Inquiry Page
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="page-hero">
  <div class="container">
    <div class="section-tag tag-accent"><?php esc_html_e( 'Direct Consultation', 'emergescale' ); ?></div>
    <h1><?php esc_html_e( 'Let\'s Discuss Your Next Strategic Digital Milestone', 'emergescale' ); ?></h1>
    <p class="hero-subtitle text-light-muted">
      <?php esc_html_e( 'Reach out directly via our consultation form, connect on WhatsApp for an instant response, or book a discovery session with our senior engineers.', 'emergescale' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/contact-cta' ); ?>

<!-- Frequently Asked Questions -->
<section class="section" style="background-color: var(--color-surface);">
  <div class="container" style="max-width: 860px;">
    <div class="section-header">
      <div class="section-tag tag-accent"><?php esc_html_e( 'Engagement FAQ', 'emergescale' ); ?></div>
      <h2><?php esc_html_e( 'Frequently Asked Questions', 'emergescale' ); ?></h2>
      <p><?php esc_html_e( 'Everything you need to know about working with EmergeScale.', 'emergescale' ); ?></p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
      <details style="background: var(--color-surface-muted); border-radius: var(--radius-md); padding: 1.5rem; cursor: pointer;">
        <summary style="font-family: var(--font-heading); font-weight: 700; font-size: 1.1rem; color: var(--color-primary);">
          <?php esc_html_e( 'What is your typical project timeline?', 'emergescale' ); ?>
        </summary>
        <p style="margin-top: 1rem; font-size: 0.95rem;">
          <?php esc_html_e( 'Most custom WordPress theme and web projects are delivered in 4 to 8 weeks, depending on scope, custom integrations, and content readiness. Mobile apps and large-scale platforms typically span 8 to 16 weeks.', 'emergescale' ); ?>
        </p>
      </details>

      <details style="background: var(--color-surface-muted); border-radius: var(--radius-md); padding: 1.5rem; cursor: pointer;">
        <summary style="font-family: var(--font-heading); font-weight: 700; font-size: 1.1rem; color: var(--color-primary);">
          <?php esc_html_e( 'Can you improve or customize an existing WordPress website?', 'emergescale' ); ?>
        </summary>
        <p style="margin-top: 1rem; font-size: 0.95rem;">
          <?php esc_html_e( 'Yes. A substantial part of our practice involves refactoring, optimizing, and modernizing existing WordPress sites that suffer from slow load times, outdated plugins, or poor mobile responsiveness.', 'emergescale' ); ?>
        </p>
      </details>

      <details style="background: var(--color-surface-muted); border-radius: var(--radius-md); padding: 1.5rem; cursor: pointer;">
        <summary style="font-family: var(--font-heading); font-weight: 700; font-size: 1.1rem; color: var(--color-primary);">
          <?php esc_html_e( 'Will my team be able to update content without code?', 'emergescale' ); ?>
        </summary>
        <p style="margin-top: 1rem; font-size: 0.95rem;">
          <?php esc_html_e( 'Absolutely. We architect our themes so that headers, footers, copy, images, case studies, and blog posts are completely manageable via the intuitive WordPress dashboard without touching a line of PHP.', 'emergescale' ); ?>
        </p>
      </details>

      <details style="background: var(--color-surface-muted); border-radius: var(--radius-md); padding: 1.5rem; cursor: pointer;">
        <summary style="font-family: var(--font-heading); font-weight: 700; font-size: 1.1rem; color: var(--color-primary);">
          <?php esc_html_e( 'How do you handle security and performance optimization?', 'emergescale' ); ?>
        </summary>
        <p style="margin-top: 1rem; font-size: 0.95rem;">
          <?php esc_html_e( 'Every theme adheres strictly to WordPress security guidelines (sanitization, output escaping, and nonces). We optimize assets, employ lazy loading, and tune queries to guarantee sub-second LCP performance.', 'emergescale' ); ?>
        </p>
      </details>
    </div>
  </div>
</section>

<?php
get_footer();
