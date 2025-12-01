/**
 * Anima Theme - Common JavaScript Functions
 * OpenCart 4.0.1.3 Compatible
 */

// Cart Object - Add/Remove/Update products
var cart = {
    'add': function(product_id, quantity, callback) {
        quantity = typeof(quantity) !== 'undefined' ? quantity : 1;
        
        fetch('index.php?route=checkout/cart.add&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + product_id + '&quantity=' + quantity
        })
        .then(response => response.json())
        .then(json => {
            if (json['redirect']) {
                location = json['redirect'];
            }
            
            if (json['success']) {
                showNotification(json['success'], 'success');
                updateCartCount();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
            
            if (typeof callback === 'function') {
                callback(json);
            }
        })
        .catch(error => {
            console.error('Cart add error:', error);
        });
    },
    
    'update': function(cart_id, quantity) {
        fetch('index.php?route=checkout/cart.edit&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'key=' + cart_id + '&quantity=' + quantity
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
                location.reload();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Cart update error:', error);
        });
    },
    
    'remove': function(cart_id) {
        fetch('index.php?route=checkout/cart.remove&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'key=' + cart_id
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
                location.reload();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Cart remove error:', error);
        });
    }
};

// Wishlist Object - Add/Remove products
var wishlist = {
    'add': function(product_id) {
        fetch('index.php?route=account/wishlist.add&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + product_id
        })
        .then(response => response.json())
        .then(json => {
            if (json['redirect']) {
                location = json['redirect'];
            }
            
            if (json['success']) {
                showNotification(json['success'], 'success');
                updateWishlistCount();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Wishlist add error:', error);
        });
    },
    
    'remove': function(product_id) {
        fetch('index.php?route=account/wishlist.remove&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + product_id
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
                location.reload();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Wishlist remove error:', error);
        });
    }
};

// Compare Object - Add/Remove products
var compare = {
    'add': function(product_id) {
        fetch('index.php?route=product/compare.add&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + product_id
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Compare add error:', error);
        });
    },
    
    'remove': function(product_id) {
        fetch('index.php?route=product/compare.remove&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + product_id
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
                location.reload();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Compare remove error:', error);
        });
    }
};

// Voucher Object
var voucher = {
    'remove': function(key) {
        fetch('index.php?route=checkout/cart.remove&language=' + getLanguageCode(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'key=' + key
        })
        .then(response => response.json())
        .then(json => {
            if (json['success']) {
                showNotification(json['success'], 'success');
                location.reload();
            }
            
            if (json['error']) {
                showNotification(json['error'], 'error');
            }
        })
        .catch(error => {
            console.error('Voucher remove error:', error);
        });
    }
};

// Utility Functions
function getLanguageCode() {
    // Try to get language from URL or meta tag
    var urlParams = new URLSearchParams(window.location.search);
    var lang = urlParams.get('language');
    if (lang) return lang;
    
    // Check HTML lang attribute
    var htmlLang = document.documentElement.lang;
    if (htmlLang) return htmlLang;
    
    // Default
    return 'en-gb';
}

