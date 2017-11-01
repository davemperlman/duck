<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<article class="post">
			<h4><?php the_title(); ?></h4>
			<?php the_post_thumbnail(); ?>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>