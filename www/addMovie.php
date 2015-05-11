<!-- addMovie.php: let users add movie information -->

<html>

	<head>
		<title>Add Movie</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">

			<h1>Add movie</h1>

			<form method="POST" action="./addMovie.php">

				<label>Title:</label>
	            	<input type="text" name="title" maxlength="100"><br/>
	            <label>Production Company:</label>
	        		<input type="text" name="company" maxlength="50"><br/>
	        	<label>Release Year:</label>
	        		<input type="text" name="year" maxlength="4"><br/>
	        	<label>MPAA Rating:</label>
	        		<select name="mpaarating">
						<option value=""></option>
						<option value="G">G</option>
						<option value="PG">PG</option>
						<option value="PG-13">PG-13</option>
						<option value="R">R</option>
						<option value="NC-17">NC-17</option>
		        	</select><br/>
		        <label>Genre:</label>
		        	<table class = "formTable" style="font-weight:100;font-size:11px;">
		        		<tr>
							<td><input type="checkbox" name="genre[]" value="Action">Action</input></td>
							<td><input type="checkbox" name="genre[]" value="Adult">Adult</input></td>
							<td><input type="checkbox" name="genre[]" value="Adventure">Adventure</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre[]" value="Animation">Animation</input></td>
							<td><input type="checkbox" name="genre[]" value="Comedy">Comedy</input></td>
							<td><input type="checkbox" name="genre[]" value="Documentary">Documentary</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre[]" value="Drama">Drama</input></td>
							<td><input type="checkbox" name="genre[]" value="Family">Family</input></td>
							<td><input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre[]" value="Horror">Horror</input></td>
							<td><input type="checkbox" name="genre[]" value="Musical">Musical</input></td>
							<td><input type="checkbox" name="genre[]" value="Mystery">Mystery</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre[]" value="Romance">Romance</input></td>
							<td><input type="checkbox" name="genre[]" value="SciFi">Sci-Fi</input></td>
							<td><input type="checkbox" name="genre[]" value="Short">Short</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre[]" value="Thriller">Thriller</input></td>
							<td><input type="checkbox" name="genre[]" value="War">War</input></td>
							<td><input type="checkbox" name="genre[]" value="Western">Western</input></td>
						</tr>
					</table>

				<label></label>
	            <input type="submit" value="Add movie" />

	        </form>


<?php


//if ($_SERVER["REQUEST_METHOD"] == "POST") {


	// connect to database
    $db_connection = mysql_connect("localhost", "cs143", "");
    if(!$db_connection) {
        $errmsg = mysql_error($db_connection);
        print "Connection failed: $errmsg <br />";
        exit(1);
    }

    // select database
    mysql_select_db("CS143", $db_connection);

    // get input
    $title = $_POST["title"];
	$company = $_POST["company"];
	$year = $_POST["year"];
	$rating = $_POST["mpaarating"];

    // sanitize input
	$first = mysql_real_escape_string($title, $db_connection);
	$last = mysql_real_escape_string($company, $db_connection);
	$sex = mysql_real_escape_string($year, $db_connection);
	$dob = mysql_real_escape_string($rating, $db_connection);



	// add movie

	// get current max ID and increment it
	$maxIDQuery = mysql_query("SELECT id FROM MaxMovieID", $db_connection);
	$row = mysql_fetch_row($maxIDQuery);
	$maxID = $row[0];
	$maxID = $maxID + 1;

	// update max ID in database
	$updateQuery = "UPDATE MaxMovieID SET id=$maxID";
	if(!mysql_query($updateQuery, $db_connection))
		echo "Error updating MaxMovieID";

	// insert new movie
	$insertQuery = "INSERT INTO Movie VALUES($maxID, $title, $year, $rating, $company)";
	if(mysql_query($insertQuery, $db_connection))
		echo "Successful add of $title to Movie relation!";
	else
		echo "Error adding to Movie relation.";



	// add genre

	if (isset($_POST["genre"])) {
		foreach($_POST["genre"] as $genre) {
			// insert new movie
			$insertGenreQuery = "INSERT INTO MovieGenre VALUES($maxID, $genre)";
			if(mysql_query($insertGenreQuery, $db_connection))
				echo "Successful add of $genre to movie ID $maxID!";
			else
				echo "Error adding to MovieGenre relation.";
		}
	}

	// end connection
    mysql_close($db_connection);
    
//}	
?>

</div>

</body>


</html>