<?php get_header(); ?>



      <section class="component-section">



        <div class="component-slider " style="height:auto!important;">



            <div class="container cont-h">



                <div class="list-slider">



                  <div class="a-slider">



                    <a href="<?=  get_permalink(2130);  ?>">امس </a>



                   <a class="a-slider2"href="<?=  get_permalink(757);  ?>">اليوم</a>



                   <a href="<?=  get_permalink(2127);  ?>">الغد</a>



                 </div>



                







                </div>



                <div class="all-almubara">



                  <!-- <div class="dropdown">



                    <a class=" dropdown-toggle dropdown-link-a" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



                      رجال و مرتبط     



                    



                    </a>



                  



                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">



                      <a class="dropdown-item" href="#">الموسم 2018/2019</a>



                      <a class="dropdown-item" href="#">بطوله الدورى</a>



                      <a class="dropdown-item" href="#">كل  المباريات</a>



                    </div>



                  </div> -->



                  <div class="titl-even">



                    <a  href="<?= get_permalink(757); ?>">



                      كل المباريات



                      <i class="fas fa-chevron-left" aria-hidden="true"></i>



                      </a>



                   </div>



                </div>



              



                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> 



                  <?php $today_matches = sh_get_matches(-1,date('d/m/Y')); $matches_today_num = $today_matches->found_posts;



                  /*$today_matches = sh_get_matches(-1,date('j/n/Y')); $matches_today_num = $today_matches->found_posts;*/



                  ?>



                  <?php if ( $today_matches->have_posts() ) : ?>



                    



                  <div class="carousel-inner">



                  <?php $k=1; while ( $today_matches->have_posts() ) : $today_matches->the_post(); $postId=get_the_ID(); ?>


                 



                  <?php $leauge = get_the_terms($postId,'sp_league')[0]; ?>



                  <?php $teams = get_post_meta($postId,'sp_team',false); ?>


                  <?php $results = get_post_meta($postId, 'sp_results', true); ?>

                  <?php $first_team = get_post($teams[0]); 
                  		$first_team_result = $results[$first_team->ID];
                  		$first_team_result = $first_team_result['points'];
                  ?>



                  <?php $second_team = get_post($teams[1]); 
                  		$second_team_result = $results[$second_team->ID];
                  		$second_team_result = $second_team_result['points'];
                  ?>



                 



                  <?php if( ($k == 1) || ($k%3 == 1) ) { ?>



                    <div class="carousel-item <?=  $k ==1 ? ' active' : ''; ?>">



                      <div class="corausel-itam" >



                  <?php } ?>



                        <div class="slid-1">



                          <div>



                            <img src="<?= get_the_post_thumbnail_url($first_team->ID,'large');?>" class="home_flag">



                            <span class="span-slider">



                              <?php echo $first_team->post_title; ?>



                            </span>



                          </div>



                             <div class="span-slider-2">



                               <span>اليوم</span>



                               <span>  



                                <?php echo date('g:i a ',strtotime(get_post_meta($postId,'sh_match_time',true))); ?>


                                <br>
                                <?php echo $first_team_result . " - " . $second_team_result; ?>
                              </span>



                               <a href="<?php the_permalink(); ?>"><span class="span3">



                                 <?= $leauge->name; ?>



                               </span></a>



                               



                             </div>



                             <div >



                              <img src="<?= get_the_post_thumbnail_url($second_team->ID,'large');?>" class="home_flag">



                              <span class="span-slider">



                                <?php echo $second_team->post_title; ?>



                              </span>



                             </div>



                        </div>



                  <?php if( ($k%3 == 0) || ($k == $matches_today_num ) ) {  ?>



                      </div>



                    </div>



                  <?php } ?>







                  <?php $k++; endwhile;?>



                  </div>







                  <?php wp_reset_query(); ?>



                  <?php endif; ?>



                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">



                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>



                    <span class="sr-only">Previous</span>



                  </a>



                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">



                    <span class="carousel-control-next-icon" aria-hidden="true"></span>



                    <span class="sr-only">Next</span>



                  </a>



                </div> 



                <div class="all-almubara">



                  <div class="titl-even">







                    <h5 class="event-title">    



                          الاحداث



                    </h5>



                  </div>



                  <div class="titl-even">



                    <a  href="<?= get_permalink(10); ?>"class="event-title">



                      المزيد



                      <i class="fas fa-chevron-left" aria-hidden="true"></i>



                      </a>



                   </div>



                </div>



                <?php $latest_news_home = sh_get_homepage_main_news(); ?>



                <?php if ( $latest_news_home->have_posts() ) : ?>







                <div class="component-events">



                 



                <?php while ( $latest_news_home->have_posts() ) : $latest_news_home->the_post(); $postId=get_the_ID(); ?>



                  <div class="component-events-right text-right ">



                    <div class="card mb-3">



                      <img src="<?= get_the_post_thumbnail_url($postID,'large'); ?>" alt="<?php the_title(); ?>" class="main_news_img">



                      <div class="card-body">



                        <h5 class="card-title"><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></h5>



                        <p class="card-text"><?php // the_excerpt(); ?></p>



                      </div>



                    </div>



                    </div>



                  <?php break; endwhile;?>







                   <div class="component-events-left text-left ">



                    <div class="card-deck">



                  <?php $j=1; while ( $latest_news_home->have_posts() ) : $latest_news_home->the_post(); $postId=get_the_ID(); ?>



                      <div class="card sh_card_new">



                        <img src="<?= get_the_post_thumbnail_url($postID,'large'); ?>" class="card-img-top sh-custom-height" alt="<?php the_title(); ?>">



                        <div class="card-body">



                          <h5 class="card-title"><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></h5>



                          <p class="card-text"><?php //the_excerpt(); ?></p>



                        </div>



                      </div>



                  <?php $j++; endwhile;?>



                    </div>







                   </div>











                </div>











                <?php wp_reset_query(); ?>







                <?php endif; ?>







            </div>



        </div>



      </section>

