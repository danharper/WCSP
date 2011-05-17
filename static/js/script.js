all_pages = function() {
	// Oh jQuery, how I miss you...

	var html, main, aside, product_images, product_images_figure, remove_button;

	//console.log("We have liftoff.");

	// swap 'no-js' class on html tag for 'js'
	html = document.documentElement;
	html.className = html.className.replace(/\bno-js\b/,'') + 'js';


	// faux columns, like a boss
	main = document.getElementById("main");
	aside = document.getElementById("sidebar");
	aside.style.height = main.offsetHeight + "px";


	// product listing prices on hover
	var articles = document.querySelectorAll(".products article a");

	fadePriceIn = function(e) {
		var target = e.target;
		if (target.tagName != 'IMG') return; // stop event bubbling
		var price = target.parentElement.childNodes[3];
		price.className = "hover";
	}

	fadePriceOut = function(e) {
		var target = e.target;
		if (target.tagName != 'IMG') return; // stop event bubbling
		var price = target.parentElement.childNodes[3];
		price.className = "";
	}

	for (i = 0; i < articles.length; i++) {
		element = articles[i];
		element.onmouseover = fadePriceIn;
		element.onmouseout = fadePriceOut;
	}
	


	// product images display in box when clicked
	product_images = document.querySelectorAll(".product .images a");
	product_images_figure = document.querySelector(".product figure img");

	swapImages = function(e) {
		product_images_figure.src = e.target.src;
		return false;
	}

	for (i = 0; i < product_images.length; i++) {
		product_images[i].onclick = swapImages;
	}
	

	// confirm removal
	remove_button = document.getElementById("confirmremove");
	if (remove_button) {
		remove_button.onsubmit = function() {
			return confirm("Are you sure you want to remove this?");
		}
	}
	
}
