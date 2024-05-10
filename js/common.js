function applyVoucher(root_url, product_id) {
	// alert("This is base url: " + product_id);

	var the_path = root_url + "cart/applyvoucher/" + product_id;
	var pquantity = $("#product_quantity").val();
	var pcurrency = $("#product_currency").val();
	var voucher_code = $("#voucher_code").val();

	// console.log(pcurrency);

	if(voucher_code !=="")
		{
//	alert(voucher_code);
//	alert(pquantity);
//	alert(pcurrency);

	$.post(
		the_path,
		{
			quantity: pquantity,
			currency: pcurrency,
			voucher_code: voucher_code,
			random_par: "d"
		},
		function (data, status) {
		//	console.clear();
//			console.log(data);
		//	alert(data);
			var resp ="";
			resp = data;	
		//	$("#response_area").html("data" + data + "\nStatus: " + status);
			if (status == "success") {

				if (resp.search("SUCCESS") > -1)
					{
				window.location.replace(root_url+ "cart/checkout");
					}
					else if (resp.search("FAIL") > -1)
						{
							fadeInFailVoucher();
						}
						else{
								console.log("NEITHER SUCCESS NOR FAIL")
						}
					
	//			fadeInAddedToView();
			//			refreshCartWidget(root_url);	
	//			$("#response_area").html("data" + data + "\nStatus: " + status);


			} else {
			// alert(data);
			console.log("data" + data + "\nStatus: " + status);
			}
		}
	);
		}
		else
		{
			fadeInFailVoucher();
					
		}
}


function addToCart(root_url, product_id) {
	// alert("This is base url: " + product_id);
	var path = root_url + "cart/additemtocart/" + product_id;
	var pquantity = $("#product_quantity").val();
	var pcurrency = $("#product_currency").val();

	$.post(
		path,
		{
			quantity: pquantity,
			currency: pcurrency,
			voucher_code: "",
			random_par: "d"

		},
		function (data, status, xhr) {
	//		alert(status);
	//		alert(xhr);
			console.clear();
			//	$("#response_area").html("data" + data + "\nStatus: " + status);
			if (status == "success") {
				fadeInAddedToView();
				refreshCartWidget(root_url);	
				$("#response_area").html("data" + data + "\nStatus: " + status);

			} else {
				$("#response_area").html("data" + data + "\nStatus: " + status);
			}
		}
	);
}

function checkToCart(root_url) {
	var path = root_url + "cart/checkout";
	//	var pquantity = $("#product_quantity").val();
	//	var pcurrency = $("#product_currency").val();
	window.location.href = path;
	/*
	$.post(path, {}, function (data, status) {
		console.clear();
		//	$("#response_area").html("data" + data + "\nStatus: " + status);
		if (status == "success") {
			$("#response_area").html("data" + data + "\nStatus: " + status);
		} else {
			$("#response_area").html("data" + data + "\nStatus: " + status);
		}
	});
	*/
}

function removeShoppingCartItem(root_url, shopping_cart_cache_id) {
	var path = root_url + "cart/removeitemfromcart/" + shopping_cart_cache_id;
	/* 	var pquantity = $("#product_quantity").val();
	var pcurrency = $("#product_currency").val();
*/

	$.post(path, {}, function (data, status) {
		console.clear();
		//	$("#response_area").html("data" + data + "\nStatus: " + status);
		if (status == "success") {
			window.location.href = root_url + "/cart/checkout";
			//	$("#response_area").html("data" + data + "\nStatus: " + status);
		} else {
			//	$("#response_area").html("data" + data + "\nStatus: " + status);

			window.location.href = path;
		}
	});
}



	function refreshCartWidget(root_url)
	{
		console.log("refreshing cart totals...");
		var path = root_url + "cart/getcarttotals";
	//	var pquantity = $("#cart_count").val();
	//	var ptotal = $("#cart_total").val();
	
		$.post(
			path,
			{
				a : "nothing"
			},
			function (data, status) {
				console.clear();
				//	$("#response_area").html("data" + data + "\nStatus: " + status);
				if (status == "success") {
					var r ="";
					r =  data;
		//			alert(r);

					var rr = data.split(":");
					$("#cart_count").html(rr[0]);
					$("#cart_total").html(rr[1]);
			//		$("#response_area").html("data" + data + "\nStatus: " + status);
				} else {
			//		$("#response_area").html("data" + data + "\nStatus: " + status);
				}
			}
		);
	}

function fadeInAddedToView()
{
//	alert("added fade in");
//	console.log("added fade in");
	$("#added_to_cart").fadeIn(1500);
	
	setTimeout("fadeoutaddedtoview()", 2000);
	}
function fadeoutaddedtoview()
{
	console.log("added fade out");
	$("#added_to_cart").fadeOut(500);
}

function fadeInFailVoucher()
{
//	alert("added fade in");
//	console.log("added fade in");
	$("#fail_voucher").fadeIn(1500);
	
	setTimeout("fadeoutFailVoucher()", 2000);
	}
function fadeoutFailVoucher()
{
	console.log("added fade out");
	$("#fail_voucher").fadeOut(500);
}
