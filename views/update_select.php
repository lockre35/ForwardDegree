<?php	echo display_nav(4); 
	//include '../Controllers/viewCourses.php';?>

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
						$arraySize = count($this->registry->template->courses);
						for($x=0;$x<$arraySize;$x++){
							echo $this->registry->template->courses[$x];
						}
					?>
			</table>
		</div>
		</div>

    </div><!-- /.container -->