<?php 

/********************

Add Date Meta Box To Judges And Coaches And Statisticans

********************/

function sh_add_judges_data_meta() {

    add_meta_box( "judges_coaches_data","Extra Data" , "sh_judges_coaches_data_callback", array('judge','coach','statistician'), "normal" );
    add_meta_box( "show_in_homepage","Video In Homepage" , "sh_video_show_in_homepage", array('egyvideo'), 'side');
    add_meta_box( "sh_referee_details","Referee/Match Details" , "sh_referee_details", array('sp_event'), 'normal');

}

add_action( 'add_meta_boxes', 'sh_add_judges_data_meta' );

function sh_referee_details($object) {
    $match_notes    = esc_attr( get_post_meta( $object->ID, 'match_notes', true ) );
    $match_report   = esc_attr( get_post_meta( $object->ID, 'match_report', true ) );
    $match_status   = esc_attr( get_post_meta( $object->ID, 'match_status', true ) );
    ?>
    <div class="form-group">
        <label for="match_notes"><?php _e('Match Status :','egybasket'); ?></label>
        <select id="match_status" name="match_status" class="form-control full-wdith">
            <option value="NOT-STARTED">Not Started</option>
            <option value="STARTED" <?php echo $match_status === 'STARTED' ? 'selected' : '' ?>>started</option>
            <option value="ENDED" <?php echo $match_status === 'ENDED' ? 'selected' : '' ?>>Ended</option>
            <option value="RESULTS" <?php echo $match_status === 'RESULTS' ? 'selected' : '' ?>>Results</option>
            <option value="NOTES" <?php echo $match_status === 'NOTES' ? 'selected' : '' ?>>Notes</option>
            <option value="REPORT" <?php echo $match_status === 'REPORT' ? 'selected' : '' ?>>Report</option>
            <option value="CANCELED" <?php echo $match_status === 'CANCELED' ? 'selected' : '' ?>>CANCELED</option>
        </select>
    </div>
    <div class="form-group">
        <label for="match_notes"><?php _e('Match Notes :','egybasket'); ?></label>
        <input type="text" id="match_notes" name="match_notes" class="form-control full-wdith" value="<?php echo $match_notes; ?>"><br>
    </div>
    <div class="form-group">
        <label for="match_report"><?php _e('Match Report :','egybasket'); ?></label>
        <input type="text" id="match_report" name="match_report" class="form-control full-wdith" value="<?php echo $match_report; ?>"><br>
    </div>

    <?php
    $report_image_id = get_post_meta($object->ID , 'report_image',true);
    $image_url =wp_get_attachment_url($report_image_id );
   ?>
        <div class="form-group">
        <label for="match_report"><?php _e('Match Report image :','egybasket'); ?></label>
            <div class="col-md-6">
            <a href="<?=$image_url?>">
            <img src="<?=$image_url?>" width="200"/>
            </a>    
            </div>      
        </div>
    <div class="form-group">
        <style>
            table.errors{
                width: 50%;
            }
            table.errors, table.errors th, table.errors td {
              border: 1px solid black;
            }
        </style>
        <label for="match_report"><?php _e('Match Players Notes :','egybasket'); ?></label>
        <?php 
            $match_players_notes   = get_post_meta( $object->ID, 'match_players_notes', true );
        ?>
        <table class="errors">
            <tr>
                <th>Player</th>
                
                <th>Report</th>                
            </tr>
                
        <?php
        foreach ($match_players_notes as $key=>$value) {
        ?>
            <tr>
                <td><?= get_post($key)->post_title;  ?></td>
                <td><?= $value; ?></td>
            </tr>
        <?php         
        } ?>
        </table>
    </div>


    <?php
}

/* Display the post meta box. */

function sh_judges_coaches_data_callback( $object, $box ) { 



    $sh_code = esc_attr( get_post_meta( $object->ID, 'sh_code', true ) );

    $sh_deg = esc_attr( get_post_meta( $object->ID, 'sh_degree', true ) );

    $sh_branch = esc_attr( get_post_meta( $object->ID, 'sh_branch', true ) );

?>

    <div class="form-group">

        <label for="sh_code"><?php _e('Code :','egybasket'); ?></label>

        <input type="text"  name="sh_code" class="form-control full-wdith" value="<?php echo $sh_code; ?>"><br>

    </div>

    <div class="form-group">

        <label for="sh_degree"><?php _e('Degree :','egybasket'); ?></label>

        <input type="text"  name="sh_degree" class="form-control full-wdith" value="<?php echo $sh_deg; ?>"><br>

    </div>

    <div class="form-group">

        <label for="sh_branch"><?php _e('Branch :','egybasket'); ?></label>

        <input type="text"  name="sh_branch" class="form-control full-wdith" value="<?php echo $sh_branch; ?>" ><br>

    </div>

<?php

}

