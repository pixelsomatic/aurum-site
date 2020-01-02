<?php

function custom_menu_sidebar($menu_name, $with_icon = null)
{
    $menu_items = Util::getMenuItems($menu_name);

    $menu_list .= '<div id="accordion'.$menu_name.'">';
    foreach ((array) $menu_items as $key => $item) {
        $current = '';
        if (Util::isCurrentUrl($item->url)) {
            $current = 'current';
        } else {
            foreach ($item->subitems as $subitem) {
                if (Util::isCurrentUrl($subitem->url)) {
                    $current = 'current';
                }
            }
        }


        if ($item->subitems) {
            $menu_list .= '<div class="panel panel-collapse mb-2">';
            $menu_list .= '<button class="btn-collapse text-cyan '.$current.' collapsed" type="button" data-toggle="collapse" data-target="#collapseLinks'.$menu_name.$key.'" aria-expanded="false" aria-controls="collapseLinks" >';
            $menu_list .=   '<p>' . $item->title . '</p><span class="plus"></span>';
            $menu_list .= '</button>';
        } else {
            $with_icon_class = $with_icon ? 'btn-with-icon' : '';
            
            //Se url não contém localhost, ela abre em nova aba;
            if (strpos($item->url, 'localhost') | strpos($item->url, 'https://www.morrinhosdosul.rs.gov.br/')) {
                $blank = "_self";
            } else {
                $blank = "_blank";
            }
            $menu_list .= '<a class="btn btn-menu '.$with_icon_class.' '.$current.'" href="'. $item->url .'"target="'.$blank.'">'.
                            '<p>'.$item->title.'</p>';
            
            if ($with_icon) {
                $imgFile = Util::slugify($item->title);
                if (!file_exists(get_template_directory().'/public/assets/images/'.$imgFile.'.svg')) {
                    $imgFile = 'default';
                }
                $menu_list .= '<img class="icon" src="'.images_path().'/'.$imgFile.'.svg">';
            }
            $menu_list .= '</a>';
        }

        if (strpos($subitem->url, 'localhost') | strpos($subitem->url, 'https://www.morrinhosdosul.rs.gov.br/')) {
            $blank = "_self";
        } else {
            $blank = "_blank";
        }
        if ($item->subitems) {
            $menu_list .= '<div class="collapse" id="collapseLinks'.$menu_name.$key.'" data-parent="#accordion'.$menu_name.'">';

            foreach ($item->subitems as $subitem) {
                $menu_list .= '<a class="btn-subitem" href="'. $subitem->url .'"target="'.$blank.'">'.
                                    $subitem->title .
                                '</a>';
            }
            $menu_list .= '</div>';
            $menu_list .= '</div>';
        }
    }
    $menu_list .= '</div>';
       
    echo $menu_list;
}
