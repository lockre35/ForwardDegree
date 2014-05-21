<?php include 'header.php' ?>
<?php include 'navbar.php';
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please Register</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" name="register" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="First Name" name="firstname" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Last Name" name="lastname" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="submit-register">
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<?php include 'footer.php'?>