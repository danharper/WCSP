$(function() {
	
	var html, section, aside, articles, h1, h1orig;
	
	//window.onmousemove = function () { alert("LOL") };
	
	// js class
	html = document.documentElement;
	html.className = html.className.replace(/\bno-js\b/,'') + 'js';
	
	// faux columns like a boss
	section = $("body > section")[0];
	aside = $("body > aside")[0];
	aside.style.height = section.offsetHeight + "px";
	
	
	// expand that shit
	articles = $("body > section article");
	$(articles).hover(
		function () {
			this.className += " expand";
		},
		function () {
			this.className = this.className.replace(/\bexpand\b/,'');
		}
	);
	
	
	// lul wtf
	// h1 = document.getElementsByTagName("h1")[0];
	// h1orig = h1.innerHTML;
	// $("body > header").hover(
		// function () {
			// h1.innerHTML = "☞ " + h1orig + " ☜";
		// },
		// function () {
			// h1.innerHTML = h1orig;
		// }
	// );
	
});
