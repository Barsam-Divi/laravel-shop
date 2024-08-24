@extends('client.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>میتوانید با<a href="login.html">شماره همراه خود</a> ورود/ثبت نام کنید</p>
                <form class="form-horizontal" method="post" action="{{route('client.register.verifyOtp',$user)}}">
                    @csrf
                    <fieldset id="account">
                        <legend>{{$user->email}}</legend>
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">کد یک بار مصرف فرستاده شده</label>
                            <div class="col-sm-10">
                                <input type="text" minlength="5" maxlength="5"
                                 min="11111" max="99999" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="otp"> <br>
                                <input type="submit" class="btn btn btn-success" value="تایید">
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