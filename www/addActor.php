<!-- addActor.php: let users add actor information -->

<html>

	<head>
		<title>Add Actor</title>
	</head>	

	<body>

		<p>Add actor:</p>

		<form method="GET" action="#">
            First Name: 	<input type="text" name="first" maxlength="20"><br/>
        	Last Name: 		<input type="text" name="last" maxlength="20"><br/>
        	Sex:			<input type="radio" name="sex" value="Male" checked="true">Male
							<input type="radio" name="sex" value="Female">Female<br/>
			Date of Birth:  <input type="text" name="dob"><br/>
			Date of Death:	<input type="text" name="dod"> (leave blank if alive now)<br/>
            <input type="submit" value="Add actor" />
        </form>

	</body>

</html>