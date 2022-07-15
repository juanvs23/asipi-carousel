<?php
function asipi_carousel_shortcode_function( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'carousel' => '',
		),
		$atts,
		'asipi_carousel_shortcode'
	);
	$carousel = $atts['carousel'];
?>

<h1>Homa mundo</h1>

<?php
}
add_shortcode( 'asipi_carousel_shortcode', 'asipi_carousel_shortcode_function' );