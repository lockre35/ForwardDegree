<?php include 'header.php' ?>
<?php include 'navbar.php';
	echo display_nav(0); 
	include '../Controllers/viewDeps.php';?>

    <div class="container">

      <div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please select a department to begin.</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" name="register" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
						<fieldset>
							<div class="form-group">
								<select type="text" class="form-control multiselect multiselect-icon" role="multiselect" placeholder="Department" name="department">          
								  <option value="-1">Select Department</option>  
								  <?php 
									include '../Models/college.php';
									$deps = new college();
									$array = array();
									
									$array = $deps->getAll();
									$arraySize = count($array);
									for($x=0;$x<$arraySize;$x++){
										$id=$array[$x]['CollegeID'];	
										$name=$array[$x]['CollegeName'];
										$abr=$array[$x]['CollegeAbr'];
										echo "<option value=$id>($abr) $name</option>"; 
									}
								  ?>
								</select> 
							</div>   
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" name="submit-department">
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>

    </div><!-- /.container -->

<?php include 'footer.php'?>