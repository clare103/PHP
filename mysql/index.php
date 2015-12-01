<?php


	$link = mysqli_connect("176.32.230.251", "cl57-example-y3m", "mGGy/!bg-", "cl57-example-y3m");

	if(mysqli_connect_error())
	{
		echo "Could not connect to database";
	}


//$query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('bob','bob@gmail.com', 'test')";

mysqli_query($link, $query);

$query = "UPDATE users SET email='ian@hotmail.com' WHERE id=3 LIMIT 1";


$name ="Ian O'Neil";


$query = "SELECT 'name' FROM users WHERE name='".mysqli_real_escape_string($link, $name)."'";


if($result=mysqli_query($link, $query)){

	$row = mysqli_fetch_array($result);

	print_r(($row));

}
else
{
	echo "failed";
}


?>