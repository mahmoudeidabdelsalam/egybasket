<?php get_header(); ?>

<style>.sp-data-table td{direction:ltr;}</style>   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $table_id=get_the_ID(); ?>

    <header>

      <section class="component-section compoonent-slid">

         

          <ul class="list-group list-group-horizontal last-naws-group">

            <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>

            <li class="list-group"><a href="javascript:void(0);"> المسابقات</a></li>

            <li class="list-group"><?php the_title(); ?></li>

          </ul>

        

        

      </section>

    </header>

    <div class="component-title-list">

      <h5 class="title-content text-right title-almudaribn">

        <div>

          <?php the_title(); ?>

          <small> <?php the_excerpt(); ?></small>

        </div>

            

          <nav class="navbar navbar-expand-lg navbar-light">

            <ul class="navbar-nav nav nav-tabs">

              

              <li class=" nav-hoverr nav-item nav-item-link " >

                



              </li>

              <li class=" nav-hoverr nav-item nav-item-link " >

                <a class="nav-link active" href="#tab-faq-a"  data-toggle="tab" tabindex="0">الترتيب

                </a>





              </li>

              <li class="nav-hoverr nav-item nav-item-link " >

                <a class="nav-link   " href="#tab-faq-s"  data-toggle="tab" tabindex="0"> المباريات

                </a>

                

                  </li>

                  <li class="nav-hoverr nav-item nav-item-link ">

                    <a class="nav-link   " href="#tab-faq-f"  data-toggle="tab" tabindex="0">  الإحصائيات

                    </a>

                    

                                            

                          </li>

            </ul>

          </nav>

          <div class="component-from ">

            <a class="label-content" href="<?= get_post_meta($table_id,'sh_table_link',true); ?>">

              <span>

                تحميل جدول المباريات 



              </span>

                <img src="<?php echo SH_URL; ?>assets/img/download.png"></a>

         
         </div>

          

      </h5>

     </div>

    <!--stert-section-main-->

     <main class="component-tarikh-alaitihad">

     

      <div class="type-main-next">

        <div class="container">

         <div class="tab-content">

          

          

           <div class="tab-pane  show active" id="tab-faq-a">

            <?php $show = get_post_meta($table_id,'sh_champion_cup',true); ?>

            <?php if($show == '1') : ?>

              <?php the_post_thumbnail('large'); ?>

            <?php else : ?>

            <?php the_content(); ?>

            <?php endif; ?>

           </div>

            <div class="tab-pane  " id="tab-faq-s">

             <div class="comonent-injazat row">

                  <div class="component-injazat-left col-md-12">

                   <div class="tab-content ">

                     <div class="tab-pane active show" id="tab-faq-2">

                       <div class="component-jadwal">
                          <?php $calender_id = esc_attr( get_post_meta( $table_id, 'sh_calender_id', true ) ); 

                            $calender_data = get_post($calender_id);

                          ?>

                         <h5 class="title-content">

                           <?= $calender_data->post_title; ?>

                         </h5>
                            <?php if (!empty($calender_id)): ?>
						   
						   
							<?= do_shortcode('[event_blocks '.$calender_id.']'); ?>
						   
                            <?php else: ?>
						   
                              <p style="text-align:center;">لايوجد مباريات</p>
                            <?php endif ?>
                       </div>

                      </div>

                   </div>

                  </div>

              </div>

    
             </div>

             <div class="tab-pane " id="tab-faq-f">

               <h5 class="title-content">

                 الإحصائيات

               </h5>

               <div class="component-list-lajnah row text-right">

                 <?php $scorers_short = esc_attr( get_post_meta( $table_id, 'sh_scorers_shortcode', true ) ); echo do_shortcode($scorers_short);?>

                </div>

               </div>

              <div class="tab-pane " id="tab-faq-g">

               <div class="component-injazat-left ">

                 <div class="component-img">

                   <div class="component-title-link-three">

                     <h5 class="title-content-img text-right">

                       الموتمر الصحفى للاعلان عن استضافة كأس العالم للشباب2017

                     </h5>

                     <div class="nav-tabs title-link">

                       <a href="#tab-faq-img" data-toggle="tab" tabindex="0" class=""> المزيد

                         <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>

                       </a>

                      

                     </div>

                    

                    </div>

                    <div class="component-events">

                

                     <div class="component-events-right text-right">

                       <div class="img-top-three">

                         <img src="<?php echo SH_URL; ?>/assets/file/DSC_-1.png" class="" alt="...">

 

                       </div>

                        

                       

                       </div>

                      

 

                     

 

                      <div class="component-img-three text-left">

                        

                        

                        

                           <img src="<?php echo SH_URL; ?>/assets/file/DS5C_0184.png" class="card-img-top" alt="...">

                          

                        

                        

                           <img src="<?php echo SH_URL; ?>/assets/file/DS6C_0184.png" class="card-img-top" alt="...">

                         

                        

                        

                     

                           <img src="<?php echo SH_URL; ?>/assets/file/DSC_-4.png" class="card-img-top" alt="...">

                         

                        

                           <img src="<?php echo SH_URL; ?>/assets/file/DSC_-3.png" class="card-img-top" alt="...">

                         

                           <img src="<?php echo SH_URL; ?>/assets/file/DS5C_0184.png" class="card-img-top" alt="...">

                          

                        

                        

                           <img src="<?php echo SH_URL; ?>/assets/file/DS6C_0184.png" class="card-img-top" alt="...">

                         

                        

                       </div>

 

                      </div>

                      <div class="component-title-link-three">

                       <h5 class="title-content-img text-right">

                           صور أرشيفية

                       </h5>

                       <a href="#tab-faq-img" data-toggle="tab" tabindex="0" class=""> المزيد

                         <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>

                       </a>

                      </div>

                      <div class="component-events">

                  

                       <div class="component-events-right text-right">

                         <div class="img-top-three">

                           <img src="<?php echo SH_URL; ?>/assets/file/24.png" class="card-img-top" alt="...">

 

                         </div>

                          

                         

                         </div>

                        

   

                       

   

                        <div class="component-img-three text-left">

                          

                          

                          

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01845.png" class="card-img-top" alt="...">

                            

                          

                          

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01841.png" class="card-img-top" alt="...">

                           

                          

                          

                       

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01842.png" class="card-img-top" alt="...">

                           

                          

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01843.png" class="card-img-top" alt="...">

                           

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01842.png" class="card-img-top" alt="...">

                           

                          

                             <img src="<?php echo SH_URL; ?>/assets/file/DSC_01843.png" class="card-img-top" alt="...">

                           

                          

                         </div>

   

                        </div>

                 </div>

     

             

             

            </div>

              </div>

              <div class="tab-pane " id="tab-faq-h">

               <div class="component-injazat-left ">

                                    

                 <div class="component-img">

                   <div class="component-title-link-three">

                        <h5 class="title-content-img text-right">

                          اللقاءات

                        </h5>

                        <div class="nav-tabs title-link">

                          <a href="alnashat alduwalaa-video.html" class=""> المزيد

                            <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>

                          </a>

                        </div>

                      

                    </div>

                    <div class="component-eventss">

                

                     <div class="component-events-right text-right">

                       <div class="card mb-3">

                         <div class="WhyUsVideo">

                           <div class="list-group-1" id="v1">

                             <div class="video-play1"></div>

                         

                             <video id="exampleVideo1">

                                 <source src=".assets/Video/vv.mp4" type="video/mp4">

                             </video>

                           </div>

                        </div>   

                        <div class="card-body">

                           <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                           <ul class="article__details-items">

                             <li class="article__details-item type--writer">

                               <img src="<?php echo SH_URL; ?>/assets/file/Shape 13.png">

                               الادمن</li>

                             <li class="article__details-item type--date">

                               <img src="<?php echo SH_URL; ?>/assets/file/Shape 14.png">

                               17 اكتوبر 2019</li>

                             <li class="article__details-item type--comments">

                               <img src="<?php echo SH_URL; ?>/assets/file/Shape 15.png">

                               35 تعليقات</li>

                           </ul>

                         </div><!------->

                       </div>

                       

                      </div>


                      <div class="row-video-list row row-cols-1 row-cols-sm-2 row-cols-md-2 text-left">

                        

                       <div class="card col-md-6 col-sm-12">

                         <div class="list-group-1" id="v2">

                           <div class="video-play1"></div>

                       

                           <video id="exampleVideo1">

                               <source src=".assets/Video/vv.mp4" type="video/mp4">

                           </video>

                         </div>

                         <div class="card-body">

                           <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                         </div>

                       </div>

                       <div class="card col-md-6 col-sm-12">

                         <div class="list-group-1" id="v3">

                           <div class="video-play1"></div>

                       

                           <video id="exampleVideo1">

                               <source src=".assets/Video/vv.mp4" type="video/mp4">

                           </video>

                         </div>

                         <div class="card-body">

                           <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                         </div>

                       </div>

                       <div class="card col-md-6 col-sm-12">

                         <div class="list-group-1" id="v4">

                           <div class="video-play1"></div>

                       

                           <video id="exampleVideo1">

                               <source src=".assets/Video/vv.mp4" type="video/mp4">

                           </video>

                         </div>                                 <div class="card-body">

                           <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                         </div>

                       </div>

                       <div class="card col-md-6 col-sm-12">

                         <div class="list-group-1" id="v5">

                           <div class="video-play1"></div>

                       

                           <video id="exampleVideo1">

                               <source src=".assets/Video/vv.mp4" type="video/mp4">

                           </video>

                         </div>   

                         

                         <div class="card-body">

                           <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                         </div>

                       </div>

                                                     

            

                       </div>

 

                      </div>

                      <div class="component-title-link-three">

                       <h5 class="title-content-img text-right">

                         المباريات

                       </h5>

                       <a href="alnashat alduwalaa-video.html" class="title-link"> المزيد

                         <i class="fas fa-chevron-left icon-link2" aria-hidden="true"></i>

                       </a>

                      </div>

                      <div class="component-eventss">

                

                       <div class="component-events-right text-right">

                         <div class="card mb-3">

                           <div class="WhyUsVideo">

                             <div class="list-group-1" id="v6">

                               <div class="video-play1"></div>

                           

                               <video id="exampleVideo1">

                                   <source src=".assets/Video/vv.mp4" type="video/mp4">

                               </video>

                             </div>

                          </div>

                          <div class="card-body">

                             <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                             <ul class="article__details-items">

                               <li class="article__details-item type--writer">

                                 <img src="<?php echo SH_URL; ?>/assets/file/Shape 13.png">

                                 الادمن</li>

                               <li class="article__details-item type--date">

                                 <img src="<?php echo SH_URL; ?>/assets/file/Shape 14.png">

                                 17 اكتوبر 2019</li>

                               <li class="article__details-item type--comments">

                                 <img src="<?php echo SH_URL; ?>/assets/file/Shape 15.png">

                                 35 تعليقات</li>

                             </ul>

                           </div>

                         </div>

                         

                         </div>

                        

   

                       

   

                        <div class="row-video-list row row-cols-1 row-cols-sm-2 row-cols-md-2 text-left">

                          

                         <div class="card col-md-6 col-sm-12">

                           <div class="list-group-1" id="v7">

                             <div class="video-play1"></div>

                         

                             <video id="exampleVideo1">

                                 <source src=".assets/Video/vv.mp4" type="video/mp4">

                             </video>

                           </div>  

                           

                           <div class="card-body">

                             <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                           </div>

                         </div>

                         <div class="card col-md-6 col-sm-12">

                           <div class="list-group-1" id="v8">

                             <div class="video-play1"></div>

                         

                             <video id="exampleVideo1">

                                 <source src=".assets/Video/vv.mp4" type="video/mp4">

                             </video>

                           </div>

                          <div class="card-body">

                             <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                           </div>

                         </div>
                         <div class="card col-md-6 col-sm-12">

                           <div class="list-group-1" id="v9">

                             <div class="video-play1"></div>

                         

                             <video id="exampleVideo1">

                                 <source src=".assets/Video/vv.mp4" type="video/mp4">

                             </video>

                           </div>  

                                                          <div class="card-body">

                             <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                           </div>

                         </div>
                         <div class="card col-md-6 col-sm-12">

                           <div class="list-group-1" id="v10">

                             <div class="video-play1"></div>

                         

                             <video id="exampleVideo1">

                                 <source src=".assets/Video/vv.mp4" type="video/mp4">

                             </video>

                           </div>                                 <div class="card-body">

                             <h5 class="card-title">لقاء الدكتور مجدى ابو فريخه رئيس التحاد المصرى لكرة السلة على برنامج مديااون</h5>

                           </div>

                         </div>

                                                       

              

                         </div>

   

                        </div>

                 </div><!---->


                </div>

              </div>
              <!---->

              <div class="tab-pane " id="tab-faq-img">

               <div class="component-img-almaktaba ">

                 <div class="row row-cols-1">

                   <img data-toggle="modal" data-target="#exampleModal-img" class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS1C_0184.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-4.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-3.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-6.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS5C_0184.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS6C_0184.png">

                 </div>

                 <div class="row row-cols-1">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS1C_0184.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-4.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-3.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-6.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS5C_0184.png">

                  <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS6C_0184.png">

                 </div>

                 <div class="row row-cols-1">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS1C_0184.png">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-4.png">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-3.png">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DSC_-6.png">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS5C_0184.png">

                   <img class="col-sm-2 col-4" src="<?php echo SH_URL; ?>/assets/file/DS6C_0184.png">

                  </div>

                  <div class="component-pagination row">

                   المزيد

                </div>

               </div>

              </div>

         

             

          </div>

           

        </div>

      </div>

     </main>

    <!--end-section-main-->

<?php endwhile; endif;?>

<?php get_footer(); ?>