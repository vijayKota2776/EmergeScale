<?php
/**
 * Default Page Template
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-hero">
      <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php if ( has_excerpt() ) : ?>
          <p class="hero-subtitle text-light-muted">
            <?php echo esc_html( get_the_excerpt() ); ?>
          </p>
        <?php endif; ?>
      </div>
    </header>

    <div class="page-content-area">
      <div class="container standard-content">
        <?php if ( has_post_thumbnail() ) : ?>
          <div style="border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 2.5rem; box-shadow: var(--shadow-md);">
            <?php the_post_thumbnail( 'full' ); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'emergescale' ),
          'after'  => '</div>',
        ) );
        ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>

<?php
get_footer();
