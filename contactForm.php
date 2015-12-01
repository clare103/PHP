<?php

	if($_POST["submit"])
	{

		if($_POST['name'])
		{
			$error="<br />Please enter your name.";
		}

		if($_POST['email'])
		{
			$error.="<br />Please enter your email.";
		}
		if($_POST['comment'])
		{
			$error.="<br />Please enter a comment.";
		}


		if($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error.="<br /> Please enter a valid email address.";
		}


		if($error)
		{
			$result='<div class="alert alert-danger"><strong> There were error(s) in your form</strong>'.$error.'</div>';
		
		}
		else{
			

			if(mail("$test@greenhost.org.uk", "Comment from website!", "Name: ".$_POST['name'].
				"Email:".$_POST['email']."Comment: ".$_POST['comment'])){


					$result='<div class="alert alert-success"><strong> Thank you! I\'ll be in touch. </strong></div>';
		
			}
			else{

					$result='<div class="alert alert-danger"><strong> There was an error sending your message. Please try again!</strong></div>';
		
			}
		


		}

	}

?>




<!doctype html>
<html>
<head>
    <title>My first webpage</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <style>


    .mailForm{

    	border:1px solid grey;
    	border-radius:10px;
    	margin-top: 20px;
    }

    textarea{
    	height: 120px;
    }

    form{
    	padding-bottom: 20px;
    }

    </style>


</head>

<body>

	

	<div class="container">

		<div class="row">
			<div class="col-md-6 col-md-offset-3 mailForm">

  			<h1> My email form </h1>



			<?php echo $result; ?>





  			<p class="lead">Please get in touch - I'll get back to your as soon as I can </p>

  			<form method="post">

  				<div class="form-group">

  					<label for="name">Your Name:</label>
  					<input type="text" name="name" class="form-control" value="<?php echo $_POST['name'];?>"placeholder="Your name"/>

  				</div>


  				<div class="form-group">

  					<label for="email">Your email:</label>
  					<input type="email" name="email" class="form-control" value="<?php echo $_POST['email'];?>"placeholder="Your email"/>

  				</div>

  				<div class="form-group">

  					<label for="comment">Your comment:</label>
  					<textarea class="form-control" name="comment" placeholder="comment"> <?php echo $_POST['comment'];?> <textarea/>

  				</div>

  				<input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit"/>


  			</form>

  			</div>
  		</div>

	</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
   



</body>
</html>

