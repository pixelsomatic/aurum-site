<?php

class Util {

    public static function DOMinnerHTML(DOMNode $element) {
        $innerHTML = '';
        $children  = $element->childNodes;
        foreach ($children as $child) {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }

    public static function makeMenuItemsHierarchy($menu_items = array()) {
        $return_menus = array();
        if ($menu_items) {
            foreach ($menu_items as $item) {
                if ($item->menu_item_parent == 0) {
                    $return_menus[$item->ID] = $item;
                    $return_menus[$item->ID]->subitems = array();
                }
            }

            foreach ($menu_items as $item) {
                if ($return_menus[$item->menu_item_parent] && $item->menu_item_parent != 0) {
                    $return_menus[$item->menu_item_parent]->subitems[$item->ID] = $item;
                    $return_menus[$item->menu_item_parent]->subitems[$item->ID]->subitems = array();
                    foreach ($menu_items as $itemB) {
                        if ($item->ID == $itemB->menu_item_parent) {
                            $return_menus[$item->menu_item_parent]->subitems[$item->ID]->subitems[] = $itemB;
                        }
                    }
                }
            }
        }
        return $return_menus;
    }

    public static function getMenuItems($menu_name) {
        $menu_items = array();
        if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $menu_items = self::makeMenuItemsHierarchy($menu_items);
        }
        return $menu_items;
    }

    public static function getWidget($widget_id) {
        if (function_exists('dynamic_sidebar')) {
            ob_start();
            dynamic_sidebar($widget_id);
            $widget = ob_get_contents();
            ob_end_clean();
            return $widget;
        }
    }

    public static function getWidgetObj($widget_id, $allow_html = null) {
        $html = self::getWidget($widget_id);
        $widgets = array();
        $widgets['items'] = array();
        if ($html) {
            $dom = new DOMDocument();
            $dom->loadHTML('<?xml encoding="utf-8" ?>'.$html);
            $xpath = new DOMXpath($dom);
            $titles = $xpath->query('//div[@class="widget_text"]/h1');
            $contents = $xpath->query('//div[@class="widget_text"]/div[@class="textwidget"]');
            
            if ($titles) {
                foreach ($titles as $title) {
                    $widgets['items'][] = array('title'=>$title->nodeValue);
                }
            }
            if ($contents) {
                foreach ($contents as $key => $content) {
                    $content_str = $allow_html ? self::DOMinnerHTML($content) : $content->nodeValue;
                    if (!isset($widgets['items'][$key])) {
                        $widgets['items'][] = array('content'=>$content_str);
                    } else {
                        $widgets['items'][$key]['content'] = $content_str;
                    }
                }   
            }
        }
        return $widgets;
    }

    public static function getWidgetImgPath($widget_id) {
        $html = self::getWidget($widget_id);
        $widgets = array();
        if ($html) {
            $dom = new DOMDocument();
            $dom->loadHTML('<?xml encoding="utf-8" ?>'.$html);

            $tags = $dom->getElementsByTagName('img');
            
            if ($tags) {
                foreach ($tags as $tag) {     
                    $widgets[] = $tag->getAttribute('src');
                }
            }
        }

        return $widgets;
    }

    public static function getFirstWidgetObj($widget_id) {
        $widgets = self::getWidgetObj($widget_id);
        return array_shift($widgets['items']);
    }
    //Funcao para  receber um string e limitar seus caracteres a uma quantidade, por fim retornar a nova string
    public static function limitCharacters($qtd,$string) {
        if(strlen($string) > $qtd) {
            $string = substr($string, 0, $qtd);
            $string = $string . '...';
        }
        return $string;
    }

    public static function datePtToEn($date){
        $year = substr($date, 6, 4);
        $month = substr($date, 3, 2);
        $day = substr($date, 0, 2);
        $time = substr($date, 10);
        return $year."-".$month."-".$day.' '.$time;
    }

    public static function displayDate($timestamp) {
        $str = '';
        if (get_locale() == 'en_US') {
            $str = strftime(__(date('F',$timestamp), 'morrinhos')." %d, %Y", $timestamp);
        } else {
            $str = strftime("%d de ".__(date('F',$timestamp), 'morrinhos')." de %Y", $timestamp);
        }
        return $str;
    }

    public static function isCurrentUrl($url) {
        $url = str_replace(site_url(), '', $url);
        if (!$url || $url == '/') {
            return false;
        }
        return strpos($_SERVER['REQUEST_URI'], $url) !== false;
    }

    public static function removeHttp($url) {
        return str_replace(array('https://','http://'), '', $url);
    }

    function normalize ($string) {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );
        return strtr($string, $table);
    }

    public static function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      //$text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      $text = self::normalize($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

} 
