<?php
/*
Plugin Name: SC Auto Login
Description: Auto login a newly registered user, after signup user is automatically logged in for a particular website.
Credit:  WP developer community for ideas here and code reference samples.
Version: 1.0
*/
function wp_new_user_registered( $user_id ) {
    if(is_admin()) return;
    wp_set_auth_cookie( $user_id, false, is_ssl() );
	//uncomment to debug
    //print_r($_GET['redirect_to']);
    //wp_redirect( wp_get_referer() );
    wp_redirect($_POST['redirect_to']);
    exit;
}
add_action( 'user_register', 'wp_new_user_registered' );
?>