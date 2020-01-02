<?php
/*
 * Remove menus items from wordpress admin
 */

function remove_menus()
{
   //remove_menu_page('index.php');                  //Dashboard
  //remove_menu_page( 'jetpack' );                    //Jetpack*
  //remove_menu_page('edit.php');                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page('edit-comments.php');          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page('edit.php?post_type=acf-field-group'); // Custom Fields

  $userdata = wp_get_current_user();
}  
add_action('admin_menu', 'remove_menus');

/*
 * Mensagem de erro customizada para o login
 */
// Insert into your functions.php and have fun creating login error msgs
function guwp_error_msgs()
{
    // insert how many msgs you want as an array item. it will be shown randomly
    $custom_error_msgs = array(
    '<strong>Erro:</strong> Senha ou usuário inválido!',
    '<strong>Erro:</strong> Senha ou usuário inválido!',
  );
    // get random array item to show
    return $custom_error_msgs[array_rand($custom_error_msgs)];
}
add_filter('login_errors', 'guwp_error_msgs');
