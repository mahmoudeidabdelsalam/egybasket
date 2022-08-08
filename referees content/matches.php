<?php 
// error_reporting(EP_ALL);
function list_referee_page_content_callback(){
	$where = '';
	if( isset($_GET['sl-action']) && !empty($_GET['sl-action']) && $_GET['sl-action'] === 'بحث'){
		if( isset($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['start_date']) && !empty($_GET['end_date']) ){
			$start_date = $_GET['start_date'];
			$end_date 	= $_GET['end_date'];
			$where = " WHERE ( date BETWEEN '{$start_date}' AND '{$end_date}' )  ";
		}
		if( isset($_GET['monthly']) && !empty($_GET['monthly']) ){
			$start_date = date('y-m-01');
			$end_date = date('y-m-t');
			$where = " WHERE ( date BETWEEN '{$start_date}' AND  '{$end_date}' )";
		}
		if( isset($_GET['ref_id']) ){
			$ref_id = $_GET['ref_id'];
			if($where === ''){
				$where = " WHERE ( ";
			}
			else{
				$where .= " AND ( ";
			}
			$where .= " ref_id='{$ref_id}' ) ";
		}
		if( isset($_GET['accepted_matches']) ){
			$status = $_GET['accepted_matches'];
			if($status !== 'all') {
				if($where === ''){
					$where = " WHERE ( ";
				}
				else{
					$where .= " AND ( ";
				}
				$where .= " status={$status} ) ";
			}
		}
	}
    $matches_referees = sh_get_matches_referees_table_data($where);
	$all_refs = get_all_judges();  
	$status = array(
		'0'   => 'pending',
		'1'   => 'accepted',
		'2'   =>'declined'
	);	
?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<!-- Top Navigation -->

			<header class="codrops-header">
				
				<h1 class="text-center sh-title">Referees Matches</span></h1>

				<br>

			</header>

		</div>

	</div>

	<div class="row">
		
		<div class="col-sm-12 gray_back">
            <form id="advanced-search" action="#" method="get" style="direction: rtl; text-align: right; display:none;">
                <div style="background: #FFF; margin: 10px 0; padding: 10px;">
                    <h5 style="margin: 0;">بحث بالتاريخ</h5>
                    <div style="display: flex; flex-direction: row; justify-content: space-around;">
                        <div>
                            <label for="start_date">ابتداءً من</label>
                            <input type="date" name="start_date" id="start_date" placeholder="mm/dd/yyyy">
                        </div>
                        <div>
                            <label for="end_date">إنتهاءً بـ</label>
                            <input type="date" name="end_date" id="end_date" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-direction: row; justify-content: space-around;background: #FFF; margin: 10px 0; padding: 10px;">
                    <div>
                        <label for="monthly">تقرير شهر:</label>
                        <select name="monthly" id="monthly">
                        	<option value="" disabled="" selected="">إختر الشهر</option>
                            <option value="01">يناير</option>
                            <option value="02">فبراير</option>
                            <option value="03">مارس</option>
                            <option value="04">إبريل</option>
                            <option value="05">مايو</option>
                            <option value="06">يونيو</option>
                            <option value="07">يوليو</option>
                            <option value="08">أغسطس</option>
                            <option value="09">سبتمبر</option>
                            <option value="10">أكتوبر</option>
                            <option value="11">نوفمبر</option>
                            <option value="12">ديسمبر</option>
                        </select>
                    </div>
                    <div>
                        <label for="ref_id">اسم الحكم</label>
                        <select name="ref_id" id="ref_id">
                            <option value="" selected disabled>إختر حكماً</option>
                            <?php foreach ($all_refs as $ref): ?>
                                <option value="<?= $ref->ID;?>"><?= $ref->first_name." ".$ref->last_name; ?> (<?php echo $ref->user_email; ?>)</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-around;background: #FFF; margin: 10px 0; padding: 10px;">
                    <div>
                        <label for="all_matches">
                            <input type="radio" name="accepted_matches" id="all_matches" value="all" checked>
                            جميع الماتشات
                        </label>
                    </div>
                    <div>
                        <label for="accepted_matches">
                            <input type="radio" name="accepted_matches" id="accepted_matches" value="1">
                            الماتشات التي  تم قبولها
                        </label>
                    </div>
                    <div>
                        <label for="rejected_matches">
                            <input type="radio" name="accepted_matches" id="rejected_matches" value="2">
                            الماتشات المرفوضة
                        </label>
                    </div>
                </div>
                <div style="text-align: center;margin-top: 10px;">
                	<input type="hidden" name="page" value="list-referee-match-page">
                	<input type="submit" name="sl-action" value="بحث" class="button-primary">
                </div>
            </form>
            <div style="text-align: center; margin: 15px;">
                <button id="advan-toggler" class="button-primary">
                    بحث متقدم
                </button>
                <script>jQuery('#advan-toggler').on('click', () => jQuery('#advanced-search').slideToggle() );</script>
            </div>
	  		<table id="matchesTable" class="cell-border" style="width:100%">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>الحكم</th>
			                <th>الماتش</th>
			                <th>تاريخ الارسال</th>
			                <th>قبول/رفض</th>
			                <th>تم فتح الرسالة</th>
			                <th>حكم اساسي</th>
			                <th>نوع الحكم</th>
			                <th>حالة الماتش</th>
			                <th>بدل مواصلات</th>
			                <th>بدل تسكين</th>
			                <th>بدل تحكيم</th>
			                <th>إجمالي بدلات</th>
			            </tr>
			        </thead>
			        <tbody>
					<?php
					$i =1;
					global $wpdb;
					$ref_types = array (
						'table_ref'		=> 'حكم طاولة',
						'playground_ref'	=> 'حكم ملعب'
					);
					foreach($matches_referees as $sh_data) : 
						$ref_pos 	= get_post_meta($sh_data->match_id, "ref_{$sh_data->ref_id}_type", true);
        					$ref_type 	= explode('_', $ref_pos)[0];
						
			        		$sh_userdata 	= get_userdata($sh_data->ref_id);

			        		$court          = wp_get_post_terms($sh_data->match_id, 'sp_venue');
					        $to_id          = get_term_meta( $court[0]->term_id, 'sp_venue_gov', true); 
        					$inter	        = get_user_meta($sh_data->ref_id, 'sh_ref_type', true);
					        $gov_id         = get_user_meta($sh_data->ref_id, 'sh_governorate', true);
					        $housing_SQL    = "SELECT * FROM wp_housing_fees WHERE govern_id = {$to_id}";
					        $housing_fees   = $wpdb->get_results( 
					            $wpdb->prepare($housing_SQL) 
					        );
					        $housing_key 	= substr($inter, 0, 5) . '_price';
					  	//echo '<pre>'; print_r($housing_key);echo '</pre>';

     						   $housing_fees   = $gov_id === $to_id ? 0 : $housing_fees[0]->{$housing_key};

					        $commuting_SQL    = "SELECT * FROM wp_commuting_fees WHERE from_id = {$gov_id} AND to_id = {$to_id}";
					        //echo $commuting_SQL; die();
					        $commuting_fees = $wpdb->get_results( 
					            $wpdb->prepare($commuting_SQL) 
					        );
					        $commuting_fees = $commuting_fees[0]->fees;

					        $league         = wp_get_post_terms($sh_data->match_id, 'sp_league');
					        $league_key     = $ref_type . '_' . $inter . '_price';
					        $league_fees    = get_term_meta($league[0]->term_id, $league_key, true);
							
						$match_status 	= get_post_meta($sh_data->match_id, 'match_status', true);
						$match_status 	= empty($match_status) ? 'Not-Started' : $match_status;
						$main_referee = get_post_meta($sh_data->match_id, 'main_referee', true);
						
			        	?>
			            <tr>
			            	<td><?php echo $sh_data->id; ?></td>
			                <td>
			                	<a href='<?php echo admin_url("user-edit.php?user_id={$sh_data->ref_id}" ); ?>'>
			                		<?php echo $sh_userdata->first_name . " " . $sh_userdata->last_name; ?>	
		                		</a>	
			                </td>
			                <td>
			                	<a href='<?php echo admin_url("post.php?action=edit&post={$sh_data->match_id}" ); ?>'>
				                	<?php echo get_post($sh_data->match_id)->post_title; ?>
				                </a>
		                	</td>
			                <td><?php echo date('m-d-Y', strtotime($sh_data->date)); ?></td>
			                <td><?php echo ucwords($status[$sh_data->status]); ?></td>
			                <td><?php echo $sh_data->seen == 1 ? 'Yes' : 'No'; ?></td>
			      		<td><?php echo $main_referee == $sh_data->ref_id ? 'Yes' : 'No'; ?></td>
			                <td><?php echo $ref_types[$ref_pos]; ?></td>
			                <td><?php echo $match_status; ?></td>
			                <?php if($match_status == 'REPORT' && $sh_data->status !== "0") : ?>
			                <td><?php echo empty($commuting_fees) ? 0 : $commuting_fees; ?></td>
			                <td><?php echo empty($housing_fees)? 0 : $housing_fees; ?></td>
			                <td><?php echo empty($league_fees) ? 0 : $league_fees; ?></td>
			                <td><?php echo intval($league_fees) + intval($commuting_fees) + intval($housing_fees) ?></td>
			                <?php else : ?>
			                	<td>-</td>
			                	<td>-</td>
			                	<td>-</td>
			                	<td>-</td>
			                <?php endif; ?>
			            </tr>
				        <?php $i++; endforeach; ?>
			        </tbody>
		    </table>
	 	</div>

	</div>

</div><!-- /container -->

<?php

}

