<?php 
/**
** Template Name: Contact us Template
**/
$error_message = ''; 
$success_message = '';

if(isset($_POST['contact-action']) && $_POST['contact-action'] === '' ){
  
  $error = false;
  
  $name = $_POST['user_name'];
  $email = $_POST['user_email'];
  $phone = $_POST['user_phone'];
  $message = $_POST['user_message'];

  if ( empty(trim($name)) ){
    $error_message = '<div>لا يمكن ترك حقل الاسم فارغاً</div>';
    $error = true;
  }

  if ( empty(trim($email)) ){
    $error_message .= '<div>لا يمكن ترك حقل البريد الالكتروني فارغاً</div>';
    $error = true;
  }

  if ( empty(trim($phone)) ){
    $error_message .= '<div>لا يمكن ترك حقل الهاتف فارغاً</div>';
    $error = true;
  }

  if ( empty(trim($message)) ){
    $error_message .= '<div>لا يمكن ترك حقل الرسالة فارغاً</div>';
    $error = true;
  }
  if(!$error){
    echo '<h1>Here</h1>';
    sh_contact_us($email, $name, $message, $phone);
    $success_message = 'تم إرسال رسالتك بنجاح';
  }

}

get_header(); ?>
      <header>
        <section class="component-section">
          <div class="compoonent-slid">
              <ul class="list-group list-group-horizontal last-naws-group">
                <li class="list-group"><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>
                <li class="list-group"><?php the_title(); ?></li>
              </ul>
          </div>
        </section>
      </header>
    <!--end-header-->
    <!--stert-section-main-->
     <main class="">
       <div class="container">
        <section class="section  type--contact-us-information">
          <div class="contact-us-information">
            <div class="contact-us-information__description text-right">
              <?php the_content(); ?>
            </div>
            <div class="contact-us-information__items">
              <div class="contact-us-information__item">
                <div class="information--item_image location-item"></div>
                <div class="information--item_content">
                  <span class="title content--description">العنوان</span>
                  <span class="details content--description"><?= get_option('sh_address'); ?></span>
              </div>
              </div>
              <div class="contact-us-information__item">
                <div class="information--item_image call-item"></div>
                <div class="information--item_content">
                  <span class="title content--description">الهاتف</span>
                  <span class="details content--description">
                      <span><?= get_option('sh_phone'); ?></span><br>
                      <span><?= get_option('sh_phone_second'); ?></span>
                  </span>
              </div>
              </div>
              <div class="contact-us-information__item">
                <div class="information--item_image mail-item"></div>
                <div class="information--item_content">
                  <span class="title content--description">البريد الإلكترونى</span>
                  <span class="details content--description">
                      <a href="mailto:<?= get_option('sh_email'); ?>"><?= get_option('sh_email'); ?></a>
                  </span>
              </div>
              </div>
            </div>
          </div>
        </section>
         </div>
         <section class="section  type--contact-us">
           <div class="container">
            <div class="contact-us">
              <div class="contact-us__map"><?= get_option('sh_map_code');?></div>
              <div class="contact-us__form">
                <div class="contact-us__form__title">
                  تواصل معنا الان
                </div>
                <div class="contact-us__form__description">
                  يمكنك التواصل معنا الان بترك رسالة وسيتم الرد عليها فى اسرع وقت ممكن
                </div>
                <?php if (!empty($error_message)): ?>
                  <div style="padding: 10px; background: #FFF;border-radius: 10px;border-right: 10px solid #A00;text-align: right;">
                    <?php echo $error_message; ?>
                  </div>
                <?php elseif (!empty($success_message)): ?>
                  <div style="padding: 10px; background: #FFF;border-radius: 10px;border-right: 10px solid #0A0;text-align: right;">
                    <?php echo $success_message; ?>
                  </div>
                <?php endif; ?>
                <form class="contact-us__form__items" action="#" method="post">
                  <div class="contact-us__form__item">
                    <input type="text" name="user_name" placeholder="الإسم بالكامل">
                  </div>
                  <div class="contact-us__form__item">
                    <input type="email" name="user_email" placeholder="البريد الإلكترونى">
                  </div>
                  <div class="contact-us__form__item">
                    <input type="text" name="user_phone" placeholder="رقم الهاتف">
                  </div>
                  <div class="contact-us__form__item">
                    <textarea rows="6" name="user_message" placeholder="الرسالة"></textarea>
                  </div>
                  <div class="contact-us__form__item theme--submit">
                    <input type="submit" name="contact-action" value="">
                  </div>
                </form>
              </div>
            </div>
           </div>
          
        </section>
     </main>
    <!--end-section-main-->
<?php get_footer(); ?>