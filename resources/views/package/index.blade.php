@extends('layouts.app')
@section('title', __('All Package'))
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>All Package</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
          <h3 class="box-title">All Package List</h3>
            
              <div class="box-tools">
                    <a class="btn btn-block btn-primary" 
                  href="{{action('PackageController@create')}}">
                  <i class="fa fa-plus"></i>Add</a>
                </div>
        </div>

        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="stock_track_table">
        		<thead>
        			<tr>
        				<th>Product Sku</th>
                        <th>Quantity</th>
                        <th>Action</th>
        			</tr>
        		</thead>
        	</table>
            </div>
        </div>
    </div>
<div class="modal fade category_modal" tabindex="-1" role="dialog" 
      aria-labelledby="gridSystemModalLabel">
</div>

</section>
<!-- /.content -->

@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
   package=$('#stock_track_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url":"{{action('PackageController@index')}}",

            },
            columns:
            [
              {
                 data:'sku',
                 name: 'sku',
              },
              

              {
                 data:'created_at',
                 name: 'created_at',
              },
              {
                 data:'action',
                 name: 'action',
                 orderable:false
              },
            ]
        });

} );


   </script>

<script>
    $(document).ready(function() {
    $("select#select").select2();
});
</script>
@endsection