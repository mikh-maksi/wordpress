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

<div class="wp-block-columns are-vertically-aligned-center blog-sec-inner is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
	<div class="wp-block-column is-vertically-aligned-center blog-right is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:40%">
		<div class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
    		<ul class="wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
				<?php 
			$large_counter = 1;
			if ( $posts->have_posts() ) : ?>
			<?php while ( $posts->have_posts() ) : ?>
					<?php $posts->the_post(); ?>
					<?php $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');?>
				<li class="wp-block-post post-788 post type-post status-publish format-standard has-post-thumbnail hentry category-frontpage category-news<?php echo " visible-".$large_counter;?>" style = "list-style:none;">
					<div class="wp-block-cover" style="border-radius:20px;min-height:350px;aspect-ratio:unset;">
						<span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0) 50%,rgb(0,0,0) 84%)"></span><img width="1138" height="1280" src="https://uscida.at/wp-content/uploads/2025/11/579883315_122166725930597506_7383466316226748374_n.jpg" class="wp-block-cover__image-background wp-post-image" alt="" data-object-fit="cover" decoding="async" loading="lazy" srcset="https://uscida.at/wp-content/uploads/2025/11/579883315_122166725930597506_7383466316226748374_n.jpg 1138w, https://uscida.at/wp-content/uploads/2025/11/579883315_122166725930597506_7383466316226748374_n-267x300.jpg 267w, https://uscida.at/wp-content/uploads/2025/11/579883315_122166725930597506_7383466316226748374_n-910x1024.jpg 910w, https://uscida.at/wp-content/uploads/2025/11/579883315_122166725930597506_7383466316226748374_n-768x864.jpg 768w" sizes="auto, (max-width: 1138px) 100vw, 1138px">
						<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow">
							
						<div style="font-size:14px;font-style:normal;font-weight:400; margin-top:var(--wp--preset--spacing--40);" class="has-link-color wp-elements-9ce6eb55019ed5542aa91316adadc16d wp-block-post-date has-text-color has-white-color"> <?php the_time( get_option( 'date_format' ) ); ?></div>
							<h3 style="font-size:18px;font-style:normal;font-weight:700; margin-top:0;" class="has-link-color wp-elements-1c2706b649113d13feb7641ebaab5905 wp-block-post-title has-text-color has-white-color"><?php the_title(); ?></h3>
								<a style="font-size:14px;font-style:normal;font-weight:600;text-transform:uppercase; margin-top:var(--wp--preset--spacing--30);" class="wp-elements-3f75814889f81d4ca36d381f48e39c47 wp-block-read-more has-text-color has-primary-color" href="<?php the_permalink(); ?>" target="_self">read more<span class="screen-reader-text">: Round Table on Science Diplomacy “Brücken bauen mit Wissenschaft”</span></a></div></div>

				</li>
				<?php if ($large_counter==1) {$large_counter=0;} else {} ?>
				<?php endwhile; ?>
					<?php else : ?>
		<h4><?php esc_html_e( 'Posts not found', 'shortcodes-ultimate' ); ?></h4>
	<?php endif; ?>
			</ul>
		</div>
	</div>


<div class="wp-block-column is-vertically-aligned-center blog-left is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:60%">
	<div class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
		<ul class="ul-news wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
		<?php 
			$counter = 0;
			if ( $posts->have_posts() ) : ?>
			<?php while ( $posts->have_posts() ) : ?>
				<?php	
				// echo $counter;
						echo '<li class="wp-block-post post-788 post type-post status-publish format-standard has-post-thumbnail hentry category-frontpage category-news '."visible-".$counter.'">';
						echo '<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-is-layout-ea69a204 wp-block-columns-is-layout-flex ul-li-news-block">';
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
								<a class="" href="<?php the_permalink(); ?>"><img src="<?php echo $image_url;?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" style="border-radius:20px;object-fit:cover;" decoding="async" loading="lazy" srcset="<?php echo $image_url; ?> 1138w, <?php echo $image_url_medium_large; ?> 267w, <?php echo $image_url; ?> 910w, <?php echo $image_url; ?> 768w" sizes="auto, (max-width: 1138px) 100vw, 1138px"></a>
							<?php endif; ?>
						</figure></div>
					<div class="wp-block-column is-vertically-aligned-center blog-text-box is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
						<?php  /* $categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<div style="font-size:14px;" class="taxonomy-category wp-block-post-terms">';
								foreach ( $categories as $cat ) {
									echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class = "cat_link">'
										. esc_html( $cat->name ) . '</a>';
								}
							echo '</div>';							
						}*/?>
						<div style="font-size:14px;font-style:normal;font-weight:400; " class="wp-block-post-date">
						
							<?php the_time( get_option( 'date_format' ) ); ?>
						
						</div>
						<h3 style="font-size:18px;font-style:normal;font-weight:700; margin-top:0;" class="wp-block-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p class="r_more"><a href = "<?php the_permalink(); ?>" class = "has-secondary-color" style="font-size:14px;font-style:normal;font-weight:600;text-transform:uppercase; margin-top:var(--wp--preset--spacing--30);" >read more</a></p>
						<!--<a style="font-size:14px;font-style:normal;font-weight:600;text-transform:uppercase; margin-top:var(--wp--preset--spacing--30);" class="wp-elements-de291c69c0bd0a5ef06db6747e7dbee0 wp-block-read-more-2 has-text-color has-secondary-color" href="<?php the_permalink(); ?>" target="_self">
							read more
						</a>-->

						<!-- <div class="su-post-excerpt">
							<?php /* the_excerpt(); */
								$excerpt = get_the_excerpt(); 
								$excerpt = substr( $excerpt, 0, 260 ); // Only display first 260 characters of excerpt
								$result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
							echo $result;
					
							?>
						</div> -->
					</div>
			
		<?php
			echo '</div>';
			echo '</li>';
			if ($counter==0) {$counter=1;}

		?>
		<?php endwhile; ?>

	<?php else : ?>
		<h4><?php esc_html_e( 'Posts not found', 'shortcodes-ultimate' ); ?></h4>
	<?php endif; ?>

		</ul>
	</div>
</div>


