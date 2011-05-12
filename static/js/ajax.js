//
// Send an AJAX request via HTTP GET
//
ajaxGET = function (url, callback, params) {
	var xhr, target, changeListener;
	url += '&' + params
	xhr = new XMLHttpRequest();
	changeListener = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				callback(xhr.responseText);
			}
	};
	xhr.open("GET", url, true);
	xhr.onreadystatechange = changeListener;
	xhr.send();
};

//
// Send an AJAX request via HTTP POST
//
ajaxPOST = function (url, callback, params) {
	var xhr, target, changeListener;
	xhr = new XMLHttpRequest();
	changeListener = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				callback(xhr.responseText);
			}
	};
	xhr.open("POST", url, true);
	xhr.onreadystatechange = changeListener;
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(params);
};
