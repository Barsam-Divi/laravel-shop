@extends('admin.layout.master')

@section('content-head')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ویژگی های {{$product->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">ویژگی های {{$product->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

    <form action="{{route('products.properties.store',$product)}}" method="post">
        @csrf
        @foreach($product->category->propertyGroups as $propertyGroup)
            <div class="row-cols-md-1">
                <h1>{{$propertyGroup->title}}</h1> <br>
                @foreach($propertyGroup->properties as $properties)
                    <h5>{{$properties->definition}}</h5>
                    <input type="text" name="properties[{{$properties->id}}][value]" value="{{$product->GetProductPropertiesValue($properties)}}">
                @endforeach
            </div>
        @endforeach
        <input type="submit" value="ثبت">
    </form>
@endsection


@section('script')

@endsection
