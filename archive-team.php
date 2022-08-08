<?php get_header(); ?>
<?php
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
	'post_type'       => 'sp_team',
	'post_status'     => 'publish',
	'posts_per_page'  => get_option('posts_per_page'),
	'paged'           => $paged,
	'orderby'         => 'date',
	'order'           => 'DESC'
	);
	$posts = new WP_Query( $args );
?>
<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
	<?php the_content(); ?>
<?php endwhile;?>
<br>
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
<?php endif; ?> 

<?php get_footer(); ?>