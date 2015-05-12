<!-- style.php: contains css -->

<?
header('Content-Type: text/css');
?>

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>

body {
	margin: 0;
	padding: 0;
}

.container {
	width: 50%;
	margin: 50 auto 0 auto;
	font-family: "Roboto", Helvetica, sans-serif;
    font-weight: 300;
    font-size: 14px;
}

h1 {
	font-size: 28px;
	font-weight: 100;
	color: #333;
	border-bottom: 1px solid #ddd;
	padding-bottom: 5px;
}

.introOuter {
	padding: 3px;
	border: 1px solid #ADD8C7;
	margin-top: 40%;
}

.introInner {
	font-size: 40px;
	font-weight: 300;
	text-align: center;
	background: #ADD8C7;
	color: #fff;
	padding: 20px;
}

.introText {
	font-family: "Georgia", "Times", serif;
	text-transform: uppercase;
	text-align: center;
	color: #666;
	margin-top: 20px;
}

label {
	display: block;
	margin-bottom: 10px;
	width: 30%;
	float: left;
	text-align: right;
	padding-right: 15px;
}

br {
	clear: left;
}

#nav {
    background-color: #eee;
    width: 100%;
    height: 40px;
    margin: 0;
    position: relative;
    border-bottom: 1px solid #dbdbdb;
}

.navbar {
	margin: 0 auto 0 auto;
	padding: 0;
	height: 40px;
	position: absolute;
}

.navbar li {
	background-color: #eee;
	height: auto;
	text-align: center;
    float: left;
    list-style: none;
    margin: 0;
    padding: 0;
    width: 150px;
    font-family: "Roboto", Helvetica, sans-serif;
    font-weight: 300;
    font-size: 14px;
}

.navbar a {
	padding: 12px 0 12px 0;
	display: block;
    color: #333;
    text-decoration: none;
    border-left: 1px solid #fff;
    border-right: 1px solid #dbdbdb;
}

.navbar li:hover, a:hover, .navbar li ul li a:hover {
	background-color: #ADD8C7;
} 

.navbar li ul 	{
	display: none;
	height: auto;									
	margin: 0;
	padding: 0;		
}

.navbar li:hover ul {
	display: block;
}

 .navbar li ul li {
 	background-color: #eee;
 } 

.navbar li ul li a 	{
	border-bottom: 1px solid #dbdbdb;
	border-top: 1px solid #fff; 
}



