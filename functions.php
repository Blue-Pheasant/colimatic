<?php
/**
 * Set important data constants.
 * THEME_URL = get_stylesheet_directory() - the path to the theme directory.
 * CORE = the /core directory of the theme, containing crucial source files.
 **/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');

/**
 * Load the /core/init.php file.
 * This is the initial configuration file of the theme that should not be modified later.
 **/
require_once(CORE . '/init.php');

/**
 * Set $content_width to specify the content width.
 **/
if (!isset($content_width)) {
    /*
     * If the $content_width variable is not yet defined, assign a value to it.
     */
    $content_width = 620;
}

/**
 * Set up theme features.
 **/
if (!function_exists('theme_setup')) {
    /*
     * If the theme_setup() function does not exist, create it.
     */
    function theme_setup() {
        /*
         * Enable theme translation.
         */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('theme_domain', $language_folder);

        /*
         * Automatically insert RSS Feed links into the <head>.
         */
        add_theme_support('automatic-feed-links');

        /*
         * Add support for post thumbnails.
         */
        add_theme_support('post-thumbnails');

        /*
         * Add support for the title tag to automatically generate the <title>.
         */
        add_theme_support('title-tag');

        /*
         * Add support for post formats.
         */
        add_theme_support('post-formats', array('video', 'image', 'audio', 'gallery'));

        /*
         * Add support for custom background.
         */
        $default_background = array('default-color' => '#e8e8e8');
        add_theme_support('custom-background', $default_background);

        /*
         * Create a menu for the theme.
         */
        register_nav_menu('primary-menu', __('Primary Menu', 'theme_domain'));

        /*
         * Create a sidebar for the theme.
         */
        $sidebar = array(
            'name' => __('Main Sidebar', 'theme_domain'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for the theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_sidebar' => '</h3>'
        );
        register_sidebar($sidebar);
    }
    add_action('init', 'theme_setup');
}

/*
 * Set up the function to display the logo
 * colimatic_logo()
 */
if (!function_exists('colimatic_logo')) {
    function colimatic_logo() { ?>
        <div class="logo">
                <div class="site-name">
                    <?php if (is_home()) {
                        printf(
                            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                            get_bloginfo('url'),
                            get_bloginfo('description'),
                            get_bloginfo('name')
                        );
                    } else {
                        printf(
                            '<p><a href="%1$s" title="%2$s">%3$s</p>',
                            get_bloginfo('url'),
                            get_bloginfo('description'),
                            get_bloginfo('name')
                        );
                    } ?>
                </div>
                <div class="site-description">
                    <?php bloginfo('description'); ?>
                </div>
        </div>
    <?php }
}
  
/*
* Set up the function to display the menu
* colimatic_menu( $slug )
*/
if (!function_exists('colimatic_menu')) {
    function colimatic_menu($slug) {
        $menu = array(
            'theme_location'  => $slug,
            'container'       => 'nav',
            'container_class' => $slug,
        );
        wp_nav_menu($menu);
    }
}

/**
 * Create a pagination function for index and archive pages.
 * This function will display pagination links as "Newer Posts" and "Older Posts."
 * colimatic_pagination()
 */
if (!function_exists('colimatic_pagination')) {
    function colimatic_pagination() {
        /*
         * Don't display pagination if there are less than 2 pages.
         */
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return '';
        }
        ?>
        <nav class="pagination" role="navigation">
            <?php if (get_next_post_link()) : ?>
                <div class="prev"><?php next_posts_link(__('Older Posts', 'colimatic')); ?></div>
            <?php endif; ?>

            <?php if (get_previous_post_link()) : ?>
                <div class="next"><?php previous_posts_link(__('Newer Posts', 'colimatic')); ?></div>
            <?php endif; ?>
        </nav>
        <?php
    }
}

/**
 * Create Default Pages
 *
 * This function creates default pages for your WordPress theme if they don't already exist.
 */
function create_default_pages() {
    // Define an array of default pages with titles and content.
    $default_pages = array(
        'Home' => 'This is the home page content.',
        'About Us' => 'This is the about page content.',
        'Contact' => 'This is the contact page content.',
    );

    // Loop through each default page.
    foreach ($default_pages as $page_title => $page_content) {
        // Check if a page with the same title already exists.
        $page = get_page_by_title($page_title);

        // If the page doesn't exist, create it.
        if (!$page) {
            // Define the page data including title, content, status, and type.
            $page_data = array(
                'post_title'    => $page_title,
                'post_content'  => $page_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            // Insert the new page into the database.
            wp_insert_post($page_data);
        }
    }
}

// Hook the function to run when the theme is activated.
add_action('after_switch_theme', 'create_default_pages');

/**
 * Create Customize navbar
 *
 * This function creates customize for your home theme 
 */
function theme_register_menus() {
    register_nav_menus(array(
        'author-menu' => __('Author Menu', 'colimatic'),
    ));
}

add_action('after_setup_theme', 'theme_register_menus');

function enqueue_custom_css_files() {
    // Get the path to the CSS files directory
    $public_directory = get_template_directory() . '/public/';

    global $post;
    $page_slug = $post->post_name;

    switch ($page_slug) {
        case 'about-us':
            $css_directory = $public_directory . 'about/css';
            break;
        case 'contact':
            $css_directory = $public_directory . 'contact/css';
            break;
        default:
            $css_directory = $public_directory . 'home/css';
            break;
    }

    // Get a list of all CSS files in the directory and its subdirectories
    $css_files = glob($css_directory . '**/*.css', GLOB_BRACE);

    // Enqueue each CSS file
    foreach ($css_files as $css_file) {
        $file_path = str_replace(get_template_directory(), get_template_directory_uri(), $css_file);
        $file_handle = 'custom-style-' . md5($file_path); // Generate a unique handle

        // Enqueue the CSS file
        wp_enqueue_style($file_handle, $file_path, array(), '1.0.0', 'all');
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_css_files');

function enqueue_custom_js_files() {
    // Get the path to the CSS files directory
    $public_directory = get_template_directory() . '/public/';

    // Detect the current page slug
    global $post;
    $page_slug = $post->post_name;

    // Define an array to store the CSS files to be enqueued
    $js_files = array();

    // Check the page slug and set the CSS directory accordingly
    switch ($page_slug) {
        case 'about-us':
            $js_directory = $public_directory . 'about/js';
            break;
        default:
            $js_directory = $public_directory . 'home/js';
            break;
    }

    // Enqueue each CSS file in the selected CSS directory
    if (is_dir($js_directory)) {
        $js_files = glob($js_directory . '**/*.js');
    }

    // Enqueue each JS file
    foreach ($js_files as $js_file) {
        $file_path = str_replace(get_template_directory(), get_template_directory_uri(), $js_file);
        $file_handle = 'custom-script-' . md5($file_path); // Generate a unique handle

        // Enqueue the js file
        wp_enqueue_script($file_handle, $file_path, array(), '1.0.0', 'all');
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_js_files');

function theme_customizer_settings($wp_customize) {
    $wp_customize->add_section('footer_settings', array(
        'title' => 'Footer Settings',
        'priority' => 30,
    ));

    $wp_customize->add_setting('footer_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post', // Allow HTML in the content
    ));

    $wp_customize->add_control('footer_content', array(
        'label' => 'Footer Content',
        'section' => 'footer_settings',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'theme_customizer_settings');
