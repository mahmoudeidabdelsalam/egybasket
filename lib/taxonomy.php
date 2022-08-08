<?php 
/************************
** create Custom Taxonomies for egyvideo post type
************************/
add_action( 'init', 'sh_custom_tax', 0 );
function sh_custom_tax() 
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Video Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Categories','egybasket' ),
            'popular_items' => __( 'Popular Categories' ,'egybasket'),
            'all_items' => __( 'All Categories' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Category' ), 
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category' ),
            'separate_items_with_commas' => __( 'Separate Categories with commas' ),
            'add_or_remove_items' => __( 'Add or remove Categories' ),
            'choose_from_most_used' => __( 'Choose from the most used Categories' ),
            'menu_name' => __( 'Categories' ),
          ),
          'tax_name' => 'video_cat',
          'post_types' =>  array('egyvideo'),
          'slug' => 'video-category'          
        ),
        array(
          'labels' => array(
            'name' => _x( 'Department', 'taxonomy general name' ),
            'singular_name' => _x( 'Department', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Departments','egybasket' ),
            'popular_items' => __( 'Popular Departments' ,'egybasket'),
            'all_items' => __( 'All Departments' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Department' ), 
            'update_item' => __( 'Update Department' ),
            'add_new_item' => __( 'Add New Department' ),
            'new_item_name' => __( 'New Department' ),
            'separate_items_with_commas' => __( 'Separate Departments with commas' ),
            'add_or_remove_items' => __( 'Add or remove Departments' ),
            'choose_from_most_used' => __( 'Choose from the most used Departments' ),
            'menu_name' => __( 'Departments' ),
          ),
          'tax_name' => 'department',
          'post_types' =>  array('manager'),
          'slug' => 'department'          
        ),
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}



/* Add Image Upload to faq category Taxonomy */

function add_faq_cat_image_field() {
    ?>
    <div class="form-field">
        <label for="cat_image"><?php _e( 'Category Image:', '' ); ?></label>
        <input type="text" name="cat_image" id="cat_image" >
        <input class="upload_image_button button" id="_add_cat_image" type="button" value="Select/Upload Image" />
        <script>
            jQuery(document).ready(function() {
                jQuery('#_add_cat_image').click(function() {
                    wp.media.editor.send.attachment = function(props, attachment) {
                        jQuery('#cat_image').val(attachment.url);
                    }
                    wp.media.editor.open(this);
                    return false;
                });
            });
        </script>
    </div>
<?php
}
add_action( 'faq_cat_add_form_fields', 'add_faq_cat_image_field', 10, 2 );


function faq_cat_edit_meta_field($term) {
 
    $t_id = $term->term_id; 
    $catimage = get_option( "faq_cat_img_".$t_id ); ?>
    
    <tr class="form-field">
    <th scope="row" valign="top"><label for="_add_cat_image"><?php _e( 'Category Image', 'journey' ); ?></label></th>
        <td>
            <input type="text" name="cat_image" id="cat_image" class="cat-image" value="<?php echo $catimage; ?>">
            <input class="upload_image_button button"  id="_add_cat_image" type="button" value="Select/Upload Image" />
        </td>
    </tr>
    <tr class="form-field">
    <th scope="row" valign="top"></th>
        <td style="height: 150px;">
            <div class="img-wrap">
                <img src="<?php echo $catimage; ?>" id="cat-img">
            </div>
            <script>
            jQuery(document).ready(function() {
                jQuery('#_add_cat_image').click(function() {
                    wp.media.editor.send.attachment = function(props, attachment) {
                        jQuery('#cat-img').attr("src",attachment.url)
                        jQuery('.cat-image').val(attachment.url)
                    }
                    wp.media.editor.open(this);
                    return false;
                });
            });
            </script>
        </td>
    </tr>
<?php
}
add_action( 'faq_cat_edit_form_fields', 'faq_cat_edit_meta_field', 10, 2 );

function save_faq_cat_image( $term_id ) {
    $t_id = $term_id;
    if ( isset( $_POST['cat_image'] ) ) {
        update_option( "faq_cat_img_".$t_id, $_POST['cat_image'] );
    }
}  
add_action( 'edited_faq_cat', 'save_faq_cat_image', 10, 2 );  
add_action( 'create_faq_cat', 'save_faq_cat_image', 10, 2 );



/************************
** create Custom Taxonomies for manager post type
************************/
add_action( 'init', 'sh_managers_tax', 0 );
function sh_managers_tax() 
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Years', 'taxonomy general name' ),
            'singular_name' => _x( 'Year', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Years','egybasket' ),
            'popular_items' => __( 'Popular Years' ,'egybasket'),
            'all_items' => __( 'All Years' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Year' ), 
            'update_item' => __( 'Update Year' ),
            'add_new_item' => __( 'Add New Year' ),
            'new_item_name' => __( 'New Year' ),
            'separate_items_with_commas' => __( 'Separate Years with commas' ),
            'add_or_remove_items' => __( 'Add or remove Years' ),
            'choose_from_most_used' => __( 'Choose from the most used Years' ),
            'menu_name' => __( 'Years' ),
          ),
          'tax_name' => 'manager_year',
          'post_types' =>  array('manager'),
          'slug' => 'manager-year'          
        ),array(
          'labels' => array(
            'name' => _x( 'Branches', 'taxonomy general name' ),
            'singular_name' => _x( 'Branch', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Branches','egybasket' ),
            'popular_items' => __( 'Popular Branches' ,'egybasket'),
            'all_items' => __( 'All Branches' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Branch' ), 
            'update_item' => __( 'Update Branch' ),
            'add_new_item' => __( 'Add New Branch' ),
            'new_item_name' => __( 'New Branch' ),
            'separate_items_with_commas' => __( 'Separate Branches with commas' ),
            'add_or_remove_items' => __( 'Add or remove Branches' ),
            'choose_from_most_used' => __( 'Choose from the most used Branches' ),
            'menu_name' => __( 'Branches' ),
          ),
          'tax_name' => 'manager_branch',
          'post_types' =>  array('manager'),
          'slug' => 'manager-branch'          
        ),
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}

/************************
** create Custom Taxonomies for Achievments post type
************************/
add_action( 'init', 'sh_achievements_tax', 0 );
function sh_achievements_tax() 
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Categories','egybasket' ),
            'popular_items' => __( 'Popular Categories' ,'egybasket'),
            'all_items' => __( 'All Categories' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Category' ), 
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category' ),
            'separate_items_with_commas' => __( 'Separate Categories with commas' ),
            'add_or_remove_items' => __( 'Add or remove Categories' ),
            'choose_from_most_used' => __( 'Choose from the most used Categories' ),
            'menu_name' => __( 'Categories' ),
          ),
          'tax_name' => 'achivement_category',
          'post_types' =>  array('achievement'),
          'slug' => 'achievement-category'          
        ),
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}

/************************
** create Custom Taxonomies for Teams post type
************************/
add_action( 'init', 'sh_teams_tax', 0 );
function sh_teams_tax() 
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Alphabetical letters', 'taxonomy general name' ),
            'singular_name' => _x( 'Alphabetical letter', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search alphabetical letters','egybasket' ),
            'popular_items' => __( 'Popular alphabetical letters' ,'egybasket'),
            'all_items' => __( 'All alphabetical letters' ,'egybasket'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit alphabetical letter' ), 
            'update_item' => __( 'Update alphabetical letter' ),
            'add_new_item' => __( 'Add New alphabetical letter' ),
            'new_item_name' => __( 'New alphabetical letter' ),
            'separate_items_with_commas' => __( 'Separate alphabetical letters with commas' ),
            'add_or_remove_items' => __( 'Add or remove alphabetical letters' ),
            'choose_from_most_used' => __( 'Choose from the most used alphabetical letters' ),
            'menu_name' => __( 'alphabetical letters' ),
          ),
          'tax_name' => 'alphabetical_letters',
          'post_types' =>  array('sp_team'),
          'slug' => 'alphabetical-letters'          
        ),
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}
