<?php

/**
*	Add a single beta user
*
*
*/
function cgc_add_beta_user( $args = array() ) {

	$db = new CGC_BETAUSERS_DB;

	$defaults = array(
		'user_id'   => $args['user_id'],
		'date_added'   => current_time('timestamp')
	);

	$args = array_merge( $defaults, $args );

	// bail out if no user id set
	if ( empty( $args['user_id'] ) || $args['user_id'] == 0 )
		return;

	$db->insert( $args );

}

function cgc_remove_beta_user(){}

/**
*	Get a single beta user
*
*	@param $user_id int id of the user to get
*	@return $user_id if true, false if doesnt exist
*	@since 1.0
*/
function cgc_get_beta_user( $user_id = 0 ){

	if ( empty( $user_id ) )
		return;

	$db = new CGC_BETAUSERS_DB;

	$out = $db->get_beta_user( absint( $user_id ) );

	return $out ? $out : false;
}

/**
*	Get all beta users from database
*
*	@return array
*	@since 1.0
*/
function cgc_get_beta_users(){

	$db = new CGC_BETAUSERS_DB;

	$out = $db->get_beta_users();

	return $out ? $out : false;

}
