<?php 
/**
** Template Name: statisticians Template
**/
get_header(); 
?>
       
<section class="component-section">
  <div class="compoonent-slid">
    
      <ul class="list-group list-group-horizontal last-naws-group">
        <li class="list-group"><a href="<?= bloginfo('url'); ?>">الرئيسية</a></li>
        <li class="list-group">الاحصائيين</li>
       
      </ul>
    
  </div>
</section>
</header>
<!--end-header-->
<!--stert-section-main-->
 <main class="component-tarikh-alaitihad">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <div class="component-title-list">
    <h5 class="title-content text-right title-almudaribn">
      <div>
        <?php the_title(); ?>          
      </div>
      
          
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav nav nav-tabs ">
            <li class=" nav-hoverr nav-item nav-item-link active">
              
              <a class="nav-link " href="#tab-faq-u" data-toggle="tab" tabindex="0">الاحصائيين
              </a>
              

            </li>
            <li  class=" nav-hoverr nav-item nav-item-link ">
              <a class="nav-link "  href="#tab-faq-l"data-toggle="tab" tabindex="0" >الشروط
              </a>
             
              </li>
             
              </ul>
        </nav>
        <div class="component-from ">
          <button class="label-content" for="">
            <span>
              تحميل الإستمارات
            </span>
              <img src="<?php echo SH_URL; ?>assets/img/download.png"></button>       
       </div>
        
    </h5>
   </div>
   <div class="type-main-next">
     <div class="container">
       <div class="tab-content">
         <div class="tab-pane show active"id="tab-faq-u">
          <div class="component-list-lajnah COMPONENT-ALMUDARIBIN text-right">
            <?php  $statisticans = sh_get_statisticians(-1); ?>
            <?php if($statisticans->have_posts()) : ?>
            <?php while($statisticans->have_posts()) : $statisticans->the_post(); $statistican_id = get_the_ID(); ?>
            <div class="modal-lanah ">
              <div class="media ">
                <img src="<?= get_the_post_thumbnail_url($statistican_id,'judges'); ?>" alt="<?php the_title(); ?>">
                <div class="media-body">
                  <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                  <table class="product__data">
                    <thead>
                      <tr>
                        <th>كود الإحصائى</th>
                        <th>الدرجه</th>
                        <th>الفرع</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="td-1"><?= get_post_meta($statistican_id,'sh_code',true); ?></td>
                        <td class="td-1"><?= get_post_meta($statistican_id,'sh_degree',true); ?></td>
                        <td class="td-2"><?= get_post_meta($statistican_id,'sh_branch',true); ?></td>
                      </tr>
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); endif; ?>
           </div>
         </div>
         <div class="tab-pane " id="tab-faq-l">
          <div class="component-list-tarikh component-alshurut text-right">
      		<?php the_content(); ?>
        </div>
        </div>
       </div>
   
     </div>
   </div>
	<?php endwhile; endif;?>
 </main>
<!--end-section-main-->
<?php get_footer(); ?>