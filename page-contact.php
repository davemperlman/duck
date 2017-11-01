<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="well col-sm-8 col-sm-offset-2">
				<h1>Contact Us</h1>
				<form id="contact" action="">
					<legend>Your Info</legend>
					<div class="form-group col-sm-4">
						<input class="btn btn-large col-sm-3 form-control" placeholder="First Name" type="text">
					</div>
					<div class="form-group col-sm-4">
						<input class="btn btn-large col-sm-3 form-control" placeholder="Last Name" type="text">
					</div>
					<div class="form-group col-sm-4">
						<input class="btn btn-large col-sm-3 form-control" placeholder="Email" type="email">
					</div>
					<legend>How Can We Help?</legend>
					<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
					<div class="form-group">
						<button class="btn btn-large btn-success pull-right" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php get_footer();  ?>