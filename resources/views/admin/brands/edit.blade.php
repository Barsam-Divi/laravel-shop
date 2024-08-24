@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تغییرات برند</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">تغییرات برند</li>
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
                <form action="{{route('brands.update',$brand)}}" method="post" enctype ='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$brand->name}}تغییرات برند </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">نام برند</label>
                                <input type="text" name="name" id="inputName" class="form-control" value="{{$brand->name}}">
                            </div>
                            <div class="form-group">
                                <label id="oldImage">عکس فعلی برند</label>
                                <img src="{{str_replace('public','/storage',$brand->image)}}" id="oldImage" width="100px">
                            </div>
                            <div class="form-group">
                                <label for="image">عکس جدید برند</label>
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <input type="submit" name="submit" value="ایجاد" class="btn btn btn-primary">
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
                @include('admin.layout.errors')
            </div>
        </div>
    </section>
@endsection