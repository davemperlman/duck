<!DOCTYPE html>
<html>
	<head>
		<title>Wild Duck Restaurant & Pub</title>
		<?php wp_head(); ?>
	</head>
	<body>
	<header>
	<div class="banner">
		<div class="logo">
			<img src="<?php echo get_template_directory_uri() . '/_img/duck.png' ?>" alt="">
		</div>
		<div class="description">
			<h1>Fine Dining and Bar</h1>
			<p>Here is a good place to eat</p>
		</div>
	</div>
		<nav>
			<?php wp_nav_menu(); ?>
		</nav>
	</header>
	<div class="container">
	<?php if ( is_home() ) : ?>
		<div class="carousel">
			<?php echo do_shortcode('[slick-slider variablewidth="true"]'); ?>
		</div>
	<?php endif; ?>