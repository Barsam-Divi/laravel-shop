@extends('client.layout.master')

@section('content')
    @if(($products->count() > 0))
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title" id="tit">لیست آرزوی من</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                        <td class="text-center">تصویر</td>
                        <td class="text-left">نام محصول</td>
                        <td class="text-left">دسته بندی</td>
                        <td class="text-left">برند</td>
                        <td class="text-right">قیمت واحد</td>
                        <td class="text-right">عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr id="table12-{{$product->id}}">
                            <td class="text-center"><a href="product.html"><img width="100" src={{str_replace('public','/storage',$product->image)}} alt="{{$product->name}}" title="{{$product->name}}" /></a></td>
                            <td class="text-left"><a href="{{route('client.product.show',$product)}}">{{$product->name}}</a></td>
                            <td class="text-left"><a href="">{{$product->category->title}}</a></td>
                            <td class="text-left">{{$product->brand->name}}</td>
                            <td class="text-right"><div class="price">{{number_format($product->cost_with_discount)}}</div></td>
                            <td class="text-right">
                                @auth()
                                    <button type="button" id="button-cart" onclick="addToCard({{$product->id}})" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                @endauth
                                <button id="butt" class="btn btn-danger" title="" data-toggle="" onClick="de({{$product->id}})" data-original-title="حذف"><i class="fa fa-times"></i></button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--Middle Part End -->
    @else
        <h3>هیچ ارزویی وجود ندارد</h3>
    @endif
@endsection

@section('script')
    <script>
        function de(product)
        {
            $.ajax({
                data:{_token: "{{csrf_token()}}"},
                type: 'DELETE',
                url: '/products/' +product+'/likes',
                success: function (data)
                {
                    var table = $('#table12-'+product)

                    table.remove()

                    $('#like-count').text(data.like_count)
                }
            })
        }


    </script>
@endsection