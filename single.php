<?php get_header(); ?>
	<div class="container">
		<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
			<?php the_post_thumbnail('large', array('class' => 'center-block')); ?>
			<div class="col-sm-8 col-sm-offset-2">
				<h3 class="text-center">
					<?php the_title(); ?>
				</h3>
					<div class="">
						<?php the_content(); ?>
					</div>
			</div>
			<div class="container col-sm-8 col-sm-offset-2">
				<div class="col-md-4">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php urlencode(the_permalink()); ?>" class="btn btn-primary btn-sm center-block" target="_blank">
						Share on Facebook
						<i class="fa fa-facebook"></i>
					</a>
					<br>
				</div>
				<div class="col-md-4">
					<a href="https://twitter.com/intent/tweet?url=<?php urlencode(the_permalink()); ?>" target="_blank" class="btn btn-info btn-sm center-block">Share on Twitter
						<i class="fa fa-twitter"></i>
					</a>
					<br>
				</div>
				<div class="col-md-4">
					<a href="https://plus.google.com/share?url=<?php urlencode(the_permalink()); ?>" class="btn btn-danger btn-sm center-block" target="_blank">
						Share on Google
						<i class="fa fa-google-plus"></i>
					</a>
					<br>
				</div>
			</div>

		<?php endwhile ?>
		<?php endif ?>
	</div>
<?php get_footer(); ?>