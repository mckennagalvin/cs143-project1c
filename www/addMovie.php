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

			<form method="GET" action="#">

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
							<td><input type="checkbox" name="genre" value="action">Action</input></td>
							<td><input type="checkbox" name="genre" value="adult">Adult</input></td>
							<td><input type="checkbox" name="genre" value="adventure">Adventure</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre" value="animation">Animation</input></td>
							<td><input type="checkbox" name="genre" value="comedy">Comedy</input></td>
							<td><input type="checkbox" name="genre" value="documentary">Documentary</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre" value="drama">Drama</input></td>
							<td><input type="checkbox" name="genre" value="family">Family</input></td>
							<td><input type="checkbox" name="genre" value="fantasy">Fantasy</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre" value="horror">Horror</input></td>
							<td><input type="checkbox" name="genre" value="musical">Musical</input></td>
							<td><input type="checkbox" name="genre" value="mystery">Mystery</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre" value="romance">Romance</input></td>
							<td><input type="checkbox" name="genre" value="sciFi">Sci-Fi</input></td>
							<td><input type="checkbox" name="genre" value="short">Short</input></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="genre" value="thriller">Thriller</input></td>
							<td><input type="checkbox" name="genre" value="war">War</input></td>
							<td><input type="checkbox" name="genre" value="western">Western</input></td>
						</tr>
					</table>

				<label></label>
	            <input type="submit" value="Add movie" />

	        </form>

	    </div>

	</body>

</html>