<?php
/**
 * Standalone Local Preview Server for EmergeScale WordPress Theme
 *
 * This file enables instant browser-based previewing and testing using PHP's
 * built-in web server (`php -S 127.0.0.1:8080 preview-server.php`) without
 * requiring a full WordPress core/MySQL setup.
 *
 * When installed into a live WordPress site (e.g. LocalWP), WordPress loads
 * wp-content/themes/emergescale/ directly.
 */

define( 'ABSPATH', __DIR__ . '/' );
define( 'EMERGESCALE_THEME_DIR', __DIR__ . '/wp-content/themes/emergescale' );

// Serve static assets directly (CSS, JS, images, fonts)
$uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
if ( preg_match( '/\.(?:png|jpg|jpeg|gif|css|js|svg|woff2?|ttf|eot)$/', $uri ) ) {
    $filePath = __DIR__ . $uri;
    if ( file_exists( $filePath ) ) {
        $ext = pathinfo( $filePath, PATHINFO_EXTENSION );
        $mimes = [
            'css'   => 'text/css',
            'js'    => 'application/javascript',
            'png'   => 'image/png',
            'jpg'   => 'image/jpeg',
            'jpeg'  => 'image/jpeg',
            'svg'   => 'image/svg+xml',
            'woff'  => 'font/woff',
            'woff2' => 'font/woff2',
        ];
        if ( isset( $mimes[$ext] ) ) {
            header( 'Content-Type: ' . $mimes[$ext] );
        }
        readfile( $filePath );
        exit;
    }
}

