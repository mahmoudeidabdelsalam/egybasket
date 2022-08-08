<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $teamid=get_the_ID(); ?>
<header>
    <section class="component-section">
      <div class="compoonent-slid">
        
          <ul class="list-group list-group-horizontal last-naws-group">
            <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>
            <li class="list-group"><a href="<?= get_permalink(293); ?>"> الاندية</a></li>
            <li class="list-group"><?php the_title(); ?></li>

           
          </ul>
        
      </div>
    </section>
</header>
<!--end-header-->
<!--stert-section-main-->
 <main class="component-tarikh-alaitihad">
   <div class="component-title-list">
    <h5 class="title-content text-right title-tarikh">
      <div>
        <img src="<?= $teamlogo=get_the_post_thumbnail_url($teamid,'large');?>">
        <?php the_title(); ?>
      </div>
      
          
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav nav nav-tabs">
            <li class=" nav-hoverr nav-item nav-item-link active">
              <a class="nav-link " href="#tab-faq-q" data-toggle="tab" tabindex="0">عن النادي
              </a>


            </li>
            <li class="nav-hoverr nav-item nav-item-link">
              <a class="nav-link "  href="#tab-faq-w" data-toggle="tab" tabindex="0"> الترتيب
              </a>
              
              </li>
              <li class="nav-hoverr nav-item nav-item-link ">
                <a class="nav-link "  href="#tab-faq-e" data-toggle="tab" tabindex="0"> مباريات
                </a>
                
                </li>
                <li class="nav-hoverr nav-item nav-item-link">
                  <a class="nav-link "  href="#tab-faq-r" data-toggle="tab" tabindex="0"> قائمة اللاعبين
                  </a>
                  
                  </li>
                  <li class="nav-hoverr nav-item nav-item-link">
                    <a class="nav-link "  href="#tab-faq-t" data-toggle="tab" tabindex="0"> الجهاز الفنى
                    </a>
                    
                    </li>
                    <li class="nav-hoverr nav-item nav-item-link">
                      <a class="nav-link "  href="#tab-faq-y" data-toggle="tab" tabindex="0">  فيديوهات
                      </a>
                      
                      </li>
              </ul>
        </nav>
        
        
    </h5>
   </div>
   <div class="type-main-next">
     <div class="container">
       <div class="tab-content">
         <div class="tab-pane show active" id="tab-faq-q">
          <div class="comonent-injazat2 row">
            <div class="component-injazat-right card-majlis col-md-4">
             <div class="  card-alaitihad2">
               <div class="text-center">
                <img src="<?= $teamlogo; ?>" class="" alt="<?php the_title(); ?>">

               </div>
 
               <div class="card-body-alaithad text-right">
                <table class="product__data2">
                  <thead>
                    <tr>
                      <th class=" ">الاسم الكامل</th>
                      <th class=" ">تاسس عام</th>
                      <th class=" "> اللقب</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="td-1"><?= esc_attr( get_post_meta( $teamid, 'sh_club_fullname', true ) ); ?></td>
                      <td class="td-1"><?= esc_attr( get_post_meta( $teamid, 'sh_club_establish', true ) ); ?></td>
                      <td class="td-1"><?= esc_attr( get_post_meta( $teamid, 'sh_club_title', true ) ); ?></td>
                    </tr>
                  </tbody>
                </table>
                <div>
                  <span class="span-p">الادراة</span>
                  <table class="product__data2">
                    <thead>
                      <tr>
                        <th> الرئيس</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="td-1"><?= esc_attr( get_post_meta( $teamid, 'sh_club_head', true ) ); ?></td>
                            </tr>
                            </tbody>
                  </table>
                </div>
                 <h5 class=" title-content mt-0 mb-1">مواقع الرسمى</h5>
                   <a href="<?= get_post_meta($teamid,'sp_url',true); ?>"><?=get_post_meta($teamid,'sp_url',true);  ?></a>
                 <h5 class=" title-content mt-0 mb-1">مواقع  التواصل الاجتامعى</h5>
                 <ul class="list-group list-group-horizontal">
                   <li class="list-group">
                           <a href="<?= esc_attr( get_post_meta( $teamid, 'sh_club_fb', true ) ); ?>" target="_blank"><img src="<?= SH_URL; ?>assets/file/Group 410.png"></a> 
                   </li>
                   <li class="list-group">
                           <a href="<?= esc_attr( get_post_meta( $teamid, 'sh_club_tw', true ) ); ?>" target="_blank"><img src="<?= SH_URL; ?>assets/file/Group 411.png"></a>
   
                   </li>
                   <li class="list-group">
                           <a href="<?= esc_attr( get_post_meta( $teamid, 'sh_club_go', true ) ); ?>" target="_blank"><img src="<?= SH_URL; ?>assets/file/Group 412.png"></a>
   
                   </li>
                   <li class="list-group">
                           <a href="<?= esc_attr( get_post_meta( $teamid, 'sh_club_in', true ) ); ?>" target="_blank"><img src="<?= SH_URL; ?>assets/file/Group 413.png"></a>
   
                   </li>
                  
                 </ul>
               </div>
             </div>
            </div>
            <div class="component-injazat-left card-body-alaithad col-md-8">
             <h5 class="title-content">
               تاريخ النادى
             </h5>
              <?= get_post_meta( $teamid, 'sh_club_about', true ); ?>
            </div>
 
          </div>
         </div>
         <div class="tab-pane " id="tab-faq-w">
          <div class="comonent-injazat row">
            <div class="component-injazat-right col-md-12">
                <div class="tab-content ">
                	<?php the_content(); ?>
                </div>
                
               </div>
           </div>
         </div>
         <div class="tab-pane " id="tab-faq-e">
          <div class="comonent-injazat row">
            <div class="component-injazat-right col-md-12">
                <div class="tab-content ">
					<?= do_shortcode(get_post_meta($teamid,'sh_club_matches_short',true)); ?>             
                </div>
                
               </div>
           </div>
         </div>
         <div class="tab-pane " id="tab-faq-r">
          <h5 class="title-content">
            قائمة اللاعبين
          </h5>
          <div class="component-list-lajnah row text-right">
        	<?php $players = sh_get_players_related_to_team($teamid); ?>
                <?php if($players->have_posts()) : ?>
                <?php while($players->have_posts()) : $players->the_post(); $playerid = get_the_ID(); ?>
                <div class="modal-lanah ">
                  <div class="media ">
                    <img src="<?= get_the_post_thumbnail_url($playerid,'thumbnail'); ?>" alt="<?php the_title(); ?>">
                    <div class="media-body">
                      <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); endif; ?>       
           </div>
         </div>
         <div class="tab-pane " id="tab-faq-t">
          <h5 class="title-content">
            الجهاز الفني
          </h5>
          <div class="component-list-lajnah row text-right">
        	<?php $staffs = sh_get_staff_related_to_team($teamid); ?>
                <?php if($staffs->have_posts()) : ?>
                <?php while($staffs->have_posts()) : $staffs->the_post(); $staff = get_the_ID(); ?>
                <div class="modal-lanah ">
                  <div class="media ">
                    <img src="<?= get_the_post_thumbnail_url($staff,'thumbnail'); ?>" alt="<?php the_title(); ?>">
                    <div class="media-body">
                      <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                      <h6 class="span-media"><?php the_excerpt(); ?></h6>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); endif; ?>    
           </div>
         </div>
         <div class="tab-pane " id="tab-faq-y">
          <div class="component-injazat-left ">
                                 
            <div class="component-img">
              <div class="component-title-link-three">
                <h5 class="title-content-img text-right">
                  اللقاءات
                </h5>
                <div class="nav-tabs title-link">
                  <a href="#" class=""> المزيد
                    <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>
                  </a>
                </div>
                 
               </div>

               <div class="component-events">
    
               	<?php $meetings = sh_get_videos_related_to_team($teamid,2,5) ?>
                <?php if($meetings->have_posts()) : ?>
                <?php $i=0; while($meetings->have_posts()) : $meetings->the_post(); $meetingid = get_the_ID(); ?>
	                <?php if($i=='0') :?>
          					<div class="component-events-right text-right">
          						<div class="card mb-3">
          							<div class="WhyUsVideo">
          							  <div class="list-group-1" id="v1" >
          							    <div class="video-play1" ></div>

          							    <video id="exampleVideo1">
          							        <source src="<?= get_post_meta( $meetingid, 'sh_video_link', true ); ?>" type="video/mp4">
          							    </video>
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
          					<div class="component-img-left text-left">
          					<?php else : ?>                 
          						<div class="card">
          							<div class="list-group-1" id="v2" >
          								<div class="video-play1" ></div>
          								<video id="exampleVideo1">
          									<source src="<?= get_post_meta( $meetingid, 'sh_video_link', true ); ?>" type="video/mp4">
          								</video>
          							</div>
          							<div class="card-body">
          								<h5 class="card-title"><?php the_title(); ?></h5>
          							</div>
          						</div>           
					     <?php endif; ?>
                <?php $i++; endwhile; ?>
					</div>
                <?php wp_reset_query(); endif; ?>    

				</div>


                 <div class="component-title-link-three">
                  <h5 class="title-content-img text-right">
                    المباريات
                  </h5>
                  <a href="#" class="title-link"> المزيد
                    <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>
                  </a>
                 </div>
                 <div class="component-events">
                <?php $matches = sh_get_videos_related_to_team($teamid,3,5) ?>
                <?php if($matches->have_posts()) : ?>
                <?php $i=0; while($matches->have_posts()) : $matches->the_post(); $matchid = get_the_ID(); ?>
                  <?php if($i=='0') :?>

                  <div class="component-events-right text-right">
                    <div class="card mb-3">
                      <div class="WhyUsVideo">
                        <div class="list-group-1" id="v6" >
                          <div class="video-play1" ></div>
                      
                          <video id="exampleVideo1">
                              <source src="<?= get_post_meta( $matchid, 'sh_video_link', true ); ?>" type="video/mp4">
                          </video>
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
                      <div class="component-img-left text-left">
                    <?php else : ?>                 
                      <div class="card">
                        <div class="list-group-1" id="v2" >
                          <div class="video-play1" ></div>
                          <video id="exampleVideo1">
                            <source src="<?= get_post_meta( $matchid, 'sh_video_link', true ); ?>" type="video/mp4">
                          </video>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php the_title(); ?></h5>
                        </div>
                      </div>           
               <?php endif; ?>
                <?php $i++; endwhile; ?>
                </div>
                <?php wp_reset_query(); endif; ?>    


                   </div>
            </div>
          
         
        
        
       </div>
         </div>
        

       </div>
     
        <!----->
        
        <!----->
     </div>
   </div>
 </main>
<?php endwhile; endif;?>
<!--end-section-main-->
<?php get_footer(); ?>