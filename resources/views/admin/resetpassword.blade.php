<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
<meta charset="utf-8" />
<title>Login</title>
<meta name="description" content="Latest updates and statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!--end::Web font -->

<!--begin::Global Theme Styles -->
<link href="{!!asset('public/assets/vendors/base/vendors.bundle.css')!!}" rel="stylesheet" type="text/css" />

<link href="{!!asset('public/assets/demo/default/base/style.bundle.css')!!}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{!!asset('public/assets/demo/default/media/img/logo/favicon.ico')!!}" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
    <div class="m-login__container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h2 class="m-login__title">Change Password</h2>
                <form  method="POST" action="{{ route('admin.getresetpassword') }}" id="form">
                @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group m-form__group">
                        <input class="form-control m-input" type="password" id="new_password" placeholder="New Password" name="new_password">
                    </div>
                    <div class="form-group m-form__group">
                        <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirmation" placeholder='Confirm Password'>
                    </div>
                    <div class="m-login__form-action">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 <script src="{!!asset('public/assets/vendors/base/vendors.bundle.js')!!}" type="text/javascript"></script>
    <script src="{!!asset('public/assets/demo/default/base/scripts.bundle.js')!!}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts -->
    <script src="{!!asset('public/assets/snippets/custom/pages/user/login.js')!!}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
<script>
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
       return this.optional(element) || value != $(param).val();
   }, "Current Password do not match with Password.");

    $(document).ready(function () {
        $('#form').validate({
            rules: {
                new_password: {
                    required: true,
                    minlength: 8,
                    notEqual: "#current_password"
                },
                new_password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#new_password"
                },
            },
            messages:
            {
                new_password:
                {
                    required: 'Please Enter Your New Password.',
                    minlength: 'Password must be at least 8 characters long.',
                    notEqualTo: 'Current Password do not match with Password.',
                },
                new_password_confirmation:
                {
                    required: 'Please Enter Confirm Password.',
                    minlength: 'Password must be at least 8 characters long.',
                    equalTo: 'Confirm Password do not match with Password.',
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>
