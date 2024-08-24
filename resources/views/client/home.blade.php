@extends('client.layout.master')

@section('content')
    <div id="container">
        <!-- Feature Box Start-->
        <div class="container">
            <div class="custom-feature-box row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_1">
                        <div class="title">ارسال رایگان</div>
                        <p>برای خرید های بیش از 100 هزار تومان</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_2">
                        <div class="title">پس فرستادن رایگان</div>
                        <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_3">
                        <div class="title">کارت هدیه</div>
                        <p>بهترین هدیه برای عزیزان شما</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_4">
                        <div class="title">امتیازات خرید</div>
                        <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Box End-->
        <div class="container">
            <div class="row">
                <!-- Left Part Start-->
                <aside id="column-left" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">دسته ها</h3>
                    <div class="box-category">
                        <ul id="cat_accordion">
                            @foreach($categories as $category)
                                <li><a href="client/category.html">{{$category->title}}</a>
                                    @if($category->has_children)
                                        <span class="down"></span>
                                        @foreach($category->children as $subcategory)
                                            <ul>
                                                <li><a href="client/category.html">{{$subcategory->title}}</a>
                                                    @if($subcategory->has_children)
                                                        <span class="down"></span>
                                                        <ul>
                                                            @foreach($subcategory->children as $childcategory)
                                                                <li><a href="client/category.html">{{$childcategory->title}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <h3 class="subtitle">پرفروش ها</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/apple_cinema_30-50x50.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">تی شرت کتان مردانه</a></h4>
                                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/iphone_1-50x50.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">آیفون 7</a></h4>
                                <p class="price"> 2200000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_1-50x50.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">آیدیا پد یوگا</a></h4>
                                <p class="price"> 900000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/sony_vaio_1-50x50.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">کفش راحتی مردانه</a></h4>
                                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/FinePix-Long-Zoom-Camera-50x50.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">دوربین فاین پیکس</a></h4>
                                <p class="price">122000 تومان</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="subtitle">ویژه</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_pro_1-50x50.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">کتاب آموزش باغبانی</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/samsung_tab_1-50x50.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">تبلت ایسر</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/apple_cinema_30-50x50.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی شرت کتان مردانه</a></h4>
                                <p class="price"> <span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/nikon_d300_1-50x50.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">دوربین دیجیتال حرفه ای</a></h4>
                                <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/nikon_d300_5-50x50.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">محصولات مراقبت از مو</a></h4>
                                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_air_1-50x50.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">لپ تاپ ایلین ور</a></h4>
                                <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <h3 class="subtitle">محتوای سفارشی</h3>
                        <p>این یک بلاک محتواست. هر نوع محتوایی شامل html، نوشته یا تصویر را میتوانید در آن قرار دهید. </p>
                        <p> در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. </p>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    </div>
                    <div class="banner owl-carousel">
                        <div class="item"> <a href="client/#"><img src="client/image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div>
                        <div class="item"> <a href="client/#"><img src="client/image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
                    </div>
                    <h3 class="subtitle">جدیدترین</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/iphone_6-50x50.jpg" alt="کرم مو آقایان" title="کرم مو آقایان" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">کرم مو آقایان</a></h4>
                                <p class="price"> 42300 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/nikon_d300_5-50x50.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">محصولات مراقبت از مو</a></h4>
                                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/nikon_d300_4-50x50.jpg" alt="کرم لخت کننده مو" title="کرم لخت کننده مو" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">کرم لخت کننده مو</a></h4>
                                <p class="price"> 88000 تومان </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_5-50x50.jpg" alt="ژل حمام بانوان" title="ژل حمام بانوان" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">ژل حمام بانوان</a></h4>
                                <p class="price"> <span class="price-new">19500 تومان</span> <span class="price-old">21900 تومان</span> <span class="saving">-4%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_4-50x50.jpg" alt="عطر گوچی" title="عطر گوچی" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">عطر گوچی</a></h4>
                                <p class="price"> 85000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_3-50x50.jpg" alt="رژ لب گارنیر" title="رژ لب گارنیر" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">رژ لب گارنیر</a></h4>
                                <p class="price"> 123000 تومان </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="client/product.html"><img src="client/image/product/macbook_2-50x50.jpg" alt="عطر نینا ریچی" title="عطر نینا ریچی" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="client/product.html">عطر نینا ریچی</a></h4>
                                <p class="price"> 110000 تومان </p>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Left Part End-->
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <!-- Slideshow Start-->
                    <div class="slideshow single-slider owl-carousel">
                        @foreach($sliders as $slider)
                            <div class="item">
                                <a href={{$slider->link}}><img  class="img-responsive" src={{str_replace('public' ,'storage',$slider->image)}} alt="banner"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Slideshow End-->
                    <!-- Banner Start-->
                    <div class="marketshop-banner">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="client/#"><img src="client/image/banner/sample-banner-3-400x200.jpg" alt="بنر نمونه 3" title="بنر نمونه 3" /></a></div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="client/#"><img src="client/image/banner/sample-banner-1-400x200.jpg" alt="بنر نمونه" title="بنر نمونه" /></a></div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="client/#"><img src="client/image/banner/sample-banner-2-400x200.jpg" alt="بنر نمونه 2" title="بنر نمونه 2" /></a></div>
                        </div>
                    </div>
                    <!-- Banner End-->
                    <!-- دسته ها محصولات Slider Start-->

                    <div class="category-module" id="latest_category">
                        <h3 class="subtitle">{{$featuredCategory->title}} <a class="viewall" href="client/category.tpl">نمایش همه</a></h3>
                        <div class="category-module-content">
                            <ul id="sub-cat" class="tabs">
                                @foreach($featuredCategory->children as $ChildCategory)
                                    @if($ChildCategory->children->count() > 0)
                                        @foreach($ChildCategory->children as $subcat)
                                            <li><a href="#tab-cat{{$subcat->id}}">{{$subcat->title}}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#tab-cat{{$ChildCategory->id}}">{{$ChildCategory->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            @foreach($featuredCategory->children as $ChildCategory)
                                @if($ChildCategory->children->count() > 0)
                                    @foreach($ChildCategory->children as $subcat)
                                            <div id="tab-cat{{$subcat->id}}" class="tab_content">
                                                <div class="owl-carousel latest_category_tabs">
                                                    @foreach($subcat->products as $product)
                                                        <div class="product-thumb">
                                                            <div class="image"><a href="{{route('client.product.show',$product)}}"><img src={{str_replace('public','/storage',$product->image)}} alt="{{$product->name}}" title="{{$product->name}}" class="img-responsive" /></a></div>
                                                            <div class="caption">
                                                                <h4><a href="client/product.html">{{$product->name}}</a></h4>
                                                                <p class="price"> <span class="price-new">{{number_format($product->cost_with_discount)}}</span>
                                                                    @if($product->has_discount)
                                                                        <span class="price-old">{{number_format($product->cost)}}</span>
                                                                        <span class="saving">-{{optional($product->discount)->percent}}%</span> </p>
                                                                @endif                                                             </div>
                                                            <div class="button-group">
                                                                @auth()
                                                                    <button type="button" id="button-cart" onclick="addToCard({{$product->id}})" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                                                @else
                                                                    <p>برای افزودن به سبد خرید لطفا وارد حساب کاربری خود شوید</p>
                                                                @endauth
                                                                <div class="add-to-links">
                                                                    @auth()
                                                                        <button id="like-{{$product->id}}" type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="like({{$product->id}})"><i class="fa fa-heart @if(auth()->user()->GetUserLikes($product)) like @endif "></i></button>
                                                                    @endauth
                                                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                    @endforeach
                                @else
                                    <div id="tab-cat{{$ChildCategory->id}}" class="tab_content">
                                        <div class="owl-carousel latest_category_tabs">
                                            @foreach($ChildCategory->products as $product)
                                                <div class="product-thumb">
                                                    <div class="image"><a href="{{route('client.product.show',$product)}}"><img src={{str_replace('public','/storage',$product->image)}} alt="{{$product->name}}" title="{{$product->name}}" class="img-responsive" /></a></div>
                                                    <div class="caption">
                                                        <h4><a href="client/product.html">{{$product->name}}</a></h4>
                                                        <p class="price"> <span class="price-new">{{number_format($product->cost_with_discount)}}</span>
                                                        @if($product->has_discount)
                                                                <span class="price-old">{{number_format($product->cost)}}</span>
                                                                <span class="saving">-{{optional($product->discount)->percent}}%</span> </p>
                                                         @endif
                                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                                    </div>
                                                    <div class="button-group">
                                                        @auth()
                                                            <button type="button" id="button-cart" onclick="addToCard({{$product->id}})" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                                        @else
                                                            <p>برای افزودن به سبد خرید لطفا وارد حساب کاربری خود شوید</p>
                                                        @endauth
                                                        <div class="add-to-links">
                                                            @auth()
                                                                <button id="like-{{$product->id}}" type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick="like({{$product->id}})"><i class="fa fa-heart @if(auth()->user()->GetUserLikes($product)) like @endif "></i></button>
                                                            @endauth
                                                            <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- دسته ها محصولات Slider End-->
                    <!-- Banner Start -->
                    <div class="marketshop-banner">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="client/#"><img src="client/image/banner/sample-banner-4-400x150.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="client/#"><img src="client/image/banner/sample-banner-5-400x150.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
                        </div>
                    </div>
                    <!-- Banner End -->
                    <!-- دسته ها محصولات Slider Start -->
                    @foreach($categories as $category)
                        <h3 class="subtitle">{{$category->title}} - <a class="viewall" href="client/category.html">نمایش همه</a></h3>
                            <div class="owl-carousel latest_category_carousel">
                                @foreach($category->children as $childcategory)
                                    @foreach($childcategory->GetAllSubCategoriesProducts() as $product)
                                        <div class="product-thumb">
                                            <div class="image"><a href="{{route('client.product.show',$product)}}"><img src="{{str_replace('public','/storage',$product->image)}}" alt="{{str_replace('public','/storage',$product->image)}}" title="{{$product->title}}" class="img-responsive" /></a></div>
                                            <div class="caption">
                                                <h4><a href="client/product.html">{{$product->name}}</a></h4>
                                                <p class="price"> <span class="price-new">{{'ریال'.number_format($product->cost_with_discount)}}</span>
                                                    @if($product->has_discount)
                                                        <span class="price-old">{{number_format($product->cost)}}</span>
                                                        <span class="saving">-{{$product->discount_percent}}%</span> </p>
                                                    @endif
                                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                            </div>
                                            <div class="button-group">
                                                @auth()
                                                    <button type="button" id="button-cart" onclick="addToCard({{$product->id}})" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                                @else
                                                    <p>برای افزودن به سبد خرید لطفا وارد حساب کاربری خود شوید</p>
                                                @endauth
                                                <div class="add-to-links">
                                                    @auth()
                                                        <button type="button" class="wishlist" id="like-{{$product->id}}" onClick="like({{$product->id}})"><i class="fa fa-heart @if(auth()->user()->GetUserLikes($product)) like @endif "></i></button>
                                                    @endauth
                                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                    @endforeach

                    <!-- دسته ها محصولات Slider End -->
                    <!-- Brand Logo Carousel Start-->
                    <div id="carousel" class="owl-carousel nxt">
                        @foreach($brands as $brand)
                            <div class="item text-center"> <a href="client/#">
                                    <img src="{{str_replace('public','/storage',$brand->image)}}" alt="{{$brand->name}}" class="img-responsive" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Brand Logo Carousel End -->
                </div>
                <!--Middle Part End-->
            </div>
        </div>
    </div>
@endsection