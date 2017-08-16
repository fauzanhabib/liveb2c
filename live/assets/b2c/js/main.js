$(document).ready(function(){

	//ARCODION SHOW BOOKING TIME IN PAGE BOOKING A COACH

 	$(function() {
 		// (Optional) Active an item if it has the class "is-active"    
 		$(".accordion_book > .accordion-item.is-active").children(".accordion-panel").slideDown();

 		$(".accordion_book > .accordion-item").click(function() {
 			// Cancel the siblings
 			$(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
 			// Toggle the item
 			$(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
 		});
 	});

  	$(".graph__bar__each").each(function() {
    	var dataWidth = $(this).data('value') / 125 * 100;
    	$(this).css("width", dataWidth + "%");
    
    	if ($(this).data('value') >= 100) {
      		$(this).css('background', 'linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%)');
    	}
  	});

	// burger menu click event
	$('.burger_menu').click(function() {
		$('.menu_bar').toggleClass('clicked');
			if($('.menu_bar').hasClass('clicked')) {
				$('.mobile_nav').addClass('act');
			}
			else {
				$('.mobile_nav').removeClass('act');
			}
	});
	// end burger menu click event

	//MENU TAB IN DASHBOARD

 	$('ul.tabs li').click(function() {
 		var tab_id = $(this).attr('data-tab');

 		$('ul.tabs li').removeClass('current');
 		$('.tab-content').fadeOut(300);

 		$(this).addClass('current');
 		$("#" + tab_id).delay(300).fadeIn(300);

 	})

 	//DATE TIME PICKER IN BOOKING A COACH
 	$(function() {
 		$(".calendar").datepicker({
 			dateFormat: 'dd - MM - yy',
 			firstDay: 1
 		});

 		$(document).on('click', '.date-picker .input', function(e) {
 			var $me = $(this),
 				$parent = $me.parents('.date-picker');
 			$parent.toggleClass('open');
 		});


 		$(".calendar").on("change", function() {
 			var $me = $(this),
 				$selected = $me.val(),
 				$parent = $me.parents('.date-picker');
 			$parent.find('.result').children('span').html($selected);
 		});
 	});

 	//DROPDOWN COUNTRY AND LANGUAGES BOOKING A COACH
 	;
 	(function($, window, document, undefined) {

 		'use strict';

 		var $html = $('html');

 		$html.on('click.ui.dropdown', '.js-dropdown', function(e) {
 			e.preventDefault();
 			$(this).toggleClass('is-open');
 		});

 		$html.on('click.ui.dropdown', '.js-dropdown [data-dropdown-value]', function(e) {
 			e.preventDefault();
 			var $item = $(this);
 			var $dropdown = $item.parents('.js-dropdown');
 			$dropdown.find('.js-dropdown__input').val($item.data('dropdown-value'));
 			$dropdown.find('.js-dropdown__current').text($item.text());
 		});

 		$html.on('click.ui.dropdown', function(e) {
 			var $target = $(e.target);
 			if (!$target.parents().hasClass('js-dropdown')) {
 				$('.js-dropdown').removeClass('is-open');
 			}
 		});

 	})(jQuery, window, document);


		//SELECTED AND SHOW MENU BOOKING A COACH IN MOBILE

 	jQuery(function($) {
 		$('#town').on('change', function() {
 			//use toggle for ease of use
 			if ($(this).val() === "1") {
 				$("#alt1").show(this.value == 1);
 				$("#alt2").hide();
 				$("#alt3").hide();
 				$("#alt4").hide();
 			} else if ($(this).val() === "2") {
 				$("#alt2").show(this.value == 2);
 				$("#alt1").hide();
 				$("#alt3").hide();
 				$("#alt4").hide();
 			} else if ($(this).val() === "3") {
 				$("#alt3").show(this.value == 3);
 				$("#alt1").hide();
 				$("#alt2").hide();
 				$("#alt4").hide();
 			} else if ($(this).val() === "4") {
 				$("#alt4").show(this.value == 4);
 				$("#alt1").hide();
 				$("#alt2").hide();
 				$("#alt3").hide();
 			} else if ($(this).val() === "0") {

 				$("#alt1").hide();
 				$("#alt2").hide();
 				$("#alt3").hide();
 				$("#alt4").hide();
 			}
 		});
 	})

 		 //RATING COACH  MENU BOOKING A COACH 

 	/* 1. Visualizing things on Hover - See next part for action on click */
 	$('#stars li').on('mouseover', function() {
 		var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

 		// Now highlight all the stars that's not after the current hovered star
 		$(this).parent().children('li.star').each(function(e) {
 			if (e < onStar) {
 				$(this).addClass('hover');
 			} else {
 				$(this).removeClass('hover');
 			}
 		});

 	}).on('mouseout', function() {
 		$(this).parent().children('li.star').each(function(e) {
 			$(this).removeClass('hover');
 		});
 	});


 	/* 2. Action to perform on click */
 	$('#stars li').on('click', function() {
 		var onStar = parseInt($(this).data('value'), 10); // The star currently selected
 		var stars = $(this).parent().children('li.star');

 		for (i = 0; i < stars.length; i++) {
 			$(stars[i]).removeClass('selected');
 		}

 		for (i = 0; i < onStar; i++) {
 			$(stars[i]).addClass('selected');
 		}

 		// JUST RESPONSE (Not needed)
 		var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
 		var msg = "";
 		if (ratingValue > 1) {
 			msg = " " + ratingValue + " stars.";
 		} else {
 			msg = " " + ratingValue + " stars.";
 		}
 		responseMessage(msg);

 	});

 	function responseMessage(msg) {
 		$('.success-box').fadeIn(200);
 		$('.success-box div.text-message').html("<span>" + msg + "</span>");
 	}
});