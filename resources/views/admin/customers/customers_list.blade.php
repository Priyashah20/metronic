@extends('admin.layout.app')
@section('title','customers')
@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    All Customers
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('customers.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-user"></i>
                            <span>New Customers</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable customerlist" id="customerlist">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Mobile</th>
                   {{--  <th>Date Of Birth</th>
                    <th>Date Of Anniversary</th> --}}
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
        var table = $('#customerlist').DataTable( {
            "bDestroy": true,
            order:['0','desc'],
            ajax: "{{ route('customers.index') }}",
            //columnDefs:[{target:6,sortable:false }],
            columns: [
                {data:'id', name:'id'},
                {data:'firstname',name:'firstname'},
                {data:'lastname',name:'lastname'},
                {data:'surname',name:'surname'},
                {data:'email',name:'email'},
                {data:'mobile',name:'mobile'},
                // {data:'date_of_birth',name:'date_of_birth'},
                // {data:'date_of_anniversary',name:'date_of_anniversary'},
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
                swal("Your customers has been deleted!", {
                  icon: "success",
            });
        }   else {
                swal("Your customers is deleted!");
        }
        $.ajax({
            type: "GET",
            url: '{{route('customers.destroy')}}',
            data: {id:id},
            success: function(response) {
                console.log(response);
                $('.customerlist').DataTable().ajax.reload();
            }
        });
    });
    });
</script>
@stop
