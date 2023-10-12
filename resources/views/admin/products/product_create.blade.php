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
                    {{isset($user)? 'Edit Product' : 'Create New Product' }}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form" method="POST" action="{{isset($user) ? route('products.update'): route('products.store')}}" enctype="multipart/form-data" id="form">
        @csrf
        <input type="hidden" name="id" id="id" value="{{isset($request->id) ? $request->id : ''}}">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Title:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Add title" id="title" name="title" value="{{isset($user) && !empty($user->title) ? $user->title : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Category:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Add category" id="category" name="category" value="{{isset($user) && !empty($user->category) ? $user->category : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">price:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Add price" id="price" name="price" value="{{isset($user) && !empty($user->price) ? $user->price : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Color:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control m-input" placeholder="Add color" id="color" name="color" value="{{isset($user) && !empty($user->color) ? $user->color : ''}}">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Quantity:</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control m-input" placeholder="Add quantity" id="quantity" name="quantity" value="{{isset($user) && !empty($user->quantity) ? $user->quantity : ''}}">
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
                        <a class="btn btn-warning" href="{{ route('products.index') }}">Back</a>
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
                title:{
                    required:true,
                },
                category:{
                    required:true,
                },
                price:{
                    required:true,
                },
                color:{
                    required:true,
                },
                quantity:{
                    required:true,
                },
            },
            messages:{
                title:{
                    required:'Please enter title.',
                },
                category:{
                    required:'Please enter category.',
                },
                price:{
                    required:'Please enter price.',
                },
                color:{
                    required:'Please enter your color.',
                },
                quantity:{
                    required:'Please enter quantity.',
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
</script>
@stop
