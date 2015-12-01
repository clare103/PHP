<?php


	session_start();


	if($_GET["logout"]==1 AND $_SESSION['id'])
	{
		$message="You have been logged out. Have a nice day!";
		session_destroy();
	}

	include("connection.php");

	if ($_POST['submit']=="Sign Up"){

		if(!_POST['email']) $error.="Please enter your email";
			else (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$error.= "<br/ >please enter a valid email address";
			}

		if(!_POST['password']) $error.="<br/ >Please enter your password";
			else{

				if(strlen($_POST['password'])<8) $error.="<br/ >Please enter a password with atleast 8 characters.";
				if(!preg_match('`[A-Z]`',$_POST['password'])) $error.="<br/ >Please include atleast one captial letter";


			}
		if($error) $error ="There were error(s) in your signup details:".$error;
		else{



				$query ="SELECT * FROM users where email='".mysqli_real_escape_string($link, $_POST['email'])."'";

				$result = mysqli_query($link, $query);

				$results = mysqli_num_rows($result);


				if($results) $error= "That email is already registered. Do you want to log in?";
				else{


					$query = "INSERT INTO users (email, password) values('".mysqli_real_escape_string($link, $_POST['email']).",".md5(md5($_POST['email']).$_POST['password'])."')";


					mysqli_query($link, $query);

					echo "You've been signed up!";


					$_SESSION['id']=mysqli_insert_id($link);



					header("Location:mainpage.php");
					//Redirect to logged in page



				}




		}
	}


	if($_POST['submit']=='Log In'){

		$query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginEmail'])."' AND password='".md5(md5($_POST['loginEmail']).$_POST['loginPassword'])."')";

		
		$result = mysqli_query($link, $query);

		$row = mysqli_fetch_array($result);

		if($row){

			$_SESSION['id']=$row['id'];

			header("Location:mainpage.php");

			//redirect to logged in page
		}
		else{

			$error= "We could not find a user with that email and password";
		}


	}

?>
