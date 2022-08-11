<?php

function asipi_carousel_slide_intputs(){

    add_meta_box( 'slide_input_color', 
                   __( 'Configuración del slide', 'asipi-carousels' ), 
                   'asipi_carousel_slide_html',
                   'asipi_carousel_slide', 
                  'advanced', 
                  'high', 
                  null
                );
}
add_action( 'add_meta_boxes', 'asipi_carousel_slide_intputs' );
function asipi_carousel_slide_html($post){

    $slide_color = get_post_meta( $post->ID, 'slide-color', true )?get_post_meta( $post->ID, 'slide-color', true ):'';
    $text_button = get_post_meta( $post->ID, 'text-button', true )?get_post_meta( $post->ID, 'text-button', true ):'Ver más';
    $url_button = get_post_meta( $post->ID, 'url-button', true )?get_post_meta( $post->ID, 'url-button', true ):'';
     $blank = get_post_meta( $post->ID, 'url-blank', true )=='on'?'checked="checked"':'';

    ?>
    <div class="asipi_slide_inputs_content">
         <div class="form-field term-meta-wrap">
                <label for="slide-meta[url-blank]">
                <b><?php esc_html_e( 'Nueva pestaña', 'asipi-carousels' ); ?></b>
                </label>
                <input type="checkbox" 
            name="slide-meta[url-blank]" 
            
            id="slide-meta[url-blank]" 
            
            <?php echo  $blank; ?>
            data-default-color="" />
                <p class="description">
                    <?php esc_html_e( 'Abre el enlace en otra pestaña', 'asipi-carousels' ); ?>
                </p>
        </div>
        <div class="form-field term-meta-wrap">
                <label for="slide-meta[slide-color]">
                <b><?php esc_html_e( 'Color del slide', 'asipi-carousels' ); ?></b>
                </label>
                <input type="text" 
            name="slide-meta[slide-color]" 
            value="<?php echo $slide_color; ?>" 
            id="slide-meta[slide-color]" 
            class="my-color-field" 
            data-default-color="" />
                <p class="description">
                    <?php esc_html_e( 'Color personalizado del slider', 'asipi-carousels' ); ?>
                </p>
        </div>
        <div class="form-field term-meta-wrap">
                <label for="slide-meta[text-button]">
                <b><?php esc_html_e( 'Texto del boton', 'asipi-carousels' ); ?></b>
                </label>
                <input type="text" 
            name="slide-meta[text-button]" 
            value="<?php echo $text_button; ?>"
            placeholder="Ver más" 
            id="slide-meta[text-button]" 
            class="regular-text" />
                <p class="description">
                    <?php esc_html_e( 'Texto ubicado en boton', 'asipi-carousels' ); ?>
                </p>
        </div>
        <div class="form-field term-meta-wrap">
                <label for="slide-meta[url-button]">
                <b><?php esc_html_e( 'Url del boton', 'asipi-carousels' ); ?></b>
                </label>
                <input type="text" 
            name="slide-meta[url-button]" 
            value="<?php echo $url_button ; ?>"
            placeholder="http://" 
            id="slide-meta[url-button]" 
            class="regular-text" />
                <p class="description">
                    <?php esc_html_e( 'URL a la cual redireccionara el boton', 'asipi-carousels' ); ?>
                </p>
        </div>
    </div>
    <?php
}
function asipi_carousel_slide_save_post($post_id){
    if ( ! isset( $_POST['slide-meta'] ) ) {
        return;
    }

    foreach($_POST['slide-meta'] as $key => $value){
        update_post_meta( $post_id, $key, $value );
    }
}
add_action( 'save_post', 'asipi_carousel_slide_save_post' );