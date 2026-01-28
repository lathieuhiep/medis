<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Required: Theme constants
require get_parent_theme_file_path( '/includes/theme-constants.php' );

// Required: Theme setup
require get_parent_theme_file_path( '/includes/theme-setup.php' );

// Required: Plugin Activation
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

// Required: Theme functions
require get_parent_theme_file_path( '/includes/theme-hooks.php' );
require get_parent_theme_file_path( '/includes/theme-functions.php' );
require get_parent_theme_file_path( '/includes/theme-scripts.php' );
require get_parent_theme_file_path( '/includes/theme-sidebar.php' );

// Required: Helper options
require_once get_theme_file_path('includes/helpers/opt-header.php');
require_once get_theme_file_path('includes/helpers/opt-contact.php');
require_once get_theme_file_path('includes/helpers/opt-footer.php');

// Required: Widgets
//require get_parent_theme_file_path( '/includes/widgets/contact-info-widget.php' );
//require get_parent_theme_file_path( '/includes/widgets/recent-post.php' );
//require get_parent_theme_file_path( '/includes/widgets/social-widget.php' );

