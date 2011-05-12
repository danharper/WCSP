product_show = function() {

	var price, quantity, subtotal;
	var addtobasket, name, id, cart, submit;

	price = document.getElementById("product_price");
	name = document.getElementById("product_name");
	id = document.getElementById("product_id");
	cart = document.getElementById("cart");
	submit = document.getElementById("epicsubmitbtn");
	quantity = document.getElementById("quantity");
	subtotal = document.getElementById("subtotal");
	addtobasket = document.getElementById("addtobasket");

	calculateSubtotal = function() {
		subtotal.innerHTML = '£' + (price.value * quantity.value).toFixed(2);
	};

	toTheBasket = function() {
		p = price.value;
		n = name.value;
		i = id.value;
		q = quantity.value;
		submit.disabled = true;
		var params = 'id='+i+'&name='+n+'&price='+p+'&quantity='+q;
		params = encodeURI(params);
		ajaxPOST('api/add_to_basket', validateBasket, params);
		return false;
	};

	validateBasket = function(status) {
		if (status == 0) {
			outOfStock();
		}
		else {
			inStock();
		}
		ajaxGET('api/basket_quantity_message', updateBasket, '');
	};

	outOfStock = function() {
		submit.disabled = true;
		var stockwarning = document.querySelector(".lowstockwarning");
		stockwarning.innerHTML = "No more stock left.";
	};

	inStock = function() {
		submit.disabled = false;
	};

	updateBasket = function(message) {
		cart.childNodes[1].innerHTML = message;
	};

	quantity.onchange = calculateSubtotal;
	addtobasket.onsubmit = toTheBasket;

}
