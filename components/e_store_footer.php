<footer>
    <div class="footer-bar store-footer">
        <div class="container">
            <div class="row">
                <div id="storeFooter" class="col d-flex justify-content-between align-content-center storeFooter">
                    <p class="m-0">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a class="highlight-color" href="http://kingdomlifegospel.org" target="_blank">Kingdomlife Gospel Outreach Ministries</a></p>
                    <img src="https://i.imgur.com/ztkTqYc.png" alt="payment gateway" height="30">
                </div><!-- .col-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-bar -->
</footer><!-- .site-footer -->
<script type='text/javascript' src='config.js'></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<!--<script src="https://unpkg.com/swiper/js/swiper.js"></script>-->
<!--<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>-->
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src="js/flickity.pkgd.min.js"></script>
<script type='text/javascript' src="js/audio.js"></script>
<script type='text/javascript' src='js/custom.js'></script>
<script>
    // ************************************************
    // Shopping Cart API
    // ************************************************

    var shoppingCart = (function() {
        // =============================
        // Private methods and propeties
        // =============================
        cart = [];

        // Constructor
        function Item(name, price, count) {
            this.name = name;
            this.price = price;
            this.count = count;
        }

        // Save cart
        function saveCart() {
            sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
        }

        // Load cart
        function loadCart() {
            cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
        }
        if (sessionStorage.getItem("shoppingCart") != null) {
            loadCart();
        }


        // =============================
        // Public methods and propeties
        // =============================
        var obj = {};

        // Add to cart
        obj.addItemToCart = function(name, price, count) {
            for(var item in cart) {
                if(cart[item].name === name) {
                    cart[item].count ++;
                    saveCart();
                    return;
                }
            }
            var item = new Item(name, price, count);
            cart.push(item);
            saveCart();
        };
        // Set count from item
        obj.setCountForItem = function(name, count) {
            for(var i in cart) {
                if (cart[i].name === name) {
                    cart[i].count = count;
                    break;
                }
            }
        };
        // Remove item from cart
        obj.removeItemFromCart = function(name) {
            for(var item in cart) {
                if(cart[item].name === name) {
                    cart[item].count --;
                    if(cart[item].count === 0) {
                        cart.splice(item, 1);
                    }
                    break;
                }
            }
            saveCart();
        };

        // Remove all items from cart
        obj.removeItemFromCartAll = function(name) {
            for(var item in cart) {
                if(cart[item].name === name) {
                    cart.splice(item, 1);
                    break;
                }
            }
            saveCart();
        };

        // Clear cart
        obj.clearCart = function() {
            cart = [];
            saveCart();
        };

        // Count cart
        obj.totalCount = function() {
            var totalCount = 0;
            for(var item in cart) {
                totalCount += cart[item].count;
            }
            return totalCount;
        };

        // Total cart
        obj.totalCart = function() {
            var totalCart = 0;
            for(var item in cart) {
                totalCart += cart[item].price * cart[item].count;
            }
            return Number(totalCart.toFixed(2));
        };

        // List cart
        obj.listCart = function() {
            var cartCopy = [];
            for(i in cart) {
                item = cart[i];
                itemCopy = {};
                for(p in item) {
                    itemCopy[p] = item[p];

                }
                itemCopy.total = Number(item.price * item.count).toFixed(2);
                cartCopy.push(itemCopy)
            }
            return cartCopy;
        };

        // cart : Array
        // Item : Object/Class
        // addItemToCart : Function
        // removeItemFromCart : Function
        // removeItemFromCartAll : Function
        // clearCart : Function
        // countCart : Function
        // totalCart : Function
        // listCart : Function
        // saveCart : Function
        // loadCart : Function
        return obj;
    })();


    // *****************************************
    // Triggers / Events
    // *****************************************
    // Add item

    // $('.add-to-cart').attr("data-name","product");
    let product_name = $('.card-title');
    product_name.text(function(i,value) {
        return value.replace(/\-/g, " ")
    });
    // let product_name = $(".card-title").html();
    // product_name = product_name.split("-").join(" ").toLowerCase();
    console.log(product_name);

    $('.add-to-cart').click(function(event) {
        event.preventDefault();
        var name = $(this).data('name');
        var price = Number($(this).data('price'));
        shoppingCart.addItemToCart(name, price, 1);
        displayCart();
    });

    // Clear items
    $('.clear-cart').click(function() {
        shoppingCart.clearCart();
        displayCart();
    });

    function displayCart() {
        var cartArray = shoppingCart.listCart();
        var output = "";
        for(var i in cartArray) {
            output += "<button class='delete-item btn-danger btn-sm rounded my-lg-2' data-name=" + cartArray[i].name + "><i class='icon_trash'></i>Remove item</button>"
                + "</div>"
                + "<ul class=\"list-group rounded\">"
                + "<li class=\"list-group-item\"><label><strong>Product Name</strong></label><h5 class='small'>" + cartArray[i].name + "</h5></li>"
                + "<hr class='m-0'>"
                + "<li class=\"list-group-item\"><label><strong>Product Amount</strong></label><h5 class='small'>" + cartArray[i].price + "</h5></li>"
                + "<hr class='m-0'>"
                + "<li class=\"list-group-item\"><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
                + "<input name='qty"+i+"' type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
                + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></li>"
                + "<li class=\"list-group-item\">" + cartArray[i].total + "</li>"
                +  "</ul>"
                +  "<input name='product_name"+i+"' type='hidden' value='" + cartArray[i].name + "'>"
                +  "<input name='product_amount"+i+"' type='hidden' value='" + cartArray[i].price + "'>"
                +  "<input name='total_amount' type='hidden' value='" + shoppingCart.totalCart() + "'>";
        }
        $('.show-cart').html(output);
        $('.total-cart').html(shoppingCart.totalCart());
        $('.total-count').html(shoppingCart.totalCount());
    }

    // Delete item button

    $('.show-cart').on("click", ".delete-item", function(event) {
        var name = $(this).data('name');
        shoppingCart.removeItemFromCartAll(name);
        displayCart();
        window.location.assign('?cart=true');
    });


    // -1
    $('.show-cart').on("click", ".minus-item", function(event) {
        var name = $(this).data('name');
        shoppingCart.removeItemFromCart(name);
        displayCart();
        window.location.assign('?cart=true');
    });
    // +1
    $('.show-cart').on("click", ".plus-item", function(event) {
        var name = $(this).data('name');
        shoppingCart.addItemToCart(name);
        displayCart();
    });

    // Item count input
    $('.show-cart').on("change", ".item-count", function(event) {
        var name = $(this).data('name');
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });

    displayCart();

    // for store cart
    function checkCart(x){
        $('a.'+x).html("<i class=\"cart icon_check\"></i> Added to cart");
        window.location.assign('?cart=true');
    }

