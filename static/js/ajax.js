//
// Send an AJAX request via HTTP GET
//
ajaxGET = function (url, callback, params) {
	var xhr, target, changeListener;

	// build url
	url += '&' + params

	// create a request object
	xhr = new XMLHttpRequest();

	changeListener = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				callback(xhr.responseText);
			}
	};

	// initialise a request
	xhr.open("GET", url, true);
	xhr.onreadystatechange = changeListener;
	xhr.send();

};

//
// Send an AJAX request via HTTP POST
//
ajaxPOST = function (url, callback, params) {
	// declare the two variables that will be used
	var xhr, target, changeListener;

	// create a request object
	xhr = new XMLHttpRequest();

	changeListener = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				callback(xhr.responseText);
			}
	};

	// initialise a request
	xhr.open("POST", url, true);
	xhr.onreadystatechange = changeListener;
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	xhr.send(params);

};
