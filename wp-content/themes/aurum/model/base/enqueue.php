<?php

function dm_add_css_js()
{
    wp_deregister_script('jquery'); // remove default wp jquery

    $version = '1.3';
  
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), $version);
    wp_enqueue_script('jquery', get_template_directory_uri().'/node_modules/jquery/dist/jquery.min.js', array(), $version, true);
    wp_enqueue_script('popper', get_template_directory_uri().'/node_modules/popper.js/dist/umd/popper.min.js', array(), $version, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', array(), $version, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/sweetalert/dist/sweetalert.min.js', array(), $version, true);

    wp_enqueue_style('maincss', get_template_directory_uri().'/public/assets/stylesheets/main.css', array(), $version);
    wp_enqueue_script('bundle', get_template_directory_uri().'/public/assets/javascript/bundle.js', array(), $version, true);
}

add_action('wp_enqueue_scripts', 'dm_add_css_js');
