<?php
/**
 * Main Template File (Fallback & Blog Archive)
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<div class="page-hero">
  <div class="container">
    <div class="section-tag tag-accent"><?php esc_html_e( 'Journal & Insights', 'emergescale' ); ?></div>
    <h1><?php esc_html_e( 'Engineering & Design Insights', 'emergescale' ); ?></h1>
    <p class="hero-subtitle text-light-muted">
      <?php esc_html_e( 'Perspectives on custom WordPress architecture, modern web development, UI/UX systems, and technical SEO.', 'emergescale' ); ?>
    </p>
  </div>
</div>

<div class="page-content-area">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <div class="services-grid" style="margin-bottom: 3.5rem;">
        <?php
        while ( have_posts() ) :
          the_post();
          ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'service-card' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div style="border-radius: var(--radius-sm); overflow: hidden; margin-bottom: 1.25rem;">
                <?php the_post_thumbnail( 'medium_large' ); ?>
              </div>
            <?php endif; ?>

            <div style="font-size: 0.8125rem; font-weight: 600; color: var(--color-text-muted); margin-bottom: 0.5rem;">
              <?php echo esc_html( get_the_date() ); ?> &bull; <?php the_category( ', ' ); ?>
            </div>

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div style="margin: 0.85rem 0 1.5rem; flex-grow: 1;">
              <?php the_excerpt(); ?>
            </div>

            <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-sm" style="align-self: flex-start;">
              <span><?php esc_html_e( 'Read Article', 'emergescale' ); ?></span>
              <?php echo emergescale_icon( 'arrow-right' ); ?>
            </a>
          </article>
          <?php
        endwhile;
        ?>
      </div>

      <div class="pagination-wrapper" style="display: flex; justify-content: center;">
        <?php
        the_posts_pagination( array(
          'mid_size'  => 2,
          'prev_text' => __( '&larr; Previous', 'emergescale' ),
          'next_text' => __( 'Next &rarr;', 'emergescale' ),
        ) );
        ?>
      </div>

    <?php else : ?>
      <div style="text-align: center; padding: 4rem 1rem;">
        <h2><?php esc_html_e( 'No Posts Published Yet', 'emergescale' ); ?></h2>
        <p><?php esc_html_e( 'Check back soon for new articles and deep-dives on technical engineering and design.', 'emergescale' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="margin-top: 1.5rem;">
          <?php esc_html_e( 'Return to Homepage', 'emergescale' ); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
