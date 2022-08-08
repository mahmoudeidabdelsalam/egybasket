<?php 
/**
** Template Name: History Template
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
       <div class="component-title-list">
        <h5 class="title-content text-right title-tarikh">
          كرة السلة في مصر 
          
            <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav nav ">
                <li class="nav-item active">
                  <a class="nav-link dot" href="#tab-faq-z"onclick="currentSlide(1)">تاريخ الاتحاد </a>
  
  
                </li>
                <li class="nav-item">
                  <a class="nav-link dot "  href="#tab-faq-x"onclick="currentSlide(2)" >الانجازات </a>
                  
                  </li>
                  </ul>
            </nav>
            
            
        </h5>
       </div>
       <div class="type-main-next">
         <div class="container">
          <div class="tab-content">
            <div class="tab-pane slidr active show" id="tab-faq-z">
              <div class="component-list-tarikh text-right">
              <?php $history = sh_get_history(-1); ?>
              <?php if ( $history->have_posts() ) : ?>
              <?php while ( $history->have_posts() ) : $history->the_post(); ?>
                <div class="media  align-items-center">
                  <h5><?php the_title(); ?></h5>
    
                  <div class="media-body">
                    <?php the_content(); ?>
                   </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); endif; ?>
               </div>
            </div>
            <div class="tab-pane slidr" id="tab-faq-x">
              <div class=" row">
                <div class="component-injazat-right col-md-4">
                  <?php $achivements_cats = sh_get_categories_of_achivements(); ?>
                  <ul class="nav ">
                  <?php $i=0; foreach ($achivements_cats as $achivements_cat) {  ?>
                    <li class="nav-hoverr nav-item nav-item-link <?= $i == 0 ? 'active' : ''; ?> ">
                      <a class="nav-link title-content-link " href="#tab-faq-<?= $achivements_cat->term_id; ?>" data-toggle="tab" tabindex="0">
                        <span><?= $achivements_cat->name; ?></span>
                        <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>
                      </a>
                    </li>
                  <?php $i++; } ?>
                  </ul>
                </div>
                
                   <div class="component-injazat-left col-md-8">
                    <div class="tab-content">

                      <?php $i=0; foreach ($achivements_cats as $achivements_cat) {  ?>
                      <div class="tab-pane <?= $i == 0 ? 'active show' : ''; ?>" id="tab-faq-<?= $achivements_cat->term_id; ?>">
                        <div class="accordion component-qararat" id="accordionExample">
                       <?php $achivements = sh_get_achivements_of_cat($achivements_cat->term_id); ?>
                       <?php if ( $achivements->have_posts() ) : ?>
                       <?php while ( $achivements->have_posts() ) : $achivements->the_post(); $achivement_id = get_the_ID(); ?>

                          <div class="carde card-asked">
                            <div class="card-header" id="headingac<?= $achivement_id; ?>">
                                <h2 class="mb-0">
                                    <div class="btn  card-Frequently" data-toggle="collapse" data-target="#collapseac<?= $achivement_id; ?>">
                                    <?php the_title(); ?> <i class="fas fa-chevron-down text-left" aria-hidden="true"></i>
                                    </div>                 
                                </h2>
                            </div>
                            <div id="collapseac<?= $achivement_id; ?>" class="collapse" aria-labelledby="headingac<?= $achivement_id; ?>" data-parent="#accordionExample">
                              <div class="card-body">
                                 <?php the_content(); ?>
                              </div>
                              </div>
                          </div>

                       <?php endwhile; ?>
                       <?php wp_reset_query(); endif; ?>
                         </div>
                      </div>
                      <?php $i++; } ?>

                    </div>
                    
                   </div>
                  </div>
            </div>
          </div>
           
         </div>
       </div>
     </main>
    <!--end-section-main-->

<?php get_footer(); ?>