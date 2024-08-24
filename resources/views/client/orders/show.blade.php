@extends('client.layout.master')

@section('content')
    @if($order->status == 1)
        <p class="success">پرداخت با موفقیت انجام شد</p>
    @elseif($order->status == 0)
        <p class="danger">پرداخت با خطا روبرو شد دوباره تلاش کنید </p>
    @endif
@endsection