</script>
<script>
    const pk_key = config.PAYSTACK_PUBLIC_KEY;
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: pk_key,
            email: '<?php echo $email;?>',
            amount: <?php echo $amount;?> * 100,
            firstname: '<?php echo $firstname; ?>',
            lastname: '<?php echo $lastname; ?>',
            phone: '<?php echo $phone; ?>',
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: "Delivery Address",
                        variable_name: "delivery_address",
                        value: "<?php echo $address; ?>"
                    }
                ]
            },
            callback: function(response){
                // var res = response.reference;
                paymentSuccess();
            },
            onClose: function(){
                cancelPayment();
            }
        });
        handler.openIframe();
    }

    function paymentSuccess(){
        const queryString = window.location.search;
        window.location.assign('users/profile'+queryString+'&order=orderSent');
    }
</script>
<script>
    $(document).ready(function() {
        var showChar = 150;
        var ellipsestext = "...";
        var moretext = "Read More";
        var lesstext = "Show less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    $(document).ready(() =>{
        // play audio when click
        $("#bigPlay").click(function () {
            // alert("you click play");
            $(".player-wrap .button > .playpause .pause").removeClass("d-none");
        });

        if(window.matchMedia('(min-width:320px) and (max-width: 768px)').matches)
        {
            $('.storeFooter').removeClass('d-flex');
        }
    });

    function queryParameters () {
        var result = {};
        var params = window.location.search.split(/\?|\&/);
        params.forEach( function(it) {
            if (it) {
                var param = it.split("=");
                result[param[0]] = param[1];
            }
        });
        return result;
    }
    if (queryParameters().checkout === "Success"){
        $('#paybtn')[0].click();
    }
    if (queryParameters().cart === "true"){
        $('button.btn.btn-outline')[0].click();
    }

    if ( ! $("table ul.list-group li").length ){
        $('div#cart-form').addClass('d-none');
        $('button#checkout').hide();
    }else{
        $('div#cart-form').removeClass('d-none');
        $('button#checkout').show();
    }
</script>

</body>
</html>
