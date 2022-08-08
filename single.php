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

		<div class="  component-latest-news2 text-right">

			<div class="component-share scroll-top-link">

				<ul class="list-group">

					<li class="list-group">

						<a href="#" target="_blank"><img src="<?php echo SH_URL; ?>assets/file/Group 410.png"></a> 

					</li>

					<li class="list-group">

						<a href="#" target="_blank"><img src="<?php echo SH_URL; ?>assets/file/Group 411.png"></a>



					</li>

					<li class="list-group">

						<a href="#" target="_blank"><img src="<?php echo SH_URL; ?>assets/file/Group 412.png"></a>

					</li>

					<li class="list-group">

						<a href="#" target="_blank"><img src="<?php echo SH_URL; ?>assets/file/Group 413.png"></a>

					</li>

				</ul>

			</div>

			<div class="content-right ">

				<div class="component-latest-news">

					<h6 class="title-black"><?php the_title(); ?></h6>

					<ul class="article__details-items">

						<li class="article__details-item type--writer">

							<img src="<?php echo SH_URL; ?>assets/file/Shape 13.png">

							<?php the_author(); ?>

						</li>

						<li class="article__details-item type--date">

							<img src="<?php echo SH_URL; ?>assets/file/Shape 14.png">

							<?php the_date(); ?>

						</li>

						<!-- <li class="article__details-item type--comments">

							<img src="<?php //echo SH_URL; ?>assets/file/Shape 15.png">

							<?php // echo get_comments_number();?> تعليقات

						</li> -->

					</ul>

					<div class="card-2 mb-3">

						<?php the_post_thumbnail('large'); ?>

						<div class="card-body-2">
							<?php the_content(); ?>
						</div>

					</div>

<!-- 					<h5 class="title-content">التعليقات ( <?php echo get_comments_number();?> )</h5>
 -->
				<!-- 	<div class="content-coment">

						<p class="p-coment1">لا توجد تعليقات لهذا المقال حاليا</p>

						<p>أضف تعليق</p>

						<p class="p-coment">البريد الإلأكتروني الخاص بك لن يتم نشره </p>



						<div class="contact-form">

							<form>

								<input type="text" class="form-control f-input" placeholder="الاسم بالكامل">

								<input type="text" class="form-control f-input " placeholder="البريد الالكتروني">

								<textarea placeholder="المراجعة أو التعليق" class="form-control f-textarea" rows="8"></textarea>

								<div class="t-button text-left f-textarea">

									<input type="button" class="butoon" value="ارسال">

								</div>

							</form>

						</div>

					</div> -->

				</div>           

			</div>

			<div class="content-left">

		  

			  	<?php  $mostposts = sh_most_viewed(4,get_the_ID()); ?>

			  	<?php if($mostposts->have_posts()) : ?>

				<a href="#" class="title-content-link link-2">الأكثر مشاهدة</a>

				<div class="content-putfole">

					<div class="card-deck">

			  		<?php while($mostposts->have_posts()) : $mostposts->the_post(); ?>

						<div class="card sh_card_new">

				  			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

							<div class="card-body">

							    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?= wp_trim_words( get_the_title(),7,' ...' ); ?></a></h5>

							    <p class="card-text"><?php the_excerpt(); ?></p>

							</div>

						</div>

					<?php endwhile; ?>

					</div>

				</div>

				<?php wp_reset_query(); endif; ?>

			  

			  	<?php  $mayposts = sh_you_may_also_like(2); ?>

			  	<?php if($mayposts->have_posts()) : ?>

			  	<a href="#" class="title-content-link link-2">قد تنال إعجابك</a>

				<div class="card-deck content-putfole">

			  		<?php while($mayposts->have_posts()) : $mayposts->the_post(); ?>

					<div class="card">

					  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

					  <div class="card-body">

					    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?= wp_trim_words( get_the_title(),7,' ...' ); ?></a></h5>

					    <p class="card-text"><?php the_excerpt(); ?></p>

					  </div>

					</div>

					<?php endwhile; ?>

				</div>

				<?php wp_reset_query(); endif; ?>

			</div>

		</div>

	</div>

	</div>

<?php sh_set_post_views(); ?>

</main>

<?php endwhile; endif;?>

    <!--end-section-main-->

<?php get_footer(); ?>