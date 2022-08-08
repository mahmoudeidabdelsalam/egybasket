<?php

add_action( 'init', 'sh_custom_post_types' );

/**********************

** create CPT Types

**********************/

function sh_custom_post_types() {

	

 $cpts = [

    array(

        'single'   => 'Statistician',

        'plural'   => 'Statisticians',

        'cptname'  => 'statistician',

        'icon'     => 'dashicons-businessman',

        'position' => 4,

        'show_in_menu' => true

        ),

    array(

        'single'   => 'Judge',

        'plural'   => 'Judges',

        'cptname'  => 'judge',

        'icon'     => 'dashicons-businessman',

        'position' => 4,

        'show_in_menu' => true

        ),

    array(

        'single'   => 'Coach',

        'plural'   => 'Coaches',

        'cptname'  => 'coach',

        'icon'     => 'dashicons-businessman',

        'position' => 5,

        'show_in_menu' => true

        ),

    array(

        'single'   => 'Rule',

        'plural'   => 'Rules',

        'cptname'  => 'rule',

        'icon'     => 'dashicons-clipboard',

        'position' => 5,

        'show_in_menu' => 'edit.php?post_type=coach'

        ),

    array(

        'single'   => 'Album',

        'plural'   => 'Albums',

        'cptname'  => 'egyalbum',

        'icon'     => 'dashicons-format-gallery',

        'position' => 5,

        'show_in_menu' => 'our-library'

        ),

    array(

        'single'   => 'Video',

        'plural'   => 'Videos',

        'cptname'  => 'egyvideo',

        'icon'     => 'dashicons-format-video',

        'position' => 5,

        'show_in_menu' => 'our-library'

        ),

    array(

        'single'   => 'Form',

        'plural'   => 'Forms',

        'cptname'  => 'egyform',

        'icon'     => 'dashicons-media-default',

        'position' => 5,

        'show_in_menu' => 'our-library'

        ),

    array(

        'single'   => 'Manager',

        'plural'   => 'Managers',

        'cptname'  => 'manager',

        'icon'     => 'dashicons-groups',

        'position' => 6,

        'show_in_menu' => true

        ),    

    array(

        'single'   => 'Decision',

        'plural'   => 'Decisions',

        'cptname'  => 'decision',

        'icon'     => 'dashicons-media-text',

        'position' => 6,

        'show_in_menu' => true

        ),    

    array(

        'single'   => 'History',

        'plural'   => 'Histories',

        'cptname'  => 'history',

        'icon'     => 'dashicons-calendar',

        'position' => 6,

        'show_in_menu' => true

        ),    

    array(

        'single'   => 'Achievement',

        'plural'   => 'Achievements',

        'cptname'  => 'achievement',

        'icon'     => 'dashicons-nametag',

        'position' => 6,

        'show_in_menu' => true

        ),

    array(

        'single'   => 'Achievement',

        'plural'   => 'Achievements',

        'cptname'  => 'team_achievement',

        'icon'     => 'dashicons-clipboard',

        'position' => 5,

        'show_in_menu' => 'edit.php?post_type=sp_team'

        ),

 ];

 foreach ($cpts as $cpt) {



     $labels = array(

        'name'                  => _x( $cpt['single'], 'Post Type General Name', 'egybasket' ),

        'singular_name'         => _x( $cpt['single'], 'Post Type Singular Name', 'egybasket' ),

        'menu_name'             => __( $cpt['plural'], 'egybasket' ),

        'all_items'             => __( 'All '.$cpt['plural'], 'egybasket' ),

        'add_new_item'          => __( 'Add New '.$cpt['single'] , 'egybasket' ),

        'add_new'               => __( 'Add New', 'egybasket' ),

        'new_item'              => __( 'New '.$cpt['single'], 'egybasket' ),

        'edit_item'             => __( 'Edit '.$cpt['single'], 'egybasket' ),

        'update_item'           => __( 'Update '.$cpt['single'], 'egybasket' ),

        'view_item'             => __( 'View '.$cpt['single'], 'egybasket' ),

        'search_items'          => __( 'Search '.$cpt['plural'], 'egybasket' ),

        'not_found'             => __( 'Not found', 'egybasket' ),

        'not_found_in_trash'    => __( 'Not found in Trash', 'egybasket' ),

        'featured_image'        => __( 'Featured Image', 'egybasket' ),

        'set_featured_image'    => __( 'Set featured image', 'egybasket' ),

        'remove_featured_image' => __( 'Remove featured image', 'egybasket' ),

        'use_featured_image'    => __( 'Use as featured image', 'egybasket' ),

      );

      $args = array(

        'label'                 => __( $cpt['plural'], 'egybasket' ),

        'description'           => __( $cpt['plural'].' Description', 'egybasket' ),

        'labels'                => $labels,

        'supports'              => array("title","editor","thumbnail","excerpt"),

        'hierarchical'          => false,

        'public'                => true,

        'show_ui'               => true,

        'show_in_menu'          => $cpt['show_in_menu'],

        'menu_position'         => $cpt['position'],

        'menu_icon'             => $cpt['icon'],

        'show_in_admin_bar'     => true,

        'show_in_nav_menus'     => true,

        'can_export'            => true,

        'has_archive'           => true,    

        'exclude_from_search'   => false,

        'publicly_queryable'    => true,

        'capability_type'       => 'post',

      );

    

    // Register Custom Post Type>

	register_post_type( $cpt['cptname'], $args );



    }   



}

