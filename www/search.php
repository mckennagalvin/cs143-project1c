<!-- search.php: lets users search for an actor/actress/movie -->

<html>

	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">
			<h1>Search Actors/Movies</h1>
			<form method="GET" action="#">
			<label>Keywords:</label>
	            	<input type="text" name="keywords">
	            <input type="submit" value="Search" />
				
			</form>
		</div>

	</body>

</html>