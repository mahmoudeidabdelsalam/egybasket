<?php

function sh_admin_scripts_styles($hook) {

	wp_enqueue_style( 'sh-main', SH_URL . 'assets/admin/css/main-style.css');



	$sh_pages = ['toplevel_page_content-area','egy-basket-options_page_home-page-content','post.php','post-new.php','toplevel_page_add-referee-match-page','add-referee-matches_page_list-referee-match-page'];



	if( in_array($hook, $sh_pages) ) {

		wp_enqueue_style( 'sh-bootsrtap', SH_URL . 'assets/admin/css/bootstrap.min.css');

		wp_enqueue_style( 'sh-style', SH_URL . 'assets/admin/css/style.css');

		wp_enqueue_script( 'sh-bootsrtap', SH_URL .'assets/admin/js/bootstrap.min.js', array() ,false, true );

		wp_enqueue_script( 'sh-script', SH_URL .'assets/admin/js/script.js', array() ,false, true );

		if(function_exists( 'wp_enqueue_media' )){

			wp_enqueue_media();

		}else{

			wp_enqueue_style('thickbox');

			wp_enqueue_script('media-upload');

			wp_enqueue_script('thickbox');

		}

	}

	if($hook === 'add-referee-matches_page_list-referee-match-page'){
		wp_enqueue_script( 'datatable-jquery', get_stylesheet_directory_uri() .'/assets/admin/datatables/jquery.dataTables.min.js', array() ,false, true );

		wp_enqueue_script( 'datatable-js', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTables.bootstrap.min.js', array('datatable-jquery') ,false, true );
		wp_enqueue_script( 'datatable-buttons', get_stylesheet_directory_uri() .'/assets/admin/datatables/datatables.buttons.min.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-flash', get_stylesheet_directory_uri() .'/assets/admin/datatables/buttons.flash.min.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-jszip', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTables.jszip.min.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-pdfmake', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTable.pdfmake.min.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-vfs_fonts', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTable.vfs_fonts.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-html5', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTable.buttons.html5.min.js', array('datatable-jquery','datatable-js') ,false, true );

		wp_enqueue_script( 'datatable-buttons-print', get_stylesheet_directory_uri() .'/assets/admin/datatables/dataTable.buttons.print.min.js', array('datatable-jquery','datatable-js') ,false, true );



		wp_enqueue_script( 'matches-js', get_stylesheet_directory_uri() .'/assets/admin/js/matches.js', array('datatable-jquery','datatable-js') ,false, true );
		wp_enqueue_style( 'datatable-css', get_stylesheet_directory_uri() . '/assets/admin/datatables/jquery.dataTables.min.css' );
		wp_enqueue_style( 'datatable-buttons-css', get_stylesheet_directory_uri() . '/assets/admin/datatables/buttons.dataTables.min.css' );
	}

}

 

add_action('admin_enqueue_scripts', 'sh_admin_scripts_styles');





function sh_scripts_styles() {



	wp_enqueue_style( 'bootstrap', SH_URL . 'assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'first-font', 'https://fonts.googleapis.com/css?family=El+Messiri:400,500,600,700&display=swap' );

	wp_enqueue_style( 'second-font', 'https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap' );

	wp_enqueue_style( 'main-style', SH_URL . 'assets/css/style.css' );

	wp_enqueue_script( 'fontawesome-js', 'https://kit.fontawesome.com/f339a7c60b.js', array() ,false, false );



	if(is_front_page()){

	  wp_enqueue_script( 'anime-js', SH_URL .'assets/js/anime.js', array() ,false, false );

	  wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array() ,false, true );

	  wp_enqueue_script( 'peper-js', SH_URL .'assets/js/peper.js', array() ,false, true );

	  wp_enqueue_script( 'bootstrap-js', SH_URL .'assets/js/bootstrap.min.js', array() ,false, true );

	  wp_enqueue_script( 'scroll-js', SH_URL .'assets/js/scroll-top.js', array() ,false, true );

	  wp_enqueue_script( 'nav-drop-js', SH_URL .'assets/js/nav-drob-list.js', array() ,false, true );

	  wp_enqueue_script( 'slider-js', SH_URL .'assets/js/slider.js', array() ,false, true );

	  wp_enqueue_script( 'video-js', SH_URL .'assets/js/video.js', array() ,false, true );

	  wp_enqueue_script( 'tap-js', SH_URL .'assets/js/tap.js', array() ,false, true );

	  wp_enqueue_script( 'loading-js', SH_URL .'assets/js/loding.js', array() ,false, true );



	}else{



		wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array() ,false, true );

		wp_enqueue_script( 'peper-js', SH_URL .'assets/js/peper.js', array() ,false, true );

		wp_enqueue_script( 'bootstrap-js', SH_URL .'assets/js/bootstrap.min.js', array() ,false, true );

		wp_enqueue_script( 'scroll-js', SH_URL .'assets/js/scroll-top.js', array() ,false, true );

		wp_enqueue_script( 'nav-drop-js', SH_URL .'assets/js/nav-drob-list.js', array() ,false, true );

		wp_enqueue_script( 'video-js', SH_URL .'assets/js/video.js', array() ,false, true );

		wp_enqueue_script( 'tap-js', SH_URL .'assets/js/tap.js', array() ,false, true );

		wp_enqueue_script( 'number-js', SH_URL .'assets/js/number.js', array() ,false, true );



		if ( 'table' === get_post_type() ) {

			wp_enqueue_script( 'jqueryui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array() ,false, true );

		}

		

	}



}

add_action( 'wp_enqueue_scripts', 'sh_scripts_styles' );