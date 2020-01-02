<?php
/*
 * Disable visual editor
 */

$arr_disable_visual_editor_and_media = array(
    'awards',
    'certification',
    'history',
    'infrastructure',
    'opportunity',
    'partner',
    'testimony'
);

add_filter( 'user_can_richedit', 'wpse_58501_page_can_richedit' );
function wpse_58501_page_can_richedit( $can )
{
    global $typenow, $arr_disable_visual_editor_and_media;

    if(in_array($typenow, $arr_disable_visual_editor_and_media)){
        return false;
    }

    return $can;
}


// Remove botao de midia do editor
function check_post_type_and_remove_media_buttons() {
    global $typenow, $arr_disable_visual_editor_and_media;

    if(in_array($typenow, $arr_disable_visual_editor_and_media)){
        remove_action('media_buttons', 'media_buttons');
    }
}
add_action('admin_head','check_post_type_and_remove_media_buttons');