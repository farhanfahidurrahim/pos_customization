@extends('layouts.app')
@section('title',  __('barcode.add_barcode_setting'))

@section('content')
<style type="text/css">



</style>
<!-- Main content -->
<section class="content">
      @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                   @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div>{{$error}}</div>
                     @endforeach
                 @endif
                 
<form action="{{ url('create_combo') }}" method="POST" accept-charset="utf-8">
 {{ csrf_field() }}
	<div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Combo Title </label>
            <input type="text" name="title" placeholder="combo title" value="" class="form-control" required>
          </div>
        </div>

        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary pull-right">@lang('messages.save')</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</section>
<!-- /.content -->
@endsection