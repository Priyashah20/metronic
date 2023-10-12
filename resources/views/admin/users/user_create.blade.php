@extends('admin.layout.app')
@section('title','user')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        {{isset($user)? 'Edit User' : 'Create New User' }}
                    </h3>
                </div>
            </div>
        </div>
        <form class="m-form" method="POST" action="{{isset($user) ? route('user.update'): route('user.store')}}" enctype="multipart/form-data" id="form">
            @csrf
            <input type="hidden" name="id" id="id form" value="{{isset($user->id) ? $user->id : ''}}">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">First Name:</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input" placeholder="Enter first name" id="firstname" name="firstname" value="{{isset($user) && !empty($user->name) ? $user->name : ''}}" onChange="save(event)">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Last Name:</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input" placeholder="Enter last name" id="lastname" name="lastname" value="{{isset($user) && !empty($user->lastname) ? $user->lastname : ''}}" onChange="save(event)">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Email Address:</label>
                        <div class="col-lg-4">
                            <input type="email" class="form-control m-input" placeholder="Enter email" name="email" id="email" value="{{isset($user) && !empty($user->email) ? $user->email : ''}}" onChange="save(event)">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Phone:</label>
                        <div class="col-lg-4">
                                <input type="text" class="form-control m-input" placeholder="Enter phone number" id="phone" name="phone" value="{{isset($user) && !empty($user->phone) ? $user->phone : ''}}" onChange="save(event)">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Hobbies:</label>
                        <div class="col-lg-4 hobbies">
                            <input type="checkbox" name="hobbies[]" value="cricket" {{isset($user) ? (in_array('cricket', $hobbies) ? 'checked' : '') : '' }} onChange="save(event)"> Cricket
                            <input type="checkbox" name="hobbies[]" value="singing" {{isset($user) ? (in_array('singing', $hobbies) ? 'checked' : '' ): ''}} onChange="save(event)"> Singing
                            <input type="checkbox" name="hobbies[]" value="playing" {{isset($user) ? (in_array('playing', $hobbies) ? 'checked' : '' ): ''}} onChange="save(event)"> Playing
                            <input type="checkbox" name="hobbies[]" value="reading" {{isset ($user) ? (in_array('reading', $hobbies) ? 'checked' : ''):''}} onChange="save(event)"> Reading
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Gender:</label>
                        <div class="col-lg-4 gender">
                            <input type="radio" name="gender" value="0" {{isset($user) && $user->gender == '0' ? 'checked' : ''}} onChange="save(event)">Male
                            <input type="radio" name="gender" value="1" {{isset($user) && $user->gender == '1' ? 'checked' : ''}} onChange="save(event)">Female
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Address:</label>
                        <div class="col-lg-4">
                            <textarea name="address" class="form-control m-input" placeholder="Enter your address" id="address">{{isset($user) && !empty($user->address) ?  $user->address:''}}</textarea>
                        </div>
                    </div>
                   {{--  <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">City:</label>
                        <div class="col-lg-4">
                            <input type="city" class="form-control m-input" placeholder="Enter your city" name="city" value="{{isset($user) && !empty($user->city) ? $user->city : ''}}">

                        </div>
                    </div> --}}
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">City:</label>
                        <div class="col-lg-4">
                            <select class="form-control" name="city" id="city" onChange="save(event)">
                                <option value="">-- Select City --</option>
                                @foreach ($city as $data)
                                <option value="{{$data->city}}"
                                    @if(isset($user->city))
                                    {{ ($data->city == $user->city)  ?  'selected' : '' }}
                                    @endif>
                                    {{$data->city}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <a class="btn btn-success" id="btn" style="visibility: visible;">Add City</a> --}}
                   {{--  <div class="city">
                    </div> --}}
                    {{-- <div class="city_form" id="city_form" style="display: none">
                        <form class="m-form" method="POST" action="{{isset($user) ? route('city.update'): route('city.store')}}" enctype="multipart/form-data" id="form">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{isset($request->id) ? $request->id : ''}}">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">City:</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control m-input" placeholder="Enter your city" name="city" value="{{isset($user) && !empty($user->city) ? $user->city : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Status:</label>
                                    <div class="col-lg-4 status">
                                        <input type="radio" name="status" value="0" {{isset($user) && $user->status == '0' ? 'checked' : ''}}>Active
                                        <input type="radio" name="status" value="1" {{isset($user) && $user->status == '1' ? 'checked' : ''}}> Inactive
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <input type="hidden" name="id" id="id" value="{{isset($user) ? $user->id : ''}}">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                        <a class="btn btn-warning" href="{{ route('city.index') }}">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Image:</label>
                        <div class="col-lg-4">
                            <input type="file" name="image" value="{{isset($user) && !empty($user->image) ? $user->image : ''}}" id="gallery-photo-add" onChange="save(event)">
                            @if(isset($user) && !empty($user->image))
                            <a class="btn btn-primary mt-1" href="{{route('user.getfile',isset($user) ? ($user->id):'')}}"> <i class="fa fa-download"></i></a>
                            @endif
                        </div>
                        <div class="gallery"></div>
                        <div id="preview"></div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">User Type:</label>
                        <div class="col-lg-4 user-info">
                            <input type="text" class="form-control m-input" placeholder="Enter user type" id="usertype" name="usertype" value="{{isset($user) && !empty($user->user_type) ? $user->user_type : ''}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label user-info">Status:</label>
                        <div class="col-lg-4 status">
                            <input type="radio" name="status" value="0" {{isset($user) && $user->status == '0' ? 'checked' : ''}} onChange="save(event)">Active
                            <input type="radio" name="status" value="1" {{isset($user) && $user->status == '1' ? 'checked' : ''}} onChange="save(event)"> Inactive
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
                            <a class="btn btn-warning" href="{{ route('user.index') }}">Back</a>
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
                    required: true
                },
                lastname:{
                    required: true
                },
                email:{
                    required: true,
                    email: true,
                    remote: {
                        url: '{{route('user.email')}}',
                        type:'POST',
                        data:{'id':'{{isset($user) ? $user->id : ''}}',
                        _token:"{{csrf_token()}}"},
                    },
                },
                phone:{
                    required: true,
                    maxlength: 10,
                    number:true,
                },
                gender:{
                    required:true,
                },
                address:{
                    required:true
                },
                city:{
                    required:true
                },
                'hobbies[]':{
                    required:true
                },
                image:{
                    extension: "jpg,jpeg,png|max:2048",
                    maxlength: 2048
                },
                status:{
                    required:true,
                }
            },
            messages:{
                firstname:{
                    required:'Please enter your first name.',
                },
                lastname:{
                    required:'Please enter your last name.',
                },
                email:{
                    required:'Please enter your email address.',
                    email:'Please enter a valid email address.',
                    remote:'Email already exists.',
                },
                phone:{
                    required:'Please enter your phone number.',
                    number:'Please enter numbers Only.',
                },
                gender:{
                    required:'Select your gender.',
                },
                address:{
                    required:'Please enter your address.',
                },
                city:{
                    required:'Please enter city.',
                },
                'hobbies[]':{
                    required:'Select your hobbies.',
                },
                image:{
                    extension:'Please upload file in these format only (jpg, jpeg, png).'
                },
                status:{
                    required:'Please select status.'
                }
            },
            errorPlacement: function(error, element){
                if(element.is(":radio,:checkbox")){
                  error.appendTo(element.parents('.gender,.hobbies,.status'));
                }else{
                  error.insertAfter( element );
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
     /* $(document).ready(function(){
        var id = $('#id').val();
        $_token = "{{ csrf_token() }}";
        $.ajax({
            headers:{ 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{ route('city') }}",
            type: 'POST',
            data: {'id':id,'_token': $_token },
            datatype: 'json',
            success: function(data) {
                console.log(data);
                $('.city').html(data.html);
            }
        });
    });*/

    /*$(document).ready(function() {
        $("#btn").click(function(e) {
        e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('city') }}",
                data: {
                    id: $("#btn").val(),
                    _token:"{{csrf_token()}}"
                },
                success: function(result) {
                    alert('ok');
                },
                error: function(result) {
                    alert('error');
                }
            });
        });
    });*/

    $("#btn").click(function(){
        $("#city_form").toggle();
    });
</script>
<script language="javascript">
    function save(event) {
        var request = new XMLHttpRequest();
        request.open(event.target.form.method, event.target.form.action);
        request.send(new FormData(event.target.form));
    }
    // $(document).on('change keyup','user-info',function(event){
    //  auto_save();
    // });
    // function auto_save();


</script>

<script>
    $('#form').on('input', function() {
        var address  = $('#address').val();
        var name     = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email    = $('#email').val();
        var phone    = $('#phone').val();
        var id       = $('#id').val();
        $_token      = "{{ csrf_token() }}";
        // console.log('Address: ' + address);
        // console.log('ID: ' + id);
        $.ajax({
        url: "{{route('saveAddress')}}",
        type: 'POST',
        data:{ 'address': address,'name' : name,'lastname' : lastname, 'email' : email,'phone' : phone,
              '_token': $_token,
               'id':id,
            },
            success: function(response) {
              console.log('success');
            },
            error: function(xhr, status, error) {
              console.log('error');
            }
        });
    });

</script>

@stop
