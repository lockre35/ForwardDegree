<?php
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
					<form action="/manage/newDepartment" method="post">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Add Department" name="Submit">
					</form>
					<p></p>
					<form action="/manage/newCourse" method="post">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Add Course" name="Submit">
					</form>
					<p></p>
					<form action="/update/" method="post">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Course" name="Submit">
					</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>