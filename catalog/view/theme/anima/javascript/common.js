/**
 * Anima Theme - Common JavaScript
 * OpenCart 4.x Theme
 */

(function($) {
    'use strict';

    // Initialize on document ready
    $(document).ready(function() {
        initMobileMenu();
        initSearchOverlay();
        initQuantityControls();
        initWishlist();
        initMiniCart();
        initProductGallery();
        initCarousels();
        initTooltips();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        var $menuToggle = $('.menu-toggle');
        var $mobileMenu = $('.mobile-menu');
        var $body = $('body');

        $menuToggle.on('click', function(e) {
            e.preventDefault();
            $mobileMenu.toggleClass('active');
            $body.toggleClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-menu, .menu-toggle').length) {
                $mobileMenu.removeClass('active');
                $body.removeClass('menu-open');
            }
        });
    }

    /**
     * Search Overlay
     */
    function initSearchOverlay() {
        var $searchTrigger = $('.search-trigger, .iconly-sharp-search-1');
        var $searchOverlay = $('.search-overlay');
        var $searchClose = $('.search-close');
        var $searchInput = $('.search-overlay .search-input');

        $searchTrigger.on('click', function(e) {
            e.preventDefault();
            $searchOverlay.addClass('active');
            $searchInput.focus();
        });

        $searchClose.on('click', function() {
            $searchOverlay.removeClass('active');
        });

        // Close on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $searchOverlay.removeClass('active');
            }
        });
    }

    /**
     * Quantity Controls
     */
    function initQuantityControls() {
        $(document).on('click', '.quantity-minus, .vuesaxlinearminus', function() {
            var $input = $(this).closest('.number, .quantity-input').find('input, .number-1');
            var currentVal = parseInt($input.text() || $input.val()) || 1;
            if (currentVal > 1) {
                if ($input.is('input')) {
                    $input.val(currentVal - 1).trigger('change');
                } else {
                    $input.text(currentVal - 1);
                }
            }
        });

        $(document).on('click', '.quantity-plus, .vuesaxlinearadd', function() {
            var $input = $(this).closest('.number, .quantity-input').find('input, .number-1');
            var currentVal = parseInt($input.text() || $input.val()) || 1;
            if ($input.is('input')) {
                $input.val(currentVal + 1).trigger('change');
            } else {
                $input.text(currentVal + 1);
            }
        });
    }

    /**
     * Wishlist Functionality
     */
    function initWishlist() {
        $(document).on('click', '.wishlist-btn, .iconly-sharp-heart', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var productId = $btn.data('product-id');

            if (productId) {
                $.ajax({
                    url: 'index.php?route=account/wishlist.add',
                    type: 'POST',
                    data: { product_id: productId },
                    dataType: 'json',
                    beforeSend: function() {
                        $btn.addClass('loading');
                    },
                    success: function(json) {
                        $btn.removeClass('loading');
                        
                        if (json.success) {
                            $btn.addClass('active');
                            showToast(json.success, 'success');
                        }

                        if (json.redirect) {
                            window.location.href = json.redirect;
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $btn.removeClass('loading');
                        showToast('Error adding to wishlist', 'error');
                    }
                });
            }
        });
    }

    /**
     * Mini Cart
     */
    function initMiniCart() {
        var $cartTrigger = $('.cart-trigger, .iconly-sharp-bag-2');
        var $miniCart = $('.mini-cart');
        var $cartClose = $('.mini-cart-close');

        $cartTrigger.on('click', function(e) {
            e.preventDefault();
            $miniCart.addClass('active');
            loadMiniCart();
        });

        $cartClose.on('click', function() {
            $miniCart.removeClass('active');
        });

        // Close when clicking overlay
        $(document).on('click', '.mini-cart-overlay', function() {
            $miniCart.removeClass('active');
        });
    }

    /**
     * Load Mini Cart Content
     */
    function loadMiniCart() {
        var $cartItems = $('.mini-cart-items');
        
        $.ajax({
            url: 'index.php?route=common/cart.info',
            dataType: 'html',
            beforeSend: function() {
                $cartItems.html('<div class="loading"><div class="spinner"></div></div>');
            },
            success: function(html) {
                $cartItems.html(html);
            }
        });
    }

    /**
     * Add to Cart
     */
    window.addToCart = function(productId, quantity) {
        quantity = quantity || 1;
        
        $.ajax({
            url: 'index.php?route=checkout/cart.add',
            type: 'POST',
            data: { 
                product_id: productId,
                quantity: quantity
            },
            dataType: 'json',
            beforeSend: function() {
                // Show loading state
            },
            success: function(json) {
                if (json.redirect) {
                    window.location.href = json.redirect;
                }

                if (json.success) {
                    showToast(json.success, 'success');
                    
                    // Update cart total
                    $('#cart-total').html(json.total);
                    
                    // Refresh mini cart
                    loadMiniCart();
                }

                if (json.error) {
                    if (json.error.option) {
                        showToast(json.error.option, 'error');
                    } else if (json.error.recurring) {
                        showToast(json.error.recurring, 'error');
                    } else {
                        showToast(json.error, 'error');
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                showToast('Error adding to cart', 'error');
            }
        });
    };

    /**
     * Product Gallery
     */
    function initProductGallery() {
        var $mainImage = $('.product-main-image');
        var $thumbs = $('.product-thumbs img');

        $thumbs.on('click', function() {
            var src = $(this).data('image') || $(this).attr('src');
            $mainImage.attr('src', src);
            $thumbs.removeClass('active');
            $(this).addClass('active');
        });
    }

    /**
     * Carousels/Sliders
     */
    function initCarousels() {
        // Product carousel
        $('.arrows .left, .left').on('click', function() {
            var $carousel = $(this).closest('.you-may-like, .new-in').find('.cards');
            scrollCarousel($carousel, 'left');
        });

        $('.arrows .right, .right').on('click', function() {
            var $carousel = $(this).closest('.you-may-like, .new-in').find('.cards');
            scrollCarousel($carousel, 'right');
        });
    }

    /**
     * Scroll Carousel
     */
    function scrollCarousel($carousel, direction) {
        var scrollAmount = 300;
        var currentScroll = $carousel.scrollLeft();
        
        if (direction === 'left') {
            $carousel.animate({ scrollLeft: currentScroll - scrollAmount }, 300);
        } else {
            $carousel.animate({ scrollLeft: currentScroll + scrollAmount }, 300);
        }
    }

    /**
     * Tooltips
     */
    function initTooltips() {
        $('[data-toggle="tooltip"]').tooltip();
    }

    /**
     * Toast Notifications
     */
    function showToast(message, type) {
        type = type || 'info';
        
        var $container = $('.toast-container');
        if (!$container.length) {
            $container = $('<div class="toast-container"></div>').appendTo('body');
        }

        var $toast = $('<div class="toast toast-' + type + '">' + message + '</div>');
        $container.append($toast);

        setTimeout(function() {
            $toast.fadeOut(function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Expose showToast globally
    window.showToast = showToast;

    /**
     * Remove from Cart
     */
    window.removeFromCart = function(key) {
        $.ajax({
            url: 'index.php?route=checkout/cart.remove',
            type: 'POST',
            data: { key: key },
            dataType: 'json',
            success: function(json) {
                if (json.success) {
                    showToast(json.success, 'success');
                    $('#cart-total').html(json.total);
                    loadMiniCart();
                    
                    // Refresh cart page if we're on it
                    if ($('#shopping-cart').length) {
                        location.reload();
                    }
                }
            }
        });
    };

    /**
     * Update Cart Quantity
     */
    window.updateCartQuantity = function(key, quantity) {
        $.ajax({
            url: 'index.php?route=checkout/cart.edit',
            type: 'POST',
            data: { 
                key: key,
                quantity: quantity
            },
            dataType: 'json',
            success: function(json) {
                if (json.success) {
                    showToast(json.success, 'success');
                    $('#cart-total').html(json.total);
                    loadMiniCart();
                    
                    // Refresh cart page if we're on it
                    if ($('#shopping-cart').length) {
                        location.reload();
                    }
                }
            }
        });
    };

    /**
     * Size Selection
     */
    $(document).on('click', '.size .frame-1, .size .frame-11', function() {
        $(this).siblings().removeClass('selected');
        $(this).addClass('selected');
    });

    /**
     * Color Selection
     */
    $(document).on('click', '.color-option', function() {
        $(this).siblings().removeClass('selected');
        $(this).addClass('selected');
    });

    /**
     * Compare Products
     */
    window.addToCompare = function(productId) {
        $.ajax({
            url: 'index.php?route=product/compare.add',
            type: 'POST',
            data: { product_id: productId },
            dataType: 'json',
            success: function(json) {
                if (json.success) {
                    showToast(json.success, 'success');
                    $('#compare-total').html(json.total);
                }
            }
        });
    };

    /**
     * Newsletter Subscribe
     */
    $(document).on('submit', '.newsletter-form', function(e) {
        e.preventDefault();
        var $form = $(this);
        var email = $form.find('input[type="email"]').val();

        if (email) {
            // Note: OpenCart doesn't have a built-in newsletter subscription
            // This would typically be handled by an extension
            showToast('شكراً للاشتراك في نشرتنا الإخبارية!', 'success');
            $form.find('input[type="email"]').val('');
        }
    });

    /**
     * Smooth Scroll
     */
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 500);
        }
    });

    /**
     * Lazy Load Images
     */
    if ('IntersectionObserver' in window) {
        var lazyImages = document.querySelectorAll('img[data-src]');
        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var image = entry.target;
                    image.src = image.dataset.src;
                    image.removeAttribute('data-src');
                    imageObserver.unobserve(image);
                }
            });
        });

        lazyImages.forEach(function(image) {
            imageObserver.observe(image);
        });
    }

})(jQuery);
