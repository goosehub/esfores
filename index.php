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
<!-- 
	<ul class="nav nav-pills">
	  <li role="presentation" class="active"><a href="/">esfores</a></li>
	  <li role="presentation"><a href="radio">Nice Radio</a></li>
	  <li role="presentation"><a href="tribune">Tribune Online</a></li>
	  <li role="presentation"><a href="tribunemagazine">Tribune Magazine</a></li>
	  <li role="presentation"><a href="http://channelcentral.me/esfores">EsForEs Chat Room</a></li>
	  <li role="presentation"><a href="random">Random</a></li>
	</ul>

	<h4>What the people are saying about EsForEs.com</h4>

	<div id="quotes">

		<blockquote>
		  <p>so fantastically autistic</p>
		</blockquote>
		<strong>Anonymous</strong>

	</div>
 -->
	<div class="row">
		<div class="col-md-4">
			<div class="tile">
				<h1>Welcome to EsForEs</h1>
			</div>
			<div class="tile">
				<a href="random"><h2>?</h2></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="tile">
				<a href="radio"><h2>Nice Radio</h2></a>
			</div>
			<div class="tile">
				<a href="http://channelcentral.me/esfores"><h2>esfores Chat</h2></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="tile">
				<a href="tribune"><h2>Tribune Online</h2></a>
			</div>
			<div class="tile">
				<a href="tribunemagazine"><h2>Tribune Magazine</h2></a>
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