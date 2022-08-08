<?php 
/**
** Template Name: Forms Library Template
**/
get_header(); ?>
<header>
  <section class="component-section">
    <div class="compoonent-slid">
      
        <ul class="list-group list-group-horizontal last-naws-group">
          <li class="list-group"><a href="<?= bloginfo('url'); ?>">الرئيسية</a></li>
          <li class="list-group"><a href="#"> المكتبة</a></li>
          <li class="list-group"><?php the_title(); ?></li>

        </ul>
      
    </div>
  </section>
</header>
<!--end-header-->
<!--stert-section-main-->
 <main class=" type-main-next type--list">
  
   <div class="container component-nmazk-almaktaba">
    <?php $forms = sh_get_forms(-1); ?>
    <?php if ( $forms->have_posts() ) : ?>
    <?php while ( $forms->have_posts() ) : $forms->the_post(); $formId=get_the_ID(); ?>
     <div class="row ">
         <div class="component-nemzak col-8 col-md-10">
          <div  data-toggle="modal" data-target="#exampleModal-nmazk<?= $formId; ?>" class="title-content-link link-2">
            <?php the_title(); ?>  
            <span>الاطلاع<i class="fas fa-chevron-left icon-link" aria-hidden="true"></i></span>
          </div>
         </div>
         <div class="component-from col-md-2  col-4 ">
          <form>
            <a href="<?= get_post_meta($formId,'sh_form_link',true); ?>">
              <label  class="label-content" for="upload-photo">  تحميل <img src="<?= SH_URL; ?>assets/img/download.png"></label>
            </a>
          </form>
         </div>
         <!--stert-model-nmazk-->
        <div class="modal fade" id="exampleModal-nmazk<?= $formId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             
              <div class="modal-body text-right">
                  <?php the_content(); ?>
              </div>
             
            </div>
          </div>
        </div>
        <!--end-madel-nmazk-->
     </div>
    <?php endwhile;?>
    <div class="component-pagination">
      <div class="pagination">
        <?php    $args = array(
         'format'             => '?paged=%#%',
         'current'            => max( 1, get_query_var('paged') ),
         'total'              => $forms->max_num_pages,
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
 </main>
<!--end-section-main-->
<?php get_footer(); ?>