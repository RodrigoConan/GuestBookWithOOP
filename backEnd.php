<html>
	<head>
		<title>Messages</title>
	</head>
	<body>
		<h2>Messages</h2>
		<table border = "1">
					<?php 
						include "messageDAO.php";

						$name = $_POST['name'];
						$emailAdd = $_POST['emailAdd'];
						$message = $_POST['message'];

						if($name != "" && $emailAdd != "" && $_POST['submitBtn']){
							$obj = new MessageDAO();
							$obj->insert($name, $emailAdd, $message);
							$record = $obj->showTable();
							foreach($record as $rec){
								echo "<tr>";
								echo "<td>". $rec['id'] ."</td>";
								echo "<td>". $rec['name']. "</td>";
								echo "<td>". $rec['email']. "</td>";
								echo "<td>". $rec['message']. "</td>";
								echo "<td>". $rec['date_posted']. "</td>";
								echo "<td>". $rec['is_approved']. "</td><td>";
								if($obj->is_approved($rec['is_approved'])){
									echo "<a href = 'rejected.php?id=" . $rec['id'] . "'>Reject &nbsp&nbsp&nbsp </a>";
								}else{
									echo "<a href = 'approved.php?id=" . $rec['id'] . "'>Approve &nbsp&nbsp </a>";
								}
								
								echo "<a href = 'delete.php?id=" . $rec['id'] . "'>Delete</a></td></tr>";							
							}
						}

					 ?>
		</table>
	</body>
</html>
