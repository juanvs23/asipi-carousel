<?php
$prefix_taxonomy = 'asipi_carousel_name';

function asipi_carousels_name_add_meta_fields() {
?>
<div class="asipi-carousel-config">
    <h3>Configuración del carrusel</h3>
<div class="form-field term-meta-wrap">
        <label for="term_meta[color-setting]">
           <b>
               <?php esc_html_e( 'Color del tema del carrusel', 'asipi-carousels' ); ?>
           </b> 
        </label>
        <input type="text" name="term_meta[color-setting]" value="#bada55" class="my-color-field" data-default-color="#effeff" />
        <p class="description">
            <?php esc_html_e( 'Color de los botones y flechas del carrusel', 'asipi-carousels' ); ?>
        </p>
</div>
<div class="form-field term-meta-wrap">
        <label for="term_meta[color-text-setting]">
          <b>  <?php esc_html_e( 'Color de los textos', 'asipi-carousels' ); ?></b>
        </label>
        <input type="text" name="term_meta[color-text-setting]" value="#bada55" class="my-color-field" data-default-color="#effeff" />
        <p class="description">
            <?php esc_html_e( 'Colores del texto de los carruseles', 'asipi-carousels' ); ?>
        </p>
</div>
</div>
<div class="form-field term-meta-wrap">
        <label for="term_meta[arrows-and-dots]">
          <b>  <?php esc_html_e( 'Color de los textos', 'asipi-carousels' ); ?></b>
        </label>
       <select name="term_meta[arrows-and-dots]" id="arrows-and-dots">
        <option value="0">Sin paginación, sin navegación</option>
        <option value="1">Navegación</option>
        <option value="2">Paginación</option>
        <option value="3">Paginación y navegación</option>
       </select>
        <p class="description">
            <?php esc_html_e( 'Manejo de la navegación y de la paginación', 'asipi-carousels' ); ?>
        </p>
</div>

<?php
}
add_action( sprintf( '%s_add_form_fields', $prefix_taxonomy ), 'asipi_carousels_name_add_meta_fields' );
add_action( sprintf( '%s_edit_form_fields', $prefix_taxonomy ), 'asipi_carousels_name_add_meta_fields' );