<?php if ( class_exists( 'Woocommerce' ) && ! is_cart() && ! is_checkout() ) : ?>
    <div class="widget-cart-warp d-flex align-items-center">
        <?php
        do_action( 'medis_woo_shopping_cart' );

        medis_custom_mini_cart();
        ?>
    </div>
<?php endif; ?>