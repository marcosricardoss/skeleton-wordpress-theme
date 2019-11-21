window.addEventListener("resize", resizeHandler);

function resizeHandler() {
  var w = window.innerWidth;
	var h = window.innerHeight;
	if (w <= 1024) {
		document.getElementById("main-menu").classList = "pure-menu";
	} else {
		document.getElementById("main-menu").classList = "pure-menu pure-menu-horizontal";
	}
}