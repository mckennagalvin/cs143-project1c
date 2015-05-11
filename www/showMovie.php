<!-- showMovie.php: shows movie information -->

<html>

	<head>
		<title>Show Movie</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">
			<h1>Movie Info</h1>

			<form method="GET" action="#">
				<label>Search for other movies:</label>
					<input type="text" name="title">
				<input type="submit" value="Search">
			</form>
		</div>

	</body>

</html>