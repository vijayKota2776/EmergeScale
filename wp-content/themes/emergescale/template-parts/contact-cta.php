<?php
/**
 * Template Part: Contact & Consultation CTA Section
 *
 * @package EmergeScale
 * @version 1.0.0
 */

$contact_email  = emergescale_get_opt( 'emergescale_email', 'hello@emergescale.com' );
$whatsapp_num   = emergescale_get_opt( 'emergescale_whatsapp', '+1234567890' );
$clean_whatsapp = preg_replace( '/[^0-9]/', '', $whatsapp_num );
$location       = emergescale_get_opt( 'emergescale_location', 'San Francisco & Remote Worldwide' );
?>

<section class="section section-dark" id="contact">
  <div class="container">
    <div class="contact-layout">
      <!-- Left Info Block -->
      <div class="contact-info-block">
        <div>
          <div class="section-tag tag-accent"><?php esc_html_e( 'Let\'s Collaborate', 'emergescale' ); ?></div>
          <h2><?php esc_html_e( 'Ready To Elevate Your Digital Authority?', 'emergescale' ); ?></h2>
          <p>
            <?php esc_html_e( 'Whether you require a bespoke WordPress theme, a full-stack web application, a high-converting mobile product, or an SEO overhaul, we are ready to turn your vision into reality.', 'emergescale' ); ?>
          </p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
          <!-- WhatsApp Channel -->
          <a href="https://wa.me/<?php echo esc_attr( $clean_whatsapp ); ?>" target="_blank" rel="noopener noreferrer" class="contact-channel-card channel-whatsapp">
            <div class="contact-channel-icon">
              <?php echo emergescale_icon( 'whatsapp' ); ?>
            </div>
            <div>
              <div style="font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; color: #25D366;">
                <?php esc_html_e( 'Instant WhatsApp Chat', 'emergescale' ); ?>
              </div>
              <div style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-light);">
                <?php echo esc_html( $whatsapp_num ); ?>
              </div>
              <div style="font-size: 0.8125rem; color: var(--color-text-light-muted); margin-top: 0.2rem;">
                <?php esc_html_e( 'Average response time: < 30 minutes', 'emergescale' ); ?>
              </div>
            </div>
          </a>

          <!-- Email Channel -->
          <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="contact-channel-card">
            <div class="contact-channel-icon">
              <?php echo emergescale_icon( 'mail' ); ?>
            </div>
            <div>
              <div style="font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; color: var(--color-accent);">
                <?php esc_html_e( 'Direct Inquiries', 'emergescale' ); ?>
              </div>
              <div style="font-size: 1.1rem; font-weight: 700; color: var(--color-text-light);">
                <?php echo esc_html( $contact_email ); ?>
              </div>
              <div style="font-size: 0.8125rem; color: var(--color-text-light-muted); margin-top: 0.2rem;">
                <?php esc_html_e( 'Formal RFPs and project scopes', 'emergescale' ); ?>
              </div>
            </div>
          </a>
        </div>

        <div style="padding: 1.5rem; background: var(--color-dark-surface); border: 1px solid var(--color-dark-border); border-radius: var(--radius-md);">
          <div style="font-size: 0.875rem; font-weight: 700; color: var(--color-text-light); margin-bottom: 0.4rem;">
            <?php esc_html_e( 'Global Availability & Security', 'emergescale' ); ?>
          </div>
          <p style="font-size: 0.85rem; margin: 0;">
            <?php esc_html_e( 'Based in ', 'emergescale' ); ?><strong><?php echo esc_html( $location ); ?></strong><?php esc_html_e( '. All inquiries are covered by mutual non-disclosure agreements upon request.', 'emergescale' ); ?>
          </p>
        </div>
      </div>

      <!-- Right Form Block -->
      <div class="contact-form-container">
        <div style="margin-bottom: 2rem;">
          <h3 style="color: var(--color-text-light); margin-bottom: 0.5rem;">
            <?php esc_html_e( 'Request a Project Consultation', 'emergescale' ); ?>
          </h3>
          <p style="font-size: 0.9375rem; color: var(--color-text-light-muted); margin: 0;">
            <?php esc_html_e( 'Fill out the form below and we will prepare a preliminary technical appraisal within 24 hours.', 'emergescale' ); ?>
          </p>
        </div>

        <form id="emergescale-inquiry-form" method="post" novalidate>
          <div class="form-status-alert" role="alert" aria-live="polite"></div>

          <div class="form-grid">
            <div class="form-group">
              <label for="contact-name" class="form-label"><?php esc_html_e( 'Your Name *', 'emergescale' ); ?></label>
              <input type="text" id="contact-name" name="name" class="form-input" placeholder="Sarah Connor" required>
            </div>

            <div class="form-group">
              <label for="contact-email" class="form-label"><?php esc_html_e( 'Work Email *', 'emergescale' ); ?></label>
              <input type="email" id="contact-email" name="email" class="form-input" placeholder="sarah@company.com" required>
            </div>

            <div class="form-group">
              <label for="contact-service" class="form-label"><?php esc_html_e( 'Service Needed', 'emergescale' ); ?></label>
              <select id="contact-service" name="service" class="form-select">
                <option value="Web Development"><?php esc_html_e( 'Custom Web Development', 'emergescale' ); ?></option>
                <option value="Mobile App Development"><?php esc_html_e( 'Mobile App Engineering', 'emergescale' ); ?></option>
                <option value="Search Engine Optimization"><?php esc_html_e( 'Technical SEO & Growth', 'emergescale' ); ?></option>
                <option value="UI/UX Design"><?php esc_html_e( 'UI/UX Design Systems', 'emergescale' ); ?></option>
                <option value="Brand Identity"><?php esc_html_e( 'Brand Identity & Guidelines', 'emergescale' ); ?></option>
                <option value="Full Scale Modernization"><?php esc_html_e( 'Full Studio Partnership', 'emergescale' ); ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="contact-budget" class="form-label"><?php esc_html_e( 'Estimated Budget', 'emergescale' ); ?></label>
              <select id="contact-budget" name="budget" class="form-select">
                <option value="$10k - $25k"><?php esc_html_e( '$10,000 – $25,000', 'emergescale' ); ?></option>
                <option value="$25k - $50k"><?php esc_html_e( '$25,000 – $50,000', 'emergescale' ); ?></option>
                <option value="$50k+"><?php esc_html_e( '$50,000+', 'emergescale' ); ?></option>
                <option value="Undisclosed / Discussion"><?php esc_html_e( 'Undisclosed / Let\'s Discuss', 'emergescale' ); ?></option>
              </select>
            </div>

            <div class="form-group full-width">
              <label for="contact-message" class="form-label"><?php esc_html_e( 'Project Brief & Goals *', 'emergescale' ); ?></label>
              <textarea id="contact-message" name="message" class="form-textarea" placeholder="Describe your project, timeline, and what you aim to achieve..." required></textarea>
            </div>

            <div class="form-group full-width" style="margin-top: 0.5rem;">
              <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                <span><?php esc_html_e( 'Submit Consultation Request', 'emergescale' ); ?></span>
                <?php echo emergescale_icon( 'arrow-right' ); ?>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
