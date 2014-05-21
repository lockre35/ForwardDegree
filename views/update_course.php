<?php
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Update Seats</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" name="register" method="post" action="">
						<fieldset>
							<div class="form-group">
								<?php echo $depName; ?>
							</div> 					
							<div class="form-group">
								<?php echo $number; ?>
							</div>
							<div class="form-group">
								<?php echo $section; ?>
							</div>
							<div class="form-group">
								<?php echo $name; ?>
							</div>
							<div class="form-group">
								<?php echo $description; ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Remaining Seats" name="CourseSeats" type="number" value="<?php echo $seats; ?>">
							</div>
								<input style="display: none;" name="id" type="number" value="<?php echo $courseID; ?>">
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Course" name="Submit">
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php		session_start();
		if (isset($_SESSION['success']))
		{
			if($_SESSION['success']==1){
				echo "The new course was stored successfully.";
				$_SESSION['success']=0;
			}
		}
		?>
		</div>
	</div>