function sh_video_show_in_homepage ( $object ) {
    $sh_homepage = esc_attr( get_post_meta( $object->ID, 'sh_video_in_homepage', true ) );
    ?>
     <div class="form-group">
        <label for="sh_homepage">
            <input type="checkbox"  name="sh_homepage" id="sh_homepage" class="form-control full-wdith" <?php echo $sh_homepage === '1' ? 'checked' : ''; ?> value="1">
            <?php _e('Show In Homepage','egybasket'); ?>
        </label>
    </div>
    <?php
}



/********************

Add Date Meta Box To TABLE  

********************/

function sh_add_tables_data_meta() {

    add_meta_box( "tables_data","Extra Data" , "sh_tables_data_callback", array('sp_table'), "side" );

}

add_action( 'add_meta_boxes', 'sh_add_tables_data_meta' );



/* Display the post meta box. */

function sh_tables_data_callback( $object, $box ) { 



    $calender_id = esc_attr( get_post_meta( $object->ID, 'sh_calender_id', true ) );

    $scorers_short = esc_attr( get_post_meta( $object->ID, 'sh_scorers_shortcode', true ) );

    $sh_table_link = esc_attr( get_post_meta( $object->ID, 'sh_table_link', true ) );

    $show = get_post_meta( $object->ID, 'sh_champion_cup', true );



?>

    <div class="form-group">

        <label ><?php _e('Calender ID :','egybasket'); ?></label>

        <input type="text"  name="sh_calender_id" class="form-control full-wdith" value="<?php echo $calender_id; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Scorers List Shortcode : ','egybasket'); ?></label>

        <input type="text"  name="sh_scorers_shortcode" class="form-control full-wdith" value="<?php echo $scorers_short; ?>"><br>

    </div>



    <div class="form-group">

        <label for="sh_form_link"><?php _e('Matches Table :','egybasket'); ?></label>

        <input class="first_form_id col-md-6" type="text" name="sh_table_link" value="<?php echo $sh_table_link; ?>">

        <a href="#" class="first_form_link btn btn-info">Choose Table File</a>

    </div>

    <div class="form-group">

        <label >Is this a Cup Championship : (If yes check this)</label>

        <input type="checkbox"  name="sh_champion_cup" value="1" <?= $show == '1' ?'checked' : ''; ?> >

    </div>



<?php

}





/********************

Add Date Meta Box To Videos

********************/

function sh_add_videos_data_meta() {

    add_meta_box( "videos_link_data","Video Link" , "sh_video_data_callback", array('egyvideo'), "normal" );

    add_meta_box( "videos_team_data","Team" , "sh_video_team_data_callback", array('egyvideo'), "side" );

}

add_action( 'add_meta_boxes', 'sh_add_videos_data_meta' );



/* Display the post meta box. */

function sh_video_data_callback( $object, $box ) { 



    $sh_video_link = esc_attr( get_post_meta( $object->ID, 'sh_video_link', true ) );
    $sh_youtube_link=esc_attr( get_post_meta( $object->ID, 'sh_youtube_link', true ) );


?>

    <div class="form-group">

        <label for="sh_video_link"><?php _e('Video Link :','egybasket'); ?></label>

        <input class="first_video_id col-md-6" type="text" name="sh_video_link" value="<?php echo $sh_video_link; ?>">

        <a href="#" class="first_video_link btn btn-info">Choose Video</a>

    </div>
    <div class="form-group">

        <label ><?php _e('OR','egybasket'); ?></label>


    </div>
    <div class="form-group">

        <label for="sh_youtube_link"><?php _e('Youtube Video Link :','egybasket'); ?></label>

        <input class="second_video_id col-md-6" type="text" name="sh_youtube_link" value="<?php echo $sh_youtube_link; ?>">

    </div>

<?php

}



