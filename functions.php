<?php 

error_reporting(1);

define('SH_ROOT', get_template_directory() . '/');

define('SH_URL', get_template_directory_uri() . '/');

define('SH_ADMIN', admin_url());



add_theme_support( 'post-thumbnails' );



require_once ( SH_ROOT . 'lib/theme_initialization.php');

require_once ( SH_ROOT . 'lib/meta.php');

require_once ( SH_ROOT . 'lib/taxonomy.php');

require_once ( SH_ROOT . 'lib/enqueue_scripts.php');

require_once ( SH_ROOT . 'lib/ajax_functions.php');

require_once ( SH_ROOT . 'lib/sh_functions.php');

require_once ( SH_ROOT . 'lib/taxonomy-terms.php');

require_once ( SH_ROOT . 'referees content/housing_commuting.php');


add_action( 'after_setup_theme', 'sh_load_theme_textdomain' );

function sh_load_theme_textdomain() {

    load_theme_textdomain( 'egybasket', get_template_directory() . '/languages' );

}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Refree Excuses',
		'menu_title'	=> 'Refree excuses Email template',
		'menu_slug' 	=> 'refree_excuses_email_template',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}



add_action( 'after_setup_theme', 'sh_custom_img_sizes' );

function sh_custom_img_sizes() {

    add_image_size('judges',162,222,true); 

}





add_filter( 'intermediate_image_sizes', 'judges_image_sizes', 999 );  

function judges_image_sizes( $image_sizes ){  

  

    $judges_image_sizes = array( 'judges');

  

    if( isset($_REQUEST['post_id']) && in_array(get_post_type( $_REQUEST['post_id'], ['judge','coach','statistician'] )  ) )  

        return $judges_image_sizes;  

  

    return $image_sizes;  

}  

  

remove_filter( 'the_excerpt', 'wpautop' );


