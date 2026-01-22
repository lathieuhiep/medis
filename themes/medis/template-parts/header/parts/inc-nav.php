<nav class="header-nav d-none d-lg-block">
    <div class="container min-h-inherit d-flex flex-grow-1">
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

        <div class="search-warp min-h-inherit d-flex align-items-center flex-grow-0 w-100">
            <?php get_search_form(); ?>
        </div>
    </div>
</nav>