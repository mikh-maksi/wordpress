<html>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php wp_title( '', true, 'right' ); ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<?php echo get_bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo('template_url'); ?>/style.css" rel="stylesheet">
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/js.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>

  <body>
	<div class = "container">
		<!-- header -->
		<div class = "row">
			<div class="logo col-md-2 col-sm-2 col-lg-2">
				<div class = "logo_img">
				  <img src = "<?php echo get_bloginfo('template_url'); ?>/images/logo.png">
				</div>
			</div>
			<div class="name col-md-10 col-sm-10 col-lg-10">
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

			</div>
			<div class = "menu col-md-12 col-sm-12 col-lg-12 sp navbar-nav nav navbar-inverse">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</div>
		<div class = "clear"></div>
		<!-- header -->