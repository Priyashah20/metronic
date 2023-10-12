@extends('admin.layout.app')
@section('title','customers')
@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    All Products
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('products.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-user"></i>
                            <span>New Product</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable productlist" id="productlist">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#productlist').DataTable( {
            "bDestroy": true,
            order:['0','desc'],
            ajax: "{{ route('products.index') }}",
            //columnDefs:[{target:6,sortable:false }],
            columns: [
                {data:'id',name:'id'},
                {data:'title',name:'title'},
                {data:'category',name:'category'},
                {data:'price',name:'price'},
                {data:'color',name:'color'},
                {data:'quantity',name:'quantity'},
                {data:'status',name:'status'},
                {data:'action',sortable:false,}
            ]
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.delete',function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
          title: "Are you sure you want to delete this customers?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
        }).then((willDelete) => {
            if (willDelete.value) {
                swal("Your products has been deleted!", {
                  icon: "success",
            });
        }   else {
                swal("Your products is deleted!");
        }
        $.ajax({
            type: "GET",
            url: '{{route('products.destroy')}}',
            data: {id:id},
            success: function(response) {
                console.log(response);
                $('.productlist').DataTable().ajax.reload();
            }
        });
    });
    });
</script>
@stop
