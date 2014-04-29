<?php
	
function display_nav($int){
	$home='class="dropdown"';
	$about=' ';
	$contact=' ';
	$login='class="dropdown"';
	//Conditional to check if user stored
	$log_option='Sign In';
	if($int==0){
		$home='class="active dropdown"';
	}else if($int==1){
		$about='class="active"';
	}else if($int==2){
		$contact='class="active"';
	}else if($int==4){
		$login=' class="active dropdown"';
	}
return <<<HTML
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Forward Degree</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li {$home}><a href="index.php" data-toggle="dropdown">Home</a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
				</ul>
			</li>
            <li {$about}><a href="about.php">About</a></li>
            <li {$contact}><a href="contact.php">Contact</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <li {$login}><a href="index.php" data-toggle="dropdown">Account</a>
				<ul class="dropdown-menu">
					<li><a href="#">Action1</a></li>
					<li><a href="#">Action2</a></li>
					<li><a href="#">Log In</a></li>
				</ul>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
HTML;
}
?>