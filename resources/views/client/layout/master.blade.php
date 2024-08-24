<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/client/image/favicon.png" rel="icon" />
    <title>مارکت شاپ - قالب HTML فروشگاهی</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/stylesheet-rtl.css" />
    <link rel="stylesheet" type="text/css" href="/client/css/responsive-rtl.css" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
    <style>
        .like{
            color: red;
        }
    </style>
    @yield('link')
    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                                <li class="email"><a href="/client/mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>
                                <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                                    <div class="dropdown-menu custom_block">
                                        <ul>
                                            <li>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td><img alt="" src="/client/image/banner/cms-block.jpg"></td>
                                                        <td><img alt="" src="/client/image/banner/responsive.jpg"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>بلاک های محتوا</h4></td>
                                                        <td><h4>قالب واکنش گرا</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><a class="btn btn-default btn-sm" href="/client/#">ادامه مطلب</a></strong></td>
                                                        <td><strong><a class="btn btn-default btn-sm" href="/client/#">ادامه مطلب</a></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @auth()
                                    <li><a href={{route('client.likes.index')}}>لیست علاقه مندی (<span id="like-count">{{auth()->user()->likes()->count()}}</span>)</a></li>
                                @endauth
                                <li><a href="/client/checkout.html">تسویه حساب</a></li>
                            </ul>
                        </div>
                        <div id="language" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="/client/image/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i class="fa fa-caret-down"></i></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="/client/image/flags/gb.png" alt="انگلیسی" title="انگلیسی" /> انگلیسی</button>
                                </li>
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="/client/image/flags/ar.png" alt="عربی" title="عربی" /> عربی</button>
                                </li>
                            </ul>
                        </div>
                        <div id="currency" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> تومان <i class="fa fa-caret-down"></i></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                                </li>
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                                </li>
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ USD</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="top-links" class="nav pull-right flip">
                        <ul>
                            @auth()

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        حساب کاربری
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="">پروفایل</a><br>
                                        <a class="dropdown-item" href="#">
                                            <form action="{{route('client.logout')}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn-warning" value="خروج ار حساب کاربری" >
                                            </form>
                                        </a>
                                    </div>
                                </div>

                            @else
                                <li><a href="{{route('client.register')}}">ورود/ثبت نام</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                        <div id="logo"><a href="/client/index.html"><img class="img-responsive" src="/client/image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
                    </div>
                    <!-- Logo End -->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
                                <span class="cart-icon pull-left flip"></span>
                                <span id="cart-total"><span id="total_item">{{\App\Models\cart::TotalItem()}}</span> آیتم - <span id="total_amount">{{\App\Models\cart::TotalAmount()}}</span> تومان</span></button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <table class="table" >
                                            <tbody id="table52">
                                            @foreach(\App\Models\cart::GetCartItems() as $item)
                                                @php
                                                    $product = $item['product'];
                                                    $quantity = $item['quantity']
                                                 @endphp
                                                <tr id="table32-{{$product->id}}">
                                                    <td class="text-center"><a href="{{route('client.product.show' ,$product)}}"><img class="img-thumbnail" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="{{str_replace('public','/storage',$product->image)}}" width="100"></a></td>
                                                    <td class="text-left"><a href="/client/product.html">{{$product->name}}</a></td>
                                                    <td class="text-right" ><span id="quantity-{{$product->id}}"> X {{$quantity}}</span> </td>
                                                    <td class="text-right">{{number_format($product->cost_with_discount)}} تومان</td>
                                                    <td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCard({{$product->id}})" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>جمع کل</strong></td>
                                                    <td class="text-right" ><span id="total_amount1">{{\App\Models\cart::TotalAmount()}} تومان</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                    <td class="text-right" ><span id="total_amount2">{{\App\Models\cart::TotalAmount()}} تومان</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="{{route('client.carts.index')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="{{route('client.orders.create')}}" class="btn btn-primary"><i class="fa fa-share"></i> تسویه حساب</a></p>
                                        </div>
                                    </li>
                                </ul>

                        </div>
                    </div>
                    <!-- Mini Cart End-->
                    <!-- جستجو Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                        <div id="search" class="input-group">
                            <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
                            <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- جستجو End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main آقایانu Start-->
        @include('client.layout.menu')
        <!-- Main آقایانu End-->
    </div>
    @yield('content')
    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row">
                    <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h5>اطلاعات تماس</h5>
                        <ul>
                            <li class="address"><i class="fa fa-map-marker"></i>میدان تایمز، شماره 77، نیویورک</li>
                            <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                            <li class="email"><i class="fa fa-envelope"></i>برقراری ارتباط از طریق <a href="/client/contact-us.html">تماس با ما</a>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>اطلاعات</h5>
                        <ul>
                            <li><a href="/client/about-us.html">درباره ما</a></li>
                            <li><a href="/client/about-us.html">اطلاعات ارسال</a></li>
                            <li><a href="/client/about-us.html">حریم خصوصی</a></li>
                            <li><a href="/client/about-us.html">شرایط و قوانین</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>خدمات مشتریان</h5>
                        <ul>
                            <li><a href="/client/contact-us.html">تماس با ما</a></li>
                            <li><a href="/client/#">بازگشت</a></li>
                            <li><a href="/client/sitemap.html">نقشه سایت</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>امکانات جانبی</h5>
                        <ul>
                            <li><a href="/client/#">برند ها</a></li>
                            <li><a href="/client/#">کارت هدیه</a></li>
                            <li><a href="/client/#">بازاریابی</a></li>
                            <li><a href="/client/#">ویژه ها</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>حساب من</h5>
                        <ul>
                            <li><a href="/client/#">حساب کاربری</a></li>
                            <li><a href="/client/#">تاریخچه سفارشات</a></li>
                            <li><a href="/client/#">لیست علاقه مندی</a></li>
                            <li><a href="/client/#">خبرنامه</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fpart-second">
            <div class="container">
                <div id="powered" class="clearfix">
                    <div class="powered_text pull-left flip">
                        <p>کپی رایت © 2016 فروشگاه شما | پارسی سازی و ویرایش توسط <a href="http://www.20script.ir" target="_blank">بیست اسکریپت</a></p>
                    </div>
                    <div class="social pull-right flip"> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
                </div>
                <div class="bottom-row">
                    <div class="custom-text text-center">
                        <p>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                    <div class="payments_types"> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_paypal.png" alt="paypal" title="PayPal"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_american.png" alt="american-express" title="American Express"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_2checkout.png" alt="2checkout" title="2checkout"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_maestro.png" alt="maestro" title="Maestro"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_discover.png" alt="discover" title="Discover"></a> <a href="/client/#" target="_blank"> <img data-toggle="tooltip" src="/client/image/payment/payment_mastercard.png" alt="mastercard" title="MasterCard"></a> </div>
                </div>
            </div>
        </div>
        <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="/client/javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
    </footer>
    <!--Footer End-->
    <!-- Facebook Side Block Start -->
    <div id="facebook" class="fb-left sort-order-1">
        <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
        <div class="fb-page" data-href="/client/https://www.facebook.com/harnishdesign/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/harnishdesign/"><a href="https://www.facebook.com/harnishdesign/">هارنیش دیزاین</a></blockquote>
            </div>
        </div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    </div>
    <!-- Facebook Side Block End -->
    <!-- Twitter Side Block Start -->
    <div id="twitter_footer" class="twit-left sort-order-2">
        <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
        <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">توییت های @</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="/client/p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!-- Twitter Side Block End -->
    <!-- Video Side Block Start -->
    <div id="video_box" class="vb-left sort-order-3">
        <div id="video_box_icon"><i class="fa fa-play"></i></div>
        <p>
            <iframe allowfullscreen="" src="https://www.youtube.com/embed/SZEflIVnhH8" height="315" width="560"></iframe>
        </p>
    </div>
    <!-- Video Side Block End -->
    <!-- Custom Side Block Start -->
    <div id="custom_side_block" class="custom_side_block_left sort-order-4">
        <div class="custom_side_block_icon"> <i class="fa fa-chevron-right"></i> </div>
        <table>
            <tbody>
            <tr>
                <td><h2>بلاک های محتوا</h2></td>
            </tr>
            <tr>
                <td><img alt="" src="/client/image/banner/cms-block.jpg"></td>
            </tr>
            <tr>
                <td>میتوانید محتوای دلخواه خود را به این بخش اضافه کنید.</td>
            </tr>
            <tr>
                <td><strong><a href="/client/#">ادامه مطلب</a></strong></td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Custom Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/client/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/client/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/client/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client/js/custom.js"></script>
