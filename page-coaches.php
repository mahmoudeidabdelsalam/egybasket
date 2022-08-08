<?php 

/**

** Template Name: Coaches Template

**/

get_header(); ?>


      <header>



       

       

        <section class="component-section">

          <div class="compoonent-slid">

            

              <ul class="list-group list-group-horizontal last-naws-group">

                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>

                <li class="list-group"><a href="javascript:void(0)"> المدربين</a></li>

               

              </ul>

            

          </div>

        </section>

      </header>
    <!--stert-section-main-->

     <main class="component-tarikh-alaitihad">

       <div class="component-title-list">

        <h5 class="title-content text-right title-almudaribn">

          

          <div class="tab-content ">

            <div class=" slidr2  tab-pane active show" id="img-1">

              <div>

                المدربين المقيدين

                 <small>  بسجلات الاتحاد المصري لكرة السلة </small>

              </div>

            </div>

           <div class=" slidr2  tab-pane " id="img-2">

            <div>

            شروط قيد مدرب 

            

            <small>  بسجلات الاتحاد المصري لكرة السلة </small>

          </div>

          

          </div>

          <div class=" slidr2  tab-pane " id="img-3">

            <div>

              قواعد تصنيف المدربين            

              <small>  بسجلات الاتحاد المصري لكرة السلة </small>

            </div>

            

           </div>

            </div>

            <nav class="navbar navbar-expand-lg navbar-light">

              <ul class="nav navbar-nav ">

                <li class=" nav-item  active">

                  <a class="nav-link dot active"href="#tab-faq-s" onclick="currentSlide(1)">المدربين

                  </a>

                  

                </li>

                <li  class=" nav-item  ">

                  <a class="nav-link dot "  href="#tab-faq-a" onclick="currentSlide(2)" >الشروط

                  </a>

                  </li>

                  <li class="nav-item ">

                    <a class="nav-link dot"  href="#tab-faq-c" onclick="currentSlide(3)">المستويات

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

             <div class="tab-pane slidr active show" id="tab-faq-s">

              <div class="component-list-lajnah COMPONENT-ALMUDARIBIN text-right">

                <?php  $coaches = sh_get_coaches(-1); ?>

                <?php if($coaches->have_posts()) : ?>

                <?php while($coaches->have_posts()) : $coaches->the_post(); $coach_id = get_the_ID(); ?>

                <div class="modal-lanah ">

                  <div class="media ">

                    <img src="<?= get_the_post_thumbnail_url($coach_id,'judges'); ?>" alt="<?php the_title(); ?>">

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

                            <td class="td-1"><?= get_post_meta($coach_id,'sh_code',true); ?></td>

                            <td class="td-1"><?= get_post_meta($coach_id,'sh_degree',true); ?></td>

                            <td class="td-2"><?= get_post_meta($coach_id,'sh_branch',true); ?></td>

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

             <div class="tab-pane slidr " id="tab-faq-a">

              <div class="component-list-tarikh component-alshurut text-right">

                <?php echo wpautop( get_post(129)->post_content ); ?> 

              </div>

            </div>

            <div class="tab-pane slidr " id="tab-faq-c">

                       

               <div class="comonent-injazat row">

                <?php  $rules = sh_get_rules(-1); ?>

                <?php if($rules->have_posts()) : ?>

                <div class="component-injazat-right col-md-4">

                  <ul class="nav">                   

                    <?php $i=0; while($rules->have_posts()) : $rules->the_post(); $rule_id = get_the_ID(); ?>

                    <li class="nav-hoverr nav-item nav-item-link <?= $i=='0'?'active':''; ?>">

                        <a class="nav-link title-content-link " href="#tab-faq-<?= $rule_id ?>" data-toggle="tab" tabindex="0">

                          <span>   

                           <?php the_title(); ?>                                             

                          </span>

                          <i class="fas fa-chevron-left icon-link" aria-hidden="true"></i>  

                        </a>

                      </li>

                    <?php $i++; endwhile; ?>

                  </ul>

                </div>

                  

              <div class="component-injazat-left col-md-8">

                <div class="tab-content">

                  <?php $i =0; while($rules->have_posts()) : $rules->the_post(); $rule_id = get_the_ID(); ?>

                  <div class="tab-pane <?= $i=='0'?'active show':''; ?>" id="tab-faq-<?= $rule_id ?>">

                      <?php the_content(); ?>   

                  </div>

                  <?php $i++; endwhile; ?>

                </div>

              </div>

              <?php wp_reset_query(); endif; ?>

               </div>      

            </div>

           </div>          

         </div>

       </div>

     </main>

    <!--end-section-main-->

<?php get_footer(); ?>