<?php 

/**

** Template Name: Latest News Template

**/

get_header(); 

?>

<?php if( !empty($_GET['id']) ){

  $table_id = htmlspecialchars(intval($_GET['id']));

  $table = get_post($_GET['id']);

} ?>

  <!--stert-section-main-->
      <header>

       
       
        <section class="component-section">
          <div class="compoonent-slid">
            
              <ul class="list-group list-group-horizontal last-naws-group">
                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>
                <li class="list-group"><a >اخر الاخبار</a></li>
               
              </ul>
            
          </div>
        </section>
      </header>
     <main class=" type-main-next">

       <div class="container">

         <div class="component-content text-right">

            <div class="content-right ">

                 <div class="component-latest-news">

                      <h5 class="title-content">

                        اخر الاخبار  <?php if(isset($table)){echo " (".$table->post_title.") ";}?>

                      </h5>

                    <?php

                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    if(isset($table)){

                      $args = array(

                          'post_type'       => 'post',

                          'post_status'     => 'publish',

                          'posts_per_page'  => get_option('posts_per_page'),

                          'paged'           => $paged,

                          'orderby'         => 'date',

                          'order'           => 'DESC',

                          'meta_query' => array(

                              array(

                                  'key'     => 'sh_comps',

                                  'value'   => $table_id,

                                  'compare' => 'LIKE',

                              )

                          )

                      ); 

                    }else{

                      $args = array(

                          'post_type'       => 'post',

                          'post_status'     => 'publish',

                          'posts_per_page'  => get_option('posts_per_page'),

                          'paged'           => $paged,

                          'orderby'         => 'date',

                          'order'           => 'DESC'

                      );                      

                    }

                    $posts = new WP_Query( $args );

                    ?>

                    <?php if ( $posts->have_posts() ) : ?>

                     <ul class="list-unstyled list-news">

                      <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

                      <li class="media">

                        <a href="<?php the_permalink(); ?>">

                          <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" class="img2" alt="<?php the_title(); ?>">

                        </a>

                        <div class="media-body">

                          <h5 class="mt-0 mb-1"><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?></a></h5>

                          <ul class="article__details-items">

                            <li class="article__details-item type--writer">

                              <img src="<?php echo SH_URL; ?>assets/file/Shape 13.png">

                              <?php the_author(); ?></li>

                            <li class="article__details-item type--date">

                              <img src="<?php echo SH_URL; ?>assets/file/Shape 14.png">

                              <?php the_date(); ?></li>

                            <!-- <li class="article__details-item type--comments">

                              <img src="<?php echo SH_URL; ?>assets/file/Shape 15.png">

                              <?php echo get_comments_number();?>تعليقات</li> -->

                          </ul>

                          <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>

                        </div>

                      </li>

                      <?php endwhile;?>

                    </ul>

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

            

              <div class="content-left">

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

                          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

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

                      <img class="col-md-4"src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>">

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

                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

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

         </div>

       </div>

     </main>

    <!--end-section-main-->

<?php get_footer(); ?>