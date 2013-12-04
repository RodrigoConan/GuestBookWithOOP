<html>
	<head>
		<title>Front Page</title>
	</head>
	<body>
		<h2>Messages</h2>
		
		<table border = "1" cellspacing = "3">
			<thead>
				<th>Name/Date</th>
				<th>Messages</th>
			</thead>
			
			<tbody>
				<tr>
					<?php 
						include "messageDAO.php";
						$obj = new MessageDAO();
						$recordWithApproval = $obj->showTableWithApproval();
						if(is_null($recordWithApproval)){
							echo "<td> No Content</td>";
							echo "<td> No Content</td>";
						}else{
							foreach($recordWithApproval as $record){
								echo "<tr><td>" . $record['name'] . "<br/><sup>" . $record['date_posted'] . "</sup></td>";
								echo "<td>" . $record['message'] . "</td></tr>";
							}
						}
			 		?>
				</tr>

			</tbody>
		
		</table>
		
		<br/><br/>
		
		<table>
			<tr>
				<td>
					<center>
					<h2>POST NEW MESSAGE</h2>
					<form method = "POST" action = "backEnd.php">
						Name:<input type = "text" name = "name" id = "name"><br>
						Email:&nbsp<input type = "text" name = "emailAdd" id = "emailAdd"><br>
						Message:<br><textarea rows = "5" cols = "22" name = "message" id = "message"></textarea><br>
						<input type = "submit" name = "submitBtn" value = "POST MESSAGE" onclick = "return validate();"><br/>
						<a href="view.php">View Messages</a>
					</form>
					</center>
				</td>
			</tr>	
		</table>		
	</body>

</html>
 <script type="text/javascript">
 	function validate() {
 		var name = document.getElementById("name").value;
 		var emailAdd = document.getElementById("emailAdd").value;
 		var emailAddIsAllowAt = false;
 		var emailAddIsAllowDot = false;
 		if(name.length != "" && emailAdd.length != ""){
	 		for(i = 0; i < emailAdd.length; i++){
	 			if(emailAdd.charAt(i) == '@'){
	 				emailAddIsAllowAt = true;
	 			}
		 		if(emailAdd.charAt(i) == '.'){
		 			emailAddIsAllowDot = true;
		 		}
	 		}

	 		if(emailAddIsAllowAt && !emailAddIsAllowDot){
	 			alert("Need '.' in emailadd");
	 			return false;
	 		}else if(!emailAddIsAllowAt && emailAddIsAllowDot){
	 			alert("Need '@' in emailadd");
	 			return false;
	 		}else if(!emailAddIsAllowAt && !emailAddIsAllowDot){
	 			alert("Check if either '@' or '.' is missing");
	 			return false;
	 		}else{
	 			return true;
	 		}
 		}else{
 			alert("Either name or email is Invalid");
 			return false;
 		}
 		
 	}

 </script>
