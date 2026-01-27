<?php
defined( 'ABSPATH' ) || exit;

// Get contact
$hotline = medis_opt_contact_hotline();
$zalo = medis_opt_contact_zalo();
$messenger = medis_opt_contact_messenger();
$booking_id = medis_opt_contact_booking();
$booking_url = $booking_id ? get_permalink( $booking_id ) : '';
?>

<div class="contact-us-warp">
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-4">
            <?php if ( !empty( $hotline ) ) : ?>
                <div class="col">
                    <div class="item d-flex gap-3 align-items-center justify-content-center">
                        <div class="item__icon d-flex align-items-center justify-content-center">
                            <i class="icon-theme-mask icon-theme-mask-phone"></i>
                        </div>

                        <div class="item__content">
                            <a href="tel:<?php echo esc_attr( medis_preg_replace_ony_number( $hotline ) ); ?>" class="item__label text-uppercase">
                                <span><?php esc_html_e( 'Hotline', 'medis' ); ?></span>
                                <span><?php echo esc_html( $hotline ); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty( $booking_url ) ) : ?>
                <div class="col">
                    <div class="item item d-flex gap-3 align-items-center justify-content-center">
                        <div class="item__icon d-flex align-items-center justify-content-center">
                            <i class="icon-theme-mask icon-theme-mask-calendar-days"></i>
                        </div>

                        <div class="item__content">
                            <a href="<?php echo esc_url( $booking_url ); ?>" class="item__label text-uppercase">
                                <?php esc_html_e( 'Đặt hẹn khám bệnh', 'medis' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty( $zalo ) ) : ?>
                <div class="col">
                    <div class="item item d-flex gap-3 align-items-center justify-content-center">
                        <div class="item__icon d-flex align-items-center justify-content-center">
                            <i class="icon-theme-mask icon-theme-mask-comment-dots"></i>
                        </div>

                        <div class="item__content">
                            <a href="#"
                               class="item__label chat-zalo-contact text-uppercase"
                               data-zalo="<?php echo esc_attr( medis_preg_replace_ony_number( $zalo ) ); ?>"
                            >
                                <?php esc_html_e( 'Chat với bác sĩ', 'medis' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty( $messenger ) ) : ?>
                <div class="col">
                    <div class="item item d-flex gap-3 align-items-center justify-content-center">
                        <div class="item__icon d-flex align-items-center justify-content-center">
                            <i class="icon-theme-mask icon-theme-mask-messenger"></i>
                        </div>

                        <div class="item__content">
                            <a href="<?php echo esc_url( $messenger ); ?>" class="item__label text-uppercase">
                                <?php esc_html_e( 'Chat messenger', 'medis' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
