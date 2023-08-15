@extends('layouts.app')
@section('title', __('All Quotation'))
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>All Quotation</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
          <h3 class="box-title">All Quotation List</h3>

              <div class="box-tools">
                    <a class="btn btn-block btn-primary"
                  href="{{ route('quotations.create') }}">
                  <i class="fa fa-plus"></i>Add</a>
                </div>
        </div>

        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="stock_track_table">
        		<thead>
        			<tr>
        				<th>Company Name</th>
        				<th>Company Address</th>
                        <th>Client Name</th>
                        <th>Quotation Date</th>
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
<script type="text/javascript">
$(document).ready( function () {


   package=$('#stock_track_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                "url":"{{ route('quotations.index') }}",

            },
            columns:
            [
              {
                 data:'company_name',
                 name: 'company_name',
              },


              {
                 data:'fropany_address',
                 name: 'fropany_address',
              },

              {
                 data:'name',
                 name: 'name',
              },

              {
                 data:'quotation_date',
                 name: 'quotation_date',
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
