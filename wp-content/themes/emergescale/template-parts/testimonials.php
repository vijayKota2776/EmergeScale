<?php
/**
 * Template Part: Testimonials Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$testimonials = emergescale_get_testimonials();
?>

<section class="section" id="testimonials">
  <div class="container">
    <div class="section-header">
      <div class="section-tag tag-accent"><?php esc_html_e( 'Client Endorsements', 'emergescale' ); ?></div>
      <h2><?php esc_html_e( 'Trusted by Leaders Building the Next Generation of Products', 'emergescale' ); ?></h2>
      <p>
        <?php esc_html_e( 'See how our cross-disciplinary engineering and design partnerships drive tangible commercial growth.', 'emergescale' ); ?>
      </p>
    </div>

    <div class="testimonials-grid">
      <?php foreach ( $testimonials as $item ) : ?>
        <div class="testimonial-card">
          <div>
            <div class="testimonial-stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'emergescale' ), $item['stars'] ) ); ?>">
              <?php for ( $i = 0; $i < $item['stars']; $i++ ) : ?>
                <?php echo emergescale_icon( 'star' ); ?>
              <?php endfor; ?>
            </div>

            <blockquote class="testimonial-quote">
              &ldquo;<?php echo esc_html( $item['quote'] ); ?>&rdquo;
            </blockquote>
          </div>

          <div class="testimonial-author-box">
            <div class="author-avatar" aria-hidden="true">
              <?php echo esc_html( $item['avatar'] ); ?>
            </div>
            <div class="author-info">
              <h4><?php echo esc_html( $item['author'] ); ?></h4>
              <p><?php echo esc_html( $item['role'] ); ?></p>
              <p style="color: var(--color-text-muted); font-size: 0.75rem;"><?php echo esc_html( $item['location'] ); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align: center; margin-top: 3rem;">
      <span class="demo-disclaimer-pill">
        <?php echo emergescale_icon( 'shield' ); ?>
        <?php esc_html_e( 'Illustrative Demonstration Testimonials — Concept Showcase for Client Review', 'emergescale' ); ?>
      </span>
    </div>
  </div>
</section>
