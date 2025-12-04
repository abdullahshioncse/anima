/**
 * Anima Theme - Cart Functionality
 * Safe event-driven cart management
 */

(function() {
    'use strict';
    
    // Add to cart function
    function addToCart(productId, quantity) {
        quantity = quantity || 1;
        
        // Use OpenCart's cart object if available
        if (typeof cart !== 'undefined' && cart.add) {
            cart.add(productId, quantity);
        } else {
            // Fallback to AJAX request
            fetch('index.php?route=checkout/cart.add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart display
                    console.log('Product added to cart');
                }
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
            });
        }
    }
    
    // Initialize cart buttons
    function initCartButtons() {
        // Category and home page cart buttons
        document.querySelectorAll('.btn-cart').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                if (productId) {
                    addToCart(productId, 1);
                }
            });
        });
        
        // Product page cart button
        const productCartBtn = document.querySelector('.btn-cart-product');
        if (productCartBtn) {
            productCartBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                const quantityInput = document.getElementById('input-quantity');
                const quantity = quantityInput ? quantityInput.value : 1;
                
                if (productId) {
                    addToCart(productId, quantity);
                }
            });
        }
    }
    
    // Initialize wishlist buttons
    function initWishlistButtons() {
        document.querySelectorAll('.wishlist').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.getAttribute('data-product-id');
                
                if (typeof wishlist !== 'undefined' && wishlist.add) {
                    wishlist.add(productId);
                }
            });
        });
    }
    
    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initCartButtons();
            initWishlistButtons();
        });
    } else {
        initCartButtons();
        initWishlistButtons();
    }
})();
