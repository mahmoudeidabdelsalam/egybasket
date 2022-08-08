<?php 

/**

** Template Name: Judges Template

**/

get_header(); ?>

      <header>



       

       

        <section class="component-section">

          <div class="compoonent-slid">

            

              <ul class="list-group list-group-horizontal last-naws-group">

                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>

                <li class="list-group"><a href="javascript:void(0)"> الحكام</a></li>

               

              </ul>

            

          </div>

        </section>

      </header>
    <!--stert-section-main-->

     <main class="component-tarikh-alaitihad">

       <div class="component-title-list">

        <h5 class="title-content text-right title-almudaribn">

          <div>

            الحكام المقيدين             <small>  بسجلات الاتحاد المصري لكرة السلة </small>

          </div>

          

              

            <nav class="navbar navbar-expand-lg navbar-light">

              <ul class="navbar-nav nav nav-tabs">

                <li class="  nav-hoverr nav-item nav-item-link active">

                  <a class="nav-link "href="#tab-faq-s" data-toggle="tab" tabindex="0" >الحكام

                  </a>

                  

  

                </li>

                <li  class=" nav-item  ">

                  <a class="nav-link "  href="#tab-faq-a" data-toggle="tab" tabindex="0" >الشروط

                  </a>

                 

                  </li>

                 

                    

                  </ul>

            </nav>

            <div class="component-from ">

              <button class="label-content" for="">

                <span>

                  تحميل الإستمارات

                </span>

                <img src="<?php echo SH_URL; ?>assets/img/download.png"></button>

           </div>

        </h5>

       </div>

       <div class="type-main-next">

         <div class="container">

          <div class="tab-content">

            <div class="tab-pane show active"id="tab-faq-s">

              <div class="component-list-lajnah COMPONENT-ALMUDARIBIN text-right">

                <?php  $judges = sh_get_judges(-1); ?>

                <?php if($judges->have_posts()) : ?>

                <?php while($judges->have_posts()) : $judges->the_post(); $judge_id = get_the_ID(); ?>

                <div class="modal-lanah ">

                  <div class="media ">

                    <img src="<?= get_the_post_thumbnail_url($judge_id,'judges'); ?>" alt="<?php the_title(); ?>">

                    <div class="media-body">

                      <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>

                      <table class="product__data">

                        <thead>

                          <tr>

                            <th>كود المدرب</th>

                            <th>الدرجه</th>

                            <th>الفرع</th>

                          </tr>

                        </thead>

                        <tbody>

                          <tr>

                            <td class="td-1"><?= get_post_meta($judge_id,'sh_code',true); ?></td>

                            <td class="td-1"><?= get_post_meta($judge_id,'sh_degree',true); ?></td>

                            <td class="td-2"><?= get_post_meta($judge_id,'sh_branch',true); ?></td>

                          </tr>

                        </tbody>

                      </table>

                     

                    </div>

                  </div>

                </div>

                <?php endwhile; ?>

                <?php wp_reset_query(); endif; ?>

               </div>

            </div>

            <div class="tab-pane"id="tab-faq-a">

              <div class="component-list-tarikh component-alshurut text-right">

                <?php echo wpautop( get_post(124)->post_content ); ?>

              </div>

            </div>

          </div>

         </div>

       </div>

     </main>

    <!--end-section-main-->

<?php get_footer(); ?>