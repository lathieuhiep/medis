<?php

use ExtendSite\Admin\Options\Modules\ContactOptions;
use ExtendSite\Admin\Options\Modules\GeneralOptions;
use ExtendSite\Admin\Options\Modules\ZaloOptions;

defined('ABSPATH') || exit;

$logo = medis_opt(GeneralOptions::class)::get_logo_id() ?? '';
$zalo = medis_opt(ContactOptions::class)::get_zalo() ?? '';
?>

<div class="header-top">
    <div class="container">
        <div class="header-top__wrapper">
            <div class="logo">
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

            <div class="info d-flex align-items-center gap-4">
                <div class="info__item hours flex-fill">
                    <div class="icon">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/business-hours.png' ) ) ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="55" height="55" />
                    </div>

                    <div class="content">
                        <p class="content__label">
                            <?php esc_html_e('Giờ làm việc hàng ngày', 'medis'); ?>
                        </p>

                        <p class="content__val">7h30 - 20h (cả thứ 7, chủ nhật)</p>
                    </div>
                </div>

                <div class="info__item phone flex-fill">
                    <div class="icon">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/phone.png' ) ) ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="41" height="41" />
                    </div>

                    <div class="content">
                        <p class="content__label">
                            <?php esc_html_e('Hotline tư vấn', 'medis'); ?>
                        </p>

                        <a class="content__val" href="tel:0703530197">
                            0703.530.197
                        </a>
                    </div>
                </div>

                <?php if ( !empty( $zalo ) ) : ?>
                    <div class="info__item zalo flex-grow-0">
                        <div class="icon">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/zalo.png' ) ) ?>"
                                 alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="98" height="40" />
                        </div>

                        <div class="content">
                            <p class="content__label">
                                <?php esc_html_e('Click tư vấn', 'medis'); ?>
                            </p>

                            <a class="content__val text-uppercase chat-zalo-contact"
                               href="#"
                               data-zalo="<?php echo esc_attr( medis_preg_replace_ony_number( $zalo ) ); ?>"
                            >
                                <?php esc_html_e('qua zalo', 'medis'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>