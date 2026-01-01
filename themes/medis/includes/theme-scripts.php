<?php
// Register Back-End script
function medis_register_back_end_scripts(): void
{
    /* Start Get CSS Admin */
    wp_enqueue_style('admin', get_theme_file_uri('/backend/assets/css/admin.css'));

    wp_enqueue_script('admin', get_theme_file_uri('/backend/assets/js/admin.js'), array('jquery'), medis_get_version_theme(), true);
}

add_action('admin_enqueue_scripts', 'medis_register_back_end_scripts');

// Remove jquery migrate
function medis_remove_jquery_migrate($scripts): void
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}

add_action('wp_default_scripts', 'medis_remove_jquery_migrate');

// Remove WordPress block library CSS from loading on the front-end
function medis_remove_wp_block_library_css(): void
{
    // remove style gutenberg
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');

    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('storefront-gutenberg-blocks');
}

add_action('wp_enqueue_scripts', 'medis_remove_wp_block_library_css', 100);

// custom enqueue jQuery first
function medis_custom_enqueue_jquery_first(): void
{
    if (!is_admin()) {
        // deregister the default jQuery
        wp_deregister_script('jquery');

        // register and enqueue the jQuery script
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), array(), null, true);
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'medis_custom_enqueue_jquery_first', 1);

// load front-end styles
function medis_front_end_scripts(): void
{
    // load custom bootstrap
    wp_enqueue_style('medis-bootstrap', get_theme_file_uri('/assets/vendors/bootstrap/custom-bootstrap.min.css'), array(), medis_get_version_theme());

    wp_enqueue_script('medis-bootstrap', get_theme_file_uri('/assets/vendors/bootstrap/custom-bootstrap.min.js'), array('jquery'), medis_get_version_theme(), true);

    // load main style
    wp_enqueue_style('medis-main', get_theme_file_uri('/assets/css/main.min.css'), array(), medis_get_version_theme());

    // load style post
    if (medis_is_blog()) {
        wp_enqueue_style('medis-blog', get_theme_file_uri('/assets/css/post-type/post/archive.min.css'), array(), medis_get_version_theme());
    }

    if (is_singular('post')) {
        wp_enqueue_style('medis-single-post', get_theme_file_uri('/assets/css/post-type/post/single.min.css'), array(), medis_get_version_theme());
    }

    // load style page 404
    if (is_404()) {
        wp_enqueue_style('medis-page-404', get_theme_file_uri('/assets/css/page-templates/page-404.min.css'), array(), medis_get_version_theme());
    }

    // load comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // load main js
    wp_enqueue_script('medis-main', get_theme_file_uri('/assets/js/main.min.js'), array('jquery'), medis_get_version_theme(), true);
}

add_action('wp_enqueue_scripts', 'medis_front_end_scripts', 22);