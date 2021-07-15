<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>
<div class="budget-wrap">
    <div class="budget">
        <div class="header">
            <div class="title clearfix">Select your needed Value:  <span class="pull-right"></span></div>
        </div>
        <div class="content">
            <div id="mySlider"></div>
            <p>
            <label for="totalvalue">Total Value:</label>
            <input type="text" id="totalValue" style="border:0; color:#fa4b2a; font-weight:bold;">
            <label for="totalPrice">Total Price:</label>
            <input type="text" id="totalPrice" style="border:0; color:#fa4b2a; font-weight:bold;">
            </p>
        </div>

    </div>
</div>	

<script type="text/javascript" src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-darkness/jquery-ui.css" />

<script>

var field_min=<?php
$options = get_option( 'stp_api_settings' );
echo $options['stp_api_text_field_min'];  
?>;
var field_max=<?php
echo $options['stp_api_text_field_max'];  
?>;
var field_def=<?php
echo $options['stp_api_text_field_def'];  
?>;
var field_step=<?php
echo $options['stp_api_text_field_step'];  
?>;

var price =<?php
    global $product;
    echo $product->get_price();
    ?>;
 

 $(document).ready(function() {
    $( "#mySlider" ).slider({
   
    value:field_def,
    min: field_min,
    max: field_max,
    step: field_step,
    slide: function( event, ui ) {
   $( "#totalPrice" ).val( (ui.value*price) + "$" );
   $( "#totalValue" ).val((ui.value) + "M" );
   $("[name='quantity']").val(ui.value);

 }
});

$( "#totalPrice" ).val( ($( "#mySlider" ).slider( "value" )*price) +"$");
$( "#totalValue" ).val( ($( "#mySlider" ).slider( "value" )) +"M");
$("[name='quantity']").val($( "#mySlider" ).slider( "value" ));
});
</script>