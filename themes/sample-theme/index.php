<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>">
            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

            <?php the_excerpt(); ?>
        </article>

    <?php endwhile; ?>

    <?php the_posts_pagination(); ?>

<?php else : ?>

    <p>Поки що записів немає.</p>

<?php endif; ?>

<?php get_footer(); ?>