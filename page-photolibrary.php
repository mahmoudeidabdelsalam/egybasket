<?php 

/**

** Template Name: Photo Library Template

**/

get_header(); ?>



      <header>

        <section class="component-section">

          <div class="compoonent-slid">

            

              <ul class="list-group list-group-horizontal last-naws-group">

                <li class="list-group"><a href="<?= bloginfo('url'); ?>">الرئيسية</a></li>

                <li class="list-group"><a href="javascript:void(0)"> المكتبة</a></li>

                <li class="list-group"><?php the_title(); ?></li>



               

              </ul>

            

          </div>

        </section>

      </header>

    <!--end-header-->

    <!--stert-section-main-->

     <main class="component-tarikh-alaitihad">

     

       <div class="type-main-next">

         <div class="container">

             <div class="comonent-injazat row">

              <div class="component-injazat-right col-md-4">

                <ul class="nav ">

                <li class=" nav-item  active">

                    <a class="nav-link title-content-link " href="javascript:Void(0)" >

                      <span>     

                                            البوم الصور                      

                      </span>

                      <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>



                    </a>

                    </li>

                    

                    <li class=" nav-item   ">

                    <a class="nav-link title-content-link " href="<?= get_permalink(252); ?>" > 

                      <span>الفيديوهات</span>

                      <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>



                        </a>



                    </li>

                    <li class="nav-item ">

                      <a class="nav-link title-content-link " href="<?= get_permalink(255); ?>" > 

                        <span>النماذج</span>

                        <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>

  

                          </a>

  

                      </li>

                    </ul>

              </div>

                 <div class="component-injazat-left col-md-8">

                    <?php

                      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                        $args = array(

                            'post_type'       => 'egyalbum',

                            'post_status'     => 'publish',

                            'posts_per_page'  => get_option('posts_per_page'),

                            'paged'           => $paged,

                            'orderby'         => 'date',

                            'order'           => 'DESC'

                        );                      

                      $posts = new WP_Query( $args );

                      ?>

                      <?php if ( $posts->have_posts() ) : ?>

                      <?php while ( $posts->have_posts() ) : $posts->the_post(); $postId=get_the_ID(); ?>

                      <div class="component-img">



                        <div class="component-title-link">

                          <h5 class="title-content-img text-right">

                            <?php the_title(); ?>

                          </h5>

                          <a href="<?php the_permalink(); ?>" class="title-link"> المزيد

                            <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>

                          </a>

                         </div>



                         <div class="component-events">

                            <div class="component-events-right text-right">

                              <img src="<?= get_the_post_thumbnail_url($postId,'full'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

                            </div>

                            <div class="component-img-left2 text-left">   

                              <?php 

                                  $images =  get_post_meta($id,'thumbnail_id'); 

                                  if($images != null && $images != '') {

                                  $i = 1; 

                                  foreach ($images as $image) { 

                                  if($i>4) break;

                                  $image_attributes_thumbnail = wp_get_attachment_image_src($image, 'medium');?>

                                  <img src="<?php echo $image_attributes_thumbnail[0];?>" class="card-img-top" />

                              <?php $i++;}  

                                } ?>



                            </div>

                          </div>

                           

                      </div>

                      <?php endwhile;?>

                      <div class="component-pagination">

                        <div class="pagination">

                          <?php    $args = array(

                                 'format'             => '?paged=%#%',

                                 'current'            => max( 1, get_query_var('paged') ),

                                 'total'              => $posts->max_num_pages,

                                 'show_all'           => false,

                                 'end_size'           => 1,

                                 'mid_size'           => 2,

                                 'prev_next'          => false,

                                 'type'               => 'list',

                                );

                          ?>

                          <?php echo paginate_links($args); ?>            

                        </div>

                      <?php wp_reset_query(); ?>

                      </div>

                      <?php endif; ?>





                 </div>



             </div>

         </div>

       </div>

     </main>

    <!--end-section-main-->

 <?php get_footer(); ?>