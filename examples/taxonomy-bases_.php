<?php
get_header(); // Підключаємо заголовок теми

// Отримуємо інформацію про поточну таксономію
$current_term = get_queried_object();

echo '<h1>Bases: ' . esc_html($current_term->name) . '</h1>';

// Запускаємо Loop для виведення записів, що належать до поточної таксономії
$args = array(
    'post_type' => 'your_custom_post_type', // Вказуємо ваш користувацький тип запису
    'tax_query' => array(
        array(
            'taxonomy' => 'bases', // Вказуємо таксономію
            'field' => 'id',
            'terms' => $current_term->term_id,
        ),
    ),
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        // Ваш код для виведення кожного запису
        echo '<div class="post-item">';
        the_title('<h2>', '</h2>');
        the_excerpt();
        echo '</div>';
    endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

wp_reset_postdata();

get_footer(); // Підключаємо футер теми
