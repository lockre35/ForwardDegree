<?php include 'header.php' ?>
<?php include 'navbar.php';
	echo display_nav(0); 
	include '../Controllers/viewCourses.php';?>

    <div class="container">

      <div class="starter-template">
			<div class="row col-md-6 col-md-offset-3 custyle">
			<table class="table table-striped custab">
			<thead>
				<tr>
					<th class="text-center">Department</th>
					<th class="text-center">Number</th>
					<th class="text-center">Name</th>
					<th class="text-center"></th>
				</tr>
			</thead>
					<?php 
						session_start();
						$department=$_SESSION['department'];
						include '../Models/course.php';

						$course = new course();
						$array = array();
						$array = $course->getAll($department);
						
						$arraySize = count($array);
						for($x=0;$x<$arraySize;$x++){	
							$name=$array[$x]['CourseName'];
							$abr=$array[$x]['CollegeAbr'];
							$id=$array[$x]['CourseID'];
							$number=$array[$x]['CourseNumber'];
							echo "
							<tr>
								<td>$abr</td>
								<td>$number</td>
								<td>$name</td>
								<td class=\"text-center\">				
									<form method=\"post\" action=\"../Views/courses_view.php\">
										<input type=\"text\" style=\"display: none;\" name=\"id\" value=$id></input>
										<input class=\"btn btn-xs btn-primary btn-block\" type=\"submit\" value=\"View\" name=\"Submit\">
									</form>
								</td>
							</tr>";
						}
					?>
			</table>
		</div>
		</div>

    </div><!-- /.container -->

<?php include 'footer.php'?>