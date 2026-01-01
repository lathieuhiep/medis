<?php
get_header();

$medis_check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
$medis_class_elementor = '';
if ( $medis_check_elementor ) :
	$medis_class_elementor = ' site-container-elementor';
endif;
?>
    <main class="site-container<?php echo esc_attr( $medis_class_elementor ); ?>">
		<?php
		if ( $medis_check_elementor ) :
			get_template_part( 'template-parts/page/content', 'page-elementor' );
		else:
			get_template_part( 'template-parts/page/content', 'page' );
		endif;
		?>
    </main>
<?php
get_footer();