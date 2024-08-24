@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>   ایجاد دسته بندی ویژه </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">   ایجاد دسته بندی ویژه </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('featuredCategories.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">   ایجاد دسته بندی ویژه </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputStatus">دسته بندی</label>
                                <select id="inputStatus" name="category" class="form-control custom-select">
                                    <option selected disabled>دسته خود را انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option @if(!empty($featuredCategory) && $category->id == $featuredCategory->id) selected  @endif value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <input type="submit" name="submit" value="ثبت" class="btn btn btn-primary">
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
                @include('admin.layout.errors')
            </div>
        </div>
    </section>
@endsection