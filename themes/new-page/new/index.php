		<?php
			get_header();
		?>

		<!-- content -->
		<div class = "row content_block">
			<div class="b2 s1 col-md-6 col-sm-12 col-lg-3">
			<?php dynamic_sidebar('sidebar1') ?>

			</div>
			<div class="b1 col-md-6 col-sm-12 col-lg-6">

			 <!-- Старт цикла -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php echo wp_title("", true); ?></h2>
					<?php echo get_the_content(); ?>
					<?php endwhile; else: ?>
						<p>	К сожалению, нет записей, удовлетворяющих заданным критериям.</p>
				<?php endif; ?>
			</div>
			<!-- content -->

			<!-- sidebar -->
			<div class="b2 col-md-12 col-sm-12 col-lg-3">
				<?php dynamic_sidebar('sidebar2') ?>
				<div class = "sidebar_img">
					<img src = "<?php echo get_bloginfo('template_url'); ?>/images/img.png">
				</div>
			</div>
		</div>
		<div class = "clear"></div>

		<?php get_footer(); ?>
	</div>
  </body>
</html>