<?php the_content(); ?>


    </header>



    <!--end-header-->    



    <!--stert-section-main-->



     <main class="type-main">



       <div class="container">



         <div class="component-content text-right">



            <div class="content-right ">



                <?php $streaming =  get_option('sh_home_straming_link'); 

                if(!empty($streaming)) {

                ?>

                <h5 class="title-content">



                  بث مباشر



                </h5>

                <div class="component-video-direct">



                  <?php echo $streaming; ?>                  



                  



                </div>

              <?php } ?>





                 <div class="component-latest-news">



                     <div class="component-title-link">



                      <h5 class="title-content">



                        اخر الاخبار



                      </h5>



                      <a href="<?= get_permalink(10); ?>" class="title-link"> المزيد



                        <i class="fas fa-chevron-left icon-link2"></i>



                      </a>



                     </div>



                     <?php $latest_news_all = sh_get_latest_news(); ?>



                     <?php if ( $latest_news_all->have_posts() ) : ?>







                     <ul class="list-unstyled list-news">







                      <?php while ( $latest_news_all->have_posts() ) : $latest_news_all->the_post(); $postId=get_the_ID(); ?>



                      <li class="media">



                        <img src="<?= get_the_post_thumbnail_url($postId,'medium');?>" class="img2" alt="<?php the_title(); ?>">



                        <div class="media-body">



                          <h5 class="mt-0 mb-1"><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></h5>



                          <ul class="article__details-items">



                            <li class="article__details-item type--writer">



                              <img src="<?php echo SH_URL; ?>assets/file/Shape 13.png">



                              <?php the_author(); ?></li>



                            <li class="article__details-item type--date">



                              <img src="<?php echo SH_URL; ?>assets/file/Shape 14.png">



                              <?php the_date(); ?></li>



                            <li class="article__details-item type--comments">



                              <img src="<?php echo SH_URL; ?>assets/file/Shape 15.png">



                              <?php echo get_comments_number();?> تعليقات</li>



                          </ul>



                          <p><?php the_excerpt(); ?>



                        </p>



                        </div>



                      </li>



                      <?php endwhile;?>











                    </ul>



                  <?php wp_reset_query(); ?>



                  <?php endif; ?>



                 </div>







                



            </div>



            



            <div class="content-left">



              <?php $table_data = new WP_Query(



                array(



                'post_type' => 'sp_table',



                'post_status' => 'publish',



                'post__in'    =>array(get_option('sh_home_table_id'))



                )



              ); ?>



             <?php if ( $table_data->have_posts() ) : ?>







          <?php while ( $table_data->have_posts() ) : $table_data->the_post(); ?>







                



              <a href="<?php the_permalink(); ?>" class="title-content-link">



                <div>



                  <?php the_content(); ?>



                </div>



                <i class="fas fa-chevron-left icon-link"></i>



              </a>



              <?php echo sh_get_table_data(get_the_ID()); ?>



              <?php endwhile; wp_reset_query(); endif ?>



            







              <?php  $mostposts = sh_most_viewed(4,get_the_ID()); ?>



              <?php if($mostposts->have_posts()) : ?>



                <h5 class="title-content">



                  الأكثر مشاهدة



                </h5>



                <div class="content-putfole">



                  <div class="card-deck">



                    <?php while($mostposts->have_posts()) : $mostposts->the_post(); ?>



