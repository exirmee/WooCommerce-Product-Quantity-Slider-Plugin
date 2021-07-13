<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$options = get_option( 'stp_api_settings' );
?>
<div class="budget-wrap">
    <div class="budget">
        <div class="header">
            <div class="title clearfix">Select your needed Value:  <span class="pull-right"></span></div>
        </div>
        <div class="content">
            <input class="slide2" type="range" min='<?php echo $options['stp_api_text_field_min']; ?>' max='<?php echo $options['stp_api_text_field_max']; ?>' value='<?php echo $options['stp_api_text_field_def']; ?>' step='<?php echo $options['stp_api_text_field_step']; ?>'  id="sliderRange">
            <p class="slidecaption">Your Value : <span id="outputLabel"></span> M</p>
            </br>
            <p class="totalcaption">Total Price: <span id="totalLabel"></span> $</p>
        </div>
    </div>
</div>	

