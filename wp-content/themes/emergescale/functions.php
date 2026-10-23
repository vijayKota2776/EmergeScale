<?php
/**
 * EmergeScale Theme Functions & Definitions
 *
 * @package EmergeScale
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'EMERGESCALE_VERSION', '1.0.0' );
define( 'EMERGESCALE_DIR', get_template_directory() );
define( 'EMERGESCALE_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function emergescale_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 675, true );
    add_image_size( 'emergescale-card', 600, 400, true );
    add_image_size( 'emergescale-portfolio', 800, 520, true );

    // Register navigation menus.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'emergescale' ),
        'footer'  => esc_html__( 'Footer Menu', 'emergescale' ),
    ) );

    // Switch default core markup to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ) );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles and full/wide align.
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    // Add support for Gutenberg editor styles.
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'emergescale_setup' );

/**
 * Set content width in pixels, based on the theme's design and stylesheet.
 */
function emergescale_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'emergescale_content_width', 1200 );
}
add_action( 'after_setup_theme', 'emergescale_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function emergescale_scripts() {
    // Enqueue Google Fonts (Plus Jakarta Sans & Inter)
    wp_enqueue_style(
        'emergescale-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Enqueue Theme Stylesheet
    wp_enqueue_style(
        'emergescale-style',
        get_stylesheet_uri(),
        array(),
        EMERGESCALE_VERSION
    );

    // Enqueue Main Design System CSS
    wp_enqueue_style(
        'emergescale-main',
        EMERGESCALE_URI . '/assets/css/main.css',
        array( 'emergescale-style' ),
        EMERGESCALE_VERSION
    );

    // Enqueue Main JavaScript
    wp_enqueue_script(
        'emergescale-main',
        EMERGESCALE_URI . '/assets/js/main.js',
        array(),
        EMERGESCALE_VERSION,
        true
    );

    // Localize Script for dynamic AJAX interaction & Security Nonce
    wp_localize_script( 'emergescale-main', 'emergeScaleData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'emergescale_contact_nonce' ),
        'siteUrl' => home_url( '/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'emergescale_scripts' );

/**
 * Customizer Settings for Agency Details
 */
function emergescale_customize_register( $wp_customize ) {
    // Agency Contact Section
    $wp_customize->add_section( 'emergescale_agency_settings', array(
        'title'       => esc_html__( 'EmergeScale Studio Settings', 'emergescale' ),
        'priority'    => 30,
        'description' => esc_html__( 'Configure studio contact information, WhatsApp link, and social links.', 'emergescale' ),
    ) );

    // Email
    $wp_customize->add_setting( 'emergescale_email', array(
        'default'           => 'hello@emergescale.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'emergescale_email', array(
        'label'    => esc_html__( 'Contact Email', 'emergescale' ),
        'section'  => 'emergescale_agency_settings',
        'type'     => 'email',
    ) );

    // WhatsApp Number / Link
    $wp_customize->add_setting( 'emergescale_whatsapp', array(
        'default'           => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'emergescale_whatsapp', array(
        'label'       => esc_html__( 'WhatsApp Number (with country code)', 'emergescale' ),
        'description' => esc_html__( 'e.g., +15551234567', 'emergescale' ),
        'section'     => 'emergescale_agency_settings',
        'type'        => 'text',
    ) );

    // Office Location
    $wp_customize->add_setting( 'emergescale_location', array(
        'default'           => 'San Francisco & Remote Worldwide',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'emergescale_location', array(
        'label'    => esc_html__( 'Office Location / Availability', 'emergescale' ),
        'section'  => 'emergescale_agency_settings',
        'type'     => 'text',
    ) );

    // Booking / CTA URL
    $wp_customize->add_setting( 'emergescale_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'emergescale_cta_link', array(
        'label'    => esc_html__( 'Primary Consultation CTA Link', 'emergescale' ),
        'section'  => 'emergescale_agency_settings',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'emergescale_customize_register' );

/**
 * Helper to fetch theme option with fallback
 */
function emergescale_get_opt( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

/**
 * Secure AJAX Contact Form Handler
 */
function emergescale_handle_contact() {
    // Check nonce for security
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'emergescale_contact_nonce' ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Security check failed. Please refresh and try again.', 'emergescale' ) ) );
    }

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $service = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
    $budget  = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Please complete all required fields.', 'emergescale' ) ) );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => esc_html__( 'Please provide a valid email address.', 'emergescale' ) ) );
    }

    // Optional email dispatch to admin
    $admin_email = get_option( 'admin_email', emergescale_get_opt( 'emergescale_email', 'hello@emergescale.com' ) );
    $subject     = sprintf( '[EmergeScale Inquiry] New project request from %s', $name );
    $body        = "New inquiry received through EmergeScale website:\n\n" .
                   "Name: {$name}\n" .
                   "Email: {$email}\n" .
                   "Service: {$service}\n" .
                   "Budget: {$budget}\n\n" .
                   "Project Details:\n{$message}\n\n" .
                   "Sent on: " . current_time( 'mysql' );
    $headers     = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" );

    // Attempt mail send if configured
    @wp_mail( $admin_email, $subject, $body, $headers );

    wp_send_json_success( array(
        'message' => esc_html__( 'Thank you! Your inquiry has been sent successfully. Our team will review your project and reply within 24 hours.', 'emergescale' ),
    ) );
}
add_action( 'wp_ajax_emergescale_contact', 'emergescale_handle_contact' );
add_action( 'wp_ajax_nopriv_emergescale_contact', 'emergescale_handle_contact' );

/**
 * Return Core Agency Services Data
 */
function emergescale_get_services() {
    return array(
        array(
            'id'          => 'web-development',
            'slug'        => 'web-development',
            'title'       => __( 'Web Development', 'emergescale' ),
            'tagline'     => __( 'High-performance, bespoke WordPress & web applications.', 'emergescale' ),
            'description' => __( 'Modern, responsive business websites built around speed, usability, maintainability, and clean architecture. From custom WordPress themes to scalable full-stack web platforms.', 'emergescale' ),
            'deliverables'=> array( 'Custom WordPress & PHP Themes', 'Headless & Jamstack Architectures', 'Interactive Front-End Web Apps', 'Clean REST APIs & Webhooks', 'Lightning Speed & Core Web Vitals' ),
            'icon'        => 'code',
            'highlight'   => '<0.8s LCP Speed',
        ),
        array(
            'id'          => 'mobile-app-development',
            'slug'        => 'mobile-app-development',
            'title'       => __( 'Mobile App Development', 'emergescale' ),
            'tagline'     => __( 'Native & cross-platform apps designed for engagement.', 'emergescale' ),
            'description' => __( 'Mobile application experiences engineered to accelerate customer engagement, streamline enterprise operations, and build high-retention digital products.', 'emergescale' ),
            'deliverables'=> array( 'iOS & Android App Engineering', 'React Native & Flutter Solutions', 'Seamless Backend & Cloud Sync', 'App Store & Play Store Launch', 'Offline-First Data Storage' ),
            'icon'        => 'mobile',
            'highlight'   => '4.9★ App Rating Avg',
        ),
        array(
            'id'          => 'seo-optimization',
            'slug'        => 'seo-optimization',
            'title'       => __( 'Search Engine Optimization', 'emergescale' ),
            'tagline'     => __( 'Data-backed search visibility and intent-driven traffic.', 'emergescale' ),
            'description' => __( 'Technical SEO, structured schema data, content architecture, and core performance optimizations to secure first-page rankings and sustainable organic customer acquisition.', 'emergescale' ),
            'deliverables'=> array( 'Technical SEO Audits & Fixes', 'Schema & Semantic HTML Structure', 'Competitor Keyword Domination', 'Core Web Vitals Optimization', 'Conversion Rate Tracking' ),
            'icon'        => 'trending-up',
            'highlight'   => '+280% Avg Traffic',
        ),
        array(
            'id'          => 'ui-ux-design',
            'slug'        => 'ui-ux-design',
            'title'       => __( 'UI/UX Design', 'emergescale' ),
            'tagline'     => __( 'Intuitive user journeys and conversion-focused design.', 'emergescale' ),
            'description' => __( 'User research, wireframing, high-fidelity prototypes, and comprehensive design systems built to reduce cognitive friction and delight modern digital users.', 'emergescale' ),
            'deliverables'=> array( 'User Research & Personas', 'Wireframing & Interactive Prototyping', 'Component-Driven Design Systems', 'Usability Audits & Heuristic Reviews', 'Micro-interactions & Motion' ),
            'icon'        => 'layout',
            'highlight'   => '98% Usability Score',
        ),
        array(
            'id'          => 'brand-identity',
            'slug'        => 'brand-identity',
            'title'       => __( 'Brand Identity', 'emergescale' ),
            'tagline'     => __( 'Memorable visual systems that establish market authority.', 'emergescale' ),
            'description' => __( 'Distinctive visual identities, refined typography pairings, vibrant color palettes, and comprehensive brand guidelines engineered for effortless digital consistency.', 'emergescale' ),
            'deliverables'=> array( 'Logo & Visual Mark Systems', 'Typography & Palette Guidelines', 'Digital & Print Brand Kits', 'Component Styling Tokens', 'Marketing & Social Templates' ),
            'icon'        => 'feather',
            'highlight'   => '100% Bespoke Identity',
        ),
    );
}

/**
 * Return Portfolio / Case Studies Data
 */
function emergescale_get_case_studies() {
    return array(
        array(
            'title'       => 'Lumix FinTech Banking Suite',
            'category'    => 'Web Development',
            'filter'      => 'web',
            'impact'      => '+340% Conversions',
            'summary'     => 'A high-frequency wealth management portal and custom dashboard engineered with custom WordPress architecture, live data feeds, and institutional security.',
            'tags'        => array( 'WordPress', 'PHP', 'Tailored UI', 'Financial APIs' ),
            'year'        => '2026',
        ),
        array(
            'title'       => 'Verve Health On-Demand App',
            'category'    => 'Mobile App Development',
            'filter'      => 'mobile',
            'impact'      => '120k Active Users',
            'summary'     => 'Cross-platform patient-doctor telemedicine application featuring end-to-end encrypted video appointments and real-time biometric synchronizations.',
            'tags'        => array( 'Mobile App', 'Real-Time Sync', 'HIPAA Compliant', 'UI/UX' ),
            'year'        => '2026',
        ),
        array(
            'title'       => 'Apex Cloud Platform Rebrand',
            'category'    => 'Brand Identity & UI/UX',
            'filter'      => 'design',
            'impact'      => '$42M Series B',
            'summary'     => 'Complete brand architecture, design system, and multi-tier marketing site for a modern enterprise cloud infrastructure company.',
            'tags'        => array( 'Brand Identity', 'Design System', 'Design Tokens', 'Figma' ),
            'year'        => '2025',
        ),
        array(
            'title'       => 'Norden Logistics SEO Overhaul',
            'category'    => 'Search Engine Optimization',
            'filter'      => 'seo',
            'impact'      => '+410% Organic Leads',
            'summary'     => 'Complete technical SEO turnaround, sub-second TTFB optimization, structured schema implementation, and multi-lingual route ranking.',
            'tags'        => array( 'Technical SEO', 'Schema Markup', 'Performance', 'Analytics' ),
            'year'        => '2025',
        ),
    );
}

/**
 * Return Demonstration Testimonials Data
 */
function emergescale_get_testimonials() {
    return array(
        array(
            'quote'    => 'EmergeScale delivered a bespoke WordPress platform that cut our page load times down to 0.6 seconds and doubled our qualified enterprise inbound leads within the first quarter.',
            'author'   => 'Marcus Vance',
            'role'     => 'VP of Product, Lumix Global',
            'location' => 'San Francisco, CA',
            'avatar'   => 'MV',
            'stars'    => 5,
        ),
        array(
            'quote'    => 'Their command of both visual aesthetics and bulletproof PHP code is rare. They built our customer portal ahead of schedule, with meticulous attention to mobile responsiveness.',
            'author'   => 'Elena Rostova',
            'role'     => 'Co-Founder, Verve Health Tech',
            'location' => 'New York, NY',
            'avatar'   => 'ER',
            'stars'    => 5,
        ),
        array(
            'quote'    => 'From brand overhaul to SEO architecture, EmergeScale operates like an elite tier-1 agency. Our organic traffic grew by over 400% after their technical optimizations.',
            'author'   => 'Tobias Lindqvist',
            'role'     => 'Chief Growth Officer, Norden Freight',
            'location' => 'Stockholm, Sweden',
            'avatar'   => 'TL',
            'stars'    => 5,
        ),
    );
}

/**
 * Helper to render modern inline SVG icons
 */
function emergescale_icon( $name ) {
    switch ( $name ) {
        case 'code':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>';
        case 'mobile':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>';
        case 'trending-up':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>';
        case 'layout':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>';
        case 'feather':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>';
        case 'arrow-right':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>';
        case 'arrow-up-right':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>';
        case 'check':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';
        case 'mail':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>';
        case 'phone':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>';
        case 'whatsapp':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>';
        case 'shield':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>';
        case 'zap':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>';
        case 'star':
            return '<svg class="es-icon" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
        default:
            return '';
    }
}
