<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Codezilla - https://codzilla.net/">
    <meta name="description" content="Egypt Basketball">

    <title><?php bloginfo('title'); ?> | <?php the_title(); ?></title>   

    <link rel="shortcut icon" href="<?php echo SH_URL; ?>assets/file/Layer 2.png">

    <?php wp_head(); ?>
    <style type="text/css">
      .component-section {
      background-image: url(<?= get_option('sh_head_img') ?>);
      background-size: cover;
      }
    </style>

</head>

<body>

    <!--loding-->

<!--   <div class="LoadingPage  loading-overlay ">

    <img  src="<?php echo SH_URL; ?>assets/img/loading/landing.png"  class="landing" alt="">

  

    <div class="ff">

      <img src="<?php  echo SH_URL; ?>assets/img/loading/ball.png" class="ball" alt="" srcset="">

    </div>

  </div> -->

    <!--stert-header-->

    <section class="section-nav fixed-top">

      <section class="section  type--top-bar ">

        <div class="container theme--dark">

          <div class="top-text">

            <?php echo get_option('sh_top_head_txt'); ?>

         </div>

         <div class="top-bar">

           

             <ul class="list-group list-group-horizontal">

               

               <li class="list-group">

                 <span class="iconic-menu__item type--list"><abbr>العربية</abbr> <img src="<?php echo SH_URL; ?>assets/file/flag--egypt.jpg" alt=""></span>

               

               </li>

               <?php if(!is_user_logged_in()) : ?>

               <li class="list-group">

                

                  <a href="<?php echo esc_url( wp_login_url() ); ?>">

                    

                  الدخول

                  <img src="<?php echo SH_URL; ?>assets/file/Shape 3.png" alt="">

                  </a>

                

                </li>

               <li class="list-group">

                  <a href="<?php echo esc_url( wp_registration_url() ); ?>">

                التسجيل

                <img src="<?php echo SH_URL; ?>assets/file/Shape 4.png" alt="">



                  </a>

              </li>

              <?php endif; ?>

             </ul>

           

         </div>

        </div>

       

      </section>

      <section class="section  type--header theme--primary">

          

        <nav class="navbar navbar-expand-xl navbar-light"> 

          <div class="container">



          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarNav">

            <?php if(wp_is_mobile()) : ?>

            <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'navbar-nav  nav-tabs','add_li_class'=>'','menu_id'=>'','container' => false ) ); ?>

            <?php else : ?>

            <?php wp_nav_menu( array( 'theme_location' => 'main-menu-right', 'menu_class' => 'navbar-nav  nav-tabs','add_li_class'=>'','menu_id'=>'','container' => false ) ); ?>
			


              <a class="img-aftrt" id="Logo_2" href="<?php bloginfo('url'); ?>"><?= sh_get_img(get_option('sh_logo_img'),get_option('sh_logo_img_id'),'') ?></a>



            <?php wp_nav_menu( array( 'theme_location' => 'main-menu-left', 'menu_class' => 'navbar-nav  nav-tabs','add_li_class'=>'','  menu_id'=>'','container' => false ) ); ?>



            <div class="header-main__search" data-box="header-search">    



                  <div class="box-container">

          

                         <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">

                      <div class="searsh-box">

                        <a class="searsh-btn">

                          <i class="fas fa-search"></i>

                         </a>

                            <input type="search" name="s" class="searsh-text form-control" placeholder="بحث.........." value="<?php echo get_search_query(); ?>"/>

                            <button type="submit" class="close"></button>

                      </div>

                         </form>

                  </div>

          

              </div>

            <?php endif; ?>





          </div>

          </div>

        </nav>       

      



      </section>

    </section>

