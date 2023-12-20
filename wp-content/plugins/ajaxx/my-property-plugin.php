<?php
/*
Plugin Name: My Property Plugin
Description: Добавление недвижимости через AJAX
Version: 1.0
*/

add_action('wp_ajax_add_property', 'add_property_callback');
add_action('wp_ajax_nopriv_add_property', 'add_property_callback');

function add_property_callback() {
    // Получение данных из AJAX-запроса
    $title = sanitize_text_field($_POST['title']);
    $description = wp_kses_post($_POST['description']);
    $tip = sanitize_text_field($_POST['tip']);
    $city = sanitize_text_field($_POST['city']);
    $ploschad = sanitize_text_field($_POST['ploschad']);
    $stoimost = sanitize_text_field($_POST['stoimost']);
    $zhilayaPloschad = sanitize_text_field($_POST['zhilayaPloschad']);
    $etazh = sanitize_text_field($_POST['etazh']);
    $adres = sanitize_text_field($_POST['adres']); // Получаем адрес из AJAX-запроса

    // Создание записи недвижимости и сохранение данных
    $new_property = array(
        'post_title' => $title,
        'post_content' => $description,
        'post_status' => 'publish',
        'post_type' => 'nedvizhimost',
    );

    $property_id = wp_insert_post($new_property);

    // Добавление данных в пользовательские поля
    if ($property_id) {
        update_field('tip-nedvizhimosti', $tip, $property_id);
        update_field('city', $city, $property_id);
        update_field('ploschad', $ploschad, $property_id);
        update_field('stoimost', $stoimost, $property_id);
        update_field('zhilaya-ploschad', $zhilayaPloschad, $property_id);
        update_field('etazh', $etazh, $property_id);
        update_field('adres', $adres, $property_id); // Обновлено для поля 'adres'

        // Устанавливаем таксономии для записи
        wp_set_object_terms($property_id, $tip, 'tip-nedvizhimosti');
        wp_set_object_terms($property_id, $city, 'city');

        if (!empty($_FILES['img']['name'])) {
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($_FILES['img'], $upload_overrides);
            if ($movefile && !isset($movefile['error'])) {
                $img_id = wp_insert_attachment(array(
                    'guid' => $movefile['url'],
                    'post_mime_type' => $movefile['type'],
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($movefile['file'])),
                    'post_content' => '',
                    'post_status' => 'inherit'
                ), $movefile['file']);
                if (!is_wp_error($img_id)) {
                    set_post_thumbnail($property_id, $img_id); // Устанавливаем изображение как миниатюру
                }
            }
        }

        echo 'Недвижимость успешно добавлена с ID: ' . $property_id;
    } else {
        echo 'Ошибка при добавлении недвижимости.';
    }

    wp_die(); // Обязательно для завершения запроса
}