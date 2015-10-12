<?php

class CGC_BETAUSERS_DB {

	private $table;

	function __construct() {

		global $wpdb;

		$this->table    	=  $wpdb->base_prefix . 'cgc_beta_users';

	}

	// insert events into db
	public function insert( $args = array() ) {

		global $wpdb;

		$defaults = array(
			'user_id'		=>	'',
			'date_added'	=>  ''
		);

		$args = wp_parse_args( $args, $defaults );

		$add = $wpdb->query(
			$wpdb->prepare(
				"INSERT INTO {$this->table} SET
					`user_id`    = '%s',
					`date_added`    = '%s'
				;",
				absint( $args['user_id'] ),
				date_i18n( 'Y-m-d H:i:s', $args['date_added'], true )
			)
		);

		do_action( 'cgc_beta_user_added', $args, $wpdb->insert_id );

		if( $add )
			return $wpdb->insert_id;
		return false;
	}

	function get_beta_users(){

		global $wpdb;

	   	$result = $wpdb->get_results( "SELECT * FROM {$this->table}" );

		return $result ? $result : false;

	}

	function get_beta_user( $user_id = 0 ){

		global $wpdb;

	   	$result = $wpdb->get_results( $wpdb->prepare( "SELECT user_id FROM {$this->table} WHERE user_id = %d", $user_id ) );

		return $result ? $result : false;

	}

	function remove_beta_user( $user_id = 0 ){

		global $wpdb;

	   	$result = $wpdb->get_results( $wpdb->prepare( "DELETE FROM {$this->table} WHERE user_id = %d", $user_id ) );

		return $result ? $result : false;

	}
}