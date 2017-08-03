/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
//
// jQuery(".nav-primary .menu-item").hover(function () {
//    jQuery(this).children('.sub-menu').toggle();
// });

jQuery(".nav-mobile i").click(function(){
   jQuery(".nav-mobile").toggleClass("active");
   jQuery("#menu-mobile-menu").toggleClass("active");
    jQuery(".nav-mobile i").toggleClass("active");
});

jQuery(".menu-search").click(function(){
    jQuery(".menu-search i").toggleClass("fa-search");
    jQuery(".menu-search i").toggleClass("fa-times");
    jQuery(".searchBarContainer").toggleClass('activeSearch');
});

jQuery(".menu-item-type-gs_sim").click(function(){
    jQuery(".menu-item-type-gs_sim i").toggleClass("fa-search");
    jQuery(".menu-item-type-gs_sim i").toggleClass("fa-times");
    jQuery(".searchBarContainer").toggleClass('activeSearch');
});

function runSearch(e) {
    if (e.keyCode === 13) {
        window.location.href = "/search/" + jQuery("#searchNav").val();
        return false;
    }
}

jQuery("#searchButton").click(function(){
    window.location.href = "/search/" + jQuery("#searchNav").val();
});

jQuery( ".nav-primary li").hover(
    function() {
        jQuery(".sub-menu", this).css("display", "block");
    }, function() {
        jQuery(".sub-menu", this).css("display", "none");
    }
);

// jQuery(".nav-primary .menu-item").mouseenter(function(){
//     jQuery(".nav-primary .sub-menu").css("display", "block");
// });
//
// jQuery(".nav-primary .menu-item").mouseout(function(){
//     jQuery(".nav-primary .sub-menu").css("display", "none");
// });

jQuery(".locationCheckbox").click(function(){
   var currentLocationSelected = $(this).val();
   // console.log(currentLocationSelected);
   if (currentLocationSelected === "all-locations"){
       jQuery(".teamMember[data-locations]").show('slow');
   }
   else if (currentLocationSelected === "skokie-location"){
       // jQuery('.teamMember').hide('slow');
       jQuery(".teamMember[data-locations*='location-Loop']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Lakeview']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Skokie']").show('fast');
   }
   else if (currentLocationSelected === "lakeview-location"){
       jQuery(".teamMember[data-locations*='location-Skokie']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Loop']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Lakeview']").show('fast');
   }
   else if (currentLocationSelected === "loop-location"){
       jQuery(".teamMember[data-locations*='location-Skokie']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Lakeview']").hide('fast');
       jQuery(".teamMember[data-locations*='location-Loop']").show('fast');
   }
   else{
       jQuery(".teamMember[data-locations]").show('slow');
   }
});


jQuery('#sortTeamAZ').click(function () {
    jQuery('#sortTeamZA').show();
    jQuery('#sortTeamAZ').hide();
    jQuery( ".teamMember" ).sort(function( a, b ) {
        return jQuery( a ).text() > jQuery( b ).text();
    }).appendTo( ".teamRow" );
});

jQuery('#sortTeamZA').click(function () {
    jQuery('#sortTeamAZ').show();
    jQuery('#sortTeamZA').hide();
    jQuery( ".teamMember" ).sort(function( b, a ) {
        return jQuery( b ).text() > jQuery( a ).text();
    }).appendTo( ".teamRow" );
});