<script>
    function like(product)
    {
         $.ajax
         (
             {
             data: {_token: "{{csrf_token()}}"},
             type: 'post',
             url: '/products/' + product + '/likes',

                 success: function (data)
                 {
                     var i = $('#like-'+product + '>.fa-heart')

                     if (i.hasClass('like'))
                     {
                         i.removeClass('like')
                     }
                     else
                     {
                         i.addClass('like')
                     }
                     $('#like-count').text(data.like_count)

                 }
             }

         )
    }
</script>

<script>
    function addToCard(productID)
    {

        var quantity = 1

        if ($('#input-quantity').length)
        {
            quantity = $('#input-quantity').val()
        }



        $.ajax
        ({
            type: 'post',

            url: '/carts',

            data:{
                _token: "{{csrf_token()}}",

                productID: productID,

                quantity: quantity

            },
            success : function (data)
            {

                var quantity1=  data.cart[productID]['quantity']

                $('#total_amount').text(data.cart.total_amount)
                $('#total_item').text(data.cart.total_item)
                $('#total_amount1').text(data.cart.total_amount)
                $('#total_amount2').text(data.cart.total_amount)
                $('#quantity-'+productID).text('X'+quantity1)

                    if (!$('#table32-'+productID).length)
                    {

                        var product = data.cart[productID]['product']
                        var quantity = data.cart[productID]['quantity']

                        $('#table52:last-child').append('<tr id="table32-'+product.id+'">'
                            +'<td class="text-center"><a href="/products/'+product.slug+'"><img class="img-thumbnail" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="'+product.image_path+'" width="100"></a></td>'
                            +'<td class="text-left"><a href="/products/'+product.id+'">'+product.name+'</a></td>'
                            +'<td class="text-right">x '+quantity+'</td>'
                            +'<td class="text-right">'+product.cost_with_discount+' تومان</td>'
                            +'<td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCard('+product.id+')" type="button"><i class="fa fa-times"></i></button></td>'
                            +'</tr>')
                    }

            }

        })
    }

    function removeFromCard(productID) {
        $.ajax({

            url:'/carts',

            type:'delete',

            data:{

                _token:"{{csrf_token()}}",

                productID: productID

            },
            success : function (data)
            {
                $('#table32-'+productID).remove()
                $('#table33-'+productID).remove()
                $('#total_amount').text(data.cart.total_amount)
                $('#total_item').text(data.cart.total_item)
                $('#total_amount1').text(data.cart.total_amount)
                $('#total_amount2').text(data.cart.total_amount)
                $('#mamad_total').text(data.cart.total_amount)

            }
        })
    }
