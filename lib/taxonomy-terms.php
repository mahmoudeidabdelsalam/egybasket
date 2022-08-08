<?php

$comp_type = array(
	'4'	=> 'مسابقات رجال',
	'1'	=> 'مسابقات سيدات',
	'2'	=> 'مسابقات الناشئين',
	'3'	=> 'مسابقات الجمهورية',
);

add_action( 'sp_league_add_form_fields', 'sh_league_meta', 10, 2 );

function sh_league_meta($taxonomy) {
	global $comp_type;
	?>
	<div class="form-field term-group">
		<div style="margin-bottom: 15px;">
			<label for="leagsue_type">
				Competition Type
			</label>
			<select class="postform" id="league_type" name="league_type">
				<?php foreach ($comp_type as $key => $value): ?>
					<option value="<?php echo $key ?>"><?php echo $value; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div style="margin-bottom: 15px;">
			<table>
				<tr class="form-field term-group-wrap">
					<th>
						<label for="playground_international_price">
							رسوم حكم الملعب الدولي
						</label>
					</th>
					<td>
						<input type="number" id="playground_international_price" name="playground_international_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);"> EGP
					</td>
				</tr>
				<tr class="form-field term-group-wrap">
					<th>
						<label for="table_international_price">
							رسوم حكم الطاولة الدولي
						</label>
					</th>
					<td>
						<input type="number" id="table_international_price" name="table_international_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);"> EGP
					</td>
				</tr>
				<tr class="form-field term-group-wrap">
					<th>
						<label for="playground_local_price">
							رسوم حكم الملعب المحلي
						</label>
					</th>
					<td>
						<input type="number" id="playground_local_price" name="playground_local_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);"> EGP
					</td>
				</tr>
				<tr class="form-field term-group-wrap">
					<th>
						<label for="table_local_price">
							رسوم حكم الطاولة المحلي
						</label>
					</th>
					<td>
						<input type="number" id="table_local_price" name="table_local_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);"> EGP
					</td>
				</tr>
			</table>
			
		</div>
	</div>
	<?php
}

add_action( 'sp_league_edit_form_fields', 'edit_league_meta', 10, 2 );
function edit_league_meta( $term, $taxonomy ){
	global $comp_type;
    $league_type = get_term_meta( $term->term_id, 'sh_comp_type', true );
    $p_l = get_term_meta( $term->term_id, 'playground_local_price', true );
    $t_l = get_term_meta( $term->term_id, 'table_local_price', true );
    $p_i = get_term_meta( $term->term_id, 'playground_international_price', true );
    $t_i = get_term_meta( $term->term_id, 'table_international_price', true );
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="league_type">Competition Type</label></th>
        <td>
        	<select class="postform" id="league_type" name="league_type">
        		<?php foreach ($comp_type as $key => $value): ?>
		            <option value="<?php echo $key; ?>" <?php echo $key == $league_type ? 'selected' : '' ?> >
		            	<?php echo $value; ?>
	            	</option>
        		<?php endforeach ?>
	        </select>
	    </td>
    </tr>
    <tr class="form-field term-group-wrap">
		<th>
			<label for="playground_international_price">
				رسوم حكم الملعب الدولي
			</label>
		</th>
		<td>
			<input type="number" id="playground_international_price" name="playground_international_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);" value="<?php echo $p_i; ?>"> EGP
		</td>
	</tr>
	<tr class="form-field term-group-wrap">
		<th>
			<label for="table_international_price">
				رسوم حكم الطاولة الدولي
			</label>
		</th>
		<td>
			<input type="number" id="table_international_price" name="table_international_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);" value="<?php echo $t_i; ?>"> EGP
		</td>
	</tr>
    <tr class="form-field term-group-wrap">
		<th>
			<label for="playground_local_price">
				رسوم حكم الملعب المحلي
			</label>
		</th>
		<td>
			<input type="number" id="playground_local_price" name="playground_local_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);" value="<?php echo $p_l; ?>"> EGP
		</td>
	</tr>
	<tr class="form-field term-group-wrap">
		<th>
			<label for="table_local_price">
				رسوم حكم الطاولة المحلي
			</label>
		</th>
		<td>
			<input type="number" id="table_local_price" name="table_local_price" placeholder="XXX Numiric value" autocomplete="off" style="width: calc(100% - 50px);" value="<?php echo $t_l; ?>"> EGP
		</td>
	</tr>
    <?php
}

