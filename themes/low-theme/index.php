<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">

    <h1>
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </h1>

    <p><?php bloginfo('description'); ?></p>

    <hr>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>">

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php if (has_post_thumbnail()) : ?>
                    <p><?php the_post_thumbnail('medium'); ?></p>
                <?php endif; ?>

                <?php the_content(); ?>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>Записів поки немає.</p>

    <?php endif; ?>

</div>

<?php wp_footer(); ?>
</body>
</html>