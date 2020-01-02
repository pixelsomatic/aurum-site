 <?php 
  require_once(get_template_directory().'/model/util.php');
  require_once(get_template_directory().'/model/base/pages.php');
  require_once(get_template_directory().'/model/base/config-admin.php');
  require_once(get_template_directory().'/model/base/enqueue.php');
  require_once(get_template_directory().'/model/base/widgets.php');
  require_once(get_template_directory().'/model/base/disable-visual-editor.php');
  require_once(get_template_directory().'/model/post-type/index.php');
  require_once(get_template_directory().'/model/base/terms.php');
   
  // Menus
  require_once(get_template_directory().'/model/base/menu-header.php');
  require_once(get_template_directory().'/model/base/menu-footer.php');
  require_once(get_template_directory().'/model/base/menu-sidebar.php');
  // Registra menus pre defenidos
  function register_menu()
  {
      register_nav_menus(array(
          'footer-menu' => 'Footer Menu',
          'head-menu' => 'Head Menu',
          'sidebar-menu' => 'Acesso Rápido',
          'restrito-menu' => 'Acesso Restrito',
          'links-uteis-menu' => 'Links Úteis',
          'portal-transparecncia-menu' => 'Portal Transparência'
     ));
  }
  add_action('init', 'register_menu');

