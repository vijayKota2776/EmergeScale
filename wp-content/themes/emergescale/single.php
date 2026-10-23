<?php
/**
 * Single Post Template (Blog & Insights)
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
        <div class="section-tag tag-accent"><?php the_category( ', ' ); ?></div>
        <h1 style="max-width: 900px; margin: 0 auto;"><?php the_title(); ?></h1>
        <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; margin-top: 1.5rem; font-size: 0.9375rem; color: var(--color-text-light-muted);">
          <span><?php esc_html_e( 'By', 'emergescale' ); ?> <?php the_author(); ?></span>
          <span>&bull;</span>
          <span><?php echo esc_html( get_the_date() ); ?></span>
        </div>
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

        <?php if ( has_tag() ) : ?>
          <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid var(--color-border); display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
            <strong><?php esc_html_e( 'Tags:', 'emergescale' ); ?></strong>
            <?php the_tags( '<span class="portfolio-tag">', '</span> <span class="portfolio-tag">', '</span>' ); ?>
          </div>
        <?php endif; ?>

        <!-- Post Navigation -->
        <div style="display: flex; justify-content: space-between; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--color-border); flex-wrap: wrap; gap: 1rem;">
          <div class="nav-previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
          <div class="nav-next"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
        </div>

        <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
        ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>

<?php
get_footer();
