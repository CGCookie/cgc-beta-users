<?php


function cgc_process_add_beta_user(){

	if ( isset( $_POST['action'] ) && $_POST['action'] == 'cgc-add-beta-user' ) {

		if ( wp_verify_nonce( $_POST['cgc_beta_user_nonce'], 'cgc-add-beta-user' ) ) {

			$user_id  	= isset($_POST['user_id']) ? $_POST['user_id'] : false;

			if( function_exists('cgc_add_beta_user') ) {

				$args = array(
					'user_id' 		=> $user_id,
					'date_added'	=>  current_time('timestamp')
				);
				cgc_add_beta_user($args);

			}
			wp_redirect( admin_url('users.php?page=beta-users'));
		}

	}

}
add_action('init', 'cgc_process_add_beta_user');





