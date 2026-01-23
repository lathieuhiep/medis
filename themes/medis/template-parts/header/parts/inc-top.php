<?php

use ExtendSite\Admin\Options\Modules\ContactOptions;

defined('ABSPATH') || exit;

// Get contact
$address = medis_opt(ContactOptions::class)::get_address() ?? '';
$working_hours = medis_opt(ContactOptions::class)::get_working_hours() ?? '';
$hotline = medis_opt(ContactOptions::class)::get_hotline() ?? '';
$zalo = medis_opt(ContactOptions::class)::get_zalo() ?? '';
?>

<div class="header-top py-lg-3">
    <div class="container g-0 g-lg-6">
        <div class="header-top__wrapper">


            <!-- info -->
            <div class="info d-none d-lg-flex align-items-center gap-3">
                <!-- working hours -->
                <div class="info__item hours d-flex align-items-center gap-3 flex-fill">
                    <div class="icon">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/business-hours.png' ) ) ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="55" height="55" />
                    </div>

                    <div class="content">
                        <p class="content__label theme-fs-sm">
                            <?php esc_html_e('Giờ làm việc hàng ngày', 'medis'); ?>
                        </p>

                        <p class="content__val m-0 fw-bold theme-fs-md theme-text-error"><?php echo esc_html( $working_hours ); ?></p>
                    </div>
                </div>

                <!-- hotline -->
                <div class="info__item phone d-flex align-items-center gap-3 flex-fill">
                    <div class="icon">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/phone.png' ) ) ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="41" height="41" />
                    </div>

                    <div class="content">
                        <p class="content__label theme-fs-sm">
                            <?php esc_html_e('Hotline tư vấn', 'medis'); ?>
                        </p>

                        <a class="content__val d-block theme-fs-md fw-bold theme-text-error" href="tel:<?php echo esc_attr( medis_preg_replace_ony_number( $hotline ) ); ?>">
                            <?php echo esc_html( $hotline ); ?>
                        </a>
                    </div>
                </div>

                <!-- zalo -->
                <?php if ( !empty( $zalo ) ) : ?>
                    <div class="info__item zalo d-flex align-items-center gap-3 flex-grow-0">
                        <div class="icon">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/zalo.png' ) ) ?>"
                                 alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="98" height="40" />
                        </div>

                        <div class="content">
                            <p class="content__label theme-fs-sm">
                                <?php esc_html_e('Click tư vấn', 'medis'); ?>
                            </p>

                            <a class="content__val text-uppercase chat-zalo-contact d-block theme-fs-md fw-bold theme-text-error"
                               href="#"
                               data-zalo="<?php echo esc_attr( medis_preg_replace_ony_number( $zalo ) ); ?>"
                            >
                                <?php esc_html_e('qua zalo', 'medis'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- mobile menu button -->
            <div class="mobile-menu-box d-flex align-items-center justify-content-center d-lg-none">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-primary-menu"
                        aria-controls="offcanvas-primary-menu">
                    <i class="icon-theme-mask icon-theme-mask-bars"></i>
                </button>
            </div>
        </div>
    </div>
</div>