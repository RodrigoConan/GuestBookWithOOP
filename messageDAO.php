GuestBookWithOOP
================
<?php 
	/**
	* Filename: messageDAO.php
	*/
		include "db_Config.php";
		include "messageClass.php";
	class MessageDAO{

		// Start of Constructor
		function __construct(){

		}
		// End of Constructor

		// Start of Method

		/**
		* Set the is_approved to 'N'
		* @param: Integer id of table
		*/
		function reject($id){
			$query = "UPDATE messages SET is_approved = 'N' WHERE id = '$id' ";
			$result = mysql_query($query);
			if($result){
				echo "Successfully to Reject<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}else{
				echo "Not Successfully Reject<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}
		}

		/**
		* Set is_approved to 'Y'
		* @param: Integer id of table
		*/
		function approve($id){
			$query = "UPDATE messages SET is_approved = 'Y' WHERE id = '$id' ";
			$result = mysql_query($query);
			if($result){
				echo "Successfully to Approve<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}else{
				echo "Not Successfully Approve<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}
		}

		/**
		* Delete row record
		* @param: Integer id of table
		*/
		function delete($id){
			$query = "DELETE FROM messages where id = '$id'";
			$result = mysql_query($query);
			if($result){
				echo "Successfully Delete<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}else{
				echo "Not Successfully Delete<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}
		}

		/**
		* @return: record in associative array
		*/
		function showTable(){
			$query = "SELECT * FROM messages";
			$result = mysql_query($query);
			if($result){
				$record = array();
				while($rec = mysql_fetch_assoc($result)){
					$record[] = $rec;
				}
				return $record;
			}else{
				return NULL;
			}
		}

		/**
		* Insert one record
		* @param: name, emailadd, message of the user
		*/
		function insert($name, $email, $message){
			$query = "INSERT INTO messages(name, message, email, date_posted, is_approved) VALUES('$name', '$message', '$email', CURRENT_DATE(), 'N')";
			$result = mysql_query($query);
			if($result){
				echo "Successfully Added<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}else{
				echo "Not Successfully Added<br/>";
				echo "<a href='frontEnd.php'>Back </a>";
			}
		}

		/**
		* Check the is_approved if 'Y' or 'N'
		* @param: 'Y' or 'N'
		* @return: true if is_approved is 'Y' otherwise false
		*/
		function is_approved($permit){
			if($permit == "Y"){
				return true;
			}
			return false;
		}

		/**
		* Get all record who is_approved is 'Y'
		* @return: record who is_approved is 'Y' in 
		* associative array and if the table has atleast
		* one record otherwise Null
		*/
		function showTableWithApproval(){
			$query = "SELECT * FROM messages where is_approved = 'Y'";
			$result = mysql_query($query);
			if(mysql_num_rows($result) > 0){
				$record = array();
				while($rec = mysql_fetch_assoc($result)){
					$record[] = $rec;
				}
				return $record;
			}else{
				return NULL;
			}
		}
		// End of Method

	}


 ?>
