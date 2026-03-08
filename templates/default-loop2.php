<?php defined( 'ABSPATH' ) || exit; ?>

<?php
/**
 * READ BEFORE EDITING!
 *
 * Do not edit templates in the plugin folder, since all your changes will be
 * lost after the plugin update. Read the following article to learn how to
 * change this template or create a custom one:
 *
 * https://getshortcodes.com/docs/posts/#built-in-templates
 */
?>


<div class="wp-block-column is-vertically-aligned-center blog-left is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
	<div class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
		<ul class="ul-news wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">

	<?php if ( $posts->have_posts() ) : ?>
		<?php while ( $posts->have_posts() ) : ?>
		<?php	echo '<li class="wp-block-post post-788 post type-post status-publish format-standard has-post-thumbnail hentry category-frontpage category-news">';
				echo '<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-is-layout-ea69a204 wp-block-columns-is-layout-flex">';
		?>
			<?php $posts->the_post(); ?>

			<?php if ( ! su_current_user_can_read_post( get_the_ID() ) ) : ?>
				<?php continue; ?>
			<?php endif; ?>
					<?php
						$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
						$image_url_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
						$image_url_large = get_the_post_thumbnail_url(get_the_ID(), 'large');
						$image_url_medium_large = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
						$image_url_medium = get_the_post_thumbnail_url(get_the_ID(), 'medium');
						$image_url_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');	
					?>
			<!--<div id="su-post-<?php the_ID(); ?>" class="su-post <?php echo esc_attr( $atts['class_single'] ); ?>"> -->
					<div class="wp-block-column is-vertically-aligned-center blog-img-box is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
						<figure class="wp-block-post-featured-image">
							<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
								
								<a class="" href="<?php the_permalink(); ?>">
									<img src="<?php echo $image_url;?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" style="border-radius:20px;object-fit:cover;" decoding="async" loading="lazy" srcset="<?php echo $image_url_full; ?> 1138w, <?php echo $image_url_medium; ?> 267w, <?php echo $image_url_large; ?> 910w, <?php echo $image_url_medium_large; ?> 768w" sizes="auto, (max-width: 1138px) 100vw, 1138px">
								</a>
							<?php endif; ?>
						</figure>
					</div>
					<div class="wp-block-column is-vertically-aligned-center blog-text-box is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
						<!--Categories -->
						<?php $categories = get_the_category();
						if ( ! empty( $categories ) ) {
						echo '<div style="font-size:14px;" class="taxonomy-category wp-block-post-terms">';
							foreach ( $categories as $cat ) {
								echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class = "cat_link">'
									. esc_html( $cat->name ) . '</a>';
							}
							echo '</div>';
						}
						?>
						<!--/Categories -->
						<div style="font-size:14px;font-style:normal;font-weight:400; margin-top:var(--wp--preset--spacing--40);" class="wp-block-post-date"><time datetime="2025-11-11T16:43:09+00:00">
							<?php esc_html_e( 'Posted', 'shortcodes-ultimate' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?>
						</time>
						</div>

						<h3 style="font-size:18px;font-style:normal;font-weight:700; margin-top:0;" class="wp-block-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<a style="font-size:14px;font-style:normal;font-weight:600;text-transform:uppercase; margin-top:var(--wp--preset--spacing--30);" class="wp-elements-de291c69c0bd0a5ef06db6747e7dbee0 wp-block-read-more has-text-color has-secondary-color" href="<?php the_permalink(); ?>" target="_self">
							read more
							<span class="screen-reader-text">: Round Table on Science Diplomacy “Brücken bauen mit Wissenschaft”</span>
						</a>

						<!-- <div class="su-post-excerpt">
							<?php the_excerpt(); ?>
						</div> -->
						<?php if ( have_comments() || comments_open() ) : ?>
							<a href="<?php comments_link(); ?>" class="su-post-comments-link"><?php comments_number( __( '0 comments', 'shortcodes-ultimate' ), __( '1 comment', 'shortcodes-ultimate' ), '% comments' ); ?></a>
						<?php endif; ?>
					</div>
			
		<?php
			echo '</div>';
			echo '</li>';
		?>
		<?php endwhile; ?>

	<?php else : ?>
		<h4><?php esc_html_e( 'Posts not found', 'shortcodes-ultimate' ); ?></h4>
	<?php endif; ?>

		</ul>
	</div>
</div>
