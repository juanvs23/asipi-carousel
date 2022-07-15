<?php
if ( ! function_exists('asipi_carousel_slide_function') ) {

    // Register Custom Post Type
    function asipi_carousel_slide_function() {
    
        $labels = array(
            'name'                  => _x( 'Slides', 'Post Type General Name', 'asipi-carousels' ),
            'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'asipi-carousels' ),
            'menu_name'             => __( 'Asipi slide', 'asipi-carousels' ),
            'name_admin_bar'        => __( 'Asipi slide', 'asipi-carousels' ),
            'archives'              => __( 'Slides', 'asipi-carousels' ),
            'attributes'            => __( 'Atributos del slide', 'asipi-carousels' ),
            'parent_item_colon'     => __( 'Slide principal:', 'asipi-carousels' ),
            'all_items'             => __( 'Todos los Slides', 'asipi-carousels' ),
            'add_new_item'          => __( 'Añadir nuevo slide', 'asipi-carousels' ),
            'add_new'               => __( 'Añadir nuevo Slide', 'asipi-carousels' ),
            'new_item'              => __( 'Nuevo slide', 'asipi-carousels' ),
            'edit_item'             => __( 'Editar slide', 'asipi-carousels' ),
            'update_item'           => __( 'Actualizar slide', 'asipi-carousels' ),
            'view_item'             => __( 'Ver slide', 'asipi-carousels' ),
            'view_items'            => __( 'Ver slides', 'asipi-carousels' ),
            'search_items'          => __( 'Buscar slide', 'asipi-carousels' ),
            'not_found'             => __( 'No encontrado', 'asipi-carousels' ),
            'not_found_in_trash'    => __( 'Non encontrado en la basura', 'asipi-carousels' ),
            'featured_image'        => __( 'Imagen destacada', 'asipi-carousels' ),
            'set_featured_image'    => __( 'Conf. imagen destacada', 'asipi-carousels' ),
            'remove_featured_image' => __( 'Remover destacada', 'asipi-carousels' ),
            'use_featured_image'    => __( 'usar como imagen destacada', 'asipi-carousels' ),
            'insert_into_item'      => __( 'Insertar en un slide', 'asipi-carousels' ),
            'uploaded_to_this_item' => __( 'Actualizar slide', 'asipi-carousels' ),
            'items_list'            => __( 'Lista de slides', 'asipi-carousels' ),
            'items_list_navigation' => __( 'Lista de navegación', 'asipi-carousels' ),
            'filter_items_list'     => __( 'Filtro de slides', 'asipi-carousels' ),
        );
        $args = array(
            'label'                 => __( 'Slide', 'asipi-carousels' ),
            'description'           => __( 'Slide para los carruseles de asipi', 'asipi-carousels' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
            'taxonomies'            => array( 'asipi_carousel_name' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-slides',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'rewrite'               => false,
            'capability_type'       => 'post',
            'show_in_rest'          => false,
        );
        register_post_type( 'asipi_carousel_slide', $args );
    
    }
    add_action( 'init', 'asipi_carousel_slide_function', 0 );
    
    }

if ( ! function_exists( 'asipi_carousels_name' ) ) {

    // Register Custom Taxonomy
    function asipi_carousels_name() {
    
        $labels = array(
            'name'                       => _x( 'Nombres de los carruseles', 'Taxonomy General Name', 'asipi-carousels' ),
            'singular_name'              => _x( 'Nombre de carrusel', 'Taxonomy Singular Name', 'asipi-carousels' ),
            'menu_name'                  => __( 'Nombre del carrusel', 'asipi-carousels' ),
            'all_items'                  => __( 'Todos los carruseles', 'asipi-carousels' ),
            'parent_item'                => __( 'Carrusel padre', 'asipi-carousels' ),
            'parent_item_colon'          => __( 'Carrusel padre:', 'asipi-carousels' ),
            'new_item_name'              => __( 'Nuevo carrusel', 'asipi-carousels' ),
            'add_new_item'               => __( 'Añade nuevo carrusel', 'asipi-carousels' ),
            'edit_item'                  => __( 'Editar carrrusel', 'asipi-carousels' ),
            'update_item'                => __( 'Actualizar carrusel', 'asipi-carousels' ),
            'view_item'                  => __( 'Ver carrusel', 'asipi-carousels' ),
            'separate_items_with_commas' => __( 'Carrusel separado por comas', 'asipi-carousels' ),
            'add_or_remove_items'        => __( 'Remover carrusel', 'asipi-carousels' ),
            'choose_from_most_used'      => __( 'Carruseles mas populares', 'asipi-carousels' ),
            'popular_items'              => __( 'Carrusel popular', 'asipi-carousels' ),
            'search_items'               => __( 'Buscar carrrusel', 'asipi-carousels' ),
            'not_found'                  => __( 'No encontrado', 'asipi-carousels' ),
            'no_terms'                   => __( 'No hay carrusel', 'asipi-carousels' ),
            'items_list'                 => __( 'Lista de carruseles', 'asipi-carousels' ),
            'items_list_navigation'      => __( 'Items list navigation', 'asipi-carousels' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => false,
            'show_in_rest'               => false,
        );
        register_taxonomy( 'asipi_carousel_name', array( 'asipi_carousel_slide' ), $args );
    
    }
    add_action( 'init', 'asipi_carousels_name', 0 );
    
    }
    