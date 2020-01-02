<?php

function custom_menu_footer($menu_name)
{
    $menu_items = Util::getMenuItems($menu_name);

    foreach ((array) $menu_items as $key => $item) {
        $menu_list .= '<div class="col-md mb-md-0 mb-3">'.
                        '<h5>'.
                            $item->title.
                        '</h5>'.
                        '<ul class="list-unstyled">';
        foreach ($item->subitems as $subitem) {
            $menu_list .= '<li>'.
                            '<a href="'. $subitem->url .'">'. $subitem->title .'</a>'.
                        '</li>';
        }

        $menu_list .= '</ul>';
        $menu_list .= '</div>';
    }
    // mapa do site no footer;
    // echo $menu_list;
}
