<?php

function register_widgets(){

    if (function_exists('register_sidebar')) {

        $widgets = array(
            //'exemplo-widget'=> array('Exemplo nome widget', 'Descricao do widget'),
            'gallery-text'  => 'Galeria - Descrição',
            'gallery-img'   => 'Galeria - Imagem',
            'gallery'       => 'Galeria - Fotos',
            'footer-left'   => 'Footer - Lado esquerdo',
            'footer-right'  => 'Footer - Lado direito',
            'header-default-background' => 'Header - banner padrão',
        );

        foreach ($widgets as $id => $value) {
            $name = is_array($value) ? $value[0] : $value;
            $description = is_array($value) ? $value[1] : '';
            register_sidebar(array(
                'name' => __($name, 'morrinhos'),
                'description' => __($description),
                'id' => $id,
                'before_widget' => '<div id="%1$s" class="%2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h1>',
                'after_title' => '</h1>'
            ));
            
        }
    }

}
add_action('init', 'register_widgets'); 
