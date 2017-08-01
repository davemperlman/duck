<?php get_header(); ?>

<!-- Carousel -->
<section class="posts">
<!-- <h3>Latest from Wild Duck</h3> -->
<?php if (have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<article class="post">
			<?php the_date(); ?>
			<h4><?php the_title(); ?></h4>
			<?php the_post_thumbnail(); ?>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
</section>
<!-- Aside -->
<?php if (is_home()): ?>
	<?php get_sidebar(); ?>
<?php endif ?>
<?php get_footer(); ?>