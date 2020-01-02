<?php

function custom_menu_head($menu_name) {
    $menu_items = Util::getMenuItems($menu_name);

    foreach ((array) $menu_items as $key => $item) {
        
        $current = '';
        if (Util::isCurrentUrl($item->url)) {
            $current = 'current';
        } else {
            foreach($item->subitems as $subitem) {
                if (Util::isCurrentUrl($subitem->url)) {
                    $current = 'current';
                }
            }    
        }

        $menu_list .= '<li class="dropdown '.$current.'">';
        $menu_list .= '<a href="'.$item->url.'" '.
                        'class="text-nowrap" '.
                        'role="button" '.
                        'id="dropdownMenuLink-'.$key.'" '.
                        'data-toggle="dropdown" >';
        $menu_list .= $item->title;
        $menu_list .= '</a>';
        if ($item->subitems) {
            $menu_list .= '<div class="dropdown-menu" '.
                            'aria-labelledby="dropdownMenuLink-'.$key.'"">';
            foreach($item->subitems as $subitem) {
                $menu_list .= '<a class="dropdown-item" '.
                                'href="'. $subitem->url .'">'. 
                                    $subitem->title;

                $menu_list .= '</a>';
                if ($subitem->subitems) {
                    foreach ($subitem->subitems as $subitem_child) {
                        $menu_list .= '<a class="dropdown-item dropdown-subitem" '.
                            'href="'. $subitem_child->url .'">'.
                                $subitem_child->title .
                            '</a>';
                    }
                }
            }
            $menu_list .= '</div>';
        }
        $menu_list .= '</li>';
    }
    
    
    echo $menu_list;
}