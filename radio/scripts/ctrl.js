function main(){
	window.isPaused = true;
	playpause();
	//this loop makes sure that the stats are updated every second
	reloadLoop();
	//this loop makes a tilde animation
	tildeLoop(1, 4, "");
}
function reloadLoop() {
	setTimeout(function () {
		reloadStats();
		reloadLoop();
	}, 1000);
}
function playSound() {
	document.getElementById('stinger').play();
}
function tildeLoop(onLoop, tc, toprint) {
	setTimeout(function () {
		for (var i = 0; i < onLoop; i++) {
			toprint = toprint + "~";
		};
		var lelements = document.getElementsByClassName('tilde');
		for (var i = lelements.length - 1; i >= 0; i--) {
			lelements[i].innerHTML = toprint; 
		};
		onLoop++;
		if (onLoop == tc){
			onLoop = 1;
		}
		tildeLoop(onLoop, tc, "");
	}, 250);
}
function reloadStats() {
	var docHeadObj = document.getElementById("streamStats");
	var dynamicScript = document.createElement("script");
	dynamicScript.type = "text/javascript";
	dynamicScript.src = "https://cp8.shoutcheap.com:2199/system/streaminfo.js";
	docHeadObj.appendChild(dynamicScript);
}
function playpause() {
	if (window.isPaused === true){
		document.getElementById('audio_stream_element').play();
		document.getElementById('controls').innerHTML = "♫Tuned In♫";
		window.isPaused = false;
	}else{
		document.getElementById('audio_stream_element').pause();
		document.getElementById('controls').innerHTML = "Paused :^)";
		window.isPaused = true;
	}
}
