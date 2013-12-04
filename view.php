	
<?php 
	include "messageDAO.php";
	$obj = new MessageDAO();
	$record = $obj->showTable();
	echo "<table border = '1'>";
	echo "<th>Id</th><th>Name</th><th>Email</th><th>Message</th><th>Date Posted</th><th>Is Approved</th><th>Action</th>";
	foreach($record as $rec){
		echo "<tr>";
		echo "<td>". $rec['id'] ."</td>";
		echo "<td>". $rec['name']. "</td>";
		echo "<td>". $rec['email']. "</td>";
		echo "<td>". $rec['message']. "</td>";
		echo "<td>". $rec['date_posted']. "</td>";
		echo "<td>". $rec['is_approved']. "</td>";
		if($obj->is_approved($rec['is_approved'])){
			echo "<td><a href = 'rejected.php?id=" . $rec['id'] . "'>Reject &nbsp&nbsp&nbsp</a>";
		}else{
			echo "<td><a href = 'approved.php?id=" . $rec['id'] . "'>Approve&nbsp&nbsp&nbsp</a>";
		}
		
		echo "<a href = 'delete.php?id=" . $rec['id'] . "'>Delete</a></td></tr>";							
	}
	echo "</table>";
 ?>

 	<a href="frontEnd.php">Back </a>
 	
