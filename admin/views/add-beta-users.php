<form id="cgc-add-beta-user" action="" method="post">
	<table class="form-table">

		<tbody>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="user_id"><?php _e('User ID', 'cgc-beta-users' ); ?></label>
				</th>
				<td>
					<input name="user_id" id="user_id" type="text" value="" style="width: 100px;"/>
					<p class="description"><?php _e('This is the Members ID, not username.', 'cgc-beta-users' ); ?></p>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="hidden" name="action" value="cgc-add-beta-user">
		<input type="hidden" name="cgc_beta_user_nonce" value="<?php echo wp_create_nonce('cgc-add-beta-user'); ?>"/>
		<input type="submit" value="<?php _e('Add Beta User', 'cgc-beta-users' ); ?>" class="button-primary"/>
	</p>
</form>