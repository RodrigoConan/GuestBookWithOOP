<?php 
	include "messageDAO.php";
	$obj = new MessageDAO();
	$id = $_GET['id'];

	$obj->approve($id);
 ?>
