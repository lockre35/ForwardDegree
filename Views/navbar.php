<?php
	
function display_nav($int){
	$home=' ';
	$about=' ';
	$contact=' ';
	$login='class="dropdown"';
	$regOpt='';
	session_start();
	if (isset($_SESSION['user_email']))
	{
		$logOpt = '<li><a href="../Controllers/logout.php">Log Out</a></li>';
	}else{
		$logOpt = '<li><a href="../Controllers/login.php">Log In</a></li>';
		$regOpt = '<li><a href="../Controllers/register.php">Register</a></li>';
	}
	//Conditional to check if user stored
	$log_option='Sign In';
	if($int==0){
		$home='class="active"';
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
          <a class="navbar-brand" href="../Views/home.php">Forward Degree</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li {$home}><a href="../Views/home.php">Home</a>
			</li>
            <li {$about}><a href="../Views/about.php">About</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <li {$login}><a href="Controllers/login.php" data-toggle="dropdown">Account</a>
				<ul class="dropdown-menu">
					{$regOpt}
					{$logOpt}
				</ul>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
HTML;
}
?>