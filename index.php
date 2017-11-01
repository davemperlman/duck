<?php get_header(); ?>
<!-- Carousel -->
<div class="container-fluid">
	<section class="posts col-sm-7">
	<h3 class="text-center">Latest from Wild Duck</h3>
	<?php if (have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<article class="panel">
				<div class="panel-heading">
					<div class="text-center">
						<div class="row">
							<div class="col-sm-9">
								<h3 class="pull-left">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
							</div>
							<div class="col-sm-3">
								<p class="pull-right">
									<?php the_date(); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php the_post_thumbnail('full', array('class' => 'img-thumbnail')); ?>
				<div class="panel-body">
					<?php the_content(); ?>
				</div>
			</article>
		
		<?php endwhile; ?>
	<?php endif; ?>
	</section>
	<!-- Aside -->
	<?php if (is_home()): ?>
		<?php get_sidebar(); ?>
	<?php endif ?>
</div>
<?php get_footer(); ?>