<?php get_header(); ?>
<header>
	<section class="component-section">
	  <div class="compoonent-slid">
	      <ul class="list-group list-group-horizontal last-naws-group">
	        <li class="list-group"><a href="<?= bloginfo(url); ?>">الرئيسية</a></li>
	        <li class="list-group">نتائج البحث عن :  <?php echo $_GET['s']; ?></li>
	      </ul>
	  </div>
	</section>
</header>
<!--stert-section-main-->
<main class=" type-main-next type--list">
	<div class="container2" style="text-align: right;">
      <div class="s-head col-xs-12">
                <h3>نتائج البحث عن :  <?php echo $_GET['s']; ?></h3>
                </div>
                <br>
                <br>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a><br>
                <?php endwhile; wp_reset_query(); endif;?>	
        </div>
	</div>
</main>
<!--end-section-main-->
<?php get_footer(); ?>