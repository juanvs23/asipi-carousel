<?php
$prefix_taxonomy = 'asipi_carousel_name';
function asipi_carousels_name_add_meta_fields($term) {
   
    
        $t_id = !is_string($term) ?$term->term_id:'';
        $design = get_term_meta( $t_id, 'slider-design-setting', true )?get_term_meta( $t_id, 'slider-design-setting', true ):'no_text';
        $slider_color = get_term_meta( $t_id, 'slider-color-setting', true )?get_term_meta( $t_id, 'slider-color-setting', true ):'#fff';
        $text_color = get_term_meta( $t_id, 'slider-text-color-setting', true )?get_term_meta( $t_id, 'slider-text-color-setting', true ):'#fff';
        $arrow_dots = get_term_meta( $t_id, 'arrow-dots', true )?get_term_meta( $t_id, 'arrow-dots', true ):'0';
        $desktop = get_term_meta( $t_id, 'desktop', true )?get_term_meta( $t_id, 'desktop', true ):'';
        $tablet = get_term_meta( $t_id, 'tablet', true )?get_term_meta( $t_id, 'tablet', true ):'';
        $movil = get_term_meta( $t_id, 'movil', true )?get_term_meta( $t_id, 'movil', true ):'';
    ?>

<div class="asipi-carousel-config">
    <h2><?php esc_html_e( 'Configuración del carrusel', 'asipi-carousels' )?> </h2>
 <div class="color-and-design">
    <h3><?php esc_html_e( 'Color y diseño de los slider', 'asipi-carousels' )?></h3>
    <div class="form-field term-meta-wrap">
        <label for="term_meta[slider-design-setting]">
            <b><?php esc_html_e( 'Diseño del slider', 'asipi-carousels' ); ?></b> 
        </label>
        <select name="term_meta[slider-design-setting]"  id="term_meta[slider-design-setting]">
            <option <?php echo $design=='no_text'?'selected':''; ?> value="no_text">Solo imagen</option>
            <option <?php echo $design=='box'?'selected':''; ?> value="box">Caja de imagen</option>
            <option <?php echo $design=='image-and-text'?'selected':''; ?> value="image-and-text">Imagen y texto</option>
        </select>
        <p class="description">
            <?php esc_html_e( 'configura como se despliega los datos en el slider', 'asipi-carousels' ); ?>
        </p>
    </div>
    <div class="form-field term-meta-wrap">
        <label for="term_meta[slider-color-setting]">
            <b><?php esc_html_e( 'Color del tema del carrusel', 'asipi-carousels' ); ?></b> 
        </label>
        <input type="text" 
            name="term_meta[slider-color-setting]" 
            value="<?php echo $slider_color; ?>" 
            id="term_meta[slider-color-setting]" 
            class="my-color-field" 
            data-default-color="#effeff" />
        <p class="description">
            <?php esc_html_e( 'Color de los botones y flechas del carrusel', 'asipi-carousels' ); ?>
        </p>
    </div>
    <div class="form-field term-meta-wrap">
        <label for="term_meta[slider-text-color-setting]">
            <b><?php esc_html_e( 'Color de los textos', 'asipi-carousels' ); ?></b>
        </label>
        <input type="text" 
            name="term_meta[slider-text-color-setting]" 
            value="<?php echo $text_color;?>" 
            id="term_meta[slider-text-color-setting]" 
            class="my-color-field" 
            data-default-color="#effeff" />
        <p class="description">
            <?php esc_html_e( 'Colores del texto de los carruseles', 'asipi-carousels' ); ?>
        </p>
    </div>
 </div>
 <div class="carousel-setting">
    <h3><?php esc_html_e( 'Configuración del carrusel', 'asipi-carousels' )?></h3>
    <div class="form-field term-meta-wrap">
            <label for="term_meta[arrow-dots]">
            <b><?php esc_html_e( 'Navegación y pagianción del carousel', 'asipi-carousels' ); ?></b>
            </label>
        <select name="term_meta[arrow-dots]"  id="term_meta[arrow-dots]">
            <option <?php echo $arrow_dots=='0'?'selected':''; ?> value="0">Sin flechas y botones</option>
            <option <?php echo $arrow_dots=='1'?'selected':''; ?> value="1">Solo flechas</option>
            <option <?php echo $arrow_dots=='2'?'selected':''; ?> value="2">Solo botones</option>
            <option <?php echo $arrow_dots=='3'?'selected':''; ?> value="3">Flechas y botones</option>
            

        </select>
            <p class="description">
                <?php esc_html_e( 'Muestra de paginación y navegación', 'asipi-carousels' ); ?>
            </p>
    </div>
    <div class="form-field term-meta-wrap">
            <label for="term_meta[desktop]">
            <b><?php esc_html_e( 'Resolución escritorio', 'asipi-carousels' ); ?></b>
            </label>
        <select name="term_meta[desktop]" id="term_meta[desktop]">
            <option <?php echo $desktop=='1'?'selected':''; ?> value="1">1</option>
            <option <?php echo $desktop=='2'?'selected':''; ?> value="2">2</option>
            <option <?php echo $desktop=='3'?'selected':''; ?> value="3">3</option>
            <option <?php echo $desktop=='4'?'selected':''; ?> value="4">4</option>
            <option <?php echo $desktop=='5'?'selected':''; ?> value="5">5</option>

        </select>
            <p class="description">
                <?php esc_html_e( 'Cantidad de slider resolucion >992px', 'asipi-carousels' ); ?>
            </p>
    </div>
    <div class="form-field term-meta-wrap">
            <label for="term_meta[tablet]">
            <b><?php esc_html_e( 'Resolución tablet', 'asipi-carousels' ); ?></b>
            </label>
            <select name="term_meta[tablet]" id="term_meta[tablet]">
            <option <?php echo $tablet=='1'?'selected':''; ?> value="1">1</option>
            <option <?php echo $tablet=='2'?'selected':''; ?> value="2">2</option>
            <option  <?php echo $tablet=='3'?'selected':''; ?> value="3">3</option>
            <option <?php echo $tablet=='4'?'selected':''; ?> value="4">4</option>
            <option  <?php echo $tablet=='5'?'selected':''; ?> value="5">5</option>

        </select>
            <p class="description">
                <?php esc_html_e( 'Cantidad de slider resolucion >768px', 'asipi-carousels' ); ?>
            </p>
    </div>
    <div class="form-field term-meta-wrap">
            <label for="term_meta[movil]">
            <b><?php esc_html_e( 'Resolución movil', 'asipi-carousels' ); ?></b>
            </label>
            <select name="term_meta[movil]" id="term_meta[movil]">
            <option <?php echo $movil=='1'?'selected':''; ?> value="1">1</option>
            <option <?php echo $movil=='2'?'selected':''; ?> value="2">2</option>
            <option <?php echo $movil=='3'?'selected':''; ?> value="3">3</option>
            <option <?php echo $movil=='4'?'selected':''; ?> value="4">4</option>
            <option <?php echo $movil=='5'?'selected':''; ?> value="5">5</option>

        </select>
            <p class="description">
                <?php esc_html_e( 'Cantidad de slider resolucion >0', 'asipi-carousels' ); ?>
            </p>
    </div>
 </div>
</div>
<?php
}
add_action( sprintf( '%s_add_form_fields', $prefix_taxonomy ), 'asipi_carousels_name_add_meta_fields' );
add_action( sprintf( '%s_edit_form_fields', $prefix_taxonomy ), 'asipi_carousels_name_add_meta_fields' );

function asipi_carousels_name_save_field($term_id){
    if ( ! isset( $_POST['term_meta'] ) ) {
        return;
    }
    foreach ($_POST['term_meta'] as $key=>$value){
        update_term_meta( $term_id, $key, $value );
    }
}

add_action( sprintf( 'edited_%s', $prefix_taxonomy ), 'asipi_carousels_name_save_field' );  
add_action( sprintf( 'create_%s', $prefix_taxonomy ), 'asipi_carousels_name_save_field' );