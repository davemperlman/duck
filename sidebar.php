<?php $loop = new WP_Query( array('post_type' => 'event', 'posts_per_page' => 10) ); ?>
<aside>
	<!-- <h3>Events</h3> -->
	<!-- Loop of events -->
	<ul>
		<h3>Events</h3>
	<?php if ( $loop->have_posts() ) : ?>
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
			<li>
				<?php the_title(); ?>
				<p> <?php echo date('D, M jS', strtotime(get_post_meta( get_the_ID(), '_date')[0])); ?> | <?php echo get_post_meta( get_the_ID(), '_time')[0]; ?></p>
			</li>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	</ul>
	<?php echo do_shortcode('[insta-gallery id="1"]'); ?>
</aside>