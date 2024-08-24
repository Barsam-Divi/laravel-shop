@extends('client.layout.master')

@section('content')
    <!--Middle Part Start-->
    <div id="content" class="col-sm-12" >
        <h1 class="title">تسویه حساب</h1>
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده ازکد تخفیف</h4>
                            </div>
                            <div class="panel-body">
                                <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="input-coupon" placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="offer_code">
                                    <span class="input-group-btn">
                          <input type="button" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن">
                          </span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td class="text-center">تصویر</td>
                                            <td class="text-left">نام محصول</td>
                                            <td class="text-left">برند</td>
                                            <td class="text-left">تعداد</td>
                                            <td class="text-right">قیمت واحد</td>
                                            <td class="text-right">کل</td>
                                        </tr>
                                        </thead>
                                        <tbody id="cart-body">
                                        @foreach($items as $item)
                                            @php
                                                $product = $item['product'];
                                                $quantity = $item['quantity']
                                            @endphp
                                            <tr id="table33-{{$product->id}}">
                                                <td  class="text-center"><a href="{{route('client.product.show',$product)}}"><img width="100" src="{{str_replace('public','/storage',$product->image)}}" alt="تبلت ایسر" title="تبلت ایسر" class="img-thumbnail" /></a></td>
                                                <td class="text-left"><a href="product.html">{{$product->name}}</a><br />
                                                    <small>امتیازات خرید: 1000</small>
                                                </td>
                                                <td class="text-left">{{$product->brand->name}}</td>
                                                <td class="text-left"><div class="input-group btn-block quantity">
                                                        <input id="input-quantity-{{$product->id}}" type="text" name="quantity" value="{{$quantity}}"  class="form-control" />
                                                        <span class="input-group-btn">
                                                <button  onclick="addToCardIndex({{$product->id}})" type="submit" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                                    <button  type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="removeFromCard({{$product->id}})"><i class="fa fa-times-circle"></i></button>
                                                    </span></div>
                                                </td>
                                                <td class="text-right">{{number_format($product->cost_with_discount)}}</td>
                                                <td class="text-right">{{number_format($product->cost_with_discount * $quantity)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <span class="text-right" colspan="4"><strong>جمع کل:</strong></span>
                                        <span class="text-right" id="mamad_total">{{$total_amount}} تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('client.orders.store')}}" method="post">
                        @csrf
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-pencil"></i> ادرس خو را وارد کنید</h4>
                                </div>
                                <div class="panel-body">
                                    <textarea rows="4" class="form-control" id="confirm_comment" name="address"></textarea>
                                    <br>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input type="submit" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Middle Part End -->
@endsection