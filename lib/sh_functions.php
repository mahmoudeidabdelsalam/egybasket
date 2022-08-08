<?php 

function sh_register_custom_menu_pages() {
//   add_menu_page(

//         'Excused Refrees',

//         'Excused Refrees',

//         'manage_options',

//         'excused_refrees',

//         'excused_refrees_callback',

//         SH_URL.'/assets/img/favicon.png',

//         3

//     );  
    add_menu_page(

        'Egy Basket Options',

        'Egy Basket Options',

        'manage_options',

        'content-area',

        'main_content_area_callback',

        SH_URL.'/assets/img/favicon.png',

        2

    );   

    add_submenu_page(

        'content-area',

        'Home Page',

        'Home Page',

        'manage_options',

        'home-page-content',

        'home_page_content_callback'

    );    

    add_menu_page(

        __('Our Library', 'egybasket' ),

        'Our Library',

        'manage_options',

        'our-library',

        'our_library_callback',

        'dashicons-album'

    );  

  add_menu_page(

      'Add Referee Matches',

      'Add Referee Matches',

      'manage_options',

      'add-referee-match-page',

      'add_referee_match_page_callback',

      SH_URL.'/assets/img/favicon.png',

      2

  );   

  add_menu_page(

      'إدارة البدلات',

      'البدلات',

      'manage_options',

      'housing-commuting',

      'manage_commuting_housing_pricing',

      SH_URL.'/assets/img/favicon.png',

      2

  );   

  add_submenu_page(

      'add-referee-match-page',

      'List Referee Matches',

      'List Referee Matches',

      'manage_options',

      'list-referee-match-page',

      'list_referee_page_content_callback'

  );   
}

function our_library_callback(){



}

add_action( 'admin_menu', 'sh_register_custom_menu_pages' );

require_once ( SH_ROOT . 'custom fields/egy_options.php');
require_once ( SH_ROOT . 'custom fields/home_page_options.php');

require_once ( SH_ROOT . 'referees content/index.php');
require_once ( SH_ROOT . 'referees content/matches.php');





register_nav_menus(

    array(

    'main-menu-right'               => __( 'Main Menu Right' ),

    'main-menu-left'               => __( 'Main Menu Left' ),

    'mobile-menu'               => __( 'Mobile Menu' ),

    'footer-menu'       => __( 'Footer Menu' ),

    )

);



add_role(

    'Guest',

    __( 'Guest', 'egybasket' ),

    array(

        'read'         => true,  // true allows this capability

    )

);


add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo() { ?>

    <style type="text/css">

        #login h1 a, .login h1 a {

            background-image: url(<?php echo get_option('sh_logo_img'); ?>);

            width: 100%;

            height: 100px;

            background-size: contain;

            margin: 0 auto;

        }

        .login form{

            background: #164688!important;

        }

        .login label{

            font-weight: 600!important;

            color: #fff!important;

        }

        .wp-core-ui p .button {

            background: #d52938;

            border-color: #b2293a;

        }

        #reg_passmail{color:#fff;}

    </style>

<?php }



function remove_wp_logo($wp_admin_bar) {

  $wp_admin_bar->remove_node('wp-logo');

}

add_action('admin_bar_menu', 'remove_wp_logo', 999);



function change_footer_admin() {

  echo '<span id="footer-thankyou"><a href="http://www.shwkyfareed.com/" target="_blank">shwky fareed</a></span>';

}

add_filter('admin_footer_text', 'change_footer_admin');



function sh_add_menuclass($items,$args) {

    if ( ($args->menu->slug == 'main-menu-right') || ($args->menu->slug == 'main-menu-left') || ($args->menu->slug == 'mobile-menu') ) {

        $items = preg_replace('/<a/', '<a class="nav-link"', $items);

    }



    return $items;

}

add_filter('wp_nav_menu_items','sh_add_menuclass',10,2);





