@extends('admin.layout.master')

@section('content-head')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>محصولات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">صفحه نخست</a></li>
                        <li class="breadcrumb-item active">محصولات</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">محصولات</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>عکس</th>
                            <th>توضیحات محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>ویژگی ها</th>
                            <th>تخفیف</th>
                            <th>گالری</th>
                            <th>نظرات</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th>{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->cost}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->category->title}}</td>
                                <td><img src="{{str_replace('public','/storage',$product->image)}}" height="100" id="oldImage"  width="100px"></td>
                                <td><textarea disabled>{{$product->description}}</textarea></td>
                                <td></td>
                                <td><a href="{{route('products.properties.index',$product)}}" class="btn btn btn-primary">ویزگی ها</a></td>
                                <td>
                                    @if($product->has_discount)
                                        <label for="discount1">مقدار تخفیف</label>
                                        <span id="discount1" class='btn-success btn btn-sm'>{{$product->discount_percent}}درصد</span>
                                        <form method="post" action="{{route('products.discounts.update',$product)}}">
                                            @csrf
                                            @method('PATCH')
                                            <label for="discount">تغییر تخفیف</label>
                                            <input type="number" max="100" min="0" name="percent" id="discount" value="{{$product->discount_percent}}">
                                            <div class="form-group">
                                                <input type="submit" value="تغییر" class="btn btn-sm btn-primary">
                                            </div>
                                        </form>
                                    @else
                                        <div class="form-group">
                                            <form method="post" action="{{route('products.discounts.store',$product)}}">
                                                @csrf
                                                <span class="bold">تخفیف وجود ندارد </span><br>
                                                <label for="discount" class="bold">ایجاد تخفیف</label>
                                                <input type="number" name="percent" min="1" max="100" id="discount" class="form-group" placeholder="درصد">
                                                <div class="form-group">
                                                    <input type="submit" value="ایجاد" class="btn btn-sm btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                                <th><a href="{{route('products.pictures.index',$product)}}" class="btn btn  btn-warning">گالری</a></th>
                                <td><a href="{{route('products.comments.index',$product)}}" class="btn btn-sm btn-primary">نظرات</a></td>
                                <td><a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-primary">ویرایش</a></td>
                                <td>
                                    <form action="{{route('products.destroy',$product)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="خذف" class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @include('admin.layout.errors')
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>عکس</th>
                            <th>توضیحات محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>ویژگی ها</th>
                            <th>تخفیف</th>
                            <th>گالری</th>
                            <th>نظرات</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection


@section('script')
    <!-- DataTables  & Plugins -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/jszip/jszip.min.js"></script>
    <script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection


