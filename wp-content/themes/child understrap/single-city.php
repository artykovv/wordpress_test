<?php
get_header();

while (have_posts()) : the_post();
?>
    <div class="container mt-5 city">
        <?php
        echo get_the_post_thumbnail(null, 'full', $image_attr); 
        the_title('<h1 class="boss">', '</h1>');
        the_content();

        $city = get_queried_object();
        $city_name = $city->post_title;

		$args = array(
			'post_type'      => 'nedvizhimost',
			'tax_query'      => array(
				array(
					'taxonomy' => 'city',
					'field'    => 'name',
					'terms'    => $city_name,
				),
			),
			'posts_per_page' => 10, 
		);

        $nedvizhimost_query = new WP_Query($args);

        // Отображение постов nedvizhimost для этого города
        if ($nedvizhimost_query->have_posts()) :
            ?>
            
            <h4>Недвижимость в этом городе:</h4>
            <div class="nedvizhimost-posts">
                <?php
                while ($nedvizhimost_query->have_posts()) : $nedvizhimost_query->the_post();
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
                ?>
            </div>
            <?php
            wp_reset_postdata(); // Сбрасываем запрос
        else :
            echo '<p>В этом городе нет доступной недвижимости.</p>';
        endif;
        ?>
    </div>
<?php
endwhile;

get_footer();
?>
