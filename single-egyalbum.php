<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <header>
        <section class="component-section">
          <div class="compoonent-slid">
            
              <ul class="list-group list-group-horizontal last-naws-group">
                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>
                <li class="list-group"><a href="<?php bloginfo('url'); ?>/المكتبة"> المكتبة</a></li>
                <li class="list-group"><?php the_title(); ?></li>

               
              </ul>
            
          </div>
        </section>
      </header>
    <!--end-header-->
    <!--stert-section-main-->
     <main class="component-tarikh-alaitihad">
       <div class="component-title-list">
        <h5 class="title-content text-right ">
            <?php the_title(); ?>          
        </h5>
       </div>
       <div class="type-main-next">
         <div class="container">
          <div class="component-img-almaktaba ">
            <div class="row row-cols-1">
              <?php 
                  $images =  get_post_meta($id,'thumbnail_id'); 
                  if($images != null && $images != '') {
                  foreach ($images as $image) { 
                  $image_attributes_thumbnail = wp_get_attachment_image_src($image, 'thumbnail');?>
                <img data-toggle="modal" data-target="#exampleModal-img"class="col-sm-2 col-4" src="<?php echo $image_attributes_thumbnail[0];?>">

              <?php }  
                } ?>
            </div>
            
          </div>
         </div>
       </div>
     </main>
    <!--end-section-main-->
<?php endwhile; endif;?>

      <!--stert-model-img-->
      <div class="modal fade hide "   id="exampleModal-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content-img-6">
              
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          
          <div id="carouselExampleIndicators" class="carousel slide slider" data-ride="carousel">

            <div class="carousel-inner slides">
            <?php 
            $images =  get_post_meta($id,'thumbnail_id'); 
            if($images != null && $images != '') { 
            $i = 0;
            foreach ($images as $image) { 
            $image_attributes_thumbnail = wp_get_attachment_image_src($image, 'full');?>
                    <div class="carousel-item slidet <?php if($i === 0){echo 'active';} ?>">
                      <div class="image">
                        <img src="<?php echo $image_attributes_thumbnail[0];?>">
                    </div>
                    </div>
            <?php $i++;}  
            } ?>
            </div>

            <a class="carousel-control-prev1" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next1" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <div class="carousel-control-next-link component-share scroll-top-link">
              <ul class="list-group">
                      <li class="list-group">
                              <a href="#" target="_blank"><img src="<?= SH_URL; ?>/assets/file/Group 410.png"></a> 
                      </li>
                      <li class="list-group">
                              <a href="#" target="_blank"><img src="<?= SH_URL; ?>/assets/file/Group 411.png"></a>
      
                      </li>
                      <li class="list-group">
                              <a href="#" target="_blank"><img src="<?= SH_URL; ?>/assets/file/Group 412.png"></a>
      
                      </li>
                      <li class="list-group">
                              <a href="#" target="_blank"><img src="<?= SH_URL; ?>/assets/file/Group 413.png"></a>
      
                      </li>
                     
                    </ul>
          </div>
         
          </div>
         
          </div>
        </div>
      </div>
      <!--end-model-img-->

<?php get_footer(); ?>