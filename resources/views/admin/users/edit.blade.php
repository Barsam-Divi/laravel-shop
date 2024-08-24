@extends('admin.layout.master')

@section('content-head')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$user->name}}تغیرکاربر:</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">{{$user->name}}تغیرکاربر:</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <section class="content">
        <form action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}}تغیرکاربر:</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="بستن">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="userName">اسم کاربر</label>
                                <input type="text" name="name" id="userEmail" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="userEmail">ایمیل کاربر</label>
                                <input type="email" name="email" id="userEmail" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="role"></label>
                                <select name="role_id" class="form-control custom-select">
                                    @foreach($roles as $role)
                                        <option
                                                @if($user->role_id == $role->id)
                                                    selected
                                                @endif

                                                value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="ثبت تغییرات" class="btn btn-success float-right">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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