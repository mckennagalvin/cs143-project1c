<!-- navigation.php: sidebar with links --> 


<html>

	<head>
		<title>Navigation</title>
		<link rel="stylesheet" type="text/css" href="style.php">
	</head>	

	<body>

		<div id = "nav">
			<ul class = "navbar">

				<li><a href="#">Add</a>
					<ul>
						<li><a href="./addActor.php">Add Actor</a></li>
		    			<li><a href="./addMovie.php">Add Movie</a></li>
		    			<li><a href="./addActorMovie.php">Add to Movie / Actor Relation</a></li>
		    		</ul>
				</li>

				<li><a href="#">Show</a>
					<ul>
						<li><a href="./showActor.php?aid=52794">Show Actor Information</a></li>
	      				<li><a href="./showMovie.php?mid=2632">Show Movie Information</a></li>	
		    		</ul>
				</li>
	      		    
	    		<li><a href="./search.php" target="main">Search Actor/Movie</a></li>

	    	</ul>
	    </div>
 
	</body>

</html>
