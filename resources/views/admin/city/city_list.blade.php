@extends('admin.layout.app')
@section('title')
@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    All City
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('city.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="fa fa-building"></i>
                            <span>New City</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable city_list" id="city_list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>City</th>
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
        var table = $('#city_list').DataTable( {
            "bDestroy": true,
            order:['0','desc'],
            ajax: "{{ route('city.index') }}",
            //columnDefs:[{target:6,sortable:false }],
            columns: [
                {data:'id', name:'id'},
                {data:'city',name:'city'},
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
          title: "Are you sure you want to delete this city?",
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
                swal("Your city has been deleted!", {
                  icon: "success",
            });
        }   else {
                swal("Your city is deleted!");
        }
        $.ajax({
            type: "GET",
            url: '{{route('city.destroy')}}',
            data: {id:id},
            success: function(response) {
                console.log(response);
                $('.city_list').DataTable().ajax.reload();
            }
        });
    });
    });
</script>
@stop