/*******************************************************
******** Add User Status Field to users profile ********
*******************************************************/
add_action( 'show_user_profile', 'sh_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'sh_extra_user_profile_fields' );

function sh_extra_user_profile_fields( $user ) { 
        $sh_phone 		= get_user_meta( $user->ID, 'sh_user_phone', true);
        $sh_nat    		= get_user_meta( $user->ID, 'sh_user_natid', true);
        $sh_governorate = get_user_meta( $user->ID, 'sh_governorate', true);
        $sh_ref_type    = get_user_meta( $user->ID, 'sh_ref_type', true);
        $sh_balance 	= get_user_meta( $user->ID, 'sl-referee-balance', true);
        $sh_fcm_token 	= get_user_meta( $user->ID, 'fcm_token', true);

        $sh_bank_name 	= get_user_meta( $user->ID, 'sh_bank_name', true);
        $sh_account_no 	= get_user_meta( $user->ID, 'sh_account_no', true);
        $sh_iban 	= get_user_meta( $user->ID, 'sh_iban', true);
        $sh_swift_code 	= get_user_meta( $user->ID, 'sh_swift_code', true);

        $sh_height 	= get_user_meta( $user->ID, 'sh_height', true);
        $sh_weight 	= get_user_meta( $user->ID, 'sh_weight', true);
        $sh_activated  = get_user_meta( $user->ID, 'sh_is_activated', true);

        global $miu_uploader;
		global $wpdb;
		$governs_SQL = "SELECT * FROM wp_governorate";
		$govs = $wpdb->get_results( 
			$wpdb->prepare($governs_SQL,'') 
		); 
    ?>
    <h3><?php _e("Extra profile information", "egybasket"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="sh_is_activated"><?php _e("User is activated"); ?></label></th>
            <td>
                <select class="postform" id="sh_is_activated" name="sh_is_activated">
                    <option value="" selected="" disabled="">please select</option>
                    <option value="yes" <?php echo $sh_activated === 'yes' ? 'selected' : '' ?> >Yes</option>
                    <option value="no" <?php echo $sh_activated === 'no' ? 'selected' : '' ?> >No</option>
                </select>
            </td>
        </tr>              
         <tr>
            <th><label for="fcm_token"><?php _e("Fcm Token"); ?></label></th>
            <td>
               <?= $sh_fcm_token; ?>   
            </td>
		</tr>  
        <tr>
            <th><label for="sh_user_phone"><?php _e("Phone Number"); ?></label></th>
            <td>
                <input type="text" name="sh_user_phone" value="<?= $sh_phone; ?>" id="sh_user_phone">
            </td>
		</tr>   
        <tr>
            <th><label for="sh_governorate"><?php _e("المحافظة"); ?></label></th>
            <td>
				<select class="postform" id="sp_venue_gov" name="sp_venue_gov">
					<option value="" selected="" disabled="">إختر المحافظة</option>
					<?php foreach ($govs as $gov): ?>
						<option value="<?php echo $gov->id ?>" <?php echo $sh_governorate === $gov->id ? 'selected' : '' ?> ><?php echo $gov->name ?></option>
					<?php endforeach ?>
				</select>
            </td>
        </tr>      
        <tr>
            <th><label for="sh_ref_type"><?php _e("حكم دولي/محلي"); ?></label></th>
            <td>
				<select name="sh_ref_type" id="sh_ref_type">
					<option value="international" <?php echo $sh_ref_type === 'international' ? 'selected' : '' ?>> International</option>
					<option value="local" <?php echo $sh_ref_type === 'local' ? 'selected' : '' ?>> Local</option>
				</select>
            </td>
        </tr>      
        <tr>
            <th><label for="sh_profile_picture"><?php _e("Profile Picture"); ?></label></th>
            <td>
                <?php $miu_uploader->displayUploader('user', 'sh_profile_picture', $user->ID, "Profile Image ", 'Drag  Images Here' ); ?>
            </td>
        </tr>      
        <tr>
            <th><label for="sh_user_natid"><?php _e("National ID"); ?></label></th>
            <td>
                <input type="text" name="sh_user_natid" value="<?= $sh_nat; ?>" id="sh_user_natid">
            </td>
        </tr>
        <?php if(current_user_can('manage_options')) : ?>
            <tr>
                <th><label for="sh_user_balance"><?php _e("الرصيد الحالي"); ?></label></th>
                <td>
                    <input type="text" value="<?= $sh_balance; ?>" id="sh_user_balance" readonly> جنيه مصري
                </td>
            </tr>
            <tr>
                <th><label for="sh_user_paid"><?php _e("تم سداد حساب الحكم:"); ?></label></th>
                <td>
                    <input type="text" value="" name="sh_user_paid" id="sh_user_paid" > جنيه مصري
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <th><h2>Bank information</h2></th>
        </tr> 
        <tr>
            <th><label for="sh_bank_name"><?php _e("Bank Name"); ?></label></th>
            <td>
                <input type="text" name="sh_bank_name" value="<?= $sh_bank_name; ?>" id="sh_bank_name">
            </td>
		</tr> 
        <tr>
            <th><label for="sh_account_no"><?php _e("Account Number"); ?></label></th>
            <td>
                <input type="text" name="sh_account_no" value="<?= $sh_account_no; ?>" id="sh_account_no">
            </td>
		</tr> 
        <tr>
            <th><label for="sh_iban"><?php _e("IBAN"); ?></label></th>
            <td>
                <input type="text" name="sh_iban" value="<?= $sh_iban; ?>" id="sh_iban">
            </td>
		</tr> 
        <tr>
            <th><label for="sh_swift_code"><?php _e("Swift Code"); ?></label></th>
            <td>
                <input type="text" name="sh_swift_code" value="<?= $sh_swift_code; ?>" id="sh_swift_code">
            </td>
		</tr> 
		  <tr>
            <th><label for="sh_height"><?php _e("Height"); ?></label></th>
            <td>
                <input type="text" name="sh_height" value="<?= $sh_height; ?>" id="sh_height">
            </td>
		</tr> 
        <tr>
            <th><label for="sh_weight"><?php _e("Weight"); ?></label></th>
            <td>
                <input type="text" name="sh_weight" value="<?= $sh_weight; ?>" id="sh_weight">
            </td>
		</tr> 
    </table>
<?php
}

add_action( 'personal_options_update', 'sh_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'sh_save_extra_user_profile_fields' );
function sh_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'sh_user_phone', $_POST['sh_user_phone'] );
    update_user_meta( $user_id, 'sh_governorate', $_POST['sp_venue_gov'] );
    update_user_meta( $user_id, 'sh_user_natid', $_POST['sh_user_natid'] );
    update_user_meta( $user_id, 'sh_ref_type', $_POST['sh_ref_type'] );

    update_user_meta( $user_id, 'sh_bank_name', $_POST['sh_bank_name'] );
    update_user_meta( $user_id, 'sh_account_no', $_POST['sh_account_no'] );
    update_user_meta( $user_id, 'sh_iban', $_POST['sh_iban'] );
    update_user_meta( $user_id, 'sh_swift_code', $_POST['sh_swift_code'] );
    update_user_meta( $user_id, 'sh_is_activated', $_POST['sh_is_activated'] );
    update_user_meta( $user_id, 'sh_height', $_POST['sh_height'] );
    update_user_meta( $user_id, 'sh_weight', $_POST['sh_weight'] );
    if(current_user_can('manage_options')) {
        $sh_balance = get_user_meta( $user_id, 'sl-referee-balance', true);
        $balance = intval($sh_balance) - intval($_POST['sh_user_paid']);
        update_user_meta( $user_id, 'sl-referee-balance', $balance );
    }
}


/*********************************************************
 *   functions to add youtube link
 * *********************************************************/


function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

add_image_size( 'medium_large', '786', '0', false );
add_image_size( '1536x1536', '1536', '1536', false );
add_image_size( '2048x2048', '2048', '2048', false );
add_image_size( 'sportspress-crop-medium', '300', '300', true );
add_image_size( 'sportspress-fit-medium', '300', '300', false );
add_image_size( 'sportspress-fit-icon', '128', '128', false );
add_image_size( 'sportspress-fit-mini', '32', '32', false );
add_image_size( 'medium_large', '786', '0', false );
add_image_size( 'sow-carousel-default', '272', '182', true );