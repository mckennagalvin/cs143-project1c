# CONSTRAINTS
#
# primary keys
#     - Movie: ID
#     - Actor: ID
#     - Director: ID
#
# foreign keys
#     - MovieGenre: Movie's ID
#     - MovieDirector: Movie's ID
#     - MovieDirector: Director's ID
#     - MovieActor: Movie's ID
#     - MovieActor: Actor's ID
#     - Review: Movie's ID

CREATE TABLE Movie(
	id 		INT NOT NULL,			# each movie must have an id
	title 	VARCHAR(100) NOT NULL,	# each movie must have a title
	year 	INT NOT NULL,			# year of movie must be specified
	rating 	VARCHAR(10),
	company VARCHAR(50),
	PRIMARY KEY(id)					# the movie can be identified by id
)ENGINE = INNODB;

CREATE TABLE Actor(
	id 		INT NOT NULL,			# each actor must have an id
	last 	VARCHAR(20),
	first 	VARCHAR(20) NOT NULL,	# actor's first name must be specified
	sex 	VARCHAR(6),
	dob 	DATE NOT NULL,			# each actor must have a date of birth
	dod 	DATE,
	PRIMARY KEY(id)					# actors can be identified by their id
)ENGINE = INNODB;

CREATE TABLE Director(
	id 		INT NOT NULL,			# each director must have an id
	last 	VARCHAR(20),
	first 	VARCHAR(20) NOT NULL,	# director's first name must be specified
	dob 	DATE NOT NULL,			# each director must have a date of birth
	dod 	DATE,
	PRIMARY KEY(id)					# directors can be identified by their id
)ENGINE = INNODB;

CREATE TABlE MovieGenre(
	mid 	INT NOT NULL,
	genre 	VARCHAR(20),
	FOREIGN KEY(mid) references Movie(id)	# MovieGenre will reference a movie from Movie table
)ENGINE = INNODB;

CREATE TABLE MovieDirector(
	mid INT NOT NULL,
	did INT NOT NULL,
	FOREIGN KEY(mid) references Movie(id),	# MovieDirector references a movie from Movie table
	FOREIGN KEY(did) references Director(id) # MovieDirector references a director from Director tbale
)ENGINE = INNODB;

CREATE TABLE MovieActor(
	mid 	INT NOT NULL,
	aid 	INT NOT NULL,
	role 	VARCHAR(50),
	FOREIGN KEY(mid) references Movie(id), 	# MovieActor references movie from Movie table
	FOREIGN KEY(aid) references Actor(id)	# MovieaActor references actor from Actor table
)ENGINE = INNODB;

CREATE TABLE Review(
	name 	VARCHAR(20),
	time 	TIMESTAMP,
	mid 	INT NOT NULL,					# movie id must be specified
	rating 	INT,
	comment VARCHAR(500),
	FOREIGN Key(mid) references Movie(id) # Review references movie from Movie table
)ENGINE = INNODB;

CREATE TABLE MaxPersonID(
	id INT NOT NULL 			# maximum person id must be a value
) ENGINE = INNODB;

CREATE TABLE MaxMovieID(
	id INT NOT NULL				# maximum movie id must be a value
) ENGINE = INNODB;
