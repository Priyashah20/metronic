@extends('admin.layout.app')
@section('title')
@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    All Roles
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('usertype.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-user"></i>
                            <span>New Role</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable usertype_list" id="usertype_list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
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
        var table = $('#usertype_list').DataTable( {
            "bDestroy": true,
            order:['0','desc'],
            ajax: "{{ route('usertype.index') }}",
            //columnDefs:[{target:6,sortable:false }],
            columns: [
                {data:'id', name:'id'},
                {data:'role',name:'role'},
                {data:'status',name:'status',
                    render:function(data,type,raw){
                        if(raw.status == '0'){
                          return 'Active';
                        }else{
                          return 'In-active';
                        }
                    },
                },
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
          title: "Are you sure you want to delete this role?",
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
                swal("Your role has been deleted!", {
                  icon: "success",
            });
        }   else {
                swal("Your role is deleted!");
        }
        $.ajax({
            type: "GET",
            url: '{{route('usertype.destroy')}}',
            data: {id:id},
            success: function(response) {
                console.log(response);
                $('.usertype_list').DataTable().ajax.reload();
            }
        });
    });
    });
</script>
@stop
