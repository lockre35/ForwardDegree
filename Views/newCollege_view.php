<?php include 'header.php' ?>
<?php include 'navbar.php';
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please enter department information.</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" name="register" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
						<fieldset> 
							<div class="form-group">
								<input class="form-control" placeholder="Full Department Name" name="department" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Department Abbreviation" name="abbreviation" type="text">
							</div>
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Create Department" name="submit-department">
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php 
		session_start();
		if (isset($_SESSION['success']))
		{
			if($_SESSION['success']==1){
				echo "The new department was stored successfully.";
				$_SESSION['success']=0;
			}
		}
		?>
		</div>
	</div>

<?php include 'footer.php'?>