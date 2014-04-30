<?php 
//include '../Infastructure/db_access.php';

include '../Views/logout_view.php';
session_start();
session_destroy();

header('Refresh: 2; URL=http://forwarddegree.no-ip.biz/Views/home.php')
?>