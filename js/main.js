jQuery(document).ready(function($) {

	'use strict';

	/************** Mixitup (Filter Projects) *********************/
    	$('.projects-holder').mixitup({
            effects: ['fade','grayscale'],
            easing: 'snap',
            transitionSpeed: 400
        });

});
/*global $, console*/
$(function () {
  'use strict';
  
  // Start navbar 
  (function () {
    
    
    // Add class active when the user clicks the lis of the menu
    $('.nav .list li').on('click', 'a', function () {
      $(this).parent().addClass('active').siblings().removeClass('active');
    });
    
    
    var openCategories = $('.nav #open-categories'),
        categories = $('.drop-down');
    
    
    // Toggle categories on clicking
    openCategories.on('click', function () {
      $("#" + $(this).data('dropdown')).toggleClass('show');
      // When the user clicks the window if the categories is not the target, close it.
      $(window).on('mouseup', function (e) {
        if ( categories.hasClass('show')
            && ! categories.is(e.target)
            && categories.has(e.target).length === 0
            && ! openCategories.is(e.target) ) {
          categories.removeClass('show');
        }
      });
    });