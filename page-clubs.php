<?php 

/**

** Template Name: Teams Template

**/ 

get_header(); ?>

      <header>       

        <section class="component-section">

          <div class="compoonent-slid">

            

              <ul class="list-group list-group-horizontal last-naws-group">

                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>

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

              <div class="component-injazat-right col-md-6">

                <ul class="nav ">

                    

                    <li class="nav-hoverr nav-item nav-item-link ">

                    <a class="nav-link title-content-link " href="#tab-faq-1" data-toggle="tab" tabindex="0"> 

                      <span> ترتيب ابجدى</span>

                      <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>



                        </a>



                    </li>

                   

                    </ul>

              </div>
             <div class="comonent-injazat row">

             
              

                 <div class="component-injazat-left col-md-12">

                  <div class="tab-content ">

                    <div class="tab-pane active show" id="tab-faq-1">

                      <div class="component-img">

    

                      <?php $letters = sh_get_letters(); ?>

                       <?php foreach ($letters as $letter) {  ?>

                        <!-- <h5 class="title-content">

                          <?= $letter->name; ?>

                        </h5> -->

                        

                        <div class="component-alandia row">



                        <?php $teams = sh_get_teams_of_letter($letter->term_id); ?>

                        <?php if ( $teams->have_posts() ) : ?>

                        <?php while ( $teams->have_posts() ) : $teams->the_post(); $postId=get_the_ID(); ?>



                          <a href="<?php the_permalink(); ?>" class="col-md-3">

                            

                            <h5 class="title-content">

                              <?php the_title(); ?>               

  

                            </h5>

                            <div class="img-eanasir">

                               <img src="<?= get_the_post_thumbnail_url($postId,'medium');  ?>">

                               <small class="span-alandia">  

                                عدد البطولات  

                                   <span><?= get_post_meta($postId,'sh_championship',true);  ?></span> 

                                </small>

                            </div>

                          </a>



                         <?php endwhile;?>

                        <?php wp_reset_query(); ?>

                        <?php endif; ?>



                        </div>

                        

                      <?php } ?>



                       

                       

                       

                      </div>

                      

                      </div>

                      

                    

                    <div class="tab-pane " id="tab-faq-2">

                    

                    </div>

                   

                  </div>

                  

                 </div>

             </div>

         </div>

       </div>

     </main>

    <!--end-section-main-->



<?php get_footer(); ?>