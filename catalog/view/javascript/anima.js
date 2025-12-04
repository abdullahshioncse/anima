// Anima Theme JavaScript

// Cart functionality
var cart = {
    add: function(product_id, quantity) {
        if (typeof quantity === 'undefined') {
            quantity = 1;
        }
        
        $.ajax({
            url: 'index.php?route=checkout/cart.add',
            type: 'post',
            data: 'product_id=' + product_id + '&quantity=' + quantity,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    alert(json['success']);
                    // Update cart
                    $('#cart-total').html(json['total']);
                }
                
                if (json['error']) {
                    alert(json['error']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    
    remove: function(key) {
        $.ajax({
            url: 'index.php?route=checkout/cart.remove',
            type: 'post',
            data: 'key=' + key,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    $('#cart-total').html(json['total']);
                    window.location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    
    update: function(key, quantity) {
        $.ajax({
            url: 'index.php?route=checkout/cart.edit',
            type: 'post',
            data: 'key=' + key + '&quantity=' + quantity,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    $('#cart-total').html(json['total']);
                    window.location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
};

// Wishlist functionality
var wishlist = {
    add: function(product_id) {
        $.ajax({
            url: 'index.php?route=account/wishlist.add',
            type: 'post',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    alert(json['success']);
                }
                
                if (json['info']) {
                    alert(json['info']);
                }
                
                if (json['error']) {
                    alert(json['error']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    
    remove: function(product_id) {
        $.ajax({
            url: 'index.php?route=account/wishlist.remove',
            type: 'post',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    window.location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
};

// Compare functionality
var compare = {
    add: function(product_id) {
        $.ajax({
            url: 'index.php?route=product/compare.add',
            type: 'post',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function(json) {
                if (json['success']) {
                    alert(json['success']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
};
