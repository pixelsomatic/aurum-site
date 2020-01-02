 <?php
 /*------------------------------------*\
     Includes / Requires
 \*------------------------------------*/
 require_once(get_template_directory().'/model/index.php');
 
 
 /*------------------------------------*\
     Functions
 \*------------------------------------*/
 
 // Paginação
 function pagination()
 {
     global $wp_query;
     $big = 999999999;
     echo paginate_links(array(
         'base' => str_replace($big, '%#%', get_pagenum_link($big)),
         'format' => '?paged=%#%',
         'current' => max(1, get_query_var('paged')),
         'total' => $wp_query->max_num_pages
     ));
 }
 
 function images_path()
 {
     return get_template_directory_uri(). '/public/assets/images';
 }
 
 // Localisation Support
 load_theme_textdomain('aurum', get_template_directory() . '/languages');
 
 /*------------------------------------*\
     Actions + Filters + ShortCodes
 \*------------------------------------*/
 //Add Actions
 
 // Add Theme suports
 add_theme_support('post-thumbnails'); // Adiciona a imagem de descricao no post
 add_theme_support('menus');
 add_image_size('large', 700, '', true);
 add_image_size('medium', 250, '', true);
 add_image_size('small', 120, '', true);
 add_image_size('custom-size', 700, 200, true);
 
 // disable admin bar for all users
 show_admin_bar(false);

  function  sections_endpoint( $request_data ) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page'=>-1, 
        'numberposts'=>-1
    );
    $posts = get_posts($args);
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
    }
    return  $posts;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'sections/v1', '/post/', array(
        'methods' => 'GET',
        'callback' => 'sections_endpoint'
    ));
});

add_action('init', 'wp55290310_rewrite_rules');

