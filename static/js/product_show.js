window.onload = function() {

	var quantity, subtotal;

	price = document.getElementById("price");
	quantity = document.getElementById("quantity");
	subtotal = document.getElementById("subtotal");

	calculateSubtotal = function() {
		subtotal.innerHTML = '£' + (price.innerHTML * quantity.value).toFixed(2);
		ajaxGET('api/product_stock_level', alert, 'id=5');
	}

	quantity.onchange = calculateSubtotal;

}