function sh_get_img($img_src,$attachment_id,$classes){

    $attrs = 'title="'.get_the_title($attachment_id).'" alt="'.get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ).'"';

    return '<img src="'.$img_src.'" '.$attrs.' class="'.$classes.'">';

}



function sh_you_may_also_like($no){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'rand',

    );

    return $posts = new WP_Query( $args );    

}





function sh_most_viewed($no,$current_post_id){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'meta_value_num',

        'meta_key'        => 'sh_post_views',

        'order'           => 'ASC',

        'post__not_in'    => [$current_post_id],

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_judges($no){

    $args = array(

        'post_type'       => 'judge',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_coaches($no){

    $args = array(

        'post_type'       => 'coach',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_statisticians($no){

    $args = array(

        'post_type'       => 'statistician',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_rules($no){

    $args = array(

        'post_type'       => 'rule',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_teams(){

    $args = array(

        'post_type'       => 'sp_team',

        'post_status'     => 'publish',

        'posts_per_page'  =>  -1,

        'orderby'         => 'name',

        'order'           => 'ASC'

    );

    return $posts = get_posts( $args );    

}



function sh_set_post_views() {

    $key = 'sh_post_views';

    $post_id = get_the_ID();

    $count = (int) get_post_meta( $post_id, $key, true );

    $count++;

    update_post_meta( $post_id, $key, $count );

}



function sh_get_post_views() {

    $count = get_post_meta( get_the_ID(), 'sh_post_views', true );

    return $count;

}



function sh_add_excerpt_support_for_tablesCPT() {

    add_post_type_support( 'sp_table', 'excerpt' );

}

add_action( 'init', 'sh_add_excerpt_support_for_tablesCPT' );



// stop wordpress removing div and span tags

function sh_tiny_mce_fix( $init )

{

    $init['extended_valid_elements'] = 'div[*],span[*],h5,h4,h3,h2,h1,h6,p';

    $init["forced_root_block"] = false;

    $init["force_br_newlines"] = true;

    $init["force_p_newlines"] = false;

    $init["convert_newlines_to_brs"] = true;

    return $init;

}

add_filter( 'tiny_mce_before_init', 'sh_tiny_mce_fix' );



function sh_comps_tables(){

        $args = array(

        'post_type'       => 'sp_table',

        'post_status'     => 'publish',

        'posts_per_page'  =>  -1,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = get_posts( $args );  

}





function sh_get_news_related_to_comp($comp_id,$no){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  => $no,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'meta_query' => array(

            array(

                'key'     => 'sh_comps',

                'value'   => $comp_id,

                'compare' => 'LIKE',

            )

        )        

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_players_related_to_team($team_id){

    $args = array(

        'post_type'       => 'sp_player',

        'post_status'     => 'publish',

        'posts_per_page'  => -1,

        'orderby'         => 'title',

        'order'           => 'ASC',

        'meta_query' => array(

            array(

                'key'     => 'sp_current_team',

                'value'   => $team_id,

                'compare' => 'LIKE',

            )

        )

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_staff_related_to_team($team_id){

    $args = array(

        'post_type'       => 'sp_staff',

        'post_status'     => 'publish',

        'posts_per_page'  => -1,

        'orderby'         => 'title',

        'order'           => 'ASC',

        'meta_query' => array(

            array(

                'key'     => 'sp_current_team',

                'value'   => $team_id,

                'compare' => 'LIKE',

            )

        )

    );

    return $posts = new WP_Query( $args );   

}



function sh_get_videos_related_to_team($team_id,$tax_term,$no){

    $args = array(

      'post_type'       => 'egyvideo',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'DESC',

      'meta_query' => array(

        array(

          'key'     => 'sh_teams',

          'value'   => $team_id,

          'compare' => 'LIKE',

        )

      ),

      'tax_query' => array(

        array(

            'taxonomy' => 'video_cat',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       ),

    ); 



    return $posts = new WP_Query( $args );    

}

function sh_get_home_videos($tax_term,$no){

    
     $args = array(

      'post_type'       => 'egyvideo',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'DESC',

      'meta_key'        => 'sh_video_in_homepage',
      'meta_value'      => '1'

    ); 

    return $posts = new WP_Query( $args );    

}


function sh_get_videos($tax_term,$no){

    $args = array(

      'post_type'       => 'egyvideo',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'DESC',

    ); 

    if(!empty($tax_term)){

        $taxonomy_query = array(

        array(

            'taxonomy' => 'video_cat',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

        );

        $args['tax_query'] = $taxonomy_query;

    }
    
 

    return $posts = new WP_Query( $args );    

}



function sh_get_forms($no){

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'egyform',

        'post_status'     => 'publish',

        'posts_per_page'  => get_option('posts_per_page'),

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );                      

  return $posts = new WP_Query( $args );

}



function sh_get_albums($no){

    $args = array(

        'post_type'       => 'egyalbum',

        'post_status'     => 'publish',

        'posts_per_page'  => $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );                      

  return $posts = new WP_Query( $args );

}



function sh_get_managers($no,$tax_term){

    $args = array(

      'post_type'       => 'manager',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'ASC',

      'meta_query' => array(

        array(

          'key'     => 'sh_second_sec',

          'value'   => '1',

          'compare' => 'NOT EXISTS',

        )

      ),
    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'department',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $managers = new WP_Query( $args );    

}

function sh_get_managers_except($no,$tax_term){

    $args = array(

      'post_type'       => 'manager',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'ASC',

      'meta_query' => array(

        array(

          'key'     => 'sh_second_sec',

          'value'   => '1',

          'compare' => '=',

        )

      ),

    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'department',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $managers = new WP_Query( $args );    

}



function sh_get_child_terms_of_parent_term($taxonomy,$term_id){

    $childs = get_terms( $taxonomy, 

                array( 

                    'parent' => $term_id, 

                    'orderby' => 'name', 

                    'order' => 'ASC', 

                    'hide_empty' => false 

                ) 

            );   

    return $childs;



}



function sh_get_years_of_mangers(){

    $years = get_terms( 'manager_year', 

        array( 

            'orderby' => 'date', 

            'order' => 'DESC', 

            'hide_empty' => false 

        ) 

    );   

    return $years;



}



function sh_get_branches_of_mangers(){

    $years = get_terms( 'manager_branch', 

        array( 

            'orderby' => 'name', 

            'order' => 'ASC', 

            'hide_empty' => false 

        ) 

    );   

    return $years;



}



function sh_get_categories_of_achivements(){

    $cats = get_terms( 'achivement_category', 

        array( 

            'orderby' => 'name', 

            'order' => 'ASC', 

            'hide_empty' => false 

        ) 

    );   

    return $cats;



}



function sh_get_letters(){

    $cats = get_terms( 'alphabetical_letters', 

        array( 

            'orderby' => 'name', 

            'order' => 'ASC', 

            'hide_empty' => false 

        ) 

    );   

    return $cats;



}



function sh_get_managers_of_year($tax_term){

    $args = array(

      'post_type'       => 'manager',

      'post_status'     => 'publish',

      'posts_per_page'  => -1,

      'orderby'         => 'date',

      'order'           => 'ASC',

    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'manager_year',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $managers = new WP_Query( $args );    

}



function sh_get_managers_of_branch($tax_term){

    $args = array(

      'post_type'       => 'manager',

      'post_status'     => 'publish',

      'posts_per_page'  => -1,

      'orderby'         => 'date',

      'order'           => 'ASC',

    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'manager_branch',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $managers = new WP_Query( $args );    

}





function sh_get_decisions($no){

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'decision',

        'post_status'     => 'publish',

        'posts_per_page'  => get_option('posts_per_page'),

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );                      

  return $posts = new WP_Query( $args );

}



function sh_get_history($no){

    $args = array(

        'post_type'       => 'history',

        'post_status'     => 'publish',

        'posts_per_page'  => -1,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'ASC'

    );                      

  return $posts = new WP_Query( $args );

}





function sh_get_achivements_of_cat($tax_term){

    $args = array(

      'post_type'       => 'achievement',

      'post_status'     => 'publish',

      'posts_per_page'  => -1,

      'orderby'         => 'date',

      'order'           => 'DESC',

    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'achivement_category',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $achvs = new WP_Query( $args );    

}



function sh_get_teams_of_letter($tax_term){

    $args = array(

      'post_type'       => 'sp_team',

      'post_status'     => 'publish',

      'posts_per_page'  => -1,

      'orderby'         => 'title',

      'order'           => 'ASC',

    ); 

    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'alphabetical_letters',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

    return $teams = new WP_Query( $args );    

}



function sh_get_matches($no,$date){

    $args = array(

      'post_type'       => 'sp_event',

      'post_status'     => 'publish',

      'posts_per_page'  => $no,

      'orderby'         => 'date',

      'order'           => 'ASC',

      'meta_query' => array(

        array(

            'key'     => 'sp_day',

            'value'   => $date,

            'compare' => '=',

        )

        )

    ); 

/*    if(!empty($tax_term)){

       $taxonomy_query = array(

        array(

            'taxonomy' => 'alphabetical_letters',

            'field'    => 'term_id',

            'terms'    => $tax_term,

        ),

       );

       $args['tax_query'] = $taxonomy_query;

    }

*/    return $matches = new WP_Query( $args );    

}





function sh_get_homepage_main_news(){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  => 5,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'category__in'    => 32

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_latest_news(){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  => 4,

        'orderby'         => 'date',

        'order'           => 'DESC',

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_table_data($table_id){



$defaults = array(

    'id' => $table_id,

    'number' => 8,

    'columns' => null,

    'highlight' => null,

    'show_full_table_link' => false,

    'title' => false,

    'show_title' => false,

    'show_team_logo' => false,

    'link_posts' => null,

    'responsive' => get_option( 'sportspress_enable_responsive_tables', 'no' ) == 'yes' ? true : false,

    'sortable' => get_option( 'sportspress_enable_sortable_tables', 'yes' ) == 'yes' ? true : false,

    'scrollable' => get_option( 'sportspress_enable_scrollable_tables', 'yes' ) == 'yes' ? true : false,

    'paginated' => get_option( 'sportspress_table_paginated', 'yes' ) == 'yes' ? true : false,

    'rows' => get_option( 'sportspress_table_rows', 10 ),

);



extract( $defaults, EXTR_SKIP );



if ( ! isset( $link_posts ) ) {

    if ( 'player' === sp_get_post_mode( $id ) ) {

        $link_posts = get_option( 'sportspress_link_players', 'yes' ) == 'yes' ? true : false;

    } else {

        $link_posts = get_option( 'sportspress_link_teams', 'no' ) == 'yes' ? true : false;

    }

}



if ( ! isset( $highlight ) ) $highlight = get_post_meta( $id, 'sp_highlight', true );



$table = new SP_League_Table( $id );



if ( $show_title && false === $title && $id ):

    $caption = $table->caption;

    if ( $caption )

        $title = $caption;

    else

        $title = get_the_title( $id );

endif;



//Check if we have event status sent from shortcode

if ( isset( $show_published_events ) )

    $table->show_published_events = $show_published_events ;



if ( isset( $show_future_events ) )

    $table->show_future_events = $show_future_events ;



//Create a unique identifier based on the current time in microseconds

$identifier = uniqid( 'table_' );



$output = '';



if ( $title )

    $output .= '<h4 class="sp-table-caption">' . $title . '</h4>';



$output .= '<div class="sp-table-wrapper">';



$output .= '<table class="sp-league-table sp-data-table' . ( $sortable ? ' sp-sortable-table' : '' ) . ( $responsive ? ' sp-responsive-table '.$identifier : '' ). ( $scrollable ? ' sp-scrollable-table' : '' ) . ( $paginated ? ' sp-paginated-table' : '' ) . '" data-sp-rows="' . $rows . '">' . '<thead>' . '<tr>';



$data = $table->data();



// The first row should be column labels

$labels = $data[0];

// If responsive tables are enabled then load the inline css code

if ( true == $responsive ){

    //sportspress_responsive_tables_css( $identifier );

}

// Remove the first row to leave us with the actual data

unset( $data[0] );



if ( $columns === null )

    $columns = get_post_meta( $id, 'sp_columns', true );



if ( null !== $columns && ! is_array( $columns ) )

    $columns = explode( ',', $columns );



$output .= '<th class="data-rank">' . __( 'Pos', 'sportspress' ) . '</th>';



foreach( $labels as $key => $label ):

    if ( ! is_array( $columns ) || $key == 'name' || in_array( $key, $columns ) )

        $output .= '<th class="data-' . $key . '">' . $label . '</th>';

endforeach;



$output .= '</tr>' . '</thead>' . '<tbody>';



$i = 0;

$start = 0;



if ( intval( $number ) > 0 ):

    $limit = $number;



    // Trim table to center around highlighted team

    if ( $highlight && sizeof( $data ) > $limit && array_key_exists( $highlight, $data ) ):

        

        // Number of teams in the table

        $size = sizeof( $data );



        // Position of highlighted team in the table

        $key = array_search( $highlight, array_keys( $data ) );



        // Get starting position

        $start = $key - ceil( $limit / 2 ) + 1;

        if ( $start < 0 ) $start = 0;



        // Trim table using starting position

        $trimmed = array_slice( $data, $start, $limit, true );



        // Move starting position if we are too far down the table

        if ( sizeof( $trimmed ) < $limit && sizeof( $trimmed ) < $size ):

            $offset = $limit - sizeof( $trimmed );

            $start -= $offset;

            if ( $start < 0 ) $start = 0;

            $trimmed = array_slice( $data, $start, $limit, true );

        endif;



        // Replace data

        $data = $trimmed;

    endif;

endif;



// Loop through the teams

foreach ( $data as $team_id => $row ):



    if ( isset( $limit ) && $i >= $limit ) continue;



    $name = sp_array_value( $row, 'name', null );

    if ( ! $name ) continue;



    // Generate tags for highlighted team

    $tr_class = $td_class = '';

    if ( $highlight == $team_id ):

        $tr_class = ' highlighted';

        $td_class = ' sp-highlight';

    endif;



    $output .= '<tr class="' . ( $i % 2 == 0 ? 'odd' : 'even' ) . $tr_class . ' sp-row-no-' . $i . '">';



    // Rank

    $output .= '<td class="data-rank' . $td_class . '" data-label="'.$labels['pos'].'">' . sp_array_value( $row, 'pos' ) . '</td>';



    $name_class = '';



    if ( $show_team_logo ):

        if ( has_post_thumbnail( $team_id ) ):

            $logo = get_the_post_thumbnail( $team_id, 'sportspress-fit-icon' );

            $name = '<span class="team-logo">' . $logo . '</span>' . $name;

            $name_class .= ' has-logo';

        endif;

    endif;



    if ( $link_posts ):

        $permalink = get_post_permalink( $team_id );

        $name = '<a href="' . $permalink . '">' . $name . '</a>';

    endif;



    $output .= '<td class="data-name' . $name_class . $td_class . '" data-label="'.$labels['name'].'">' . $name . '</td>';



    foreach( $labels as $key => $value ):

        if ( in_array( $key, array( 'pos', 'name' ) ) )

            continue;

        if ( ! is_array( $columns ) || in_array( $key, $columns ) )

            $output .= '<td class="data-' . $key . $td_class . '" data-label="'.$labels[$key].'">' . sp_array_value( $row, $key, '&mdash;' ) . '</td>';

    endforeach;



    $output .= '</tr>';



    $i++;

    $start++;



endforeach;



$output .= '</tbody>' . '</table>';



$output .= '</div>';



if ( $show_full_table_link )

    $output .= '<div class="sp-league-table-link sp-view-all-link"><a href="' . get_permalink( $id ) . '">' . __( 'View full table', 'sportspress' ) . '</a></div>';

    return $output;

}

function get_all_judges(){

  $args = array(
    'role'            => 'judge',
    'orderby'         => 'name',
    'order'           => 'ASC'
  );                      

  return $users = get_users( $args );

}

function get_all_activated_judges(){

  $args = array(
    'role'            => 'judge',
    'orderby'         => 'name',
    'order'           => 'ASC',
    'meta_query'      => array(
      array(
        'key' => 'sh_is_activated',
        'value' => 'yes',
        'compare' => "==",
      ),
    )
  );                      

  return $users = get_users( $args );

}


function sh_get_upcoming_matches(){

    $args = array(
      'post_type'       => 'sp_event',
      'post_status'     => 'publish',
      'posts_per_page'  => -1,
      'orderby'         => 'date',
      'order'           => 'DESC',
      'meta_query' => array(
        array(
          'key'     => 'sp_day',
          'value'   => date('d/m/Y'),
          'compare' => '>=',
        )
      )
    ); 

  return $matches = new WP_Query( $args );    

}
function sendPushNotification($to , $title , $body , $additional_keys){
    $apikey = "AAAAHHHi5oY:APA91bFxaR4zzYqo784zlnyw5DLJ0a0udighH32avVErm1_D6vKqEtM3HOZiSRu001gelV21WiCC0XQERAuP4EO73fdBFgwnxQZ82h9qA6cBXaAI-4rVzj7IIJgJpl0i3aq-fanqOAcH";
    $fields = array(
        'to' => $to ,
        'notification' => [
            'title' => $title ,
            'body' => $body
        ],
        'data' => $additional_keys
    );
    $headers = array('Authorization: key=' . $apikey , 'Content-Type: application/json');
    $url = 'https://fcm.googleapis.com/fcm/send';
    $ch = curl_init();
    curl_setopt($ch , CURLOPT_URL , $url);
    curl_setopt($ch , CURLOPT_POST , true);
    curl_setopt($ch , CURLOPT_HTTPHEADER , $headers);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , false);
    curl_setopt($ch , CURLOPT_POSTFIELDS , json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    // return(json_decode($result , true));
}

function sh_add_referee_to_match(){

  global $wpdb;
  
  $table_name = $wpdb->prefix . "referee_match";  
  $ref_id = $_POST['referee_id']; 
  $match_id = $_POST['match_id']; 
    // add push notification for refree
  $match_time = get_post_meta( $match_id, 'sh_match_time',false);
  $match = get_the_title( $match_id);
  $str = str_replace("&#8211;", ' ', $match);
  $date = get_post_meta( $match_id, 'sp_day',false);
  $body = 'نود اخباركم انه تم اختياركم لادارة مباراة ' . $match . ' الموافق يوم ' . $date[0] . ' في تمام الساعه ' . $match_time[0];
  $to = get_user_meta($ref_id , 'fcm_token', true );
  if(empty($match)){
      $return = "مباراه غير محدده";
  }
  if(empty($match_time)){
      $return = "موعد المباراه غير محدد";
  }
  if(empty($date)){
      $return = "تاريخ المباراه غير محدد";
  }
  if(empty($to)){
      $return = "بيانات الحكم بها عطل";
  }

  $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$table_name} WHERE ref_id = %d AND match_id = %d ",$ref_id,$match_id));

  if(count($data) > 0){

    $status = $data[0]->status;
    $status_return = array(
      '0' => 'Pending',
      '1' => 'Accepted',
      '2' => 'Declined'
    );
    
    sendPushNotification($to ,$match ,$body ,['notification_type' => 'refree_update' , 'notification_id' => $data[0]->id]);

    if($status == 2){
		$sql = "UPDATE `wp_referee_match` SET status = 0 WHERE id = {$data[0]->id}";
		$wpdb->query($sql);
		$return = "A request has been already sent to this referee regarding this match and it's status was {$status_return[$status]} we will send him a new request";

    }else{
        $return = "A request has been already sent to this referee regarding this match and it's status is {$status_return[$status]}";

    }
  
  
  }else{
  
    $response = $wpdb->insert($table_name,array(
    'ref_id'      => $ref_id ,
    'match_id'    => $match_id  ,
    'date'        => date('Y/m/d'),
    'type'        => '1',
    'msg'         =>  $body
    ));    
    if($response == 1){
        sendPushNotification($to ,$match ,$body ,['notification_type' => 'refree_update' , 'notification_id' => $data[0]->id]);

      $return = 'Match has been added successfully to the referee , please wait until you get a response';
    }
  
  }
  $match_id = $_POST['match_id'];
  $ref_id = $_POST['referee_id'];
  if($_POST['main_referee'] === 'main_referee'){
      update_post_meta($match_id, 'main_referee', $ref_id);
  }
  update_post_meta($match_id, "ref_{$ref_id}_type", $_POST['referee_type']);

  return $return;

}

function sh_get_matches_referees_table_data($where){
  global $wpdb;
  $sql = "SELECT * from `wp_referee_match` {$where} ORDER BY 'id' DESC";
  $data = $wpdb->get_results( 
    $wpdb->prepare($sql,'') 
  );

  return $data;
}

function sh_send_mail ($recipients, $subject = '', $message = '',$sender_name='System Egypt Basketball (no reply)',$sender_email='',$attachments=array()){
    if($sender_email=='')
        $sender_email=get_option('admin_email');
    $message = stripslashes($message);
    $subject = stripslashes($subject); 

    $email_name_from  = $sender_name;
    $email_addr_from  = $sender_email;
        
    $headers = 'From: '. $email_name_from .' <'. $email_addr_from .'>' . PHP_EOL;
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: " . get_bloginfo('html_type') . "; charset=\"". get_bloginfo('charset') . "\"\n";
    $mailtext = "<html><head><title>" . $subject . "</title></head><body>" . nl2br($message) . "</body></html>";
    return wp_mail($recipients, $subject, $mailtext, $headers,$attachments);
}


function sh_contact_us($email, $name, $user_message, $phone) {

  $contact_mail = get_option('sh_email');
  $subject = "New Contact Form Message from '{$email}'";
  $message = "<h1>You Got New Message From {$name}</h1>";
  $message .= "<div>{$user_message}</div>";
  $message .= '<hr>';
  $message .= "<table style=\"width:100%\">";
  $message .= "<tr><th>User Name</th><td>{$name}</td></tr>";
  $message .= "<tr><th>User Email</th><td>{$email}</td></tr>";
  $message .= "<tr><th>User Phone</th><td>{$phone}</td></tr>";
  sh_send_mail($contact_mail, $subject , $message, $sender_name='AutoMailer (no reply)', $sender_email = 'sys@egypt.basketball');
  return true;
}



function gym_modify_user_columns( $column ) {
    $column['Activated'] = 'Activated';
    return $column;
}
add_filter( 'manage_users_columns', 'gym_modify_user_columns' );

function gym_modify_user_columns_activated( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'Activated' :
            return get_user_meta($user_id , 'sh_is_activated',true);
        break;
        default:
        break;

    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'gym_modify_user_columns_activated', 10, 3 );