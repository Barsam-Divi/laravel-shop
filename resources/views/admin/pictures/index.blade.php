@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> گالری {{$product->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active"> گالری {{$product->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')


    <form action="{{route('products.pictures.store',$product)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="image">اپلودعکس</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="form-group">
            <input type="submit" value="اپلود">
        </div>
    </form>
    <div class="row">
        @foreach($product->pictures as $pictures)
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <img class="card-img-top img-responsive" src="{{str_replace('public','/storage',$pictures->path)}}"
                         alt="{{str_replace('public','/storage',$pictures->path)}}">
                    <div class="card-body">
                        <form action="{{route('products.pictures.destroy',['product'=>$product,'picture' => $pictures])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="خذف" CLASS="btn btn btn-primary btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection