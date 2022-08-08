<?php 
/**
** Template Name: Yesterday Events Template
**/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<header>
	<section class="component-section">
	  <div class="compoonent-slid">
	      <ul class="list-group list-group-horizontal last-naws-group">
	        <li class="list-group"><a href="<?= bloginfo(url); ?>">الرئيسية</a></li>
	        <li class="list-group"><?php the_title(); ?></li>
	      </ul>
	  </div>
	</section>
</header>
<!--stert-section-main-->
<main class=" type-main-next type--list">
	<div class="container cont-h">

                <div class="all-almubara">

                  <!-- <div class="dropdown">

                    <a class=" dropdown-toggle dropdown-link-a" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                      رجال و مرتبط     

                    

                    </a>

                  

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                      <a class="dropdown-item" href="#">الموسم 2018/2019</a>

                      <a class="dropdown-item" href="#">بطوله الدورى</a>

                      <a class="dropdown-item" href="#">كل  المباريات</a>

                    </div>

                  </div> -->

                

                </div>

              

                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> 


                  <?php $yesterday = date("d/m/Y", strtotime("-1 day")); ?>
                  <?php $today_matches = sh_get_matches(-1,$yesterday); $matches_today_num = $today_matches->found_posts;



                  /*$today_matches = sh_get_matches(-1,date('j/n/Y')); $matches_today_num = $today_matches->found_posts;*/



                  ?>



                  <?php if ( $today_matches->have_posts() ) : ?>



                    



                  <div class="carousel-inner">



                  <?php $k=1; while ( $today_matches->have_posts() ) : $today_matches->the_post(); $postId=get_the_ID(); ?>


                 



                  <?php $leauge = get_the_terms($postId,'sp_league')[0]; ?>



                  <?php $teams = get_post_meta($postId,'sp_team',false); ?>


                  <?php $results = get_post_meta($postId, 'sp_results', true); ?>

                  <?php $first_team = get_post($teams[0]); 
                  		$first_team_result = $results[$first_team->ID];
                  		$first_team_result = $first_team_result['points'];
                  ?>



                  <?php $second_team = get_post($teams[1]); 
                  		$second_team_result = $results[$second_team->ID];
                  		$second_team_result = $second_team_result['points'];
                  ?>



                 



                  <?php if( ($k == 1) || ($k%3 == 1) ) { ?>



                    <div class="carousel-item <?=  $k ==1 ? ' active' : ''; ?>">



                      <div class="corausel-itam" >



                  <?php } ?>



                        <div class="slid-1">



                          <div>



                            <img src="<?= get_the_post_thumbnail_url($first_team->ID,'large');?>" class="home_flag">



                            <span class="span-slider">



                              <?php echo $first_team->post_title; ?>



                            </span>



                          </div>



                             <div class="span-slider-2">



                               <span>الامس</span>



                               <span>  



                                <?php echo date('g:i a ',strtotime(get_post_meta($postId,'sh_match_time',true))); ?>


                                <br>
                                <?php echo $first_team_result . " - " . $second_team_result; ?>
                              </span>



                               <a href="<?php the_permalink(); ?>"><span class="span3">



                                 <?= $leauge->name; ?>



                               </span></a>



                               



                             </div>



                             <div >



                              <img src="<?= get_the_post_thumbnail_url($second_team->ID,'large');?>" class="home_flag">



                              <span class="span-slider">



                                <?php echo $second_team->post_title; ?>



                              </span>



                             </div>



                        </div>



                  <?php if( ($k%3 == 0) || ($k == $matches_today_num ) ) {  ?>



                      </div>



                    </div>



                  <?php } ?>







                  <?php $k++; endwhile;?>



                  </div>







                  <?php wp_reset_query(); ?>



                  <?php endif; ?>



                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">



                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>



                    <span class="sr-only">Previous</span>



                  </a>



                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">



                    <span class="carousel-control-next-icon" aria-hidden="true"></span>



                    <span class="sr-only">Next</span>



                  </a>



                </div> 
	</div>
	</div>
</main>
<?php endwhile; endif;?>
    <!--end-section-main-->
<?php get_footer(); ?>