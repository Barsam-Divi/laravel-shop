<div class="container">
    <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="home_link" title="خانه" href="{{route('client.home')}}"><span>خانه</span></a></li>
                <li class="mega-menu dropdown"><a>دسته ها</a>
                    <div class="dropdown-menu">
                        @foreach($categories as $category)
                        <div class="column col-lg-2 col-md-3"><a href="client/category.html">{{$category->title}}</a>
                            <div>
                                <ul>
                                    @foreach($category->children as $childcategory)
                                    <li><a href="client/category.html">{{$childcategory->title}} @if($childcategory->children->count() > 0)<span>&rsaquo;</span> @endif</a>
                                        @if($childcategory->children->count() > 0)
                                                <div class="dropdown-menu">
                                                    <ul>
                                                            @foreach($childcategory->children as $subcategory)
                                                            <li><a href="client/category.html">{{$subcategory->title}}</a></li>
                                                            @endforeach
                                                    </ul>
                                                </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <li class="menu_brands dropdown"><a href="client/#">برند ها</a>
                            <div class="dropdown-menu">
                                @foreach($brands as $brand)
                                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                                        <a href="client/#">
                                            <img src="{{str_replace('public','/storage',$brand->image)}}"
                                                 title="{{$brand->name}}" alt="{{str_replace('public','storage',$brand->image)}}"
                                                 width="120px" height="100px"
                                            />
                                        </a>
                                        <a href="client/#">{{$brand->name}}</a>
                                    </div>
                                @endforeach

                            </div>
                        </li>
                        <li class="custom-link"><a href="client/#">لینک های دلخواه</a></li>
                        <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی</a>
                            <div class="dropdown-menu custom_block">
                                <ul>
                                    <li>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td><img alt="" src="client/image/banner/cms-block.jpg"></td>
                                                <td><img alt="" src="client/image/banner/responsive.jpg"></td>
                                                <td><img alt="" src="client/image/banner/cms-block.jpg"></td>
                                            </tr>
                                            <tr>
                                                <td><h4>بلاک های محتوا</h4></td>
                                                <td><h4>قالب واکنش گرا</h4></td>
                                                <td><h4>پشتیبانی ویژه</h4></td>
                                            </tr>
                                            <tr>
                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                            </tr>
                                            <tr>
                                                <td><strong><a class="btn btn-primary btn-sm" href="client/#">ادامه مطلب</a></strong></td>
                                                <td><strong><a class="btn btn-primary btn-sm" href="client/#">ادامه مطلب</a></strong></td>
                                                <td><strong><a class="btn btn-primary btn-sm" href="client/#">ادامه مطلب</a></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown information-link"><a>برگه ها</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="client/login.html">ورود</a></li>
                                    <li><a href="client/register.html">ثبت نام</a></li>
                                    <li><a href="client/category.html">دسته بندی (شبکه/لیست)</a></li>
                                    <li><a href="client/product.html">محصولات</a></li>
                                    <li><a href="client/cart.html">سبد خرید</a></li>
                                    <li><a href="client/checkout.html">تسویه حساب</a></li>
                                    <li><a href="client/compare.html">مقایسه</a></li>
                                    <li><a href="client/wishlist.html">لیست آرزو</a></li>
                                    <li><a href="client/search.html">جستجو</a></li>
                                </ul>
                                <ul>
                                    <li><a href="client/about-us.html">درباره ما</a></li>
                                    <li><a href="client/404.html">404</a></li>
                                    <li><a href="client/elements.html">عناصر</a></li>
                                    <li><a href="client/faq.html">سوالات متداول</a></li>
                                    <li><a href="client/sitemap.html">نقشه سایت</a></li>
                                    <li><a href="client/contact-us.html">تماس با ما</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="contact-link"><a href="client/contact-us.html">تماس با ما</a></li>
                        <li class="custom-link-right"><a href="client/#" target="_blank"> همین حالا بخرید!</a></li>
                    </div>
            </ul>
        </div>
    </nav>
</div>
