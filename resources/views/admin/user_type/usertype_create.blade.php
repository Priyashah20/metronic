@extends('admin.layout.app')
@section('title','usertype')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-user"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    {{isset($user)? 'Edit Role' : 'Create New Role' }}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form" method="POST" action="{{isset($user) ? route('usertype.update'): route('usertype.store')}}" enctype="multipart/form-data" id="form">
        @csrf
        <input type="hidden" name="id" id="id" value="{{isset($request->id) ? $request->id : ''}}">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Role:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Add role" name="role" value="{{isset($user) && !empty($user->role) ? $user->role : ''}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Status:</label>
                    <div class="col-lg-4 status">
                        <input type="radio" name="status" value="0" {{isset($user) && $user->status == '0' ? 'checked' : ''}}>Active
                        <input type="radio" name="status" value="1" {{isset($user) && $user->status == '1' ? 'checked' : ''}}> Inactive
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-2">
                        <input type="hidden" name="id" id="id" value="{{isset($user) ? $user->id : ''}}">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-warning" href="{{ route('usertype.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#form').validate({
            rules: {
                role:{
                    required:true,
                    remote: {
                        url :"{{route('usertype.role')}}",
                        method:"POST",
                        data:{
                            'id':'{{isset($user) ? $user->id : ''}}',
                            _token:"{{csrf_token()}}"
                        },
                    },
                },
                status:{
                    required:true,
                }
            },
            messages:{
                role:{
                    required:'Please enter role.',
                    remote:'Role already exists.'
                },
                status:{
                    required:'Please select status.'
                }
            },
            errorPlacement: function(error, element)
            {
                if(element.is(":radio"))
                {
                    error.appendTo(element.parents('.status'));
                }
                else
                {
                    error.insertAfter( element );
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
</script>
@stop
