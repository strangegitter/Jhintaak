<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
        // This gets the theme name from the stylesheet (lowercase and without spaces)
        $themename = get_option( 'stylesheet' );
        $themename = preg_replace("/\W/", "_", strtolower($themename) );

        $optionsframework_settings = get_option('optionsframework');
        $optionsframework_settings['id'] = $themename;
        update_option('optionsframework', $optionsframework_settings);
         // echo $themename;
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

/**
 *
 * List option keys using for injecting sub theme options in the form
 *
 * general: for General Option
 * pages: for General Option 
 * fonts: for General Option
 * general: for General Option
 * general: for General Option
 * general: for General Option
 */
function optionsframework_options() {
    $options = array();
    // $options['general'][] = array(
    //     'name' => __( 'Logo', TEXTDOMAIN ),
    //     'desc' => '',
    //     'id' => 'logo',
    //     'type' => 'upload'
    // );

    // $options['general'][] = array(
    //     'name' => __( 'Logo', TEXTDOMAIN ),
    //     'desc' => '',
    //     'id' => 'logo',
    //     'type' => 'upload'
    // );
    $wp_editor_settings = array(
        'wpautop' => true, // Default
        'textarea_rows' => 5,
        'media_buttons' => true
    );
     $options['general'][] = array(
        'name' => __('Copyright', TEXTDOMAIN),
        'id' => 'copyright',
        'type' => 'editor',
        'std' =>'Copyright 2013 Powered by <a href="http://wordpress.org/" target="_blank">Wordpress</a><br>All Rights Reserved.',
        'settings' => $wp_editor_settings );

    $imagepath = get_template_directory_uri().'/images/options/';

    $options['general'][] = array(
        'name' => "Header Skin",
        'desc' => "Images for layout header.",
        'id' => "header",
        'std' => "default",
        'type' => "images",
        'options' => array(
            'default' => $imagepath . 'header-default.jpg',
            'style2' => $imagepath . 'header-style2.jpg')
    );

    $options['general'][] = array(
        'name' => "Footer Skin",
        'desc' => "Images for layout footer.",
        'id' => "footer",
        'std' => "default",
        'type' => "images",
        'options' => array(
            'default' => $imagepath . 'footer-1.jpg',
            'style2' => $imagepath . 'footer-2.jpg')
    );

    $newoptions = WPO_Option::getInstance()->getOption( $options );

    /*
     *  if you would like to make new  options in new tabs. you  meger owner options with $newoptions
     *
     *  $owneroptions[] = array(
     *    'name' => __( 'Logo', TEXTDOMAIN ),
     *    'desc' => '',
     *    'id' => 'logo',
     *    'type' => 'upload'
     *  );
     *
     *  $newoptions = array_merge_recursive( $newoptions, $owneroptions );
     */
	
    return $newoptions;

}