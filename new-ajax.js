jQuery(document).ready(function($) {

  /**
   * When user clicks on button...
   *
   */
  $('#btn-new-user').click( function(event) {

    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }

    if(!$("input[name='terms']").is(":checked")) { // if "terms" checkbox is not checked
        event.preventDefault();
        alert("Please select 'Terms and Conditions'.");
    } else {    // if "terms" checkbox is checked
            // Show 'Please wait' loader to user, so she/he knows something is going on
            $('.indicator').show();

            // If for some reason result field is visible hide it
            $('.result-message').hide();

            // Collect data from inputs
            var reg_nonce           = $('#vb_new_user_nonce').val();

            var profile_created_by      =     $('#profile_created_by').val();
            var i_live_in               =     $('#i_live_in').val();
            var email                   =     $('#email').val();

            var nationality             =     $('#nationality').val();
            var fName                   =     $('#fName').val();
            var lName                   =     $('#lName').val();

            var gender                  =     $('#gender').val();
            var user_belongs_to         =     $('#user_belongs_to_part').val();


            var curr_city                =     $('#curr_city').val();
            var region                  =     $('#region').val();
            var city                    =     $('#city').val();

            var dialect                 =     $('#dialect').val();
            var tribe                   =     $('#tribe').val();
            var age                     =     $('#age').val();

            var country                 =     $('#country').val();
            var city                    =     $('#city').val();
            var relocating_location     =     $('#relocating_location').val();

            var education               =     $('#education').val();
            var employment              =     $('#employment').val();
            var industry                =     $('#industry').val();

            var marital_status          =     $('#marital_status').val();
            var polygamy                =     $('#polygamy').val();
            var choose_as_applied       =     $('#choose_as_applied').val();





            // Data to send
            userData = {
              action                    :     'register_user',
              nonce                     :     reg_nonce,

              created_by                :     profile_created_by,
              live_in                   :     i_live_in,
              email                     :     email,

              gender                    :     gender,
              user_belongs_to           :     user_belongs_to,

              nationality               :     nationality,
              fname                     :     fName,
              lname                     :     lName,

              region                    :     region,
              curr_city                 :     curr_city,

              dialect                   :     dialect,
              tribe                     :     tribe,
              age                       :     age,

              country                   :     country,
              city                      :     city,
              relocating_location       :     relocating_location,

              education                 :     education,
              employment                :     employment,
              industry                  :     industry,

              marital_status            :     marital_status,
              polygamy                  :     polygamy,
              choose_as_applied         :     choose_as_applied,

            };



            post_via_ajax();
            // Do AJAX request
            // $.post( ajax_url, data, function(response) {

            //   // If we have response
            //   //if( response ) {

            //     console.log(ajax_url);
            //     console.log(response);
            //     console.log(data);

            //     // Hide 'Please wait' indicator
            //     $('.indicator').hide();

            //     if( response ) {
            //       // If user is created
            //       $('.result-message').html('Your registration is completed.'); // Add success message to results div
            //       $('.result-message').addClass('alert-success'); // Add class success to results div
            //       $('.result-message').show(); // Show results div

            //       // window.location.href = "http://www.google.com/";


            //     } else {
            //       $('.result-message').html( response ); // If there was an error, display it in results div
            //       $('.result-message').addClass('alert-danger'); // Add class failed to results div
            //       $('.result-message').show(); // Show results div
            //     }
            //  // }
            // });

        }// if "terms" checkbox is checked

      });


    // AJAX > Get City Posts
    function post_via_ajax()
    {
      /**
       * AJAX URL where to send data
       * (from localize_script)
       */
      var ajax_url = as_form_var.as_admin_url;

      $.ajax({
        type: 'POST',
        url: ajax_url,
        dataType: 'json',
        data: {
          action: 'insert_new_user_in_db',
          uData: userData
        },
        beforeSend: function ()
        {
          console.log('sending');
          $('.indicator').show();
        },
        success: function(response)
        {
          // Hide 'Please wait' indicator
          $('.indicator').hide();

          console.log(response);
          console.log(response.status);
          console.log(response.msg);
          console.log('yay');

          var redirectUrl = response.returnUrl;
          var delay = 5000;                          // Set delay time for redirect

          setTimeout(function(){ window.location = redirectUrl; }, delay);
        },
        error: function()
        {
          // Hide 'Please wait' indicator
          $('.indicator').hide();
          console.log('error in response');

        }
      })
    }

});
