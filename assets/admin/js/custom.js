/************************************************************************************
 Template Name    : Fofo | FormFolio for Freelancer & Agencies Theme
 Author           : ElseColor
 Version          : 1.0.0
 Created          : 2020
 File Description : Custom js file of the template
 ***********************************************************************************/


$(function() {

    "use strict";

    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    $(function(){
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);
    });

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/
    $(function(){
        $('form').on('submit', function () {
            $(this).find(':submit').attr('disabled', 'true');
            $('.spinner').show();
        });
    });



});