function sh_video_team_data_callback( $object, $box ) { 



    $sh_teams = get_post_meta( $object->ID, 'sh_teams', true );

?>

    <div class="form-group">

        <label for="sh_teams"><?php _e('Team :','egybasket'); ?></label>

        <select name="sh_teams[]" id="sh_teams" multiple="true">

          <option>Choose</option>

          <?php $teams = sh_get_teams(); ?>

          <?php foreach ($teams as $team)  : ?>

          <option value="<?php echo $team->ID; ?>" <?php if( in_array($team->ID, $sh_teams) ) echo "selected"; ?> ><?php echo $team->post_title; ?></option>

          <?php endforeach; ?>

        </select>

    </div>

<?php

}


/********************

Add Date Meta Box To Albums

********************/

function sh_add_albums_data_meta() {


    add_meta_box( "albums_team_data","Team" , "sh_album_team_data_callback", array('egyalbum'), "side" );

}

add_action( 'add_meta_boxes', 'sh_add_albums_data_meta' );



function sh_album_team_data_callback( $object, $box ) { 



    $sh_teams = get_post_meta( $object->ID, 'sh_teams', true );

?>

    <div class="form-group">

        <label for="sh_teams"><?php _e('Team :','egybasket'); ?></label>

        <select name="sh_teams[]" id="sh_teams" multiple="true">

          <option>Choose</option>

          <?php $teams = sh_get_teams(); ?>

          <?php foreach ($teams as $team)  : ?>

          <option value="<?php echo $team->ID; ?>" <?php if( in_array($team->ID, $sh_teams) ) echo "selected"; ?> ><?php echo $team->post_title; ?></option>

          <?php endforeach; ?>

        </select>

    </div>

<?php

}



/********************

Add Date Meta Box To Forms

********************/