// Minimal WordPress Environment Emulation
if ( ! function_exists( 'language_attributes' ) ) {
    function language_attributes() { echo 'lang="en-US"'; }
}
if ( ! function_exists( 'bloginfo' ) ) {
    function bloginfo( $show = '' ) {
        if ( $show === 'charset' ) echo 'UTF-8';
        elseif ( $show === 'name' ) echo 'EmergeScale';
        elseif ( $show === 'description' ) echo 'Digital Experiences That Drive Growth';
    }
}
if ( ! function_exists( 'wp_head' ) ) {
    function wp_head() {
        echo '<title>EmergeScale — Digital Experiences That Drive Growth</title>' . "\n";
        echo '<meta name="description" content="EmergeScale is a bespoke digital studio engineering modern WordPress themes, mobile apps, UI/UX systems, and technical SEO.">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
        echo '<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">' . "\n";
        echo '<link rel="stylesheet" href="/wp-content/themes/emergescale/style.css">' . "\n";
        echo '<link rel="stylesheet" href="/wp-content/themes/emergescale/assets/css/main.css">' . "\n";
    }
}
if ( ! function_exists( 'wp_footer' ) ) {
    function wp_footer() {
        echo '<script>window.emergeScaleData = { ajaxUrl: "/admin-ajax", nonce: "demo_nonce", siteUrl: "/" };</script>' . "\n";
        echo '<script src="/wp-content/themes/emergescale/assets/js/main.js"></script>' . "\n";
    }
}
if ( ! function_exists( 'body_class' ) ) {
    function body_class( $class = '' ) { echo 'class="home page-template-default ' . esc_attr( $class ) . '"'; }
}
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {}
}
if ( ! function_exists( 'esc_html__' ) ) {
    function esc_html__( $text, $domain = 'default' ) { return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( '__' ) ) {
    function __( $text, $domain = 'default' ) { return $text; }
}
if ( ! function_exists( 'esc_html_e' ) ) {
    function esc_html_e( $text, $domain = 'default' ) { echo htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( 'esc_attr_e' ) ) {
    function esc_attr_e( $text, $domain = 'default' ) { echo htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( 'esc_attr' ) ) {
    function esc_attr( $text ) { return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( 'esc_html' ) ) {
    function esc_html( $text ) { return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( 'esc_url' ) ) {
    function esc_url( $url ) { return htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' ); }
}
if ( ! function_exists( 'home_url' ) ) {
    function home_url( $path = '' ) { return '/' . ltrim( $path, '/' ); }
}
if ( ! function_exists( 'has_custom_logo' ) ) {
    function has_custom_logo() { return false; }
}
if ( ! function_exists( 'has_nav_menu' ) ) {
    function has_nav_menu( $location ) { return false; }
}
if ( ! function_exists( 'get_theme_mod' ) ) {
    function get_theme_mod( $key, $default = '' ) { return $default; }
}
if ( ! function_exists( 'get_template_directory' ) ) {
    function get_template_directory() { return EMERGESCALE_THEME_DIR; }
}
if ( ! function_exists( 'get_template_directory_uri' ) ) {
    function get_template_directory_uri() { return '/wp-content/themes/emergescale'; }
}
if ( ! function_exists( 'get_stylesheet_uri' ) ) {
    function get_stylesheet_uri() { return '/wp-content/themes/emergescale/style.css'; }
}
if ( ! function_exists( 'get_header' ) ) {
    function get_header() { require EMERGESCALE_THEME_DIR . '/header.php'; }
}
if ( ! function_exists( 'get_footer' ) ) {
    function get_footer() { require EMERGESCALE_THEME_DIR . '/footer.php'; }
}
if ( ! function_exists( 'get_template_part' ) ) {
    function get_template_part( $slug, $name = null ) {
        $file = EMERGESCALE_THEME_DIR . '/' . $slug . '.php';
        if ( file_exists( $file ) ) {
            require $file;
        }
    }
}
if ( ! function_exists( 'add_action' ) ) { function add_action() {} }
if ( ! function_exists( 'add_theme_support' ) ) { function add_theme_support() {} }
if ( ! function_exists( 'register_nav_menus' ) ) { function register_nav_menus() {} }
if ( ! function_exists( 'set_post_thumbnail_size' ) ) { function set_post_thumbnail_size() {} }
if ( ! function_exists( 'add_image_size' ) ) { function add_image_size() {} }
if ( ! function_exists( 'apply_filters' ) ) { function apply_filters( $t, $v ) { return $v; } }
if ( ! function_exists( 'wp_enqueue_style' ) ) { function wp_enqueue_style() {} }
if ( ! function_exists( 'wp_enqueue_script' ) ) { function wp_enqueue_script() {} }
if ( ! function_exists( 'wp_localize_script' ) ) { function wp_localize_script() {} }
if ( ! function_exists( 'admin_url' ) ) { function admin_url( $path = '' ) { return '/admin-ajax'; } }
if ( ! function_exists( 'wp_create_nonce' ) ) { function wp_create_nonce() { return 'demo_nonce'; } }
if ( ! function_exists( 'current_time' ) ) { function current_time( $t ) { return date( 'Y-m-d H:i:s' ); } }
if ( ! function_exists( 'have_posts' ) ) { function have_posts() { return false; } }

// Load theme functions for helper definitions
require_once EMERGESCALE_THEME_DIR . '/functions.php';

// Handle AJAX contact endpoint simulation
if ( $uri === '/admin-ajax' && $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    header( 'Content-Type: application/json' );
    echo json_encode([
        'success' => true,
        'data'    => [
            'message' => 'Thank you! Your inquiry has been received. Our senior engineering team will contact you within 24 hours.'
        ]
    ]);
    exit;
}

// Router
if ( $uri === '/about' || $uri === '/about/' ) {
    require EMERGESCALE_THEME_DIR . '/page-about.php';
} elseif ( $uri === '/services' || $uri === '/services/' ) {
    require EMERGESCALE_THEME_DIR . '/page-services.php';
} elseif ( $uri === '/our-work' || $uri === '/our-work/' || $uri === '/portfolio' ) {
    require EMERGESCALE_THEME_DIR . '/page-work.php';
} elseif ( $uri === '/contact' || $uri === '/contact/' ) {
    require EMERGESCALE_THEME_DIR . '/page-contact.php';
} elseif ( $uri === '/404' ) {
    require EMERGESCALE_THEME_DIR . '/404.php';
} else {
    require EMERGESCALE_THEME_DIR . '/front-page.php';
}
