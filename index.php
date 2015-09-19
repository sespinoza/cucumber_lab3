<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">

		<title>Silver Jack Card Game</title>

		<!-- SEO Meta tag information -->
		<meta name="description" content="Silver Jack card game for the CST336 course at CSU Monterey Bay FA2015.
		The Silver Jack game is part of a lab for teaching students how to use PHP and arrays, loops with conditions"/>

		<meta name="keywords" content="PHP tutorial game, CSU Monterey Bay CST336, PHP Lab application, Silver Jack Game" />

		<!-- Web application authors -->
		<meta name="author" content="Andrew Richardson, Susan Espinoza, Brandon Saletta & Richard D Ciampa" />

		<!-- Style sheets -->
		<link type="text/css" href="css/styles.css" rel="stylesheet">
		<link type="text/css" href="./css/theme-common.css" rel="stylesheet" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Site favicon and application icon references -->
		<!-- <link rel="shortcut icon" href="/favicon.ico"> Unused at the moment -->
		<link rel="icon" type="image/png" href="./img/csumb-logo-white.png" />

	</head>

	<body>
		<div id="wrapper">
			<header>
				<h1>Welcome to SilverJack</h1>
			</header>
			<nav></nav>

			<div>
				<?php
				//Include the silverjack.php so we can see our code
				include_once './silverjack.php';
				global $players;
				

				foreach ($players as $playersKey => $playerValues) {
					echo "<div id='player-container'>";
					echo "<h4>{$playersKey}</h4>";
					
					/*
					 * Lets get the image uri here to make the formatting
					 * of the image tag simpler
					 */
					$pic = $players[$playersKey]['pic'];
					echo "<img class='player-pic' src='{$pic}' />";
					
					foreach ($playerValues as $key => $value) {
						
					}
					
					echo "<!-- End Player -->\n </div>";
				}
				?>
			</div>

			<footer>
				<figure>
					<img class="footerLogoImage" src="./img/csumb-logo-white.png" />
				</figure>
				<p>
					All rights reserved &copy; Copyright by Andrew Richardson, Brandon Saletta, Richard Ciampa, Susan Espinoza
				</p>
			</footer>
		</div>
	</body>
</html>