function sh_add_forms_data_meta() {

    add_meta_box( "forms_data","The Form" , "sh_form_data_callback", array('egyform'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_forms_data_meta' );



/* Display the post meta box. */

function sh_form_data_callback( $object, $box ) { 



    $sh_form_link = esc_attr( get_post_meta( $object->ID, 'sh_form_link', true ) );

?>

    <div class="form-group">

        <label for="sh_form_link"><?php _e('The Form :','egybasket'); ?></label>

        <input class="first_form_id col-md-6" type="text" name="sh_form_link" value="<?php echo $sh_form_link; ?>">

        <a href="#" class="first_form_link btn btn-info">Choose Form</a>

    </div>

<?php

}







/********************

Add Date Meta Box To Posts

********************/

function sh_add_posts_competiton_meta() {

    add_meta_box( "posts_table_cpt_data","Post Related To Competition" , "sh_posts_competition_data_callback", array('post','egyalbum','egyvideo'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_posts_competiton_meta' );



/* Display the post meta box. */

function sh_posts_competition_data_callback( $object, $box ) { 



    $sh_comps = get_post_meta( $object->ID, 'sh_comps', true );

?>

    <div class="form-group">

        <label for="sh_code"><?php _e('Competition(table) :','egybasket'); ?></label>

        <select name="sh_comps[]" id="sh_comps" multiple="true">

          <option>Choose</option>

          <?php $comps = sh_comps_tables(); ?>

          <?php foreach ($comps as $comp)  : ?>

          <option value="<?php echo $comp->ID; ?>" <?php if( in_array($comp->ID, $sh_comps) ) echo "selected"; ?> ><?php echo $comp->post_title; ?></option>

          <?php endforeach; ?>

        </select>

    </div>

<?php

}


/********************

Add Date Meta Box To Teams Achievements

********************/

function sh_add_team_achievements_data_meta() {


    add_meta_box( "videos_team_data","Team" , "sh_team_achievements_data_callback", array('team_achievement'), "side" );

}

add_action( 'add_meta_boxes', 'sh_add_team_achievements_data_meta' );



function sh_team_achievements_data_callback( $object, $box ) { 


    $sh_teams = get_post_meta( $object->ID, 'sh_teams', true );

?>

    <div class="form-group">

        <label for="sh_teams"><?php _e('Team :','egybasket'); ?></label>

        <select name="sh_teams[]" id="sh_teams" multiple="true">

          <option>Choose</option>

          <?php $teams = sh_get_teams(); ?>

          <?php foreach ($teams as $team)  : ?>

          <option value="<?php echo $team->ID; ?>" <?php if( in_array($team->ID, $sh_teams) ) echo "selected"; ?> ><?php echo $team->post_title; ?></option>

          <?php endforeach; ?>

        </select>

    </div>

<?php

}



/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_custom_meta', 10, 2 );

function sh_save_custom_meta($post_id){

    

    if( isset($_POST['sh_code']) ){

        update_post_meta($post_id, 'sh_code', $_POST['sh_code']);

    }

    else

        delete_post_meta($post_id,'sh_code');



    if( isset($_POST['sh_degree']) ){

        update_post_meta($post_id, 'sh_degree', $_POST['sh_degree']);

    }

    else

        delete_post_meta($post_id,'sh_degree');



    if( isset($_POST['sh_branch']) ){

        update_post_meta($post_id, 'sh_branch', $_POST['sh_branch']);

    }

    else

        delete_post_meta($post_id,'sh_branch');



    if( isset($_POST['sh_video_link']) ){

        update_post_meta($post_id, 'sh_video_link', $_POST['sh_video_link']);

    }

    else

        delete_post_meta($post_id,'sh_video_link');

 if( isset($_POST['sh_youtube_link']) ){

        update_post_meta($post_id, 'sh_youtube_link', $_POST['sh_youtube_link']);

    }

    else

        delete_post_meta($post_id,'sh_youtube_link');
        

    if( isset($_POST['sh_form_link']) ){

        update_post_meta($post_id, 'sh_form_link', $_POST['sh_form_link']);

    }

    else

        delete_post_meta($post_id,'sh_form_link');



    if( isset($_POST['sh_calender_id']) ){

        update_post_meta($post_id, 'sh_calender_id', $_POST['sh_calender_id']);

    }

    else

        delete_post_meta($post_id,'sh_calender_id');



    if( isset($_POST['sh_scorers_shortcode']) ){

        update_post_meta($post_id, 'sh_scorers_shortcode', $_POST['sh_scorers_shortcode']);

    }

    else

        delete_post_meta($post_id,'sh_calender_id');



    if( isset($_POST['sh_table_link']) ){

        update_post_meta($post_id, 'sh_table_link', $_POST['sh_table_link']);

    }

    else

        delete_post_meta($post_id,'sh_table_link');

    

    if( isset($_POST['sh_champion_cup']) ){

        update_post_meta($post_id, 'sh_champion_cup', $_POST['sh_champion_cup']);

    }

    else

        delete_post_meta($post_id,'sh_champion_cup');



    if( isset($_POST['sh_comps']) ){

        update_post_meta($post_id, 'sh_comps', $_POST['sh_comps']);

    }

    else

        delete_post_meta($post_id,'sh_comps');



    if( isset($_POST['sh_teams']) ){

        update_post_meta($post_id, 'sh_teams', $_POST['sh_teams']);

    }

    else

        delete_post_meta($post_id,'sh_teams');

}


/********************

Add Date Meta Box To Managers

********************/

function sh_add_managers_meta() {

    add_meta_box( "managers_cpt_data","Manager Type" , "sh_manager_type_data_callback", array('manager'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_managers_meta' );



/* Display the post meta box. */

function sh_manager_type_data_callback( $object, $box ) { 

    $showmanager = get_post_meta( $object->ID, 'sh_second_sec', true );

?>


    <div class="form-group">

        <label >Second Section : (If yes check this)</label>

        <input type="checkbox"  name="sh_second_sec" value="1" <?= $showmanager == '1' ?'checked' : ''; ?> >

    </div>


<?php

}



/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_manager_meta', 10, 2 );

function sh_save_manager_meta($post_id){


    if( isset($_POST['sh_second_sec']) ){

        update_post_meta($post_id, 'sh_second_sec', $_POST['sh_second_sec']);

    }

    else

        delete_post_meta($post_id,'sh_second_sec');

}





add_filter( 'rwmb_meta_boxes', 'sh_add_many_imgs_to_album' );

function sh_add_many_imgs_to_album( $meta_boxes ) {

    $meta_boxes[] = array(

        'title'      => __( 'Album Images', 'textdomain' ),

        'post_types' => array('egyalbum'),

        'fields'     => array(

            array(

                'name' => esc_html__( 'Images Upload'),

                'id'   => "thumbnail_id",

                'type' => 'image_advanced',

            ),

        ),

    );



    return $meta_boxes;

}







/********************

Add Date Meta Box To Teams  

********************/

function sh_add_teams_data_meta() {

    add_meta_box( "teams_data","Extra Data" , "sh_teams_data_callback", array('sp_team'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_teams_data_meta' );



/* Display the post meta box. */

function sh_teams_data_callback( $object, $box ) { 



    $club_about = get_post_meta( $object->ID, 'sh_club_about', true );

    $club_name = esc_attr( get_post_meta( $object->ID, 'sh_club_fullname', true ) );

    $club_establish = esc_attr( get_post_meta( $object->ID, 'sh_club_establish', true ) );

    $club_title = esc_attr( get_post_meta( $object->ID, 'sh_club_title', true ) );

    $club_head = esc_attr( get_post_meta( $object->ID, 'sh_club_head', true ) );

    $club_fb = esc_attr( get_post_meta( $object->ID, 'sh_club_fb', true ) );

    $club_tw = esc_attr( get_post_meta( $object->ID, 'sh_club_tw', true ) );

    $club_go = esc_attr( get_post_meta( $object->ID, 'sh_club_go', true ) );

    $club_in = esc_attr( get_post_meta( $object->ID, 'sh_club_in', true ) );

    $club_matches = esc_attr( get_post_meta( $object->ID, 'sh_club_matches_short', true ) );

    $club_champions = esc_attr( get_post_meta( $object->ID, 'sh_championship', true ) );

?>

    <div class="form-group">

        <label for="club-about"><strong><?php _e('About Club :','egybasket'); ?></strong></label><br>

        <?php wp_editor( $club_about, 'club-about',  array('textarea_rows'=>5,'textarea_name'=> 'sh_club_about', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'club-about','class'=>'form-control',) );  ?>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Full Name :','egybasket'); ?></label>

        <input type="text"  name="sh_club_fullname" class="form-control full-width" value="<?php echo $club_name; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Established On : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_establish" class="form-control full-width" value="<?php echo $club_establish; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Title : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_title" class="form-control full-width" value="<?php echo $club_title; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Head : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_head" class="form-control full-width" value="<?php echo $club_head; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Facebook Url : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_fb" class="form-control full-width" value="<?php echo $club_fb; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Twitter Url : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_tw" class="form-control full-width" value="<?php echo $club_tw; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club G+ Url : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_go" class="form-control full-width" value="<?php echo $club_go; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Instagram Url : ','egybasket'); ?></label>

        <input type="text"  name="sh_club_in" class="form-control full-width" value="<?php echo $club_in; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Matches Shortcode: ','egybasket'); ?></label>

        <input type="text"  name="sh_club_matches_short" class="form-control full-width" value="<?php echo $club_matches; ?>"><br>

    </div>

    <div class="form-group">

        <label ><?php _e('Club Championships: ','egybasket'); ?></label>

        <input type="text"  name="sh_championship" class="form-control full-width" value="<?php echo $club_champions; ?>"><br>

    </div>

<?php

}



/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_team_meta', 10, 2 );

function sh_save_team_meta($post_id){

    

    if( isset($_POST['sh_club_about']) ){

        update_post_meta($post_id, 'sh_club_about', stripcslashes($_POST['sh_club_about']));

    }

    else

        delete_post_meta($post_id,'sh_club_about');



    if( isset($_POST['sh_club_fullname']) ){

        update_post_meta($post_id, 'sh_club_fullname', $_POST['sh_club_fullname']);

    }

    else

        delete_post_meta($post_id,'sh_club_fullname');



    if( isset($_POST['sh_club_establish']) ){

        update_post_meta($post_id, 'sh_club_establish', $_POST['sh_club_establish']);

    }

    else

        delete_post_meta($post_id,'sh_club_establish');



    if( isset($_POST['sh_club_title']) ){

        update_post_meta($post_id, 'sh_club_title', $_POST['sh_club_title']);

    }

    else

        delete_post_meta($post_id,'sh_club_title');





    if( isset($_POST['sh_club_head']) ){

        update_post_meta($post_id, 'sh_club_head', $_POST['sh_club_head']);

    }

    else

        delete_post_meta($post_id,'sh_club_head');



    if( isset($_POST['sh_club_fb']) ){

        update_post_meta($post_id, 'sh_club_fb', $_POST['sh_club_fb']);

    }

    else

        delete_post_meta($post_id,'sh_club_fb');



    if( isset($_POST['sh_club_tw']) ){

        update_post_meta($post_id, 'sh_club_tw', $_POST['sh_club_tw']);

    }

    else

        delete_post_meta($post_id,'sh_club_tw');



    if( isset($_POST['sh_club_go']) ){

        update_post_meta($post_id, 'sh_club_go', $_POST['sh_club_go']);

    }

    else

        delete_post_meta($post_id,'sh_club_go');



    if( isset($_POST['sh_club_in']) ){

        update_post_meta($post_id, 'sh_club_in', $_POST['sh_club_in']);

    }

    else

        delete_post_meta($post_id,'sh_club_in');



    if( isset($_POST['sh_club_matches_short']) ){

        update_post_meta($post_id, 'sh_club_matches_short', $_POST['sh_club_matches_short']);

    }

    else

        delete_post_meta($post_id,'sh_club_matches_short');



    if( isset($_POST['sh_championship']) ){

        update_post_meta($post_id, 'sh_championship', $_POST['sh_championship']);

    }

    else

        delete_post_meta($post_id,'sh_championship');

}


/********************

Add Date Meta Box To matches  

********************/

function sh_add_matches_data_meta() {

    add_meta_box( "matches_data","Extra Data" , "sh_matches_data_callback", array('sp_event'), "side" );

}

add_action( 'add_meta_boxes', 'sh_add_matches_data_meta' );



/* Display the post meta box. */

function sh_matches_data_callback( $object, $box ) { 



    $match_time = get_post_meta( $object->ID, 'sh_match_time', true );

?>

    <div class="form-group">

        <label for="match-time"><strong><?php _e('Match Time :','egybasket'); ?></strong></label><br>

        <input type="time" id="match-time" name="sh_match_time" class="form-control full-width" value="<?php echo $match_time; ?>" required><br>

    </div>


<?php

}



/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_match_meta', 10, 2 );

function sh_save_match_meta($post_id){

    
    if($_POST['post_type'] === 'egyvideo') {
        if( isset($_POST['sh_homepage']) ){
            update_post_meta($post_id, 'sh_video_in_homepage', 1);
        }
        else
            delete_post_meta($post_id,'sh_video_in_homepage');
    }
    if($_POST['post_type'] === 'egyvideo') {
        if( isset($_POST['match_status']) ){
            update_post_meta($post_id, 'match_status', $_POST['match_status']);
        }
        if( isset($_POST['match_notes']) ){
            update_post_meta($post_id, 'match_notes', $_POST['match_notes']);
        }
        if( isset($_POST['match_report']) ){
            update_post_meta($post_id, 'match_report', $_POST['match_report']);
        }
    }

}

function delete_match_from_ref ($match_id) {
    global $wpdb;
    $sql = "DELETE FROM wp_referee_match WHERE match_id = {$match_id}";
    $wpdb->query($sql);
}
add_action('delete_post', 'delete_match_from_ref');


add_action( 'save_post', 'sh_send_referee_notify_on_update_match_details', 1, 3 );

function sh_send_referee_notify_on_update_match_details($match_id,$post,$update){

    if( ($post->post_type != 'sp_event') || (!$update) ){
        return;
    }

    if( isset($_POST['sh_match_time']) ){
        
        $match_old_time = get_post_meta($match_id,'sh_match_time',true);
        if($match_old_time != $_POST['sh_match_time']){
            global $wpdb;
            $table_name = $wpdb->prefix . "referee_match";  
            $sh_values = implode(',', array_map('intval',  [0,1]));
            $records = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT  match_id , ref_id FROM {$table_name} WHERE match_id = %d AND status IN ($sh_values) AND type = '1' ",$match_id));
            if(count($records) > 0){
               foreach ($records as $record) {
                    $ref_id = $record->ref_id;
                    $to = get_user_meta($ref_id , 'fcm_token', true );
                    $match = get_the_title( $match_id);
                    $body = 'نود إخباركم أنه تم تغيير وقت ' . $match . ' الموافق يوم ' . $_POST['sp_day'] . ' لتكون فى تمام الساعة ' . $_POST['sh_match_time'];
                    $response = $wpdb->insert($table_name,array(
                    'ref_id'      => $ref_id ,
                    'match_id'    => $match_id  ,
                    'date'        => date('Y/m/d'),
                    'type'        => '2',
                    'msg'         => $body
                    ));    
                    if($response == 1){
                        $newdata = $wpdb->get_results($wpdb->prepare("SELECT id FROM {$table_name} WHERE match_id = %d AND ref_id = %d AND status = '0' AND type = '2' ORDER By id DESC",$match_id,$ref_id));
                        sendPushNotification($to ,$match ,$body ,['notification_type' => 'refree_update' , 'notification_id' => $newdata[0]->id]);
                    }
                }
            }

        }

        update_post_meta($match_id, 'sh_match_time', stripcslashes($_POST['sh_match_time']));
    }else{
        delete_post_meta($match_id,'sh_match_time');
    }

    if( isset($_POST['sp_day']) ){
        $match_old_day = get_post_meta($match_id,'sp_day',true);
        if($match_old_day != $_POST['sp_day']){
            global $wpdb;
            $table_name = $wpdb->prefix . "referee_match";  
            $sh_values = implode(',', array_map('intval',  [0,1]));
            $records = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT  match_id , ref_id FROM {$table_name} WHERE match_id = %d AND status IN ($sh_values) AND type = '1' ",$match_id));
            if(count($records) > 0){
               foreach ($records as $record) {
                    $ref_id = $record->ref_id;
                    $to = get_user_meta($ref_id , 'fcm_token', true );
                    $date = get_post_meta( $match_id, 'sp_day',false);
                    $match = get_the_title( $match_id);
                    $body = 'نود إخباركم أنه تم تغيير يوم ' . $match . ' لتصبح فى يوم الموافق  ' . $_POST['sp_day'] . ' فى تمام الساعه ' . $_POST['sh_match_time'];
                    $response = $wpdb->insert($table_name,array(
                    'ref_id'      => $ref_id ,
                    'match_id'    => $match_id  ,
                    'date'        => date('Y/m/d'),
                    'type'        => '2',
                    'msg'         => $body
                    ));    
                    if($response == 1){
                        $newdata = $wpdb->get_results($wpdb->prepare("SELECT id FROM {$table_name} WHERE match_id = %d AND ref_id = %d AND status = '0' AND type = '2' ORDER By id DESC",$match_id,$ref_id));
                        sendPushNotification($to ,$match ,$body ,['notification_type' => 'refree_update' , 'notification_id' => $newdata[0]->id]);
                    }
                }
            }

        }

        update_post_meta($match_id, 'sh_match_time', stripcslashes($_POST['sh_match_time']));
    }else{
        delete_post_meta($match_id,'sp_day');
    }
}


add_action('pre_post_update', 'sh_send_referee_notify_on_update_match_court');

function sh_send_referee_notify_on_update_match_court($match_id) {

    if( isset($_POST['tax_input']['sp_venue']) ){

        $venue_id = $_POST['tax_input']['sp_venue'][1];
        $old_venue_id = get_the_terms($match_id,'sp_venue')[0]->term_id;        

        if($venue_id != $old_venue_id){

            global $wpdb;
            $table_name = $wpdb->prefix . "referee_match";  
            $sh_values = implode(',', array_map('intval',  [0,1]));
            $records = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT  match_id , ref_id FROM {$table_name} WHERE match_id = %d AND status IN ($sh_values) AND type = '1' ",$match_id));
            if(count($records) > 0){
               foreach ($records as $record) {
                    $ref_id = $record->ref_id;
                    $to = get_user_meta($ref_id , 'fcm_token', true );
                    $date = get_post_meta( $match_id, 'sp_day',false);
                    $match = get_the_title( $match_id);
                    $body = 'نود إخباركم أنه تم تغيير إستاد ' . $match . ' المقامة فى يوم الموافق  ' . $_POST['sp_day'] . ' فى تمام الساعه ' . $_POST['sh_match_time'] . ' ليصبح فى   '. get_term_by('id',$venue_id,'sp_venue')->name ;                    
                    $response = $wpdb->insert($table_name,array(
                    'ref_id'      => $ref_id ,
                    'match_id'    => $match_id  ,
                    'date'        => date('Y/m/d'),
                    'type'        => '2',
                    'msg'         => $body
                    ));    
                    if($response == 1){
                        $newdata = $wpdb->get_results($wpdb->prepare("SELECT id FROM {$table_name} WHERE match_id = %d AND ref_id = %d AND status = '0' AND type = '2' ORDER By id DESC",$match_id,$ref_id));
                        sendPushNotification($to ,$match ,$body ,['notification_type' => 'refree_update' , 'notification_id' => $newdata[0]->id]);
                    }
                }
            }

        }
    }
}