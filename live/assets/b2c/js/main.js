  // ============================jQuery Pagination==================================//

  (function ($) {

      var paginate = {
          startPos: function (pageNumber, perPage) {
              // determine what array position to start from
              // based on current page and # per page
              return pageNumber * perPage;
          },

          getPage: function (items, startPos, perPage) {
              // declare an empty array to hold our page items
              var page = [];

              // only get items after the starting position
              items = items.slice(startPos, items.length);

              // loop remaining items until max per page
              for (var i = 0; i < perPage; i++) {
                  page.push(items[i]);
              }

              return page;
          },

          totalPages: function (items, perPage) {
              // determine total number of pages
              return Math.ceil(items.length / perPage);
          },

          createBtns: function (totalPages, currentPage) {
              // create buttons to manipulate current page
              var pagination = $('<div class="pagination" />');

              // add a "first" button
              pagination.append('<span class="pagination-button">&laquo;</span>');

              // add pages inbetween
              for (var i = 1; i <= totalPages; i++) {
                  // truncate list when too large
                  if (totalPages > 5 && currentPage !== i) {
                      // if on first two pages
                      if (currentPage === 1 || currentPage === 2) {
                          // show first 5 pages
                          if (i > 5) continue;
                          // if on last two pages
                      } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                          // show last 5 pages
                          if (i < totalPages - 4) continue;
                          // otherwise show 5 pages w/ current in middle
                      } else {
                          if (i < currentPage - 2 || i > currentPage + 2) {
                              continue;
                          }
                      }
                  }

                  // markup for page button
                  var pageBtn = $('<span class="pagination-button page-num" />');

                  // add active class for current page
                  if (i == currentPage) {
                      pageBtn.addClass('active');
                  }

                  // set text to the page number
                  pageBtn.text(i);

                  // add button to the container
                  pagination.append(pageBtn);
              }

              // add a "last" button
              pagination.append($('<span class="pagination-button">&raquo;</span>'));

              return pagination;
          },

          createPage: function (items, currentPage, perPage) {
              // remove pagination from the page
              $('.pagination').remove();

              // set context for the items
              var container = items.parent(),
                  // detach items from the page and cast as array
                  items = items.detach().toArray(),
                  // get start position and select items for page
                  startPos = this.startPos(currentPage - 1, perPage),
                  page = this.getPage(items, startPos, perPage);

              // loop items and readd to page
              $.each(page, function () {
                  // prevent empty items that return as Window
                  if (this.window === undefined) {
                      container.append($(this));
                  }
              });

              // prep pagination buttons and add to page
              var totalPages = this.totalPages(items, perPage),
                  pageButtons = this.createBtns(totalPages, currentPage);

              container.after(pageButtons);
          }
      };

      // stuff it all into a jQuery method!
      $.fn.paginate = function (perPage) {
          var items = $(this);

          // default perPage to 5
          if (isNaN(perPage) || perPage === undefined) {
              perPage = 5;
          }

          // don't fire if fewer items than perPage
          if (items.length <= perPage) {
              return true;
          }

          // ensure items stay in the same DOM position
          if (items.length !== items.parent()[0].children.length) {
              items.wrapAll('<div class="pagination-items" />');
          }

          // paginate the items starting at page 1
          paginate.createPage(items, 1, perPage);

          // handle click events on the buttons
          $(document).on('click', '.pagination-button', function (e) {
            
              // get current page from active button
              var currentPage = parseInt($('.pagination-button.active').text(), 10),
                  newPage = currentPage,
                  totalPages = paginate.totalPages(items, perPage),
                  target = $(e.target);

              // get numbered page
              newPage = parseInt(target.text(), 10);
              if (target.text() == '«') newPage = 1;
              if (target.text() == '»') newPage = totalPages;

              // ensure newPage is in available range
              if (newPage > 0 && newPage <= totalPages) {
                  paginate.createPage(items, newPage, perPage);
                ChangeLanguages();
;
              }
          });
      };

  })(jQuery);

  $(document).ready(function () {

      // MODAL
      // $('.trigger').each(function() {
      //     $(this).click(function() {
      //         $(this).next().addClass('open');
      //         return false;
      //     });
      // });
      $('a.btn-close').click(function () {
          $(this).parents('.modal-wrapper').removeClass('open');
      });
      $('a.span-close').click(function () {
          $(this).parents('.modal-wrapper').removeClass('open');
      });

      //ARCODION SHOW BOOKING TIME IN PAGE BOOKING A COACH
      // $('.accordion-thumb').click(function() {
      //     $(this).next(".accordion-panel").slideToggle();
      // });

      $(document).on("click", ".accordion-item", function () {
          // $('.accordion-item').click( function() {
          $(this).children(".accordion__panel--history").slideToggle();
      });

      // $(".weekly_schedule").each(function() {
      //     $(this).click(function() {
      //         //alert(this.name);
      //         var loadUrl = "<?php echo site_url('b2c/student/find_coaches/schedule_detail'); ?>" + "/" + this.value;
      //         //alert(loadUrl);
      //         if (this.value != '') {
      //             // $(".schedule-loading").show();
      //             $(".txt").hide();
      //             $("#result_" + this.value).load(loadUrl, function() {
      //               // $(".schedule-loading").hide();
      //             });
      //         }
      //     })
      // });

      // GRAPH BAR IN STUDY DASHBOARD
      $(".graph__bar__each").each(function () {
          var dataWidth = $(this).data('value') / 125 * 100;
          $(this).css("width", dataWidth + "%");

          if ($(this).data('value') >= 100) {
              $(this).css('background', 'linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%)');
          }
      });

      // burger menu click event
      $('.burger__menu').click(function () {
          $('.menu__bar').toggleClass('clicked');
          if ($('.menu__bar').hasClass('clicked')) {
              $('.mobile__nav').addClass('act');
          } else {
              $('.mobile__nav').removeClass('act');
          }
      });
      // end burger menu click event

      //MENU TAB IN DASHBOARD

      $('ul.tabs li').click(function () {
          var tab_id = $(this).attr('data-tab');

          $('ul.tabs li').removeClass('current');
          $('.tab-content').fadeOut(50);

          $(this).addClass('current');
          $("#" + tab_id).fadeIn(1000).css('display', 'flex');

      })

      $('.tabs div').click(function () {
          var tab_id = $(this).attr('data-tab');

          $('.tabs div').removeClass('current');
          $('.tab-content').fadeOut(300);

          $(this).addClass('current');
          $("#" + tab_id).delay(300).fadeIn(300);

      })

      //DATE TIME PICKER IN BOOKING A COACH
      // $(function() {
      //     $(".calendar").datepicker({
      //         dateFormat: 'dd - MM - yy',
      //         firstDay: 1
      //     });

      //     $(document).on('click', '.date-picker .input', function(e) {
      //         var $me = $(this),
      //             $parent = $me.parents('.date-picker');
      //         $parent.toggleClass('open');
      //     });

      //     $(".calendar").on("change", function() {
      //         var $me = $(this),
      //             $selected = $me.val(),
      //             $parent = $me.parents('.date-picker');
      //         $parent.find('.result').children('span').html($selected);
      //     });
      // });

      //DROPDOWN COUNTRY AND LANGUAGES BOOKING A COACH *placed this inline on each view*
      // (function($, window, document, undefined) {

      //     'use strict';

      //     var $html = $('html');

      //     $html.on('click.ui.dropdown', '.js-dropdown', function(e) {
      //         e.preventDefault();
      //         $(this).toggleClass('is-open');
      //     });

      //     $html.on('click.ui.dropdown', '.js-dropdown [data-dropdown-value]', function(e) {
      //         e.preventDefault();
      //         var $item = $(this);
      //         var $dropdown = $item.parents('.js-dropdown');
      //         $dropdown.find('.js-dropdown__input').val($item.data('dropdown-value'));
      //         $dropdown.find('.js-dropdown__current').text($item.text());
      //     });

      //     $html.on('click.ui.dropdown', function(e) {
      //         var $target = $(e.target);
      //         if (!$target.parents().hasClass('js-dropdown')) {
      //             $('.js-dropdown').removeClass('is-open');
      //         }
      //     });

      // })(jQuery, window, document);


      //SELECTED AND SHOW MENU BOOKING A COACH IN MOBILE

      jQuery(function ($) {
          $('#town').on('change', function () {
              //use toggle for ease of use
              if ($(this).val() === "1") {
                  $(".alt1").show(this.value == 1);
                  $(".alt2").hide();
                  $(".alt3").hide();
                  $(".alt4").hide();
              } else if ($(this).val() === "2") {
                  $(".alt2").show(this.value == 2);
                  $(".alt1").hide();
                  $(".alt3").hide();
                  $(".alt4").hide();
              } else if ($(this).val() === "3") {
                  $(".alt3").show(this.value == 3);
                  $(".alt1").hide();
                  $(".alt2").hide();
                  $(".alt4").hide();
              } else if ($(this).val() === "4") {
                  $(".alt4").show(this.value == 4);
                  $(".alt1").hide();
                  $(".alt2").hide();
                  $(".alt3").hide();
              } else if ($(this).val() === "0") {

                  $(".alt1").hide();
                  $(".alt2").hide();
                  $(".alt3").hide();
                  $(".alt4").hide();
              }
          });
      });

      //RATING COACH  MENU BOOKING A COACH

      /* 1. Visualizing things on Hover - See next part for action on click */
      $('#stars li').on('mouseover', function () {
          var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

          // Now highlight all the stars that's not after the current hovered star
          $(this).parent().children('li.star').each(function (e) {
              if (e < onStar) {
                  $(this).addClass('hover');
              } else {
                  $(this).removeClass('hover');
              }
          });

      }).on('mouseout', function () {
          $(this).parent().children('li.star').each(function (e) {
              $(this).removeClass('hover');
          });
      });


      /* 2. Action to perform on click */
      $('#stars li').on('click', function () {
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

      $('.fa-times').click(function () {
          $('.dashboard__notif').remove();
      });


      // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER. // notification thing
      // var totalNotif = 13;
      //
      // $('#noti__counter')
      //     .css({ opacity: 0 })
      //     .text(totalNotif)              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
      //     .css({ top: '10px', right: '5px' })
      //     .animate({ opacity: 1 }, 500);
      //
      // if (totalNotif == 0) {
      //     $('#noti__counter').hide();
      // };
      //
      // $('#noti__button').click(function () {
      //
      //     // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
      //     $('#notifications').fadeToggle('fast', 'linear', function () {
      //         if ($('#notifications').is(':hidden')) {
      //             $('#noti__button').css('background-color', 'rgb(59, 74, 116)');
      //         }       // CHANGE BACKGROUND COLOR OF THE BUTTON.
      //     });
      //
      //     $('#noti__counter').fadeOut('slow');                 // HIDE THE COUNTER.
      //
      //     return false;
      // });
      //
      // // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
      // $(document).click(function () {
      //     $('#notifications').hide();
      //
      //     // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
      //     if ($('#noti__counter').is(':hidden')) {
      //         // CHANGE BACKGROUND COLOR OF THE BUTTON.
      //         $('#noti__button').css('background-color', '#2E467C');
      //     }
      // });
      //
      // $('#notifications').click(function () {
      //     return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
      // });

      // logout
      $('#logout__button').click(function () {

          // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
          $('#logout__box').fadeToggle('fast', 'linear', function () {
              if ($('#logout__box').is(':hidden')) {
                  $('#logout__button').css('background-color', '#2E467C');
              } // CHANGE BACKGROUND COLOR OF THE BUTTON.
          });

          $('#logout__counter').fadeOut('slow'); // HIDE THE COUNTER.

          return false;
      });

      // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
      $(document).click(function () {
          $('#logout__box').hide();

          // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
          if ($('#logout__counter').is(':hidden')) {
              // CHANGE BACKGROUND COLOR OF THE BUTTON.
              $('#logout__button').css('background-color', '#2E467C');
          }
      });

      $('#logout__box').click(function () {
          return false; // DO NOTHING WHEN CONTAINER IS CLICKED.
      });
  });

  
  