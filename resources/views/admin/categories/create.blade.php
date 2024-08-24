@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ایجاد دسته بندی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">ایجاد دسته بندی</li>
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
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">ایجاد دسته بندی</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">نام دسته بندی</label>
                                    <input type="text" name="title" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">دسته مادر</label>
                                    <select id="inputStatus" name="parent_id" class="form-control custom-select">
                                        <option selected disabled>(الزامی نیست)دسته مادر خود را اننخاب کنید</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="properties">گروه مشخصات</label> <br>
                                    @foreach($properties as $property)
                                        <input type="checkbox" name="properties[]" id="properties" value="{{$property->id}}">{{$property->title}}<br>
                                    @endforeach
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