<?php
$args = array(
    'post_type' => 'nedvizhimost',
    'posts_per_page' => -1, // -1 для вывода всех записей
);

$nedvizhimost_query = new WP_Query($args);

if ($nedvizhimost_query->have_posts()) :
    while ($nedvizhimost_query->have_posts()) :
        $nedvizhimost_query->the_post();
        // Здесь выводите содержимое каждой записи
        ?>
        <div class="">
            <div class=" g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="d-flex justify-content-between">
                <div class="d-flex p-3 flex-column">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <div class="d-flex flex-column">
                        <?php
                        $terms = get_the_term_list(get_the_ID(), 'tip-nedvizhimosti', '<p class="mt-1" >Тип недвижимости: ', ', ', '</p>');
                        if ($terms) {
                            echo $terms;
                        }
                        $terms = get_the_term_list(get_the_ID(), 'city', '<p>Город: ', ', ', '</p>');
                        if ($terms) {
                            echo $terms;
                        }
                        ?>
                        <p>Площадь: <a href=""><?php the_field('ploschad'); ?></a></p>
                        <p>Стоимость: $<a href=""><?php the_field('stoimost'); ?></a></p>
                        <p>Адрес: <a href=""><?php the_field('adres'); ?></a></p>
                        <p>Жилая площадь: <a href=""><?php the_field('zhilaya-ploschad'); ?></a></p>
                        <p>Этаж: <a href=""><?php the_field('etazh'); ?></a></p>
                    </div>
                    </div>
                    <div class="" style="width: 500px;">
                    <?php
                        $post_id = get_the_ID(); 
                        if (has_post_thumbnail($post_id)) {
                            $image_attr = [
                                'class' => 'rounded p-1 imgnedd', 
                                'alt' => get_the_title($post_id),
                            ];
                            echo get_the_post_thumbnail($post_id, 'full', $image_attr);
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .imgnedd{
                width: 500px;
                height: 350px !important;
                object-fit: cover;
            }
        </style>

        
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'Нет записей.';
endif;
?>