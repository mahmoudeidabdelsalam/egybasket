<?php 

function home_page_content_callback(){

	$referees = get_referees();  

	if( isset( $_POST['sh_save'] ) && !empty( $_POST['sh_save']) ){

		foreach ($_POST as $key => $value) {

			if(in_array($key,['sh_home_straming_link','sh_shome_second_content','sh_shome_third_content','sh_shome_fourth_content','sh_shome_fifth_content','sh_shome_sixth_content'])){

				$value = stripcslashes($value);

			}			

			update_option( $key, $value);

		}

	}

?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<!-- Top Navigation -->

			<header class="codrops-header">

				<br>

				<h1 class="text-center sh-title">Add Referee To Match</span></h1>

				<br>

			</header>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-12 gray_back">

	  		<form class="form-horizontal" method="post" action="#">

			    <div class="tab-content" id="v-pills-tabContent">

			        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">

						<div class="form-group">

							<label for="home-first_sec_title" class="col-sm-4 control-label">All matches Link</label>

							<div class="col-sm-12">

								<input type="text" class="form-control" id="home-first_sec_title" name="sh_home_all_matches_link" value="<?php echo get_option('sh_home_all_matches_link'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="home-straming_link" class="col-sm-4 control-label">Straming Link</label>

							<div class="col-sm-12">

						    	<?php wp_editor( get_option('sh_home_straming_link'), 'home-straming_link',  array('textarea_rows'=>5,'textarea_name'=> 'sh_home_straming_link', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'home-straming_link','class'=>'form-control',) );  ?>

							</div>

						</div>

						<div class="form-group">

							<label for="home-fourth_sec_title" class="col-sm-4 control-label">Table ID</label>

							<div class="col-sm-12">

							<input type="text" class="form-control" id="home-fourth_sec_title" name="sh_home_table_id" value="<?php echo get_option('sh_home_table_id'); ?>">

							</div>

						</div>

			        </div>

			        	      

					

			    </div>

				<div class="form-group">

					<div class="col-sm-12">

					<input type="submit" class="btn btn-default btn-block btn-lg sh_save_route" name="sh_save" value="Save !!">

					</div>

				</div>

			</form>

	 	</div>

	</div>

</div><!-- /container -->

<?php

}