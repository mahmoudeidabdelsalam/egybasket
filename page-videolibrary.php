<?php 
/**
** Template Name: Viedeo Library Template
**/
get_header(); ?>
  <header>
    <section class="component-section">
      <div class="compoonent-slid">
        
          <ul class="list-group list-group-horizontal last-naws-group">
            <li class="list-group"><a href="<?= bloginfo('url');?>">الرئيسية</a></li>
            <li class="list-group"><a href="#"> المكتبة</a></li>
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
            <li class=" nav-item  ">
                <a class="nav-link title-content-link " href="<?= get_permalink(250); ?>" >
                  <span>     
                                        البوم الصور                      
                  </span>
                  <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>

                </a>
                </li>
                
                <li class=" nav-item  active ">
                <a class="nav-link title-content-link " href="javascript:Void(0)" > 
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
                                 
                  <div class="component-img">
                    <div class="component-title-link">
                      <h5 class="title-content-img text-right">
                        اللقاءات
                      </h5>
                      <a href="#meetings" class="title-link"> المزيد
                        <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>
                      </a>
                     </div>
                     <div class="component-events">
                    <?php $meetings = sh_get_videos(2,5); ?>
                    <?php if($meetings->have_posts()) : ?>
                    <?php $a=0;$i=0; while($meetings->have_posts()) : $meetings->the_post(); $meetingid = get_the_ID(); $a++; ?>
                      <?php $sh_video_link=get_post_meta( $meetingid, 'sh_video_link', true );?>
                      <?php $sh_youtube_link=get_post_meta( $meetingid, 'sh_youtube_link', true );?>
                      <?php if($i=='0') :?>
                      
                        <div class="component-events-right text-right">
                          <div class="card-one card mb-3">
                            <div class="WhyUsVideo">
                              <div class="list-group-1 ha-video" id="v<?=$a?>" >
                                 <?php if(!empty($sh_video_link)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="100%" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    <?php } ?>
                              </div>
                            </div>   
                            <div class="card-body">
                              <h5 class="card-title"><?php the_title(); ?></h5>
                              <ul class="article__details-items">
                                <li class="article__details-item type--writer"><img src="<?= SH_URL; ?>assets/file/Shape 13.png"> <?php the_author(); ?></li>
                                <li class="article__details-item type--date"><img src="<?= SH_URL; ?>assets/file/Shape 14.png"> <?php the_date(); ?></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!--<div class="component-img-left text-left">-->
                        <?php else : ?>                 
                          <div class="card-one card">
                            <div class="list-group-2" id="v<?=$a?>" >
                              <?php if(!empty($sh_video_link)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="100%" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    <?php } ?>
                            </div>
                            <div class="card-body">
                              <h5 class="card-title"><?php the_title(); ?></h5>
                            </div>
                          </div>           
                   <?php endif; ?>
                    <?php $i++; endwhile; ?>
                    <!--</div>-->
                    <?php wp_reset_query(); endif; ?> 
  
                       </div>
                       <div class="component-title-link">
                        <h5 class="title-content-img text-right">
                          المباريات
                        </h5>
                        <a href="#matches" class="title-link"> المزيد
                          <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>
                        </a>
                       </div>
                       <div class="component-events">
                 
                      <?php $matches = sh_get_videos(3,5) ?>
                      <?php if($matches->have_posts()) : ?>
                      <?php $i=0; while($matches->have_posts()) : $matches->the_post(); $matchid = get_the_ID(); ?>
                       <?php $sh_video_link_2=get_post_meta( $matchid, 'sh_video_link', true );?>
                      <?php $sh_youtube_link_2=get_post_meta( $matchid, 'sh_youtube_link', true );?>
                        <?php if($i=='0') :?>

                        <div class="component-events-right text-right">
                          <div class="card-one card mb-3">
                            <div class="WhyUsVideo">
                              <div class="list-group-2 ha-video" id="v6" >
                                <?php if(!empty($sh_video_link_2)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link_2; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link_2)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="100%" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link_2); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    <?php } ?>
                              </div>
                           </div>
                           <div class="card-body">
                              <h5 class="card-title"><?php the_title(); ?></h5>
                              <ul class="article__details-items">
                                  <li class="article__details-item type--writer"><img src="<?= SH_URL; ?>assets/file/Shape 13.png"> <?php the_author(); ?></li>
                                  <li class="article__details-item type--date"><img src="<?= SH_URL; ?>assets/file/Shape 14.png">  <?php the_date();?></li>                        </ul>
                            </div>
                          </div>
                          
                          </div>    
                          <?php else : ?>                 
                            <div class=" card-one card">
                              <div class="list-group-2" id="v2" >
                                <?php if(!empty($sh_video_link_2)){
                                ?>
                                <div class="video-play1" ></div>
                            
                                <video id="exampleVideo1">
                                   
                                         <source src="<?= $sh_video_link_2; ?>" type="video/mp4">
                                    
                                </video>
                                <?php }elseif(!empty($sh_youtube_link_2)){ ?>
                                         <iframe id="exampleVideo1" width="100%" height="100%" src="<?php echo getYoutubeEmbedUrl($sh_youtube_link_2); ?>" 
                                    frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    <?php } ?>
                              </div>
                              <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                              </div>
                            </div>           
                     <?php endif; ?>
                      <?php $i++; endwhile; ?>
                      <?php wp_reset_query(); endif; ?>
    
                         </div>
                  </div>
                
               
              
              
             </div>
         </div>
     </div>
   </div>
 </main>
<!--end-section-main-->
<?php get_footer(); ?>