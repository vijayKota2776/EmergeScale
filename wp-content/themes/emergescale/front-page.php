<?php
/**
 * Front Page Template
 *
 * @package EmergeScale
 * @version 1.0.0
 */

get_header();

// Hero Section
get_template_part( 'template-parts/hero' );

// Services Overview Section
get_template_part( 'template-parts/services' );

// Portfolio / Case Studies Section
get_template_part( 'template-parts/portfolio' );

// About Studio & Principles Section
get_template_part( 'template-parts/about' );

// Testimonials & Trust Section
get_template_part( 'template-parts/testimonials' );

// Contact Inquiry & Direct Channels Section
get_template_part( 'template-parts/contact-cta' );

get_footer();
