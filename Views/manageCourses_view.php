<?php include 'header.php' ?>
<?php include 'navbar.php';
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
					<form action="../Controllers/newCollege.php" method="get">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Add Department" name="Submit">
					</form>
					<p></p>
					<form action="../Controllers/newCourse.php" method="get">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Add Course" name="Submit">
					</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<?php include 'footer.php'?>