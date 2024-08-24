@extends('client.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
                <form class="form-horizontal" method="post" action="{{route('client.register.sendMail')}}">
                    @csrf
                    <fieldset id="account">
                        <legend>ایمیل شما برای دریافت کد یک بار مصرف</legend>
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email"> <br>
                                <input type="submit" class="btn btn btn-success" value="ثبت">
                            </div>
                        </div>
                    </fieldset>
                </form>
                @include('client.layout.errors')
            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection