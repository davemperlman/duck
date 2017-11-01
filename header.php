<!DOCTYPE html>
<html>
	<head>
		<title>Wild Duck Restaurant & Pub</title>
		<?php wp_head(); ?>
	</head>
	<body>
	<header>
	<!-- 	<div class="banner">
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
		</nav> -->
		<div class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target='#collapseable'>
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo home_url(); ?>"  class="navbar-brand">
						Wild Duck Restaurant & Pub
				</a>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="collapseable">
				<?php wp_nav_menu(array('menu_class' => 'nav navbar-nav')); ?>
			</div>
		</div>
	</header>
	<div class="container">
	<?php if ( is_home() ) : ?>
		<div class="carousel jumbotron">
			<?php echo do_shortcode('[slick-slider]'); ?>
		</div>
	<?php endif; ?>