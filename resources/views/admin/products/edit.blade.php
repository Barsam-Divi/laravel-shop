@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تغیر محصول</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">تغیر محصول </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$product->name}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus">برند محصول</label>
                                <select id="inputStatus" name="brand_id" class="form-control custom-select">
                                    <option selected disabled>برند محصول را انخال کنید</option>
                                    @foreach($brands as $brand)
                                        <option
                                                @if($brand->id == $product->brand_id)
                                                    selected
                                                @endif

                                                value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus"> دسته بندی محصول</label>
                                <select id="inputStatus" name="category_id" class="form-control custom-select">
                                    <option selected disabled>دسته بندی محصول را انتخاب کنید</option>
                                    @foreach($categories as $category)
                                            <option
                                                    @if($category->id == $product->category_id)
                                                        selected
                                                    @endif
                                                    value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputName">نام محصول</label>
                                <input type="text" name="name" id="inputName" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">قیمت محصول را وارد نمایید (به ریال)</label>
                                <input type="number" name="cost" id="inputClientCompany" class="form-control" value="{{$product->cost}}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputProjectLeader">عکس  فعلی محصول</label>
                                <img src="{{str_replace('public','/storage',$product->image)}}" width="100px">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">عکس محصول </label>
                                <input type="file" name="image" id="inputProjectLeader" class="">
                            </div>
                            <div class="form-group">
                                <label for="summernote">توضیحات محصول</label>
                                <textarea id="summernote" name="description">
                                    {{$product->description}}
                                </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="ثبت تغییرات" class="btn btn-success float-right">
                </div>
            </div>
            @include('admin.layout.errors')
        </form>
    </section>
@endsection
@section('script')
    <script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endsection