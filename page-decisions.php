<?php 
/**
** Template Name: Decisions Template
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
          <?php the_title(); ?>         
        </h5>
       </div>
       <div class="type-main-next">
         <div class="container">
          <?php $decisions = sh_get_decisions(-1); ?>
          <?php if ( $decisions->have_posts() ) : ?>
          <div class="accordion component-qararat" id="accordionExample">
          <?php while ( $decisions->have_posts() ) : $decisions->the_post(); $postId=get_the_ID(); ?>

            <div class="carde card-asked">
              <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                      <div  class="btn  card-Frequently" data-toggle="collapse" data-target="#collapse<?= $postId; ?>">
                        <?php the_title(); ?>
                        <i class="fas fa-chevron-down text-left"></i>
                      </div>                 
                  </h2>
              </div>
              <div id="collapse<?= $postId; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php the_content(); ?>
                </div>
                </div>
            </div>
 
           <?php endwhile;?>
           </div>
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
     </main>
    <!--end-section-main-->

<?php get_footer(); ?>