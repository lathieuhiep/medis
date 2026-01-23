<?php
// Get logo
use ExtendSite\Admin\Options\Modules\GeneralOptions;

defined('ABSPATH') || exit;

$logo = medis_opt(GeneralOptions::class)::get_logo_id() ?? '';
?>
<nav class="header-nav d-none d-lg-block">
    <div class="container min-h-inherit d-flex flex-grow-1">
        <!-- logo -->
        <div class="logo p-2 p-lg-0 d-flex align-items-center">
            <a class="d-inline-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                <?php
                if ( ! empty( $logo ) ) :
                    echo wp_get_attachment_image( $logo, 'medium_large' );
                else :
                    ?>
                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>"
                         alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
                <?php endif; ?>
            </a>
        </div>

        <div id="primary-menu" class="primary-menu collapse navbar-collapse d-lg-block min-h-inherit">
            <?php
            if ( has_nav_menu( 'primary' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class' => 'd-lg-flex',
                    'container' => false,
                ) );
            else:
                ?>
                <ul class="main-menu">
                    <li>
                        <a href="<?php echo get_admin_url() . '/nav-menus.php'; ?>" class="theme-fs-md fw-semibold">
                            <?php esc_html_e( 'Thêm Menu', 'medis' ); ?>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>