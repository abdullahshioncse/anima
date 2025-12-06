/**
 * Anima Theme JavaScript
 * OpenCart 4.1.0.3 Compatible Theme
 * Version: 1.0.0
 */

(function($) {
  'use strict';

  // Mobile Menu Toggle
  function initMobileMenu() {
    var $mobileMenuToggle = $('<button>', {
      class: 'mobile-menu-toggle',
      html: '<i class="fa fa-bars"></i>'
    });

    if ($(window).width() <= 992) {
      $('.header-main .navbar-menu').before($mobileMenuToggle);
      
      $mobileMenuToggle.on('click', function() {
        $('.navbar-menu').slideToggle();
      });
    }
  }

  // Product Carousel/Slider
  function initProductCarousel() {
    $('.products-section').each(function() {
      var $section = $(this);
      var $grid = $section.find('.products-grid');
      var $leftArrow = $section.find('.arrow-left');
      var $rightArrow = $section.find('.arrow-right');
      var currentIndex = 0;
      var itemsPerView = 4;
      
      if ($(window).width() <= 1200) itemsPerView = 3;
      if ($(window).width() <= 992) itemsPerView = 2;
      if ($(window).width() <= 576) itemsPerView = 1;
      
      var totalItems = $grid.find('.product-card').length;
      var maxIndex = Math.max(0, totalItems - itemsPerView);

      function updateCarousel() {
        var offset = -(currentIndex * (100 / itemsPerView));
        $grid.css('transform', 'translateX(' + offset + '%)');
      }

      $leftArrow.on('click', function() {
        currentIndex = Math.max(0, currentIndex - 1);
        updateCarousel();
      });

      $rightArrow.on('click', function() {
        currentIndex = Math.min(maxIndex, currentIndex + 1);
        updateCarousel();
      });
    });
  }

  // Cart Functions
  var cart = {
    add: function(product_id, quantity) {
      quantity = quantity || 1;
      
      $.ajax({
        url: 'index.php?route=checkout/cart.add',
        type: 'post',
        data: {product_id: product_id, quantity: quantity},
        dataType: 'json',
        beforeSend: function() {
          $('button[onclick*="cart.add"]').prop('disabled', true);
        },
        complete: function() {
          $('button[onclick*="cart.add"]').prop('disabled', false);
        },
        success: function(json) {
          if (json['success']) {
            // Update cart total
            $('#cart-total').html(json['total']);
            
            // Show success message
            alert(json['success']);
          }
          
          if (json['error']) {
            alert(json['error']);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    },

    update: function(cart_id, element) {
      var quantity = $(element).closest('.input-group').find('input[name^="quantity"]').val();
      
      $.ajax({
        url: 'index.php?route=checkout/cart.edit',
        type: 'post',
        data: {key: cart_id, quantity: quantity},
        dataType: 'json',
        success: function(json) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    },

    remove: function(cart_id) {
      $.ajax({
        url: 'index.php?route=checkout/cart.remove',
        type: 'post',
        data: {key: cart_id},
        dataType: 'json',
        success: function(json) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  };

  // Wishlist Functions
  var wishlist = {
    add: function(product_id) {
      $.ajax({
        url: 'index.php?route=account/wishlist.add',
        type: 'post',
        data: {product_id: product_id},
        dataType: 'json',
        success: function(json) {
          if (json['success']) {
            $('#wishlist-total').html(json['total']);
            alert(json['success']);
          }
          
          if (json['error']) {
            alert(json['error']);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    },

    remove: function(product_id) {
      $.ajax({
        url: 'index.php?route=account/wishlist.remove',
        type: 'post',
        data: {product_id: product_id},
        dataType: 'json',
        success: function(json) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  };

  // Compare Functions
  var compare = {
    add: function(product_id) {
      $.ajax({
        url: 'index.php?route=product/compare.add',
        type: 'post',
        data: {product_id: product_id},
        dataType: 'json',
        success: function(json) {
          if (json['success']) {
            alert(json['success']);
          }
          
          if (json['error']) {
            alert(json['error']);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    },

    remove: function(product_id) {
      $.ajax({
        url: 'index.php?route=product/compare.remove',
        type: 'post',
        data: {product_id: product_id},
        dataType: 'json',
        success: function(json) {
          location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  };

  // Newsletter Form
  function initNewsletterForm() {
    $('#newsletter-form').on('submit', function(e) {
      e.preventDefault();
      
      var email = $(this).find('input[name="email"]').val();
      
      $.ajax({
        url: 'index.php?route=account/newsletter.save',
        type: 'post',
        data: {newsletter: 1, email: email},
        dataType: 'json',
        success: function(json) {
          if (json['success']) {
            alert('Thank you for subscribing to our newsletter!');
            $('#newsletter-form')[0].reset();
          }
          
          if (json['error']) {
            alert(json['error']);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    });
  }

  // Search Functionality
  function initSearch() {
    $('.search-input').on('keyup', function(e) {
      if (e.keyCode === 13) {
        var search = $(this).val();
        
        if (search) {
          window.location = 'index.php?route=product/search&search=' + encodeURIComponent(search);
        }
      }
    });
  }

  // Product Image Gallery
  function initProductGallery() {
    $('.additional-images a').on('click', function(e) {
      e.preventDefault();
      
      var $mainImage = $('.main-image img');
      var newSrc = $(this).attr('href');
      
      $mainImage.attr('src', newSrc);
      
      $('.additional-images a').removeClass('active');
      $(this).addClass('active');
    });
  }

  // Smooth Scroll
  function initSmoothScroll() {
    $('a[href*="#"]:not([href="#"])').on('click', function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
          location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top - 100
          }, 500);
          return false;
        }
      }
    });
  }

  // Quantity Input
  function initQuantityInputs() {
    $(document).on('click', '.quantity-plus', function() {
      var $input = $(this).siblings('input[name^="quantity"]');
      var value = parseInt($input.val()) || 0;
      $input.val(value + 1);
    });

    $(document).on('click', '.quantity-minus', function() {
      var $input = $(this).siblings('input[name^="quantity"]');
      var value = parseInt($input.val()) || 0;
      if (value > 1) {
        $input.val(value - 1);
      }
    });
  }

  // Category Tab Switching
  function initCategoryTabs() {
    $('.category-tab').on('click', function() {
      var $tab = $(this);
      
      $('.category-tab').removeClass('active');
      $tab.addClass('active');
      
      // In a real implementation, you would load products here
      // based on the selected category
    });
  }

  // Expose to global scope
  window.cart = cart;
  window.wishlist = wishlist;
  window.compare = compare;

  // Initialize on document ready
  $(document).ready(function() {
    initMobileMenu();
    initProductCarousel();
    initNewsletterForm();
    initSearch();
    initProductGallery();
    initSmoothScroll();
    initQuantityInputs();
    initCategoryTabs();
  });

  // Re-initialize on window resize
  $(window).on('resize', function() {
    initMobileMenu();
  });

})(jQuery);
