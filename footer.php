     <!--stert-footer-->
     <footer class="sector type--footer">
        <section class="section  type--bottom-bar theme--semi-dark">
          <div class="container">
            <div class="bottom-bar">
              <div class="subscribe">
                <?php echo do_shortcode('[newsletter]'); ?> 
              </div>
              <div class="social-links">
                <ul class="list-group list-group-horizontal">
                  <?php if(!empty($youtube = get_option('sh_youtube') ) ) :?>
                  <li class="list-group"><a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($insta = get_option('sh_insta') ) ) :?>
                  <li class="list-group"><a href="<?= $insta; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($google = get_option('sh_google_plus') ) ) :?>
                  <li class="list-group"><a href="<?= $google; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($twitter = get_option('sh_twitter') ) ) :?>
                  <li class="list-group"><a href="<?= $twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <?php endif; ?>
                  <?php if(!empty($fb = get_option('sh_fb') ) ) :?>
                  <li class="list-group"><a href="<?= $fb; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <?php endif; ?>
                
                </ul>
              </div>
            </div>
          </div>
          
        </section>
        <section class="section  type--footer theme--black">
          <div class="container">
            <div class="footer">
              <div class="footer__lists lists">
                <div class="list">
                  <div class="list__title">
                    روابط سريعة
                  </div>
                  <div class="list__items">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'list-group','menu_id'=>'','container' => false ) ); ?>
                  </div>
                </div>
                <div class="list">
                  <div class="list__title">
                    تواصل معنا
                  </div>
                  <div class="list__items">
                    <ul class="list-group">
                      <li class="list-group"> <i class="fas fa-phone-alt" aria-hidden="true"></i><?php echo get_option('sh_phone'); ?></li>
                      <li class="list-group"><i class="far fa-envelope" aria-hidden="true"></i><a href="mailto:get_option('sh_email');"><?php echo get_option('sh_email'); ?></a></li>
                      <li class="list-group"> <i class="fas fa-map-marker-alt" aria-hidden="true"></i><?php echo get_option('sh_address'); ?></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="footer__logo">
                <a href="<?php bloginfo('url'); ?>"><?= sh_get_img(get_option('sh_logo_img'),get_option('sh_logo_img_id'),'') ?></a>
              </div>
              
              <button class="scroll-top" id="goup" style="display: block;">
                <i class="fas fa-angle-up"></i>
              </button>    
            
            </div>
          </div>
         
        </section>
        <div class="footer__copyrights">
            <?php echo get_option('sh_copyrights'); ?>
          </div>
      </footer>
      <!--stert-model-الدخول-->
<!--       <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class=" modal-content modal-grid">
              <div class="component-model-img ">
                <button type="button" class="close text-right" data-dismiss="modal">&times;</button>

              </div>
            
              <div class="modal-body ">
           
                <iframe height="400px" width="100%" src="ee2.html" name="iframe_a" style="border: none;">
                
                 
                </iframe>
                <p id="p1"> <span>
                  لاتمتلك حساب؟</span> 
                  <a href="ee1.html" target="iframe_a"> حساب جديد </a> 
                </p>
                <p id="p2">
                  <span>
                     لديك حساب بالفعل؟ </span> 
                  <a href="ee2.html" target="iframe_a">سجل الان</a></p>
    
               
    
            </div>
            
      
          </div>
        </div>
      </div> -->
      <!--end-model-الدخول-->
       <!--stert-model-التسجيل-->
<!--        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content modal-grid">
          
            <div class="component-model-img ">
              <button type="button" class="close text-right" data-dismiss="modal">&times;</button>

            </div>
            
            <div class="modal-body">
           
              <iframe height="400px" width="100%" src="ee1.html" name="f" style="border: none;"></iframe>
  
              <p id="p11"> <span>
                لديك حساب بالفعل؟ </span> 
                <a href="ee2.html" target="f"> سجل الان </a> 
              </p>
              <p id="p22">
                <span>
                  لاتمتلك حساب؟ </span> 
                <a href="ee1.html" target="f"> حساب جديد </a></p>
                
  
          </div>
           
          </div>
        </div>
      </div> -->
      <!--end-model--->
     <!--end-footer-->
    <?php wp_footer(); ?>
</body>
</html>