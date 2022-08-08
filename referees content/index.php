
   
<?php 

function add_referee_match_page_callback(){

	if(isset($_POST['sh_add_referee_to_match']) && !empty($_POST['sh_add_referee_to_match'])){
		$return = sh_add_referee_to_match($referee_id,$match_id);
	}

	$judges = get_all_activated_judges();  
	$matches = sh_get_upcoming_matches();

?>
 <script data-require="jquery@2.2.4" data-semver="2.2.4" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

 <link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 <script data-require="bootstrap@3.3.7" data-semver="3.3.7" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" />
 <style>
     .form-horizontal .control-label {
    text-align: left;
}
 </style>
<div class="container">
    
	<div class="row">

		<div class="col-md-12">

			<!-- Top Navigation -->

			<header class="codrops-header">
				<?php if (isset($return) && !empty($return) ): ?>
				<br>
				<div class="alert alert-info text-center"><p><?= $return; ?></p></div>
				<?php endif ?>
				<br>

				<h1 class="text-center sh-title">Add Referee To Match</span></h1>

				<br>

			</header>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-12 gray_back">

	  		<form class="form-horizontal" method="post" action="#">



						<div class="form-group">

							<label for="referee_id" class="col-sm-4 control-label">Choose Referee</label>

							<div class="col-sm-12">
							   

								<select class="form-control selectpicker" id="referee_id" name="referee_id"  data-live-search="true">
									<option>Please Choose</option>
									<?php foreach ($judges as $judge): ?>
									<option data-tokens="<?= $judge->first_name." ".$judge->last_name; ?>" value="<?= $judge->ID;?>"><?= $judge->first_name." ".$judge->last_name; ?> (<?php echo $judge->user_email; ?>)</option>
									<?php endforeach ?>
								</select>
							</div>

						</div>

						<div class="form-group">

							<label for="match_id" class="col-sm-4 control-label">Choose Match</label>

							<div class="col-sm-12">
								<select class="form-control" id="match_id" name="match_id">
									<option>Please Choose</option>
					                <?php if($matches->have_posts()) : ?>
					                <?php while($matches->have_posts()) : $matches->the_post();?>
									<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
					                <?php endwhile; ?>
					                <?php wp_reset_query(); endif; ?>
								</select>

							</div>

						</div>
						<div class="form-group">
							<label for="referee_type" class="col-sm-4 control-label">Choose Referee Type</label>
							<div class="col-sm-12">
								<select class="form-control" id="referee_type" name="referee_type">
					                <option value="playground_ref">حكم ملعب</option>
					                <option value="table_ref">حكم طاولة</option>
					                <option value="irs_ref">حكم (irs)</option>
					                <option value="supervisor_ref">حكم مراقب</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="main_referee_area">
							<label for="main_referee" class="col-sm-4 control-label">رئيس طاقم/حكم١/حكم٢</label>
							<div class="col-sm-12">
								<select class="form-control" id="main_referee" name="main_referee">
						                 <option value="" selected>اختار الحكم</option>
						                <option value="main_referee"> رئيس طاقم</option>
										<option value="first_referee">حكم 1</option>
						                <option value="second_referee">حكم 2</option>
								</select>
							</div>
						</div>
	

				<div class="form-group">

					<div class="col-sm-12">

					<input type="submit" class="btn btn-default btn-block btn-lg sh_save_route" name="sh_add_referee_to_match" value="Send Notification !!">

					</div>

				</div>

			</form>

	 	</div>

	</div>

</div><!-- /container -->
<script>
    $(function(){
$("#referee_type").change(function() {
       var value = $(this).val();
    $('#main_referee').find('option').show();
    console.log(value);
       if(value=="playground_ref")
       {
           $('#main_referee_area').show();
       }
      else
       {
           $('#main_referee_area').hide();
       }

    });
});
</script>
<?php

}