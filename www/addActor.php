<!-- addActor.php: let users add actor information -->

<html>

	<head>
		<title>Add Actor</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">

			<h1>Add actor</h1>

			<form method="GET" action="#">
				<label>First Name:</label>
	            	<input type="text" name="first" maxlength="20"><br/>
	            <label>Lasr Name:</label>
	        		<input type="text" name="last" maxlength="20"><br/>
	        	<label>Sex:</label>
	        		<input type="radio" name="sex" value="Male" checked="true">Male
					<input type="radio" name="sex" value="Female">Female<br/>
				<label>Date of Birth:</label>
					<input type="text" name="dob"><br/>
				<label>Date of Death:</label>
					<input type="text" name="dob"><br/>
				<label></label>
	            <input type="submit" value="Add actor" />
	        </form>

    	</div>

	</body>

</html>