add_action( 'sp_venue_add_form_fields', 'sp_venue_meta', 10, 2 );
function sp_venue_meta($taxonomy) {
	global $wpdb;
	/** Getting Data */
	$governs_SQL = "SELECT * FROM wp_governorate";
	$govs = $wpdb->get_results( 
	    $wpdb->prepare($governs_SQL,'') 
	); 
	?>
	<div class="form-field term-group">
		<div style="margin-bottom: 15px;">
			<label for="sp_venue_gov">
				محافظة الاستاد
			</label>
			<select class="postform" id="sp_venue_gov" name="sp_venue_gov">
				<option value="" selected="" disabled="">إختر المحافظة</option>
				<?php foreach ($govs as $gov): ?>
					<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<?php
}

add_action( 'sp_venue_edit_form_fields', 'edit_sp_venue_meta', 10, 2 );
function edit_sp_venue_meta( $term, $taxonomy ){
	global $wpdb;
	/** Getting Data */
	$governs_SQL = "SELECT * FROM wp_governorate";
	$govs = $wpdb->get_results( 
	    $wpdb->prepare($governs_SQL,'') 
	); 
	$gov_id = get_term_meta($term->term_id, 'sp_venue_gov', true);
	?>
	 <tr class="form-field term-group-wrap">
	        <th scope="row"><label for="sp_venue_gov">محافظة الاستاد</label></th>
	        <td>
	        	<select class="postform" id="sp_venue_gov" name="sp_venue_gov">
	        		<option value="" selected="" disabled="">إختر المحافظة</option>
	        		<?php foreach ($govs as $gov): ?>
					<option value="<?php echo $gov->id ?>" <?php echo $gov_id == $gov->id ? 'selected' : '' ?>>
						<?php echo $gov->name ?>
					</option>
				<?php endforeach ?>
		        </select>
		    </td>
	  </tr>
	<?php
}

add_action( 'created_sp_league', 'sh_save_league_meta', 10, 2 );
add_action( 'edited_sp_league', 'sh_save_league_meta', 10, 2 );
function sh_save_league_meta( $term_id, $tt_id ){
/*	 echo '<pre>'; print_r($_POST); die();
*/    if( isset( $_POST['league_type'] ) && !empty($_POST['league_type']) ){
        update_term_meta( $term_id, 'sh_comp_type', $_POST['league_type'] );
    }
    if( isset( $_POST['playground_local_price'] ) && !empty($_POST['playground_local_price']) ){
        update_term_meta( $term_id, 'playground_local_price', $_POST['playground_local_price'] );
    }
    if( isset( $_POST['table_local_price'] ) && !empty($_POST['table_local_price']) ){
        update_term_meta( $term_id, 'table_local_price', $_POST['table_local_price'] );
    }
    if( isset( $_POST['playground_international_price'] ) && !empty($_POST['playground_international_price']) ){
        update_term_meta( $term_id, 'playground_international_price', $_POST['playground_international_price'] );
    }
    if( isset( $_POST['table_international_price'] ) && !empty($_POST['table_international_price']) ){
        update_term_meta( $term_id, 'table_international_price', $_POST['table_international_price'] );
    }
}


add_action( 'created_sp_venue', 'sh_save_venue_meta', 10, 2 );
add_action( 'edited_sp_venue', 'sh_save_venue_meta', 10, 2 );
function sh_save_venue_meta( $term_id, $tt_id ){
   if( isset( $_POST['sp_venue_gov'] ) && !empty($_POST['sp_venue_gov']) ){
        update_term_meta( $term_id, 'sp_venue_gov', $_POST['sp_venue_gov'] );
    }
}