<?php
function cwp_register_taxonomy_page(){
    register_taxonomy(
        'category_page',
        'page',
        array(
            'label' => __('Categorias'),
            'rewrite' => array('slug' => 'category_page'),
            'hierarchical' => true,
            // Mostra o tipo de categoria de cada post
            'show_admin_column' => true
        )
    );
}
add_action('init', 'cwp_register_taxonomy_page');
