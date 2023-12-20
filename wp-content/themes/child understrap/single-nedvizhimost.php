<?php
get_header(); 

while (have_posts()) : the_post();
?>
    <div class="container mt-5 nedvizhimost">
        <?php
		
		echo get_the_post_thumbnail(null, 'full', $image_attr);

        the_title('<h1 class="boss">', '</h1>');
        the_content();


        $terms = get_the_term_list(get_the_ID(), 'tip-nedvizhimosti', '<p>Тип недвижимости: ', ', ', '</p>');
        if ($terms) {
            echo $terms;
        }
        $terms = get_the_term_list(get_the_ID(), 'city', '<p>Город: ', ', ', '</p>');
        if ($terms) {
            echo $terms;
        }
        ?>
        <p>Площадь: <?php the_field('ploschad'); ?></p>
        <p>Стоимость: $<?php the_field('stoimost'); ?></p>
        <p>Адрес: <?php the_field('adres'); ?></p>
        <p>Жилая площадь: <?php the_field('zhilaya-ploschad'); ?></p>
        <p>Этаж: <?php the_field('etazh'); ?></p>
    </div>
    
    <style>
        .nedvizhimost{
            height: 100vh;
        }
    </style>
<?php
endwhile;

get_footer(); // Получить подвал сайта
?>