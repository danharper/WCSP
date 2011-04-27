$(function() {
	
	var html, section, aside, articles, h1, h1orig;
	
	console.log("dayum, say what?!");
	
	// js class
	html = document.documentElement;
	html.className = html.className.replace(/\bno-js\b/,'') + 'js';
	
	// faux columns like a boss
	section = $("body > section")[0];
	aside = $("body > aside")[0];
	aside.style.height = section.offsetHeight + "px";
	
	// product listing names on hover
	articles = $(".products article a");
	$(articles).hover(
		function() {
			$(this).children("p").stop(true, true).fadeIn();
		},
		function() {
			$(this).children("p").stop(true, true).fadeOut();
		}
	);

	// Product images display in box when clicked
	var product_images, product_images_figure;
	product_images = $("article.product .images a");
	product_images_figure = $("article.product figure img");

	$(product_images).click(function() {
		img = $(this).find('img');
		imgsrc = $(img).attr('src');
		$(product_images_figure).attr('src', imgsrc);
		return false;
	});
	
});
