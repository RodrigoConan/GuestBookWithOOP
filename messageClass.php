<?php 
	/**
	* Filename: messageClass.php
	* Message Class for the GuestBook
	*/
	class message{
		private $id;
		private $name;
		private $email;
		private $message;
		private $date_posted;
		private $is_approved;

		// Start Constructor
		public function __construct(){
			$this->id = 1;
			if(isset($config['id'])){
				$this->id = $config['id'];
			}
			if(isset($config['name'])){
				$this->name = $config['name'];
			}
			if(isset($config['email'])){
				$this->email = $config['email'];
			}
			if(isset($config['message'])){
				$this->message = $config['message'];
			}
			if(isset($config['date_posted'])){
				$this->date_posted = $config['date_posted'];
			}
			if(isset($config['is_approved'])){
				$this->is_approved = $config['is_approved'];
			}
		}
		// End of Constructor

		// Start Method
		public function getId(){
			return $this->id;
		}

		public function getName(){
			return $this->name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getMessage(){
			return $this->message;
		}

		public function getDatePosted(){
			return $this->date_posted;
		}

		public function getIsApproved(){
			return $this->is_approved;
		}
		// End of Method

	}

 ?>
