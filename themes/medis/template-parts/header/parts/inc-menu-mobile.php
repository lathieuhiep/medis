<div class="offcanvas offcanvas-start offcanvas-menu-mobile" tabindex="-1" id="offcanvas-primary-menu" aria-labelledby="offcanvas-primary-menu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">
            <?php esc_html_e('Danh mục', 'medis'); ?>
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="icon-theme-mask icon-theme-mask-xmark"></i>
        </button>
    </div>

    <div class="offcanvas-body pt-4 px-0 pb-0">
        <?php
        if ( has_nav_menu( 'primary' ) ) :
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class' => 'list-unstyled m-0',
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