</script>
<script>
    function addToCardIndex(productID)
    {

        var quantity = 1

        if ($('#input-quantity-'+productID).length)
        {
            quantity = $('#input-quantity-'+productID).val()
        }





        $.ajax
        ({
            type: 'post',

            url: '/carts',

            data:{
                _token: "{{csrf_token()}}",

                productID: productID,

                quantity: quantity

            },
            success : function (data)
            {

                var quantity1=  data.cart[productID]['quantity']

                $('#total_amount').text(data.cart.total_amount)
                $('#total_item').text(data.cart.total_item)
                $('#total_amount1').text(data.cart.total_amount)
                $('#total_amount2').text(data.cart.total_amount)
                $('#mamad_total').text(data.cart.total_amount)
                $('#quantity-'+productID).text('X'+quantity1)




                $('#table33-'+productID).remove()

                var product12 = data.cart[productID]['product']
                var quantity12 = data.cart[productID]['quantity']



                $('#cart-body:last-child').append('<tr id="table33-'+product12.id+'">'
                    +'<td  class="text-center"><a href="/products/'+product12.slug+'"><img width="100" src="'+product12.image_path+'" alt="تبلت ایسر" title="تبلت ایسر" class="img-thumbnail" /></a></td>'
                    +'<td class="text-left"><a href="product.html">'+product12.name+'</a><br/>'
                    +'<small>امتیازات خرید: 1000</small>'
                    +'</td>'
                    +'<td class="text-left">'+product12.brand_name+'</td>'
                    +'<td class="text-left"><div class="input-group btn-block quantity">'
                    +'<input id="input-quantity-'+product12.id+'" type="text" name="quantity" value="'+quantity12+'" class="form-control" />'
                    +'<span class="input-group-btn">'
                    +'<button  onclick="addToCardIndex('+product12.id+')" type="submit" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary"><i class="fa fa-refresh"></i></button>'
                    +'<button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="removeFromCard('+product12.id+')"><i class="fa fa-times-circle"></i></button>'
                    +'</span></div>'
                    +'</td>'
                    +'<td class="text-right">'+product12.cost_with_discount+'</td>'
                    +'<td class="text-right">'+product12.cost_with_discount * quantity12+'</td>'
                    +'</tr>')

            }

        })
    }
</script>
@yield('script')
<!-- JS Part End-->
</body>
</html>