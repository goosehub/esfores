						<!-- START ADVERTISMENT -->
<?php
$adverts = array(
	'<img class="advertImage" src="/tribune/ads/ad01.jpg">',
	'<img class="advertImage" src="/tribune/ads/ad02.jpg">',
	'<img class="advertImage" src="/tribune/ads/ad03.jpg">'
	);
$rand_keys = array_rand($adverts, 1);
echo $adverts[$rand_keys] . "\n";
?>
						<!-- END ADVERTISMENT -->