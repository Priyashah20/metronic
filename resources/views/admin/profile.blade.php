@extends('admin.layout.app')
@section('title')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Your Profile
                        </div>
                        <div class="m-card-profile__pic" id="image">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="{{asset('storage/app/public/images/'.Auth::user()->image)}}" alt="" / name="image" style="height:112px; width:112px">
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{Auth::user()->name}}</span>
                            <a href="" class="m-card-profile__email m-link">{{Auth::user()->email}}</a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Update Profile
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="{{route('admin.updateProfile')}}" method="POST" id="updateform">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                    <div class="alert m-alert m-alert--default" role="alert">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{Auth::user()->name}}" name="name">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{Auth::user()->email}}" name="email">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{Auth::user()->phone}}" name="phone">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Profile Picture</label>
                                    <div class="col-7">
                                        <input type="file" name="image" class="form-control" placeholder="Image" value="{{Auth::user()->image}}">
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                           <button type="submit" class="btn btn-primary m-btn">Save Changes</button>
                                       </div>
                                    </div>
                                </div>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="{{route('admin.password')}}" method="POST" id="pass_change">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                    <div class="alert m-alert m-alert--default" role="alert">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-3 col-form-label">Current Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" value="" name="current_password" placeholder="Current Password" id="current_password">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-3 col-form-label">New Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" value="" name="new_password" placeholder="New Password" id="new_password">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-3 col-form-label">Confirm Password</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="password" value="" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-primary m-btn">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@if($message = Session::get('success'))
{{-- <script type="text/javascript">
    setTimeout(function() {
        toastr.options = {
            // closeButton: true,
            TimeOut:0,
            ExtendedTimeOut:0,
            showMethod: 'slideDown',
        };
        toastr.success('{{$message["msg"]}}');
    },  1300);
</script> --}}
@endif
@if($message = Session::get('error'))
<script type="text/javascript">
    setTimeout(function() {
        toastr.options = {
            // closeButton: true,
            TimeOut:0,
            ExtendedTimeOut:0,
            showMethod: 'slideDown',
        };
        toastr.error('{{$message["msg"]}}');
    },  1300);
</script>
@endif
<script type="text/javascript">
    $(document).ready(function () {
        $('#updateform').validate({
            rules: {
                name:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true
                },
                phone: {
                    required: true,
                    integer: true,
                    minlength:10,
                    maxlength:10
                },
                image:{
                    extension: "jpg,jpeg,png|max:2048",
                    maxlength: 2048
                }
            },
            messages: {
                name:{
                    required:'Please Enter Your Name.',
                },
                email:{
                    required:'Please Enter Your Email',
                    email:'Please enter valid email address',
                },
                phone:{
                    required:"Please enter your phone number",
                    integer:"Phone number must be in digits",
                    minlength:"Phone number must be 10 digit",
                    maxlength:"Phone number must be 10 digit"
                },
                image:{
                    extension: "Please upload file in these format only (jpg, jpeg, png)"
                }
            },
        });
    });
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
       return this.optional(element) || value != $(param).val();
   }, "Current Password do not match with Password.");

    $(document).ready(function () {
        $("#pass_change").validate({
            rules:{
                current_password:{
                    required:true,
                    minlength:8,
                },
                new_password:{
                    required:true,
                    minlength:8,
                    notEqual: "#current_password"

                },
                confirm_password:{
                    required:true,
                    minlength:8,
                    equalTo: "#new_password"
                },

            },
            messages:{
                current_password:{
                    required:"Please enter your old password" ,
                    minlength: "Password must be min 8 characters long",
                },
                new_password:{
                    required:"Please enter your new password" ,
                    minlength: "Password must be min 8 characters long",
                },
                confirm_password:{
                    required:"Please confirm your password" ,
                    minlength: "Password must be min 8 characters long",
                    equalTo: "New password must be match with confirm password"
                },
            }
        });
    });
</script>
<style>
.preview {
  height:100px;
  width:100px;
}
</style>
@stop

