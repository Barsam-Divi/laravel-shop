@extends('client.layout.master')

@section('content')
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">سبد خرید</h1>
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
            </div>
        </div>
        <!--Middle Part End -->
@endsection

@section('script')

@endsection

