<?php

// Создание таксономии для "Городов"
function create_city_taxonomy() {
    $args = array(
        'labels' => array(
            'name' => 'Города',
            'singular_name' => 'Город'
        ),
        'public' => true,
        'rewrite' => array('slug' => 'city'),
        'hierarchical' => true,
    );
    register_taxonomy('city', array('nedvizhimost'), $args);
}
add_action('init', 'create_city_taxonomy');

function nedvizhimost_all_shortcode() {
    ob_start();
    include 'archive-nedvizhimost.php'; 
    return ob_get_clean();
}
add_shortcode('nedvizhimost_all', 'nedvizhimost_all_shortcode');

// s


function my_custom_scripts() {
    wp_enqueue_script('custom_ajax', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);

    wp_localize_script('custom_ajax', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_custom_scripts');



?>