<!-- showActor.php: shows actor information -->

<html>

	<head>
		<title>Show Actor</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">
			<h1>Actor Info</h1>

			<form method="GET" action="#">
				<label>Search for other actors:</label>
					<input type="text" name="name">
				<input type="submit" value="Search">
			</form>
		</div>

	</body>

</html>