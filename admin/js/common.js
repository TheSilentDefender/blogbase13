$(document).ready(function() {
$(".validateproduct").click(isValidateProduct);
$(".changepassword").click(isupdatepassword);
$(".updateproduct").click(function(){
	
	var valid = true;

	var category = $("select[name='category']").val();
	var subcategory = $("select[name='subcategory']").val();

	var product_name = $("input[name='product_name']").val();
	var product_code = $("input[name='product_code']").val();

	var market_price = $("input[name='market_price']").val();
	var discount = $("input[name='discount']").val();

	var stock1 = $("input[name='stock1']").val();

	var description = $("textarea[name='description']").val();
	var pic1 = $("input[name='pic1']").val();
	var pic2 = $("input[name='pic2']").val();

	$(".message").html("&nbsp;");
	$(".message").css("color", "red");
	$(".message").css("font-size", "15px");
	$(".message").css("font-weight", "500");
	if (category == 0) {
		valid = false;
		$(".msgcategory").html("Select category");

	}

	if (product_name.length == 0) {
		valid = false;
		$(".msgproduct_name").html("Enter product name");

	}
	if (product_code.length == 0) {
		valid = false;
		$(".msgproduct_code").html("Enter product code");

	}


	if (discount.length == 0 || checkdiscountonlydigit(discount) == false){
		valid = false;
		$(".msgdiscount").html("Enter discount");
	}
	if (stock1.length == 0 || checkstockonlydigit(stock1) == false) {
		valid = false;
		$(".msgstock").html("Enter stock only digit");
	}

	if (market_price.length == 0 || checkpriceonlydigit(market_price) == false) {
		valid = false;
		$(".msgmrp").html("Please enter mrp only digit");
	}
	if (description.length == 0) {
		valid = false;
		$(".msgdescription").html("Please enter description");
	}

	return valid;
});
	
$("#stock1").keyup(function(){
	var valid = true;
	var stock1 = $("input[name='stock1']").val();
	$(".msgstock").html("&nbsp;");
	$(".msgstock").css("color", "red");
	$(".msgstock").css("font-size", "15px");
	$(".msgstock").css("font-weight", "500");
	
	if (stock1.length == 0 || checkstockonlydigit(stock1) == false) {
		valid = false;
		$(".msgstock").html("Enter stock only digit");

	}
	
	return valid;
});

$("#market_price").keyup(function(){
	var valid = true;
	var market_price = $("input[name='market_price']").val();
	$(".msgmrp").html("&nbsp;");
	$(".msgmrp").css("color", "red");
	$(".msgmrp").css("font-size", "15px");
	$(".msgmrp").css("font-weight", "500");
	
	if (market_price.length == 0 || checkpriceonlydigit(market_price) == false) {
		valid = false;
		$(".msgmrp").html("Please enter mrp only digit");

	}
	
	return valid;
});
$("#discount").keyup(function(){
	var valid = true;
	var discount = $("input[name='discount']").val();
	$(".msgdiscount").html("&nbsp;");
	$(".msgdiscount").css("color", "red");
	$(".msgdiscount").css("font-size", "15px");
	$(".msgdiscount").css("font-weight", "500");
	
	if (discount.length == 0 || checkdiscountonlydigit(discount) == false) {
		valid = false;
		$(".msgdiscount").html("Enter discount only digit");

	}
	return valid;
});


});

function isValidateProduct() {
	var valid = true;

	var category = $("select[name='category']").val();
	var subcategory = $("select[name='subcategory']").val();

	var product_name = $("input[name='product_name']").val();
	var product_code = $("input[name='product_code']").val();

	var market_price = $("input[name='market_price']").val();
	var discount = $("input[name='discount']").val();

	var stock1 = $("input[name='stock1']").val();

	var description = $("textarea[name='description']").val();
	var pic1 = $("input[name='pic1']").val();
	var pic2 = $("input[name='pic2']").val();

	$(".message").html("&nbsp;");
	$(".message").css("color", "red");
	$(".message").css("font-size", "15px");
	$(".message").css("font-weight", "500");
	if (category == 0) {
		valid = false;
		$(".msgcategory").html("Select category");

	}
	
	if (product_name.length == 0) {
		valid = false;
		$(".msgproduct_name").html("Enter product name");

	}
	if (product_code.length == 0) {
		valid = false;
		$(".msgproduct_code").html("Enter product code");

	}
	if (pic1.length == 0) {
		valid = false;
		$(".msgpic1").html("Select Image");

	}
	if (pic2.length == 0) {
		valid = false;
		$(".msgpic2").html("Select Image");

	}

	if (discount.length == 0 || checkdiscountonlydigit(discount) == false){
		valid = false;
		$(".msgdiscount").html("Enter discount");
	}
	if (stock1.length == 0 || checkstockonlydigit(stock1) == false) {
		valid = false;
		$(".msgstock").html("Enter stock only digit");
	}

	if (market_price.length == 0 || checkpriceonlydigit(market_price) == false) {
		valid = false;
		$(".msgmrp").html("Please enter mrp only digit");
	}
	if (description.length == 0) {
		valid = false;
		$(".msgdescription").html("Please enter description");
	}

	return valid;
}
function isupdatepassword() {
	var valid = true;
	var oldpassword = $("input[name='oldpassword']").val();
	var newpassword = $("input[name='newpassword']").val();
	var cpassword = $("input[name='confirmpassword']").val();
	$(".message").html("&nbsp;");
	$(".message").css("color", "red");
	if (oldpassword.length == 0) {
		valid = false;
		$(".msgoldpassword").html("Please enter password");
	}if (newpassword.length == 0) {
		valid = false;
		$(".msgnewpassword").html("Please enter new password");
	} else if (newpassword.length <= 7) {
		valid = false;
		$(".msgnewpassword").html("Enter new password to short");
	}  if (cpassword.length == 0) {
		valid = false;
		$(".msgconfirmpassword").html("Please enter confirm password");
	} else if (newpassword != cpassword) {
		valid = false;
		$(".msgconfirmpassword").html("Password mis match");
	}
	return valid;
}
function checkpriceonlydigit(market_price) {
	var regex = /^[0-9]+$/;
	return regex.test(market_price);
}

function checkdiscountonlydigit(discount){
	var regex = /^[0-9]+$/;
	return regex.test(discount);
}

function checkstockonlydigit(stock1) {
	var regex = /^[0-9]+$/;
	return regex.test(stock1);
}

function checkweightonlydigit(weight) {
	var regex = /^[0-9]+$/;
	return regex.test(weight);
}