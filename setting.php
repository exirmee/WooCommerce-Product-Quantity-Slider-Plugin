<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'admin_menu', 'stp_api_add_admin_menu' );
add_action( 'admin_init', 'stp_api_settings_init' );

function stp_api_add_admin_menu(  ) {
    add_options_page( 'ُAdd Slider Page', 'Add Slider Settings', 'manage_options', 'settings-api-page', 'stp_api_options_page' );
}

function stp_api_settings_init(  ) {
    register_setting( 'stpPlugin', 'stp_api_settings' );
    
    add_settings_section(
        'stp_api_stpPlugin_section',
        __( 'Slider Settings', 'wordpress' ),
        'stp_api_settings_section_callback',
        'stpPlugin'
    );

    add_settings_field(
        'stp_api_text_field_min',
        __( 'Slider Min', 'wordpress' ),
        'stp_api_text_field_min_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );

    add_settings_field(
        'stp_api_text_field_max',
        __( 'Slider Max', 'wordpress' ),
        'stp_api_text_field_max_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
	add_settings_field(
        'stp_api_text_field_step',
        __( 'Slider Step', 'wordpress' ),
        'stp_api_text_field_step_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
	add_settings_field(
        'stp_api_text_field_def',
        __( 'Slider Default', 'wordpress' ),
        'stp_api_text_field_def_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
    add_settings_field(
        'stp_api_text_field_cat',
        __( 'included Categury(slug name)', 'wordpress' ),
        'stp_api_text_field_cat_render',
        'stpPlugin',
        'stp_api_stpPlugin_section'
    );
}

function stp_api_text_field_min_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
	<input  type="number" name='stp_api_settings[stp_api_text_field_min]' class="small-text" step="any" value='<?php echo $options['stp_api_text_field_min']; ?>'>
    <?php
}

function stp_api_text_field_max_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
	<input  type="number" name='stp_api_settings[stp_api_text_field_max]' class="small-text" step="any" value='<?php echo $options['stp_api_text_field_max']; ?>'>
	<?php
}

function stp_api_text_field_step_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
	<input  type="number" name='stp_api_settings[stp_api_text_field_step]' class="small-text" step="any" value='<?php echo $options['stp_api_text_field_step']; ?>'>
	<?php
}

function stp_api_text_field_def_render(  ) {
    $options = get_option( 'stp_api_settings' );
    ?>
	<input  type="number" name='stp_api_settings[stp_api_text_field_def]' class="small-text" step="any" value='<?php echo $options['stp_api_text_field_def']; ?>'>
	<?php
}


function stp_api_text_field_cat_render() {
    $options = get_option( 'stp_api_settings' );
    ?>
	<input  type="text" name='stp_api_settings[stp_api_text_field_cat]' class="medium-text"  value='<?php echo $options['stp_api_text_field_cat']; ?>'>
	<?php
}

function stp_api_settings_section_callback(  ) {
    echo __( 'set min and max and step and categuries to apply for slider', 'wordpress' );
}

function stp_api_options_page(  ) {
    ?>
    <form action='options.php' method='post'>

        <h2>Setting for Add Slider Plugin</h2>

        <?php
        settings_fields( 'stpPlugin' );
        do_settings_sections( 'stpPlugin' );
        submit_button();
        ?>

    </form>	
    <?php
}
