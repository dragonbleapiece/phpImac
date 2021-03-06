<?php

$genres = [
	"Drama",
	"Science Fiction",
	"Action",
	"Adventure",
	"Animation",
	"Thriller",
	"Horror",
	"Western",
	"Comedy"
];

$movies = array(
	array("id"=>1, "title"=>"Fight Club", "genre"=>"Drama", "releaseDate"=>"1999-09-10", "director"=>"David Fincher"),
	array("id"=>2, "title"=>"Pulp Fiction", "genre"=>"Drama", "releaseDate"=>"1994-09-10", "director"=>"Quentin Tarantino"),
	array("id"=>3, "title"=>"2001: A Space Odyssey", "genre"=>"Science Fiction", "releaseDate"=>"1968-04-03", "director"=>"Stanley Kubrick"),
	array("id"=>4, "title"=>"Blade Runner", "genre"=>"Drama", "releaseDate"=>"1982-06-25", "director"=>"Ridley Scott"),
	array("id"=>5, "title"=>"The Godfather", "genre"=>"Drama", "releaseDate"=>"1972-03-24", "director"=>"Francis Ford Coppola"),
	array("id"=>6, "title"=>"The Dark Knight", "genre"=>"Action", "releaseDate"=>"2008-07-16", "director"=>"Christopher Nolan"),
	array("id"=>7, "title"=>"Forrest Gump", "genre"=>"Drama", "releaseDate"=>"1994-07-06", "director"=>"Robert Zemeckis"),
	array("id"=>8, "title"=>"The Lord of the Rings: The Return of the King", "genre"=>"Action", "releaseDate"=>"2003-12-01", "director"=>"Peter Jackson"),
	array("id"=>9, "title"=>"Interstellar", "genre"=>"Science Fiction", "releaseDate"=>"2014-11-05", "director"=>"Christopher Nolan"),
	array("id"=>10, "title"=>"Il Buono, il Brutto, il Cattivo", "genre"=>"Western", "releaseDate"=>"1966-12-23", "director"=>"Sergio Leone"),
	array("id"=>11, "title"=>"Inception", "genre"=>"Action", "releaseDate"=>"2010-07-14", "director"=>"Christopher Nolan"),
	array("id"=>12, "title"=>"A Clockwork Orange", "genre"=>"Drama", "releaseDate"=>"1971-12-19", "director"=>"Stanley Kubrick"),
	array("id"=>13, "title"=>"Apocalypse Now", "genre"=>"Drama", "releaseDate"=>"1979-08-15", "director"=>"Francis Ford Coppola"),
	array("id"=>14, "title"=>"The Lord of the Rings: The Fellowship of the Ring", "genre"=>"Action", "releaseDate"=>"2001-12-19", "director"=>"Peter Jackson"),
	array("id"=>15, "title"=>"Star Wars Episode V: The Empire Strikes Back", "genre"=>"Science Fiction", "releaseDate"=>"1980-05-21", "director"=>"Irvin Kershner"),
	array("id"=>16, "title"=>"Eternal Sunshine of the Spotless Mind", "genre"=>"Drama", "releaseDate"=>"2004-03-19", "director"=>"Michel Gondry"),
	array("id"=>17, "title"=>"Old Boy", "genre"=>"Drama", "releaseDate"=>"2003-11-21", "director"=>"Park Chan-Wook"),
	array("id"=>18, "title"=>"Mononoke Hime", "genre"=>"Animation", "releaseDate"=>"1997-07-12", "director"=>"Hayao Miyazaki"),
	array("id"=>19, "title"=>"The Matrix", "genre"=>"Science Fiction", "releaseDate"=>"1999-03-31", "director"=>"Lilly Wachowski & Lana Wachowski"),
	array("id"=>20, "title"=>"Back to the Future", "genre"=>"Science Fiction", "releaseDate"=>"1985-07-03", "director"=>"Robert Zemeckis"),
	array("id"=>21, "title"=>"12 Angry Men", "genre"=>"Drama", "releaseDate"=>"1957-04-10", "director"=>"Sidney Lumet"),
	array("id"=>22, "title"=>"Mulholland Dr.", "genre"=>"Drama", "releaseDate"=>"2001-10-12", "director"=>"David Lynch"),
	array("id"=>23, "title"=>"Sen to Chihiro no Kamikakushi", "genre"=>"Animation", "releaseDate"=>"2001-07-27", "director"=>"Hayao Miyazaki"),
	array("id"=>24, "title"=>"Into the Wild", "genre"=>"Adventure", "releaseDate"=>"2007-09-21", "director"=>"Sean Penn"),
	array("id"=>25, "title"=>"One Flew Over the Cuckoo's Nest", "genre"=>"Drama", "releaseDate"=>"1975-11-21", "director"=>"Milos Forman"),
	array("id"=>26, "title"=>"One Upon a Time in America", "genre"=>"Drama", "releaseDate"=>"1984-05-23", "director"=>"Sergio Leone"),
	array("id"=>27, "title"=>"The Shining", "genre"=>"Horror", "releaseDate"=>"1980-05-23", "director"=>"Stanley Kubrick"),
	array("id"=>28, "title"=>"Drive", "genre"=>"Drama", "releaseDate"=>"2011-11-15", "director"=>"Nicolas Winding Refn"),
	array("id"=>29, "title"=>"Gladiator", "genre"=>"Action", "releaseDate"=>"2000-05-05", "director"=>"Ridley Scott"),
	array("id"=>30, "title"=>"The Big Lebowski", "genre"=>"Comedy", "releaseDate"=>"1998-03-06", "director"=>"the Coen Brothers"),
	array("id"=>31, "title"=>"Se7en", "genre"=>"Thriller", "releaseDate"=>"1995-09-22", "director"=>"David Fincher"),
	array("id"=>32, "title"=>"Goodfellas", "genre"=>"Drama", "releaseDate"=>"1990-09-12", "director"=>"Martin Scorsese"),
	array("id"=>33, "title"=>"The Shawshank Redemption", "genre"=>"Drama", "releaseDate"=>"1994-09-10", "director"=>"Frank Darabont"),
	array("id"=>34, "title"=>"Django Unchained", "genre"=>"Western", "releaseDate"=>"2012-12-25", "director"=>"Quentin Tarantino"),
	array("id"=>35, "title"=>"C'era una volta il West", "genre"=>"Western", "releaseDate"=>"1968-12-25", "director"=>"Sergio Leone"),
	array("id"=>36, "title"=>"American Beauty", "genre"=>"Drama", "releaseDate"=>"1999-09-15", "director"=>"Sam Mendes"),
	array("id"=>37, "title"=>"Alien", "genre"=>"Science Fiction", "releaseDate"=>"1979-05-25", "director"=>"Ridley Scott"),
	array("id"=>38, "title"=>"The Green Mile", "genre"=>"Drama", "releaseDate"=>"1999-12-10", "director"=>"Frank Darabont"),
	array("id"=>39, "title"=>"Reservoir Dogs", "genre"=>"Thriller", "releaseDate"=>"1992-09-02", "director"=>"Quentin Tarantino"),
	array("id"=>40, "title"=>"Mommy", "genre"=>"Drama", "releaseDate"=>"2014-10-19", "director"=>"Xavier Dolan"),
	array("id"=>41, "title"=>"Shutter Island", "genre"=>"Thriller", "releaseDate"=>"2010-02-19", "director"=>"Martin Scorsese"),
	array("id"=>42, "title"=>"The Lord of the Rings: The Two Towers", "genre"=>"Adventure", "releaseDate"=>"2002-12-18", "director"=>"Peter Jackson"),
	array("id"=>43, "title"=>"Kill Bill: Vol. 1", "genre"=>"Action", "releaseDate"=>"2003-10-10", "director"=>"Quentin Tarantino"),
	array("id"=>44, "title"=>"Barry Lyndon", "genre"=>"Drama", "releaseDate"=>"1975-12-18", "director"=>"Stanley Kubrick"),
	array("id"=>45, "title"=>"Requiem for a Dream", "genre"=>"Drama", "releaseDate"=>"2000-11-03", "director"=>"Darren Aronofsky"),
	array("id"=>46, "title"=>"Donnie Darko", "genre"=>"Science Fiction", "releaseDate"=>"2001-10-26", "director"=>"Richard Kelly"),
	array("id"=>47, "title"=>"The Usual Suspects", "genre"=>"Thriller", "releaseDate"=>"1995-07-19", "director"=>"Bryan Singer"),
	array("id"=>48, "title"=>"Jurassic Park", "genre"=>"Adventure", "releaseDate"=>"1993-06-11", "director"=>"Steven Spielberg"),
	array("id"=>49, "title"=>"Taxi Driver", "genre"=>"Drama", "releaseDate"=>"1976-02-08", "director"=>"Martin Scorsese"),
	array("id"=>50, "title"=>"American History X", "genre"=>"Drama", "releaseDate"=>"1998-10-30", "director"=>"Tony Kaye"),
	array("id"=>51, "title"=>"Le Horla", "genre"=>"Drama", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>52, "title"=>"MƎTRONORMƎ", "genre"=>"Drama", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>53, "title"=>"L'Interview Numérique - Digital Sweat", "genre"=>"Comedy", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>54, "title"=>"Morue", "genre"=>"Comedy", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>55, "title"=>"Sup de Super", "genre"=>"Comedy", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>56, "title"=>"Onisk", "genre"=>"Drama", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>57, "title"=>"Olentia", "genre"=>"Comedy", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020"),
	array("id"=>58, "title"=>"Le Carton", "genre"=>"Comedy", "releaseDate"=>"2018-01-01", "director"=>"IMAC2020")
);

?>