<!--                     <div class="card">

 -->                    <div class="sh_card_new">



                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" class="card-img-top sh-custom-height" alt="<?php the_title(); ?>">



                      <div class="card-body">



                          <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?= wp_trim_words( get_the_title(),7,' ...' ); ?></a></h5>



                          <p class="card-text"><?php // the_excerpt(); ?></p>



                      </div>



                    </div>



                  <?php endwhile; ?>



                  </div>



                </div>



              <?php wp_reset_query(); endif; ?>



              



              



               



                 <a href="<?php echo get_permalink(250); ?>" class="title-content-link  link-2">



                  <div>



                    البوم الصور



                    



                  </div>



                 



                  <i class="fas fa-chevron-left icon-link"></i>



   



                </a>



                <?php $albums = sh_get_albums(9); ?>



                <?php if($albums->have_posts()) : ?>



                 <div class="content-putfole contont-imge row">



                   



                    <?php while($albums->have_posts()) : $albums->the_post(); ?>



                    <img class="col-md-6"src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>">



                    <?php endwhile; ?>



                 </div>



                <?php wp_reset_query(); endif; ?>



              



                <?php  $mayposts = sh_you_may_also_like(2); ?>



                <?php if($mayposts->have_posts()) : ?>



                <h5 class="title-content">قد تنال إعجابك</h5>



              <div class="card-deck content-putfole">



                  <?php while($mayposts->have_posts()) : $mayposts->the_post(); ?>



<!--                 <div class="card">

 -->                <div class="sh_card_new">



                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" class="card-img-top sh-custom-height" alt="<?php the_title(); ?>">



                  <div class="card-body">



                    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?= wp_trim_words( get_the_title(),7,' ...' ); ?></a></h5>



                    <p class="card-text"><?php // the_excerpt(); ?></p>



                  </div>



                </div>



                <?php endwhile; ?>



              </div>



              <?php wp_reset_query(); endif; ?>







            </div>



           </div>



                            



                  <div class="component-title-link ha-title-link">



                    <h5 class="title-content">



                      الفيديوهات







                    </h5>



                      <a href="<?= get_permalink(252); ?>" class="title-link"> المزيد



                        <i class="fas fa-chevron-left icon-link2"></i>



   



                      </a>



                    



                   



                   </div>







                   <?php $home_videos = sh_get_home_videos(33,4); ?>







                   <?php if ( $home_videos->have_posts() ) : ?>





                   <div class="WhyUsVideo-2">



                  <?php while ( $home_videos->have_posts() ) : $home_videos->the_post(); $videoId=get_the_ID(); ?>

                    <?php $sh_video_link=get_post_meta( $videoId, 'sh_video_link', true );?>
                      <?php $sh_youtube_link=get_post_meta( $videoId, 'sh_youtube_link', true );?>

                    <div class="WhyUsVideo">



                      <div class="list-group-1" id="v1">
                                <?php if(!empty($sh_video_link)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="500" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <?php } ?>

                      </div> 



                   </div>



                  <?php break; endwhile;?>



                   



                    <div class="list-group-horizontal-2 ">







                  <?php $a=1;while ( $home_videos->have_posts() ) : $home_videos->the_post(); $postId=get_the_ID();

                  $a++;?>

                    <?php $sh_video_link_2=get_post_meta( $postId, 'sh_video_link', true );?>
                      <?php $sh_youtube_link_2=get_post_meta( $postId, 'sh_youtube_link', true );?>

                      <div class="list-group-1" id="v<?=$a?>" >
                                <?php if(!empty($sh_video_link_2)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link_2; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link_2)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="500" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link_2); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <?php } ?>
                      </div> 



                  <?php endwhile;?>







                    </div>







                    </div>



                  <?php wp_reset_query(); endif;?>

         </div>



       </div>



     </main>



    <!--end-section-main-->

<?php get_footer(); ?>