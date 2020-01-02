<?php
//  Insercao de termos pré definidos
function register_terms(){
  
  $terms = array (
    // Termos de noticias
    array(
      'name' => 'Destaque',
      'description' => 'Não altere o slug deste termo',
      'slug' => 'banner',
      'taxonomy' => 'category_news' 
    ),
    array(
      'name' => 'Agenda',
      'description' => 'Não altere o slug deste termo',
      'slug' => 'schedule',
      'taxonomy' => 'category_news' 
    ),
  );

  foreach ($terms as $row) {

    if( !term_exists( $row['slug'], $row['taxonomy'])) {  //irei alterar para verificar se o slug ja existe ao inves do nome
      $retorno = wp_insert_term(
        $row['name'],
        $row['taxonomy'],
        array(
          'description' => $row['description'],
          'slug'        =>  $row['slug']
        )
      );   
    }
  } 
}

add_action('init', 'register_terms'); 
