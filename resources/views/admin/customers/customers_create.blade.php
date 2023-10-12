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
                    {{isset($user)? 'Edit Customers' : 'Create New Customers' }}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form" method="POST" action="{{isset($user) ? route('customers.update'): route('customers.store')}}" enctype="multipart/form-data" id="form">
        @csrf
        <input type="hidden" name="id" id="id" value="{{isset($request->id) ? $request->id : ''}}">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">First Name:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Enter first name" id="firstname" name="firstname" value="{{isset($user) && !empty($user->firstname) ? $user->firstname : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Last Name:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Enter last name" id="lastname" name="lastname" value="{{isset($user) && !empty($user->lastname) ? $user->lastname : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Surname:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Enter surname" id="surname" name="surname" value="{{isset($user) && !empty($user->surname) ? $user->surname : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Email Address:</label>
                    <div class="col-lg-4">
                        <input type="email" class="form-control m-input" placeholder="Enter email" id="email" name="email" value="{{isset($user) && !empty($user->email) ? $user->email : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Mobile:</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control m-input" placeholder="Enter mobile number" id="mobile" name="mobile" value="{{isset($user) && !empty($user->mobile) ? $user->mobile : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Date Of Birth:</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control m-input" placeholder="Enter Date Of Birth" id="date_of_birth" name="date_of_birth" value="{{isset($user) && !empty($user->date_of_birth) ? $user->date_of_birth :''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Date Of Anniversary:</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control m-input" placeholder="Enter Date Of Birth" id="date_of_anniversary" name="date_of_anniversary" value="{{isset($user) && !empty($user->date_of_anniversary) ? $user->date_of_anniversary :''}}">
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
                        <a class="btn btn-warning" href="{{ route('customers.index') }}">Back</a>
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
                firstname:{
                    required:true,
                },
                lastname:{
                    required:true,
                },
                surname:{
                    required:true,
                },
                email:{
                    required:true,
                },
                mobile:{
                    required:true,
                },
                date_of_birth:{
                    required:true,
                },
                date_of_anniversary:{
                    required:true,
                },
            },
            messages:{
                firstname:{
                    required:'Please enter firstname.',
                },
                lastname:{
                    required:'Please enter lastname.',
                },
                surname:{
                    required:'Please enter surname.',
                },
                email:{
                    required:'Please enter your email.',
                },
                mobile:{
                    required:'Please enter number.',
                },
                date_of_birth:{
                    required:'Please enter date of birth.',
                },
                date_of_anniversary:{
                    required:'Please enter date of anniversary.',
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
</script>
@stop
