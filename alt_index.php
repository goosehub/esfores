<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
	<title>
	esfores
	</title>

<!-- For Responsive Mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
	<meta name="keywords" content="esfores">
	<meta name="description" content="esfores">
	<meta name="author" content="Goose">
	<meta name="robots" CONTENT="all">

<!-- Style -->
	<link rel="stylesheet" href="resources/tools/bootstrap.min.css" />
	<link rel="stylesheet" href="resources/style.css?<?php echo time(); ?>" />

<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>

<!-- Icon -->
	<!-- <link rel="shortcut icon" href="resources/images/favicon.ico"> -->
<!-- IE Fallback -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
    <!-- Body -->

	<div class="row">
		<div class="col-md-4">
			<div class="tile">
				<h1>Welcome to EsForEs</h1>
			</div>
			<a class="tile_link" href="random">
				<div class="tile">
					<h2>?</h2>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a class="tile_link" href="radio">
				<div class="tile">
					<h2>Nice Radio</h2>
				</div>
			</a>
			<a class="tile_link" href="http://channelcentral.me/esfores">
				<div class="tile">
					<h2>esfores Chat</h2>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a class="tile_link" href="tribune/news">
				<div class="tile">
					<h2>Tribune Online</h2>
				</div>
			</a>
			<a class="tile_link" href="tribunemagazine">
				<div class="tile">
					<h2>Tribune Magazine</h2>
				</div>
			</a>
			<br>
			<div id="water" class="tile">
				<img class="tile_img" src="resources/pics/water.png"/>
			</div>
		</div>
	</div>

    <!-- Script -->
	<script type="text/javascript" src="resources/tools/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="resources/tools/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/tools/randomColor.js"></script>
    <!-- <script type="text/javascript" src="resources/script.js"></script> -->

    <!-- Random colors -->

    <script>
$('.tile').each( function() {
	$(this).css('color', randomColor({luminosity: 'dark'}));
	$(this).css('background-color', randomColor({luminosity: 'light'}));
	// $(this).css('background-color', randomColor());
	random_height = Math.floor(Math.random() * (8 - 4)) + 4;
	$(this).css('height', random_height + 'em');
	random_font_size = Math.floor(Math.random() * (4 - 1)) + 1;
	$(this).css('font-size', random_font_size + 'em');
});
    </script>

</body>
</html>