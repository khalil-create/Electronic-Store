<?php use Carbon\Carbon; ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    


    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!--webfont-->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-3.1.1.min.js')); ?>"></script>
    <!-- //for bootstrap working -->
    <!-- cart -->
    <script src="<?php echo e(asset('js/simpleCart.min.js')); ?>"></script>
    <!-- cart -->
    <link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>" type="text/css" media="screen" />
</head>

<body>
    <!-- header-section-starts -->
    <div class="header">
        <div class="header-top-strip">
            <div class="container">
                <div class="header-top-left">
                    <ul>
                        <li><a href="account.html"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
                        <li><a href="register.html"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity"
                                    class="simpleCart_quantity"> 0 </span>)<img src="images/bag.png" alt="">
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- header-section-ends -->
    <div class="banner-top">
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <h1><a href="index.html"><span>E</span> -Shop</a></h1>
                    </div>
                </div>
                <!--/.navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>NEW IN</h6>
                                            <li><a href="products.html">New In Clothing</a></li>
                                            <li><a href="products.html">New In Bags</a></li>
                                            <li><a href="products.html">New In Shoes</a></li>
                                            <li><a href="products.html">New In Watches</a></li>
                                            <li><a href="products.html">New In Grooming</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>CLOTHING</h6>
                                            <li><a href="products.html">Polos & Tees</a></li>
                                            <li><a href="products.html">Casual Shirts</a></li>
                                            <li><a href="products.html">Casual Trousers</a></li>
                                            <li><a href="products.html">Jeans</a></li>
                                            <li><a href="products.html">Shorts & 3/4th</a></li>
                                            <li><a href="products.html">Formal Shirts</a></li>
                                            <li><a href="products.html">Formal Trousers</a></li>
                                            <li><a href="products.html">Suits & Blazers</a></li>
                                            <li><a href="products.html">Track Wear</a></li>
                                            <li><a href="products.html">Inner Wear</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>WATCHES</h6>
                                            <li><a href="products.html">Analog</a></li>
                                            <li><a href="products.html">Chronograph</a></li>
                                            <li><a href="products.html">Digital</a></li>
                                            <li><a href="products.html">Watch Cases</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">women <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>NEW IN</h6>
                                            <li><a href="products.html">New In Clothing</a></li>
                                            <li><a href="products.html">New In Bags</a></li>
                                            <li><a href="products.html">New In Shoes</a></li>
                                            <li><a href="products.html">New In Watches</a></li>
                                            <li><a href="products.html">New In Beauty</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>CLOTHING</h6>
                                            <li><a href="products.html">Polos & Tees</a></li>
                                            <li><a href="products.html">Casual Shirts</a></li>
                                            <li><a href="products.html">Casual Trousers</a></li>
                                            <li><a href="products.html">Jeans</a></li>
                                            <li><a href="products.html">Shorts & 3/4th</a></li>
                                            <li><a href="products.html">Formal Shirts</a></li>
                                            <li><a href="products.html">Formal Trousers</a></li>
                                            <li><a href="products.html">Suits & Blazers</a></li>
                                            <li><a href="products.html">Track Wear</a></li>
                                            <li><a href="products.html">Inner Wear</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>WATCHES</h6>
                                            <li><a href="products.html">Analog</a></li>
                                            <li><a href="products.html">Chronograph</a></li>
                                            <li><a href="products.html">Digital</a></li>
                                            <li><a href="products.html">Watch Cases</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">kids <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6>NEW IN</h6>
                                            <li><a href="products.html">New In Boys Clothing</a></li>
                                            <li><a href="products.html">New In Girls Clothing</a></li>
                                            <li><a href="products.html">New In Boys Shoes</a></li>
                                            <li><a href="products.html">New In Girls Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6>ACCESSORIES</h6>
                                            <li><a href="products.html">Bags</a></li>
                                            <li><a href="products.html">Watches</a></li>
                                            <li><a href="products.html">Sun Glasses</a></li>
                                            <li><a href="products.html">Jewellery</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="typography.html">TYPO</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
    </div>
    <div class="other-products">
        <div class="container">
            
            <ul id="flexiselDemo3">
                <li>
                    <a href="single.html"><img src="images/l1.jpg" class="img-responsive" alt="" /></a>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="single.html">perfectly simple</a>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$759</span></a></p>
                    </div>
                </li>
                <li>
                    <a href="single.html"><img src="images/l2.jpg" class="img-responsive" alt="" /></a>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="single.html">praising pain</a>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$699</span></a></p>
                    </div>
                </li>
                <li>
                    <a href="single.html"><img src="images/l3.jpg" class="img-responsive" alt="" /></a>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="single.html">Neque porro</a>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
                    </div>
                </li>
                <li>
                    <a href="single.html"><img src="images/l4.jpg" class="img-responsive" alt="" /></a>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="single.html">equal blame</a>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$499</span></a></p>
                    </div>
                </li>
                <li>
                    <a href="single.html"><img src="images/l5.jpg" class="img-responsive" alt="" /></a>
                    <div class="product liked-product simpleCart_shelfItem">
                        <a class="like_name" href="single.html">perfectly simple</a>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">$649</span></a></p>
                    </div>
                </li>
            </ul>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo3").flexisel({
                        visibleItems: 4,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="js/jquery.flexisel.js"></script>
        </div>
    </div>
    
    <!-- content-section-starts-here -->
    <div class="container">
        <div class="main-content">
            
            <div class="products-grid">
                <header>
                    <h3 class="head text-center">Latest Products</h3>
                </header>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p1.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">Sed ut perspiciatis</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$329</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p2.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">great explorer</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$599.8</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p3.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">similique sunt</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$359.6</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p4.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">shrinking </a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$649.99</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p5.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">perfectly simple</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$750</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p6.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">equal blame</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$295.59</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p7.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">Neque porro</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$380</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p8.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">perfectly simple</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$540.6</span></a></p>
                </div>
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="single.html"><img src="images/p9.jpg" alt="" /></a>
                    <div class="mask">
                        <a href="single.html">Quick View</a>
                    </div>
                    <a class="product_name" href="single.html">praising pain</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">$229.5</span></a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- content-section-ends-here -->
    <div class="news-letter">
        <div class="container">
            <div class="join">
                <h6>JOIN OUR MAILING LIST</h6>
                <div class="sub-left-right">
                    <form>
                        <input type="text" value="Enter Your Email Here" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
                        <input type="submit" value="SUBSCRIBE" />
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer_top">
                <div class="span_of_4">
                    <div class="col-md-3 span1_of_4">
                        <h4>Shop</h4>
                        <ul class="f_nav">
                            <li><a href="#">new arrivals</a></li>
                            <li><a href="#">men</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">accessories</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">brands</a></li>
                            <li><a href="#">trends</a></li>
                            <li><a href="#">sale</a></li>
                            <li><a href="#">style videos</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 span1_of_4">
                        <h4>help</h4>
                        <ul class="f_nav">
                            <li><a href="#">frequently asked questions</a></li>
                            <li><a href="#">men</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">accessories</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">brands</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 span1_of_4">
                        <h4>account</h4>
                        <ul class="f_nav">
                            <li><a href="account.html">login</a></li>
                            <li><a href="register.html">create an account</a></li>
                            <li><a href="#">create wishlist</a></li>
                            <li><a href="checkout.html">my shopping bag</a></li>
                            <li><a href="#">brands</a></li>
                            <li><a href="#">create wishlist</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 span1_of_4">
                        <h4>popular</h4>
                        <ul class="f_nav">
                            <li><a href="#">new arrivals</a></li>
                            <li><a href="#">men</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">accessories</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">brands</a></li>
                            <li><a href="#">trends</a></li>
                            <li><a href="#">sale</a></li>
                            <li><a href="#">style videos</a></li>
                            <li><a href="#">login</a></li>
                            <li><a href="#">brands</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="cards text-center">
                <img src="images/cards.jpg" alt="" />
            </div>
            <div class="copyright text-center">
                <p>© 2015 Eshop. All Rights Reserved | Design by <a href="http://w3layouts.com"> W3layouts</a></p>
            </div>
        </div>
    </div>
































    
</body>

</html>
<?php /**PATH E:\Laravel\E-Shop\Blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>