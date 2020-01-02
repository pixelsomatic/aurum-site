<?php

/*
 * Cria posts do tipo pagina no banco de dados do wordpress
 */

function create_pages_fly($pageName,$slug, $template) {
  $createPage = array(
    'post_title' => $pageName,
    'post_content' => 'Substitua esse conteúdo se necessário.',
    'post_status' => 'publish',
    'post_author' => 1,
    'post_type' => 'page',
    'post_name' => $slug,
    'page_template' => $template // TODO not working
  );

  wp_insert_post($createPage);
}

function check_pages_live() {
}

add_action('init', 'check_pages_live');