<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<script>

var slider = document.getElementsByClassName("slide2")[0];
var output = document.querySelector("#outputLabel");
var totalP = document.querySelector("#totalLabel");
var quantity = document.getElementsByName("quantity")[0];
var price = "<?php global $product; echo $product->get_price(); ?>";


function numberWithCommas(x) {
	return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
	}
	
slider.oninput = function doMath() {
	output.innerHTML = String(slider.value);
	totalP.innerHTML =  numberWithCommas(String(price*slider.value));
	var quantity = document.getElementsByName("quantity")[0];
	output.innerHTML = slider.value;
	quantity.value = slider.value;
	totalP.innerHTML =  numberWithCommas(String(price*slider.value));
}

</script>