<?php get_header(); ?>
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
	<div class="container2">
		<?php the_content(); ?>
	</div>
	</div>
</main>
<?php endwhile; endif;?>
    <!--end-section-main-->
<?php get_footer(); ?>