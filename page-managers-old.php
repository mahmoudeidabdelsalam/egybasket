<?php 

/**

** Template Name: Managers Old Template

**/

get_header(); ?>

<header>

 <section class="component-section">

  <div class="compoonent-slid">

   <ul class="list-group list-group-horizontal last-naws-group">

    <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>

    <li class="list-group"><?php  the_title(); ?></li>

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

    الهيكل التنظيمي 

    <small>   لاتحاد كرة السلة المصري   </small>

   </div>





   <nav class="navbar navbar-expand-lg navbar-light">

    <ul class="navbar-nav nav nav-tabs">

     <li class=" nav-hoverr nav-item nav-item-link activ">

      <a class="nav-link " href="#tab-faq-1" data-toggle="tab" tabindex="0">مجلس إدارة الإتحاد

      </a>





     </li>

     <li class="nav-hoverr nav-item nav-item-link">

      <a class="nav-link "  href="#tab-faq-2" data-toggle="tab" tabindex="0">إدارات الإتحاد

      </a>



     </li>

     <li class="nav-hoverr nav-item nav-item-link ">

      <a class="nav-link "  href="#tab-faq-77"data-toggle="tab" tabindex="0" >لجان الإتحاد

      </a>



     </li>

     <li class="nav-hoverr nav-item nav-item-link">

      <a class="nav-link "  href="#tab-faq-3" data-toggle="tab" tabindex="0">رؤساء الاتحاد

      </a>



     </li>

     <li class="nav-hoverr nav-item nav-item-link">

      <a class="nav-link "  href="#tab-faq-4" data-toggle="tab" tabindex="0"> الفروع

      </a>



     </li>

    </ul>

   </nav>





  </h5>

 </div>

 <div class="type-main-next">

  <div class="container">

   <div class="tab-content">

    <div class="tab-pane active show" id="tab-faq-1">

     <div class="component-list-lajnah  text-right">

      <div class="modal-lanah2 modal-lanah-new row">

       <?php $maglis_managers = sh_get_managers(1,11); ?>

       <?php if ( $maglis_managers->have_posts() ) : ?>

        <?php while ( $maglis_managers->have_posts() ) : $maglis_managers->the_post(); ?>
         <a href="<?php the_permalink(); ?>" class="media sh_media_block">

          <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium');?>" class="ml-3 sh_manager_img" alt="<?php the_title(); ?>">



          <div class="media-body">

           <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

           <h6 class="span-media">

            <?php the_excerpt(); ?>

           </h6>



          </div>

         </a>
        <?php $i++; endwhile; ?>

        <?php wp_reset_query(); endif; ?>

       </div>

      </div>


     <div class="component-list-lajnah  text-right">

      <div class="modal-lanah2 row">

       <?php $maglis_managers = sh_get_managers(-1,11); ?>

       <?php if ( $maglis_managers->have_posts() ) : ?>

        <?php $i=0; while ( $maglis_managers->have_posts() ) : $maglis_managers->the_post(); ?>
        <?php if($i != 0) : ?>
         <a href="<?php the_permalink(); ?>" class="media sh_media_block">

          <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium');?>" class="ml-3 sh_manager_img" alt="<?php the_title(); ?>">



          <div class="media-body">

           <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

           <h6 class="span-media">

            <?php the_excerpt(); ?>

           </h6>



          </div>

         </a>
       <?php endif; ?>
        <?php $i++; endwhile; ?>

        <?php wp_reset_query(); endif; ?>

       </div>

      </div>

     </div>

     <div class="tab-pane " id="tab-faq-2">

      <div class="component-list-lajnah row text-right">

       <div class="modal-lanah2 row">



        <?php $second_managers = sh_get_managers(-1,12); ?>

        <?php if ( $second_managers->have_posts() ) : ?>

         <?php while ( $second_managers->have_posts() ) : $second_managers->the_post(); ?>

          <div class="media ">

           <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium');?>" class="ml-3" alt="<?php the_title(); ?>">



           <div class="media-body">

            <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

            <h6 class="span-media">

             <?php the_excerpt(); ?>

            </h6>



           </div>

          </div>

         <?php endwhile; ?>

         <?php wp_reset_query(); endif; ?>





        </div>



       </div>

      </div>

      <!----->

      <div class="tab-pane " id="tab-faq-3">

       <div class="comonent-injazat row">



        <div class="component-injazat-right col-md-4">

         <a class="nav-link title-content-link " href="#"> 

          <span>السنوات</span>

          <i class="fas fa-chevron-up icon-link" aria-hidden="true"></i>



         </a>

         <ul class="nav nav-ruasa">

         <?php $years = sh_get_years_of_mangers(); ?>



         <?php $i=0; foreach ($years as $year) {  ?>

          <li class="nav-hoverr nav-item nav-item-link">

           <a class="nav-link  <?= $i == 0 ? 'active' : ''; ?>" href="#tab-faqy-<?= $year->term_id; ?>" data-toggle="tab" tabindex="0">

            <span>   

              <?= $year->name; ?>

            </span>

            <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>

           </a>

          </li>

         <?php  $i++; } ?>



         </ul>

        </div>



        <div class="component-injazat-left col-md-8">

         <div class="tab-content">



         <?php $i=0; foreach ($years as $year) {  ?>

          <div class="tab-pane <?= $i == 0 ? 'active show' : ''; ?>" id="tab-faqy-<?= $year->term_id; ?>">

           <?php $years_managers = sh_get_managers_of_year($year->term_id); ?>

           <?php if ( $years_managers->have_posts() ) : ?>

           <?php while ( $years_managers->have_posts() ) : $years_managers->the_post(); $manager_id = get_the_ID(); ?>

           <div class="media-ruasa">

              <img src="<?= get_the_post_thumbnail_url($manager_id,'medium'); ?>" class="ml-3" alt="<?php the_title(); ?>">

            

              <div class="media-body">

                <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

                <h6 class="span-media"><?php the_excerpt(); ?></h6>

              </div>

           </div>

           <?php endwhile; ?>

           <?php wp_reset_query(); endif; ?>

          </div>

         <?php  $i++; } ?>



         </div>



        </div>

       </div> 

      </div>

      <div class="tab-pane " id="tab-faq-4">

       <div class="comonent-injazat row">

        <div class="component-injazat-right col-md-4">

         <a class="nav-link title-content-link " href="#"> 

          <span>الفروع</span>

          <i class="fas fa-chevron-up icon-link" aria-hidden="true"></i>



         </a>

         <ul class="nav nav-ruasa">

         <?php $beanches = sh_get_branches_of_mangers(); ?>

         <?php $i=0; foreach ($beanches as $branch) {  ?>

          <li class="nav-hoverr nav-item nav-item-link <?= $i == 0 ? 'active' : ''; ?> ">

           <a class="nav-link  " href="#tab-faqb-<?= $branch->term_id; ?>" data-toggle="tab" tabindex="0">

            <span>   

              <?= $branch->name; ?>

            </span>

            <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>

           </a>

          </li>

         <?php  $i++; } ?>



         </ul>

        </div>



        <div class="component-injazat-left col-md-8">

         <div class="tab-content">



         <?php $i=0; foreach ($beanches as $branch) {  ?>

          <div class="tab-pane <?= $i == 0 ? 'active show' : ''; ?>" id="tab-faqb-<?= $branch->term_id; ?>">

           <a class="nav-link title-content-link " href="#"> 

            <span><?= $branch->name; ?></span>

           </a>

           <div class="row component-alfurue">

            <div class="col">

             <div class="modal-lanah2 row">

             <?php $branches_managers = sh_get_managers_of_branch($branch->term_id); ?>

             <?php if ( $branches_managers->have_posts() ) : ?>

              <?php while ( $branches_managers->have_posts() ) : $branches_managers->the_post(); $branchmanager_id = get_the_ID(); ?>

              <div class="media ">

               <img src="<?= get_the_post_thumbnail_url($branchmanager_id,'medium'); ?>" class="" alt="<?php the_title(); ?>">

               <div class="media-body">

                <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

                <h6 class="span-media">

                  <?php the_excerpt(); ?>

                </h6>

               </div>

              </div>

             <?php endwhile; ?>

             <?php wp_reset_query(); endif; ?>



              

  

             </div>

            </div>

           </div>

          </div>

         <?php  $i++; } ?>

       

         </div>



        </div>

       </div>      



      </div>

      <div class="tab-pane " id="tab-faq-77">

       <div class="component-list-lajnah row text-right">

         <?php $childs = sh_get_child_terms_of_parent_term('department','13'); ?>

         <?php foreach ($childs as $child) { ?>

        <div class="col col-xs-12 col-md-6">

         <h5 class="title-content">

          <?= $child->name; ?>

         </h5>

         <div class="modal-lanah full-width">

        <?php $third_managers = sh_get_managers(-1,$child->term_id); ?>

        <?php if ( $third_managers->have_posts() ) : ?>

         <?php while ( $third_managers->have_posts() ) : $third_managers->the_post(); ?>

          <div class="media ">

           <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium');?>" class="ml-3" alt="<?php the_title(); ?>">



           <div class="media-body">

            <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

            <h6 class="span-media">

             <?php the_excerpt(); ?>

            </h6>



           </div>

          </div>

         <?php endwhile; ?>

         <?php wp_reset_query(); endif; ?>



         </div>

        </div>

         <?php  } ?>





       </div>

      </div>

     </div>

     <!----->

    </div>

   </div>

  </main>

  <!--end-section-main-->

  <?php get_footer(); ?>