<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   CGC_Beta_Users
 * @author    Nick Haskins <nick@cgcookie.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 CG Cookie
 */
?>

<div class="wrap">

	<?php
		$viewClass = isset($_GET['view']) ? $_GET['view'] : null;
	?>
	<h2>Beta users</h2>
	<nav class="<?php echo $viewClass;?>">
		<a href="<?php echo admin_url( '/users.php?page=beta-users&view=add-beta-users' ); ?>" class="add-new-h2 add-beta-users">Add Beta User </a>
	</nav>

	<?php

		if( isset( $_GET['view'] ) && 'add-beta-users' == $_GET['view'] ) :

			include( 'add-beta-users.php' );

		else :
			?>
			<div class="wrap">

				<table class="wp-list-table widefat fixed">
					<thead>
						<tr>
							<th><?php _e( 'Username', 'cgc-beta-users' ); ?></th>
							<th><?php _e( 'User ID', 'cgc-beta-users' ); ?></th>
							<th><?php _e( 'User Email', 'cgc-beta-users' ); ?></th>
						</tr>
					</thead>
					<tbody>

						<?php

							$i = 0;
							$users 		= cgc_get_beta_users();

							$count = count( $users );

							if ( $users ):

								foreach( $users as $user ) {

									$user_id 	= ! empty($user->user_id) ? $user->user_id : null;
									$userinfo 	= get_userdata( $user_id );

									?><tr <?php if($i % 2 == 0) echo 'class="alternate"' ;?>>
										<th><?php echo $userinfo->display_name; ?></th>
										<th><?php echo $user_id; ?></th>
										<th><?php echo $userinfo->user_email; ?></th>
									</tr><?php

									$i++;

								}
							else:

								echo 'No beta users found';

							endif;
						?>

					</tbody>

				</table>
				<div>
					<?php
					$big = 999999;
					echo paginate_links( array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, get_query_var( 'paged' ) ),
						'total'   => $count / 20 // 20 items per page
					) );
					?>
				</div>
			</div>

		<?php endif;?>

</div>
