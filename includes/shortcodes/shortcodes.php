<?php
function asipi_carousel_shortcode_function( $atts ) {
     $post_type = 'asipi_carousel_slide';
	 $asipi_carousel_taxonomy = 'asipi_carousel_name';
	// Attributes
	$atts = shortcode_atts(
		array(
			'carousel' => '',
		),
		$atts,
		'asipi_carousel_shortcode'
	);
	$carousel = $atts['carousel'];
	$term = get_term_by('name', $carousel,$asipi_carousel_taxonomy);
	$t_id = !is_string($term) ?$term->term_id:'';
        $design = get_term_meta( $t_id, 'slider-design-setting', true )?get_term_meta( $t_id, 'slider-design-setting', true ):'no_text';//diseño
        $slider_color = get_term_meta( $t_id, 'slider-color-setting', true )?get_term_meta( $t_id, 'slider-color-setting', true ):'#fff';
        $text_color = get_term_meta( $t_id, 'slider-text-color-setting', true )?get_term_meta( $t_id, 'slider-text-color-setting', true ):'#fff';
        $arrow_dots = get_term_meta( $t_id, 'arrow-dots', true )?get_term_meta( $t_id, 'arrow-dots', true ):'0';
        $desktop = get_term_meta( $t_id, 'desktop', true )?get_term_meta( $t_id, 'desktop', true ):'';
        $tablet = get_term_meta( $t_id, 'tablet', true )?get_term_meta( $t_id, 'tablet', true ):'';
        $movil = get_term_meta( $t_id, 'movil', true )?get_term_meta( $t_id, 'movil', true ):'';

	$styleId="{$term->slug}";
	ob_start();
echo '<style>';
echo  "#{$styleId} .asipi-button-prev,
       #{$styleId} .asipi-button-next{";
echo	'background-color:'.$slider_color.';';
echo '}';
echo  "#{$styleId} .asipi-swiper-title{";
echo "color:{$slider_color};";
echo "margin-bottom:10px;";
echo '}';
echo "#{$styleId} .asipi-pagination span{";
echo "background-color:{$slider_color};";
echo "}";
echo "
#{$styleId}  .asipi-container a.asipi-button {
	padding: 7px 40px;
	font-size: 16px;
	font-weight: 700;
	transition: 0.3s;
	color: {$text_color};
	background: {$slider_color};
	border: 2px solid {$slider_color};
  }
  #{$styleId}  .asipi-container a.asipi-button:hover {
	color: {$slider_color};
	background: {$text_color};
	border: 2px solid {$text_color};
  }
";
echo '</style>';

?>

<div  class="asipi-swiper" id="<?php echo $styleId; ?>"  data-swiper='{"id":"<?php echo $styleId; ?>","movil":"<?php echo $movil; ?>","tablet":"<?php echo $tablet; ?>","desktop":"<?php echo $desktop; ?>","autplay":"true"}'>
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
	<?php
	$args = array( 
		'post_type' => $post_type,
    	'tax_query' => array(
			array(
				'taxonomy' => $asipi_carousel_taxonomy,
				'field'    => 'slug',
				'terms'    => $styleId,
			),
    	)
	);
	$loop = new WP_Query($args);
    if($loop->have_posts()){
		while ( $loop->have_posts() ) :
			$loop->the_post();
			?>
		
		<div class="swiper-slide">
			<div class="asipi-container">
				
				<?php
				//no_text
				//box
				//image-and-text
				
				$featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true );
				$slide_color = get_post_meta( get_the_ID(), 'slide-color', true )?get_post_meta( get_the_ID(), 'slide-color', true ):'';
				$text_button = get_post_meta( get_the_ID(), 'text-button', true )?get_post_meta( get_the_ID(), 'text-button', true ):'Ver más';
				$url_button = get_post_meta( get_the_ID(), 'url-button', true )?get_post_meta( get_the_ID(), 'url-button', true ):get_the_permalink();
			    if($design=="no_text"):
				echo "<a href='{$url_button}'>";
				endif
				?>
				
				<img id="<?php echo get_the_ID();?>" class="asipi-image" 
					src="<?php echo $featured_img[0]; ?>" 
					height="<?php echo $featured_img[2]; ?>" 
					width="<?php echo $featured_img[1]; ?>" 
					alt="<?php echo $featured_img[3]==''?get_the_title():$featured_img[3]; ?>" >
			   <?php if($design=="no_text"): 
				echo '</a>';
			   endif;
				?>	
			
			   <?php if($design=="box"): ?>
				<div class="asipi-overlay"></div>
			   <?php endif; ?>
			   <?php if($design=="image-and-text"|| $design=="box" ): ?>
				<div class="asipi-text<?php echo $design=="box"?' box-design':'';?>">
					<h2 class="asipi-swiper-title">
						<?php echo get_the_title();?>
					</h2>

					<a href="<?php echo $url_button; ?>" class="asipi-button" ><?php echo $text_button; ?></a>
				</div>
			   <?php endif; ?>


			
			</div>
		</div>
   <?php
		endwhile;
	}else{
		?>
		<p><?php esc_html_e( 'No hay en resultados', 'asipi-carousels' ); ?></p>
		<?php
	};

	wp_reset_postdata();
   ?>
    
  </div>
  <!-- If we need pagination -->
  <?php
 if($arrow_dots =="2" || $arrow_dots =="3" ):
 ?>

  <div class="asipi-pagination"></div>
  <?php
endif;
?>
  <!-- If we need navigation buttons -->
 <?php
 if($arrow_dots =="1" || $arrow_dots =="3" ):
 ?>
  <div class="asipi-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg></div>
  <div class="asipi-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></div>
<?php
endif;
?>
 <?php
 //next issue
 if($arrow_dots =="5"):
 ?>
  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
<?php
endif;
?>
</div>

<?php
return ob_get_clean();
}
add_shortcode( 'asipi_carousel_shortcode', 'asipi_carousel_shortcode_function' );