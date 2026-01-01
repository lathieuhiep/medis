<?php
/* Better way to add multiple widgets areas */
function medis_register_sidebar( $name, $id, $description = '' ): void {
	register_sidebar( array(
		'name'          => $name,
		'id'            => $id,
		'description'   => $description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

const PREFIX_SIDEBAR_FOOTER_COLUMN = 'sidebar-footer-column-';
function medis_multiple_widget_init(): void {
    // sidebar main
	medis_register_sidebar(
        esc_html__( 'Sidebar chính', 'medis' ),
        'sidebar-main',
        esc_html__('Dùng ở các trang bài viết', 'medis' )
    );

    // sidebar woo
    if ( class_exists( 'Woocommerce' ) ) :
        medis_register_sidebar(
            esc_html__( 'Sidebar shop', 'medis' ),
            'sidebar-wc',
            esc_html__( 'Dùng ở trang danh mục sản phẩm.', 'medis' )
        );

        medis_register_sidebar(
            esc_html__( 'Sidebar sản phẩm', 'medis' ),
            'sidebar-wc-product',
            esc_html__( 'Dùng cho trang chi tiết sản phẩm', 'medis' )
        );
    endif;

	// sidebar footer
	$opt_number_columns = medis_get_footer_sidebar_columns_count();

	for ( $i = 1; $i <= $opt_number_columns; $i ++ ) {
		medis_register_sidebar(
            sprintf( esc_html__( 'Sidebar chân trang cột %d', 'medis' ), $i ),
            PREFIX_SIDEBAR_FOOTER_COLUMN . $i,
			esc_html__( 'Dùng ở chân trang', 'medis' )
        );
	}
}
add_action( 'widgets_init', 'medis_multiple_widget_init' );