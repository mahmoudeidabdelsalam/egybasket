<?php 
/**
** Template Name: Import Coaches
**/
get_header(); ?>

<?php 
if( isset( $_POST['submit_file'] ) && !empty( $_POST['submit_file'] ) ){
  

  $file = $_FILES["file"]["tmp_name"];
  $file_open = fopen($file,"r");
  
  while($csv = fgetcsv($file_open))
  {

  $img_title    = $csv[4];
    $title    = $csv[3];
    $code    = $csv[2];
    $degree   = $csv[1]; 
    $branch  = $csv[0];


    $postid = wp_insert_post(
      array(
      'post_title'   => $title,
      'post_type'    => 'coach',
      'post_status'  => 'publish',
      'post_author'  => get_current_user_id(),
      'meta_input'   => array(
          'sh_code' => $code,
          'sh_degree' => $degree,
          'sh_branch' => $branch,
        ),
      )
    );
  
  if(isset($postid)){
    update_post_meta($postid,'sh_code',$code);
    update_post_meta($postid,'sh_degree',$degree);
    update_post_meta($postid,'sh_branch',$branch);

     set_post_thumbnail( $postid, get_page_by_title($img_title, OBJECT, 'attachment')->ID );

  }

    if($postid) {$response = 1;}
  }


}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding:200px!important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Import Coaches
      </h1>
    </section>

    <!-- Main content -->
    <section class="content ">
      <!-- general form elements -->
      <div class="box ">
        <?php if(isset($response)) {
          if($response == 1){
            echo "<div class='col-md-6 col-md-offset-3'><div class='callout callout-success text-center'>File Has Been Successully imported.</div></div>";
          }
        } ?>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="clearfix"></div>

        <form method="post" action="#" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="file">Choose Csv File to import caoches from (.csv)<span class="red_star">&nbsp;&nbsp;*</span></label>
              <input type="file" class="form-control" id="file" accept=".csv" name="file" required>
            </div>
            <br>   
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary btn-lg margin-center" name="submit_file" value="Import Coaches">
          </div>
        </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php get_footer(); ?>