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

html,body{
	height:100%;
}


.container{
	background-image: url();
	width:100%;
	height:100%;
	background-size: cover;
	background-position: center;
	padding-top: 150px;
}

.center{
	text-align: center;
}

.white{
	color:white;
}

p{
	padding-top: 15px;
	padding-bottom: 15px;
}

button{
	margin-top: 20px;
}

.alert{
	margin-top: 20px;
}

</style>


</head>

<body>


<div class="container">

	<div class="row">

		<div class="col-md-6 col-md-offset-3 center">

			<h1 class="center white"> Weather Analysis </h1>

			<p class="lead center white"> Enter your city below to get a forcast of the weather.</p>

			<form>
				<div class="form-group">
					<input type="text" class="form-control" name="city" id="city" placeholder="Eg. Newport Beach, Paris, Silicon Valley...."/>
				</div>

				<button id="findMyWeather"class="btn btn-success btn-lg">Find my weather</button>

			</form>

			<div id="success"class="alert alert-success"> Success</div>

			<div id="failed"class="alert alert-danger"> Could not find data</div>

			<div id="noCity"class="alert alert-danger"> Please enter a city.</div>



			</div>

			
			

		</div>

	</div>

</div>





<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<script>

	$("#findMyWeather").click(function(event){

		event.preventDefault();
		
		$(".alert").hide();

		if($("#city").val()!=""){

		$.get("scraper.php?city="+$("#city").val(), function(data){

			
			if(data==""){
				
				$("#failed").fadeIn();
			}
			else{
				
				$("#success").html(data).fadeIn();
			
			}

		});

		}
		else{
			alert("#noCity").fadeIn();
		}
	});

</script>

</body>
</html>