function showNotification(message, type) {
    type = type || 'info';
    
    // Create notification element
    var notification = document.createElement('div');
    notification.className = 'anima-notification anima-notification-' + type;
    notification.innerHTML = '<span class="notification-message">' + message + '</span><button type="button" class="notification-close">&times;</button>';
    
    // Add to page
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(function() {
        notification.classList.add('show');
    }, 10);
    
    // Auto hide after 5 seconds
    setTimeout(function() {
        notification.classList.remove('show');
        setTimeout(function() {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 5000);
    
    // Close button
    notification.querySelector('.notification-close').addEventListener('click', function() {
        notification.classList.remove('show');
        setTimeout(function() {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    });
}

function updateCartCount() {
    fetch('index.php?route=common/cart.info&language=' + getLanguageCode())
    .then(response => response.json())
    .then(json => {
        var cartCounts = document.querySelectorAll('.cart-count');
        cartCounts.forEach(function(el) {
            if (json['total']) {
                el.textContent = json['total'];
                el.style.display = 'inline-block';
            } else {
                el.style.display = 'none';
            }
        });
    })
    .catch(error => {
        console.error('Update cart count error:', error);
    });
}

function updateWishlistCount() {
    fetch('index.php?route=account/wishlist.info&language=' + getLanguageCode())
    .then(response => response.json())
    .then(json => {
        var wishlistCounts = document.querySelectorAll('.wishlist-count');
        wishlistCounts.forEach(function(el) {
            if (json['total']) {
                el.textContent = json['total'];
                el.style.display = 'inline-block';
            } else {
                el.style.display = 'none';
            }
        });
    })
    .catch(error => {
        console.error('Update wishlist count error:', error);
    });
}

// Carousel Functions
function carouselPrev(carouselId) {
    var carousel = document.getElementById(carouselId);
    if (!carousel) return;
    
    var track = carousel.querySelector('.carousel-track');
    var slides = carousel.querySelectorAll('.carousel-slide');
    var currentIndex = parseInt(track.getAttribute('data-current') || 0);
    
    currentIndex = Math.max(0, currentIndex - 1);
    track.setAttribute('data-current', currentIndex);
    
    var slideWidth = slides[0].offsetWidth + 20; // including gap
    track.style.transform = 'translateX(' + (currentIndex * slideWidth) + 'px)';
    
    updateCarouselDots(carousel, currentIndex);
}

function carouselNext(carouselId) {
    var carousel = document.getElementById(carouselId);
    if (!carousel) return;
    
    var track = carousel.querySelector('.carousel-track');
    var slides = carousel.querySelectorAll('.carousel-slide');
    var currentIndex = parseInt(track.getAttribute('data-current') || 0);
    var maxIndex = slides.length - 4; // Show 4 at a time
    
    currentIndex = Math.min(maxIndex, currentIndex + 1);
    track.setAttribute('data-current', currentIndex);
    
    var slideWidth = slides[0].offsetWidth + 20; // including gap
    track.style.transform = 'translateX(-' + (currentIndex * slideWidth) + 'px)';
    
    updateCarouselDots(carousel, currentIndex);
}

function updateCarouselDots(carousel, currentIndex) {
    var dots = carousel.querySelectorAll('.carousel-dot');
    dots.forEach(function(dot, index) {
        if (index === currentIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

// Initialize carousels with autoplay
function initCarousels() {
    document.querySelectorAll('.carousel-track').forEach(function(track) {
        var autoplay = track.getAttribute('data-autoplay') === 'true';
        var interval = parseInt(track.getAttribute('data-interval')) || 5000;
        
        if (autoplay) {
            var carousel = track.closest('.carousel-module');
            if (carousel) {
                setInterval(function() {
                    carouselNext(carousel.id);
                }, interval);
            }
        }
    });
}

// Mobile Navigation
function initMobileNav() {
    var menuToggle = document.getElementById('mobile-menu-toggle');
    var mobileNav = document.getElementById('mobile-nav');
    
    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', function() {
            mobileNav.classList.toggle('open');
            menuToggle.classList.toggle('active');
        });
    }
}

// Search Overlay
function initSearch() {
    var searchToggle = document.getElementById('search-toggle');
    var searchToggleMobile = document.getElementById('search-toggle-mobile');
    var searchOverlay = document.getElementById('search-overlay');
    var searchClose = document.getElementById('search-close');
    var searchInput = document.getElementById('search-input');
    
    function openSearch() {
        if (searchOverlay) {
            searchOverlay.classList.add('open');
            if (searchInput) {
                searchInput.focus();
            }
        }
    }
    
    function closeSearch() {
        if (searchOverlay) {
            searchOverlay.classList.remove('open');
        }
    }
    
    if (searchToggle) {
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            openSearch();
        });
    }
    
    if (searchToggleMobile) {
        searchToggleMobile.addEventListener('click', function(e) {
            e.preventDefault();
            openSearch();
        });
    }
    
    if (searchClose) {
        searchClose.addEventListener('click', closeSearch);
    }
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSearch();
        }
    });
    
    // Close on overlay click
    if (searchOverlay) {
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                closeSearch();
            }
        });
    }
}

// Newsletter Form
function initNewsletter() {
    var newsletterForm = document.getElementById('newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            var email = newsletterForm.querySelector('input[name="email"]').value;
            
            fetch('index.php?route=extension/anima/newsletter.subscribe&language=' + getLanguageCode(), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'email=' + encodeURIComponent(email)
            })
            .then(response => response.json())
            .then(json => {
                if (json['success']) {
                    showNotification(json['success'], 'success');
                    newsletterForm.reset();
                }
                
                if (json['error']) {
                    showNotification(json['error'], 'error');
                }
            })
            .catch(error => {
                console.error('Newsletter subscribe error:', error);
            });
        });
    }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    initCarousels();
    initMobileNav();
    initSearch();
    initNewsletter();
});

// Responsive handling
function handleResize() {
    var isMobile = window.innerWidth < 768;
    
    // Toggle desktop/mobile headers
    var desktopHeader = document.querySelector('.header:not(.header-mobile)');
    var mobileHeader = document.querySelector('.header-mobile');
    
    if (desktopHeader && mobileHeader) {
        if (isMobile) {
            desktopHeader.style.display = 'none';
            mobileHeader.style.display = 'flex';
        } else {
            desktopHeader.style.display = 'flex';
            mobileHeader.style.display = 'none';
        }
    }
}

// Initialize responsive handling
window.addEventListener('resize', handleResize);
window.addEventListener('load', handleResize);
