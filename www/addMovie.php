<!-- addMovie.php: let users add movie information -->

<html>

	<head>
		<title>Add Movie</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<?php include("navigation.php"); ?>

	<body>

		<div class = "container">

			<p>Add movie:</p>

			<form method="GET" action="#">
	            Title: 				<input type="text" name="title" maxlength="100"><br/>
	        	Production Company:	<input type="text" name="company" maxlength="50"><br/>
	        	Release Year:		<input type="text" name="year" maxlength="4"><br/>
	        	MPAA Rating:		<select name="mpaarating">
	        							<option value=""></option>
		        						<option value="G">G</option>
		        						<option value="PG">PG</option>
		        						<option value="PG-13">PG-13</option>
		        						<option value="R">R</option>
		        						<option value="NC-17">NC-17</option>
		        					</select><br/>
		        Genre:				<input type="checkbox" name="genre" value="action">Action</input>
		        					<input type="checkbox" name="genre" value="adult">Adult</input>
		        					<input type="checkbox" name="genre" value="adventure">Adventure</input>
		        					<input type="checkbox" name="genre" value="animation">Animation</input>
		        					<input type="checkbox" name="genre" value="comedy">Comedy</input>
		        					<input type="checkbox" name="genre" value="documentary">Documentary</input>
		        					<input type="checkbox" name="genre" value="drama">Drama</input>
		        					<input type="checkbox" name="genre" value="family">Family</input>
		        					<input type="checkbox" name="genre" value="fantasy">Fantasy</input>
		        					<input type="checkbox" name="genre" value="horror">Horror</input>
		        					<input type="checkbox" name="genre" value="musical">Musical</input>
		        					<input type="checkbox" name="genre" value="mystery">Mystery</input>
		        					<input type="checkbox" name="genre" value="romance">Romance</input>
		        					<input type="checkbox" name="genre" value="sciFi">Sci-Fi</input>
		        					<input type="checkbox" name="genre" value="short">Short</input>
		        					<input type="checkbox" name="genre" value="thriller">Thriller</input>
		        					<input type="checkbox" name="genre" value="war">War</input>
		        					<input type="checkbox" name="genre" value="western">Western</input><br/>



	            <input type="submit" value="Add movie" />

	        </form>

	    </div>

	</body>

</html>