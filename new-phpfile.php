<?php
/**
Plugin Name: As  Front-end user registration
Plugin URI: https://www.wordpress.org
Description: front end registration form via Ajax
Version: 0.1
Author: Anurag Singh
Author URI: https://wordpress.org/
License: GPLv2 or later
Text Domain: as-front-end-form
*/



add_action( 'wp_enqueue_scripts', 'add_plugin_scripts' );
function add_plugin_scripts(){
	// Add a stylesheet
	wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ).'assets/css/bootstrap.min.css', false );


	// Add a script file
	wp_enqueue_script( 'as-front-end-form-js', plugin_dir_url( __FILE__ ).'assets/js/as-front-end-form.js', array(), '0.1', true );


	// Set local var for ajax refrence
	wp_localize_script( 'as-front-end-form-js', 'as_form_var',
		array(
			'as_admin_url' => admin_url('admin-ajax.php')
			)
	);

}


function display_registration_form() { ?>

		<div class="container">
		<div class="row">
			<div class="col-lg-12">



                <div class="vb-registration-form">
                  <form class="registraion-form" role="form" id="as-register">

                    <div class="row">
                    	<div class="col-3">
	                		<?php
	                				$usergenderTerms = get_terms( array(
									    'taxonomy' => 'user_gender',
									    'hide_empty' => false,
									) );
							?>
							<fieldset class="form-group">
							    <label for="gender"><?php _e('Gender', ET_DOMAIN) ?></label>
							    <?php foreach ($usergenderTerms as $usergender) { ?>

								    <div class="form-check">
								      <label class="form-check-label">
								        <input type="radio"
								        class="form-check-input"
								        name="gender"
								        id="gender"
								        value="<?php echo $usergender->term_id; ?>"
								        <?php if($usergender->slug == 'male') { echo 'checked';} ?>>
								        <?php echo $usergender->name;?>
								      </label>
								    </div>
							    <?php } ?>
							</fieldset>
	                	</div>
                    	<div class="col-3">
	                        <label for="profile_created_by"><?php _e('I am', ET_DOMAIN) ?></label>
	                        <input type="text" class="form-control" id="profile_created_by" name="profile_created_by" placeholder="<?php _e("A man seeking a spouse", ET_DOMAIN) ?>">
                        </div>
                        <div class="col-3">
	                        <label for="i_live_in"><?php _e('I live in', ET_DOMAIN) ?></label>
	                        <input type="text" class="form-control" id="i_live_in" name="i_live_in" placeholder="<?php _e("I live in", ET_DOMAIN) ?>">
                        </div>
	                    <div class="col-3">
	                        <label for="email"><?php _e('Email address', ET_DOMAIN) ?></label>
                        	<input type="email" class="form-control" id="email" name="email" placeholder="<?php _e("Enter email", ET_DOMAIN) ?>">
	                    </div>
	                </div>

	                <hr>

	                <div class="row">
                    	<div class="col-4">
	                        <label for="nationality"><?php _e('Nationality', ET_DOMAIN) ?></label>
	                       <?php
	                       	// Setup a dropdown for taxo - "user_nationality"
		                       $nationalityAgr = array(
		                       						'taxonomy'			=> 		'user_nationality'
		                       						,'name'				=> 		'nationality'
		                       						,'id'				=> 		'nationality'
		                       						,'class'			=> 		'taxo-dropdown form-control'
		                       						,'show_option_none' => 		__( 'Select Nationality' )
		                       						,'hide_empty'		=> 		False
		                       						);
		                       wp_dropdown_categories( $nationalityAgr );
	                       ?>
                        </div>
                        <div class="col-4">
	                        <label for="fName"><?php _e('First Name', ET_DOMAIN) ?></label>
	                        <input type="text" class="form-control" id="fName" name="fName" placeholder="<?php _e("Enter First Name", ET_DOMAIN) ?>">
                        </div>
	                    <div class="col-4">
	                        <label for="lName"><?php _e('Last Name', ET_DOMAIN) ?></label>
	                        <input type="text" class="form-control" id="lName" name="lName" placeholder="<?php _e("Enter Last Name", ET_DOMAIN) ?>">
	                    </div>
	                </div>

	                <hr>


	                <div class="row">

                    	<div class="col-4">
	                        <label for="user_belongs_to_part"><?php _e('Which part of Kurdistan are you from?', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_residency_location"
							   $userBelongsToAgr = array(
							   						'taxonomy'			=> 		'user_belongs_to_which_part'
							   						,'name'				=> 		'user_belongs_to_part'
							   						,'id'				=> 		'user_belongs_to_part'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Belongs to Which Part' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $userBelongsToAgr );
							?>
                        </div>

                        <div class="col-4">
	                        <label for="region"><?php _e('Region', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_region"
							   $regionAgr = array(
							   						'taxonomy'			=> 		'user_region'
							   						,'name'				=> 		'region'
							   						,'id'				=> 		'region'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Region' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $regionAgr );
							?>
                        </div>

	                    <div class="col-4">
	                        <label for="curr_city"><?php _e('City', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_curr_city"
							   $nationalityAgr = array(
							   						'taxonomy'			=> 		'user_curr_city'
							   						,'name'				=> 		'curr_city'
							   						,'id'				=> 		'curr_city'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select City' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $nationalityAgr );
							?>
	                    </div>
	                </div>

	                <hr>

	                <div class="row">
                    	<div class="col-4">
	                        <label for="dialect"><?php _e('Dialect', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_dialect"
							   $dialectAgr = array(
							   						'taxonomy'			=> 		'user_dialect'
							   						,'name'				=> 		'dialect'
							   						,'id'				=> 		'dialect'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Dialect' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $dialectAgr );
							?>
                        </div>

                        <div class="col-4">
	                        <label for="region"><?php _e('Tribe', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_tribe"
							   $tribeAgr = array(
							   						'taxonomy'			=> 		'user_tribe'
							   						,'name'				=> 		'tribe'
							   						,'id'				=> 		'tribe'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Tribe' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $tribeAgr );
							?>
                        </div>
	                    <div class="col-4">
	                        <label for="age"><?php _e('Age', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_age"
							   $ageAgr = array(
							   						'taxonomy'			=> 		'user_age'
							   						,'name'				=> 		'age'
							   						,'id'				=> 		'age'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Age' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $ageAgr );
							?>
	                    </div>
	                </div>

					<hr>

	                <div class="row">
                    	<div class="col-4">
	                        <label for="country"><?php _e('Residency: Country', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_residency_location"
								$residencyLocationAgr = array(
														'taxonomy'			=> 		'user_residency_location'
														,'name'				=> 		'country'
														,'id'				=> 		'country'
														,'class'			=> 		'taxo-dropdown form-control'
														,'show_option_none' => 		__( 'Select Country' )
														,'hierarchical'		=> 		true
														,'depth'			=> 		1
														,'hide_empty'		=> 		False
														);
								wp_dropdown_categories( $residencyLocationAgr );
							?>
                        </div>

                        <div class="col-4">
	                        <label for="city"><?php _e('Residency: City', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_residency_location"
							   $residencyLocationAgr = array(
							   						'taxonomy'			=> 		'user_residency_location'
							   						,'name'				=> 		'city'
							   						,'id'				=> 		'city'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select City' )
							   						,'child_of'			=> 		$_POST['residency_location']
							   						,'hierarchical'		=> 		true
													,'depth'			=> 		2
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $residencyLocationAgr );
							?>
                        </div>
	                    <div class="col-4">
	                        <label for="relocating_location"><?php _e('Relocating?', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_relocating_location"
							   $relocatingLocationAgr = array(
							   						'taxonomy'			=> 		'user_relocating_location'
							   						,'name'				=> 		'relocating_location'
							   						,'id'				=> 		'relocating_location'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Relocating Location' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $relocatingLocationAgr );
							?>
	                    </div>
	                </div>

					<hr>

	                <div class="row">
                    	<div class="col-4">
	                        <label for="education"><?php _e('Education', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_education"
								$educationAgr = array(
														'taxonomy'			=> 		'user_education'
														,'name'				=> 		'education'
														,'id'				=> 		'education'
														,'class'			=> 		'taxo-dropdown form-control'
														,'show_option_none' => 		__( 'Select Education' )
														,'hide_empty'		=> 		False
														);
								wp_dropdown_categories( $educationAgr );
							?>
                        </div>

                        <div class="col-4">
	                        <label for="employment"><?php _e('Employment', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_employment"
							   $employmentAgr = array(
							   						'taxonomy'			=> 		'user_employment'
							   						,'name'				=> 		'employment'
							   						,'id'				=> 		'employment'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Employment' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $employmentAgr );
							?>
                        </div>
	                    <div class="col-4">
	                        <label for="industry"><?php _e('Industry', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_industry"
							   $industryAgr = array(
							   						'taxonomy'			=> 		'user_industry'
							   						,'name'				=> 		'industry'
							   						,'id'				=> 		'industry'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Industry' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $industryAgr );
							?>
	                    </div>
	                </div>

	                <hr>

	                <div class="row">
                    	<div class="col-4">
	                        <label for="marital_status"><?php _e('Marital Status', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_marital_status"
								$maritalStatusAgr = array(
														'taxonomy'			=> 		'user_marital_status'
														,'name'				=> 		'marital_status'
														,'id'				=> 		'marital_status'
														,'class'			=> 		'taxo-dropdown form-control'
														,'show_option_none' => 		__( 'Select Marital Status' )
														,'hide_empty'		=> 		False
														);
								wp_dropdown_categories( $maritalStatusAgr );
							?>
                        </div>


	                    <div class="col-4">
	                        <label for="polygamy"><?php _e('Polygamy', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_views_on_polygamy"
							   $polygamyAgr = array(
							   						'taxonomy'			=> 		'user_views_on_polygamy'
							   						,'name'				=> 		'polygamy'
							   						,'id'				=> 		'polygamy'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Polygamy' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $polygamyAgr );
							?>
	                    </div>

	                    <div class="col-4">
	                        <label for="choose_as_applied"><?php _e('Choose As Applied', ET_DOMAIN) ?></label>
							<?php
								// Setup a dropdown for taxo - "user_choose_as_applied"
							   $chooseAsAppliedAgr = array(
							   						'taxonomy'			=> 		'user_choose_as_applied'
							   						,'name'				=> 		'choose_as_applied'
							   						,'id'				=> 		'choose_as_applied'
							   						,'class'			=> 		'taxo-dropdown form-control'
							   						,'show_option_none' => 		__( 'Select Choose As Applied' )
							   						,'hide_empty'		=> 		False
							   						);
							   wp_dropdown_categories( $chooseAsAppliedAgr );
							?>
                        </div>

	                </div>

	                <hr>

                    <div class="row">
                    	<div class="col-12">
                    		<div class="form-check">
							    <label class="form-check-label">
							      <input type="checkbox" class="form-check-input" name="terms" id="terms">
							      Please read the <a href="#">Terms and Conditions
							    </label>
							  </div>
                    		<?php wp_nonce_field('as_new_user','vb_new_user_nonce', true, true ); ?>
                    		<input type="submit" class="btn btn-primary btn-sub-create" id="btn-new-user" value="Sign up" />
                    	</div>
                    </div>

                  </form>
                    <div class="indicator" style="display:none;">Please wait...</div>
                    <div class="alert result-message"></div>
                </div>
         </div>

			</div>
		</div>

    <?php
}




/**
 * New User registration
 *
 */
function insert_new_user_in_db() {

  // Verify nonce
  if( !isset( $_POST['uData']['nonce'] ) || !wp_verify_nonce( $_POST['uData']['nonce'], 'as_new_user' ) )
    die( 'Ooops, something went wrong, please try again later.' );


  	// Post values
	$profile_created_by			= 		$_POST['uData']['created_by'];
	$i_live_in         			= 		$_POST['uData']['live_in'];
	$email              		= 		$_POST['uData']['email'];

	$gender 					= 		$_POST['uData']['gender'];

	$nationality       			= 		$_POST['uData']['nationality'];
	$fName             			= 		$_POST['uData']['fname'];
	$lName             			= 		$_POST['uData']['lname'];

	$region                    	=		$_POST['uData']['region'];
	$curr_city                  =		$_POST['uData']['curr_city'];
	$user_belongs_to            =		$_POST['uData']['user_belongs_to'];


	$dialect                   	=		$_POST['uData']['dialect'];
	$tribe                     	=		$_POST['uData']['tribe'];
	$age                       	=		$_POST['uData']['age'];

	$country        			=		$_POST['uData']['country'];
	$city   					=		$_POST['uData']['city'];
	$relocating_location       	=		$_POST['uData']['relocating_location'];

	$education                 	=		$_POST['uData']['education'];
	$employment                	=		$_POST['uData']['employment'];
	$industry                  	=		$_POST['uData']['industry'];

	$marital_status            	=		$_POST['uData']['marital_status'];
	$polygamy                  	=		$_POST['uData']['polygamy'];
	$choose_as_applied         	=		$_POST['uData']['choose_as_applied'];

	//print_r($_POST);


    // $username = $_POST['user'];
    // $password = $_POST['pass'];
    // $email    = $_POST['mail'];
    // $name     = $_POST['name'];
    // $nick     = $_POST['nick'];

    /**
     * IMPORTANT: You should make server side validation here!
     *
     */

    $userdata = array(
        'user_login' 			=> 		$email,
        'user_pass'  			=> 		$password,
        'user_email' 			=> 		$email,
        'first_name' 			=> 		$fName,
        'last_name'				=> 		$lName,
        'role'					=> 		'author',
        //'nickname'   			=> 		$nick,
    );

    //print_r($userdata);

    $user_id = wp_insert_user( $userdata ) ;

    // Return
    if( !is_wp_error($user_id) ) {
       	$response = array();

		// insert user meta data in CPT
        $userData = array(
		  	'post_type'   		=> 		'user_profile',
		  	'post_title'    	=> 		$fName . ' ' . $lName,
		  	'post_status'   	=> 		'publish',
		  	'post_author'   	=> 		$user_id,
		  	// 'tax_input'    		=> 		array(
					// 				       'user_nationality'		=> array('nationality-1')
					// 				    ),
		    'meta_input'   		=> 		array(
									        'profile_created_by' 	=> 	$profile_created_by,
									        'i_live_in' 			=> 	$i_live_in,
									    ),

		  //'post_content'  	=> 		$_POST['post_content'],
		);

		// Insert the post into the database
		$userProfileID = wp_insert_post( $userData );


		wp_set_object_terms( $userProfileID, intval($gender), 'user_gender', False);

		wp_set_object_terms( $userProfileID, intval($nationality), 'user_nationality', False );
		wp_set_object_terms( $userProfileID, intval($user_belongs_to), 'user_belongs_to_which_part', False);
		wp_set_object_terms( $userProfileID, intval($region), 'user_region', False);

		wp_set_object_terms( $userProfileID, intval($curr_city), 'user_curr_city', False );
		wp_set_object_terms( $userProfileID, intval($dialect), 'user_dialect', False);
		wp_set_object_terms( $userProfileID, intval($tribe), 'user_tribe', False);



		wp_set_object_terms( $userProfileID, intval($age), 'user_age', False);

		// Add 'country' & 'city' both at same time


		$country = intval($country);		// convert value to intiger
		$city = intval($city);				// convert value to intiger

		wp_set_object_terms( $userProfileID, array($country, $city), 'user_residency_location');

		wp_set_object_terms( $userProfileID, intval($relocating_location), 'user_relocating_location', False);

		wp_set_object_terms( $userProfileID, intval($education), 'user_education', False);
		wp_set_object_terms( $userProfileID, intval($employment), 'user_employment', False);
		wp_set_object_terms( $userProfileID, intval($industry), 'user_industry', False);

		wp_set_object_terms( $userProfileID, intval($marital_status), 'user_marital_status', False);
		wp_set_object_terms( $userProfileID, intval($polygamy), 'user_views_on_polygamy', False);
		wp_set_object_terms( $userProfileID, intval($choose_as_applied), 'user_choose_as_applied', False);


		// insert user meta data in CPT
        // send_password_to_registered_user($user_id);


		$response['status'] = 1;									// Set response status
		$response['msg'] = "User added successfully";				// Response msg
		$response['userId'] = $user_id;								// User ID
		$response['returnUrl'] = get_author_posts_url($user_id);	// User profile URL

		echo json_encode($response);
        wp_die();

    } else {
        $response['status'] = 0;
		$response['msg'] = $user_id->get_error_message();
		$response['returnUrl'] = home_url();

		echo json_encode($response);
        wp_die();
    }
}

add_action('wp_ajax_insert_new_user_in_db', 'insert_new_user_in_db');
add_action('wp_ajax_nopriv_insert_new_user_in_db', 'insert_new_user_in_db');



function send_password_to_registered_user($userID) {
	// Get User data in Array
	$userArr = get_userdata($userID);

	// Get user password set by wordpress by default
	$randomPass = $userArr->user_pass;


	$to = $userArr->user_email;
	$subject = 'Registration completed successfully - ' . get_bloginfo('name') ;

	$msg = 'Congratulations! You have now successfully registered for <strong>' . get_bloginfo('name') . '</strong><br><br>';
	$msg .= 'Your login Credentials are <br><br>';
	$msg .= '<strong>Login Page Url :</strong> ' .get_bloginfo('url') . '/login <br>';
	$msg .= '<strong>Email :</strong> ' .$to. '<br>';
	$msg .= '<strong>Password :</strong> ' .$randomPass. ' <br>';

	$headers[] = 'From: ' . get_bloginfo('name') . ' <no-reply@neowebservices.co.uk>';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( $to, $subject, $msg, $headers );
}
