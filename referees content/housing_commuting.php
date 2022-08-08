<?php
function manage_commuting_housing_pricing () {
	global $wpdb;
	// Saving Governorate
	if( isset($_POST['gov_action']) && $_POST['gov_action'] === 'إدخال المحافظة' && !empty($_POST['gov_name'])) {
		$name = $_POST['gov_name'];
		$sql = "INSERT INTO `wp_governorate` (name) VALUES ('{$name}')";
		$wpdb->query($sql);
	}
	// Saving New Housing
	else if( isset($_POST['housing_fees_action'])
		&& $_POST['housing_fees_action'] === 'حفظ البيانات'
		&& !empty($_POST['housing_fees_action'])) {
		
		$govern_ids 		= $_POST['govern_id'];
		$housing_inter_fees = $_POST['housing_inter_fees'];
		$housing_local_fees = $_POST['housing_local_fees'];
		
		foreach($govern_ids as $key => $id){
			$sql = "INSERT INTO `wp_housing_fees` (govern_id, inter_price, local_price) VALUES ({$id}, {$housing_inter_fees[$key]}, {$housing_local_fees[$key]}) ";
			$wpdb->query($sql);
		}

		// Updating  Housing
		$inter_updatings = $_POST['edit_inter_price'];
		$local_updatings = $_POST['edit_local_price'];
		foreach($inter_updatings as $key => $updated) {
			$sql = "UPDATE `wp_housing_fees` SET inter_price = {$updated}, local_price = {$local_updatings[$key]} WHERE id = {$key}";
			$wpdb->query($sql);
		}

	}
	// DELETE HOUSING
	if(isset($_GET['action']) && $_GET['action'] === 'delete-housing'){
		$sql = "DELETE FROM wp_housing_fees WHERE id = {$_GET['id']}";
		$wpdb->query($sql);
		$admin_url = admin_url( 'admin.php?page=housing-commuting');
		echo "<script>window.location.href = '{$admin_url}';</script>";
		return;
	}

	// Saving New Commuting
	else if( isset($_POST['commuting_fees_action'])
		&& $_POST['commuting_fees_action'] === 'حفظ البيانات'
		&& !empty($_POST['commuting_fees_action'])) {

		$from_ids 	= $_POST['from_name'];
		$to_ids 	= $_POST['to_name'];
		$fees 		= $_POST['commuting_fees'];
		$international_fees = $_POST['commuting_fees_international'];

		foreach ($from_ids as $key => $from_id) {

			$sql = "INSERT INTO `wp_commuting_fees` (from_id, to_id, fees, international_fees) VALUES ({$from_id}, {$to_ids[$key]}, {$fees[$key]} , {$international_fees[$key]} ) ";
			$wpdb->query($sql);

		}

		// Updating Commuting
		$updatings = $_POST['edit_commuting'];
		$updatings_international = $_POST['edit_commuting_international'];

		foreach($updatings as $key => $updated) {
			$sql = "UPDATE `wp_commuting_fees` SET fees = {$updated} WHERE id = {$key}";
			$wpdb->query($sql);
		}
		foreach($updatings_international as $key => $updated) {
			$sql = "UPDATE `wp_commuting_fees` SET international_fees = {$updated} WHERE id = {$key}";
			$wpdb->query($sql);
		}
	}
	// DELETING Commuting
	if(isset($_GET['action']) && $_GET['action'] === 'delete-commuting'){
		$sql = "DELETE FROM wp_commuting_fees WHERE id = {$_GET['id']}";
		$wpdb->query($sql);
		$admin_url = admin_url( 'admin.php?page=housing-commuting');
		echo "<script>window.location.href = '{$admin_url}';</script>";
		return;
	}



	/** Getting Data */
	$governs_SQL = "SELECT * FROM wp_governorate";
	$governs = $wpdb->get_results( 
	    $wpdb->prepare($governs_SQL,'') 
	);

	$housing_SQL = "SELECT h.id AS h_id, h.*, g.name  FROM wp_housing_fees AS h INNER JOIN wp_governorate AS g ON h.govern_id = g.id";
	$housing = $wpdb->get_results( 
	    $wpdb->prepare($housing_SQL,'') 
	);

	$commuting_SQL = "SELECT c.id AS c_id, c.fees , c.international_fees , g1.name AS from_name, g2.name AS to_name  FROM  wp_commuting_fees AS c INNER JOIN wp_governorate AS g1 ON c.from_id = g1.id INNER JOIN wp_governorate AS g2 ON c.to_id = g2.id";
	$commuting = $wpdb->get_results( 
	    $wpdb->prepare($commuting_SQL,'') 
	);

	?>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css">
		.backend-wrapper{
			width: 80%;
			margin: 50px auto;
			display: table;
		}
		.menu-area {
			list-style: none;
			width: 75%;
			margin: auto;
			display: table;
		}
		.menu-area  li{
			display: inline-block;
			margin-right: 18px;
		}
		.menu-area  li a{
		    display: block;
		    background: #EEE;
		    padding: 14px 20px;
		    border-radius: 15px 10px;
		    color: #283592;
		    font-size: 17px;
		    text-decoration: none;
		    font-weight: 600;
		}
		.content-area{
			padding: 20px;
			background: #FFF;
			width: 100%;
			margin: auto;
			border-radius: 10px;
			position: relative;
			overflow:hidden;
			z-index: 1;
		}
		.tab-content{
			position: relative;
			z-index: 3;
			display: none;
			margin-top: 20px;
		}
		.tab-content.current{
			display: inherit;
		}
		.tab-content h2{
		    color: #283592;
		    font-size: 20px
		}
		.tab-content div{
			margin-bottom: 15px;
		}
		.tab-content .input{
		    width: 100%;
		    height: 35px;
		}
		.tab-content .theme-submit{
			  background-color: #283592;
		    background-image: -webkit-linear-gradient(right, #283592, #6d64e8);
		    background-image: linear-gradient(to left,#283592, #6d64e8);
		    background: linear-gradient(to right,#6d64e8 0,#283592 51%,#6d64e8 100%);
		    background-size: 200% auto;
		    -webkit-transition: all .5s ease-in-out;
		    -moz-transition: all .5s ease-in-out;
		    -o-transition: all .5s ease-in-out;
		    transition: all .5s ease-in-out;
		    margin-bottom: 15px auto !important;
		    color: #e8d9cf;
		    cursor: pointer;
		    font-family: inherit;
	    font-family: inherit;
	    padding: 6px 20px;
	    border: 0;
	    border-radius: 5px;
		}

		.tab-content label{
			color: rgb(224, 27, 132);
			font-size: 17px;
			font-weight: 600;
			margin-bottom: 10px;
			display: block;
		}
		.floating-shapes {
			z-index: 2;
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			width: 100%;
			opacity: 0.8;
		}
		.floating-shapes span{
			width: 35px;
			height: 35px;
			border-radius:11px 22px 12px 16px ;
			background: #28359280;
			display: block;
			animation: floatUp 10s linear infinite;
			bottom: calc(-150px - 40vh);
			position: absolute;
		}
		.floating-shapes span:first-child{
		    background: violet;
		    width: 15px;
		    height: 15px;
	    	left: 25%;
			animation-delay: 0s;
			animation-duration: 7s;
		}
		.floating-shapes span:nth-child(2){
			right:20px;
			animation-delay: 4s;
		}
		.floating-shapes span:nth-child(4){
			right: 35%;
			width: 5px;
			height: 5px;
		}
		.floating-shapes span:nth-child(3){
		    background: indianred;	
		    width: 25px;
		    height: 25px;		
	    	left: 10%;
			animation-delay: 8s;
		}
		.floating-shapes span:last-child{
		    background: bisque;	
		    width: 10px;
		    height: 10px;	
		    left: 70%;
			animation-delay: 8s;
			animation-duration: 15s;
		}

		@keyframes floatUp {
		0% { top: 110%; top: calc(100% + 2em); }
		100% { top: -25%; top: -2em; }
		}
		@keyframes animate {
			0% {
				transform: translateY(0) rotate(0deg);
				opacity: 0;
			}
			50% {
				transform: translateY(-60vh) rotate(360deg);
				opacity: 1;
			}
			100% {
				transform: translateY(-120vh) rotate(720deg);
				opacity: 0;
			}
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(document).on('click','.menu-area li',function(){
				var tab_id = $(this).attr('data-tab');
				$('.menu-area li').removeClass('active');
				$('.tab-content').removeClass('current');

				$(this).addClass('active');
				$("#"+tab_id).addClass('current');
			})
		})
	</script>
	<div style="text-align: right; direction: rtl;">
		<div class="backend-wrapper">
			<div class="side-menu-backend">
				<ul class="menu-area side-bar-title">
					<li data-tab='tab-1'><a href="javascript:void(0)">إدارة المحافظات</a></li>				
					<li data-tab='tab-2'><a href="javascript:void(0)">إدارة بدلات التسكين</a></li>				
					<li data-tab='tab-3'><a href="javascript:void(0)">إدارة بدلات المواصلات</a></li>				
				</ul>
			</div><!-- /side-menu-backend -->
			
			<div class="content-area">
				<div class="floating-shapes">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div id="tab-1" class="tab-content current">
					<h2 style="text-align: center">إدارة المحافظات</h2>
					<form action="#" method="post">
						<div>
							<label for="gov_name">اسم المحافظة</label>
							<input type="text" name="gov_name" id="gov_name" placeholder="اسم المحافظة">
						</div>
						<table class="table table-striped" style="width: 100%">
							<tr>
								<th>المحافظة</th>
							</tr>
							<?php foreach ($governs as $gov): ?>
								<tr>
									<td><?php echo $gov->name; ?></td>
								</tr>
							<?php endforeach ?>
						</table>
						<div style="text-align: center">
							<input type="submit" name="gov_action" value="إدخال المحافظة" class="button-primary">
						</div>
					</form>
				</div>
				<div id="tab-2" class="tab-content">
					<h2 style="text-align: center">بدلات التسكين</h2>
					<form action="#" method="post">
						<table class="table table-striped" id="data_table" style="width: 100%;">
							<tr>
								<th>المحافظة</th>
								<th>سعر التسكين الدولي (جـ م)</th>
								<th>سعر التسكين المحلي (جـ م)</th>
								<th>حذف البيان</th>
							</tr>
							<?php foreach ($housing as $house): ?>
								<tr>
									<td><?php echo $house->name ?></td>
									<td><input type="text" name="edit_inter_price[<?php echo $house->h_id ?>]" value="<?php echo $house->inter_price ?>"></td>
									<td><input type="text" name="edit_local_price[<?php echo $house->h_id ?>]" value="<?php echo $house->local_price ?>"></td>
									<td style="text-align: center;">
										<a href="<?php echo admin_url('admin.php?page=housing-commuting&action=delete-housing&id='.$house->h_id); ?>">حذف</a>
									</td>
								</tr>
							<?php endforeach ?>
							<tr>
								<td>
									<select name="govern_id[]">
										<option value="" selected="" disabled="">اسم المحافظة</option>
										<?php foreach ($governs as $gov): ?>
												<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
									<input type="text" name="housing_inter_fees[]" style="width: 100%">
								</td>
								<td>
									<input type="text" name="housing_local_fees[]" style="width: 100%">
								</td>
							</tr>
						</table>
						<input type="submit" name="housing_fees_action" value="حفظ البيانات" class="button-primary">
					</form>
					<button class="btn btn-secondary" id="add_new_record" style="margin-top: 15px;">إضافة بيان جديد</button>
				</div>
				<div id="tab-3" class="tab-content">
					<h2 style="text-align: center">بدلات المواصلات</h2>
					<form action="#" method="post">
						<table class="table table-striped" id="commuting_table" style="width: 100%;">
							<tr>
								<th>من المحافظة</th>
								<th>إلى المحافظة</th>
								<th>سعر المواصلات المحلي (جـ م)</th>
								<th>سعر المواصلات الدولي (جـ م)</th>
								<th>حذف البيان</th>
							</tr>
							<?php foreach ($commuting as $commuting_row): ?>
								<tr>
									<td><?php echo $commuting_row->from_name; ?></td>
									<td><?php echo $commuting_row->to_name; ?></td>
									<td><input type="text" name="edit_commuting[<?php echo $commuting_row->c_id; ?>]" value="<?php echo $commuting_row->fees; ?>"></td>
									<td><input type="text" name="edit_commuting_international[<?php echo $commuting_row->c_id; ?>]" value="<?php echo $commuting_row->international_fees; ?>"></td>
									<td style="text-align: center;">
										<a href="<?php echo admin_url('admin.php?page=housing-commuting&action=delete-commuting&id='.$commuting_row->c_id); ?>">حذف</a>
									</td>
								</tr>
							<?php endforeach ?>
							<tr>
								<td>
									<select name="from_name[]">
										<option value="" selected="" disabled="">اسم المحافظة</option>
										<?php foreach ($governs as $gov): ?>
												<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
									<select name="to_name[]">
										<option value="" selected="" disabled="">اسم المحافظة</option>
										<?php foreach ($governs as $gov): ?>
												<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
								 	<input type="text" name="commuting_fees[]" style="width: 75%;">
								</td>
								<td>
								 	<input type="text" name="commuting_fees_international[]" style="width: 75%;">
								</td>
								<td></td>
							</tr>
						</table>
						<input type="submit" name="commuting_fees_action" value="حفظ البيانات" class="button-primary">
					</form>
					<button class="btn btn-secondary" id="add_new_record_commuting" style="margin-top: 15px;">إضافة بيان جديد</button>
				</div>

	</div>
	<script type="text/javascript">
		const templateCommuting = `
		<tr>
			<td>
				<select name="from_name[]">
					<option value="" selected="" disabled="">اسم المحافظة</option>
					<?php foreach ($governs as $gov): ?>
							<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<select name="to_name[]">
					<option value="" selected="" disabled="">اسم المحافظة</option>
					<?php foreach ($governs as $gov): ?>
							<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
			 	<input type="text" name="commuting_fees[]" style="width: 75%;">
			</td>
			<td>
			 	<input type="text" name="commuting_fees_international[]" style="width: 75%;">
			</td>
			<td></td>
		</tr>
		`;
		const templateHousing = `
		<tr>
			<td>
				<select name="govern_id[]">
					<option value="" selected="" disabled="">اسم المحافظة</option>
					<?php foreach ($governs as $gov): ?>
							<option value="<?php echo $gov->id ?>"><?php echo $gov->name ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<input type="text" name="housing_inter_fees[]" style="width: 100%">
			</td>
			<td>
				<input type="text" name="housing_local_fees[]" style="width: 100%">
			</td>
		</tr>
		`;
		jQuery(document).ready($ => {
			$(document).on('click', '#add_new_record', event => {
				$("#data_table").append(templateHousing);
			});
			$(document).on('click', '#add_new_record_commuting', event => {
				$("#commuting_table").append(templateCommuting);
			});
		})
	</script>
	<?php
}