@extends('layouts.app')
@section('title', __('Quotation Update'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<br>
    <h1>@lang('Quotation Update')</h1>
</section>



<section class="content no-print">
	<div class="card height-auto">
		<div class="card-body">
		<div class="heading-layout1">
			<div class="item-title">
				<h5>Update Quotation</h5>
			</div>
		</div>
		<form method="POST" action="{{ route('quotations.update',[$quotation->id]) }}" class="new-added-form " enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
		<div class="row">
			<div class="col-md-12 p-3">
				<div class="col-md-7">
					<div class="row">
						<div class="col-12 form-group">

							<textarea class="form-control" name="company_name" class="form-control">{{$quotation->company_name}}</textarea>
						</div>
						<div class="col-12 form-group">
							<textarea class="form-control" name="fromany_activity" class="form-control">{{$quotation->fromany_activity}}</textarea>
						</div>
						<div class="col-12 form-group">
							<textarea class="form-control" name="fropany_address" required="">{{$quotation->fropany_address}}</textarea>
						</div>
						<div class="col-12 form-group">
							<textarea class="form-control" name="fompany_phone" class="form-control">{{$quotation->fompany_phone}}</textarea>
						</div>
						<div class="col-12 form-group">
							<input type="email" name="fompany_email" value="{{$quotation->fompany_email}}" placeholder="Email" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<div class="table-responsive">
						<table class="table table-striped table-sm">
						<tbody>
							<tr>
								<td colspan="2" style="text-align: center; background: #0a5fa2;"><h1 style="color: white; margin-bottom: 0;">QUOTATION</h1></td>
							</tr>
							<tr>
								<td>Quotation No</td>
								<td>
									<input type="text" name="quotation_no" value="{{$quotation->quotation_no}}" class="form-control" required="" placeholder="" value="" />
								</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>
									<input type="date" name="quotation_date" value="{{$quotation->quotation_date}}" placeholder="dd/mm/yy" class="form-control air-datepicker" data-position="bottom right">
								</td>
							</tr>
							<tr>
								<td>Vailidty till</td>
								 <td>
									<input name="quotation_validity_date" value="{{$quotation->quotation_validity_date}}" type="date" placeholder="dd/mm/yy" class="form-control air-datepicker" data-position="bottom right">
								</td>
							</tr>
							<tr>
								<td>Client ID</td>
								<td>
									<input type="text" name="custom_client_id" value="{{$quotation->custom_client_id}}" class="form-control" placeholder="" value="" />
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>

			</div>

			<div class="col-md-12 p-3">
				<div class="col-md-6 pd-y-45">
					<div class="customer col-md-12">
						<div class="info-text-l">CLIENT INFORMARION</div>
						<div class="form-group">
							<select name="client_id" class="form-control select2">
								<option value="" hidden>Select Client</option>
								@foreach($contacts as $c)
								<option value="{{$c->id}}" {{ $quotation->client_id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="customer col-md-12">
						<div class="info-text-l">Subject</div>
						<div class="form-group">
							<input type="text" name="email_subject" value="" placeholder="subject details" class="form-control" value="{{$quotation->email_subject}}">
						</div>
					</div>

				</div>
			</div><br>

			<div class="col-md-12 p-3">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped" id="item_table">
								<thead>
									<tr>
										<th>SN</th>
										<th>Description</th>
										<th>Quantity</th>
										<th>Unit</th>
										<th>Unit Weight</th>
										<th>Unit Price</th>
										<th>Remarks</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($quotation->details->count() >0)

									@foreach($quotation->details as $item)
									<tr id="1">
										<td>1</td>
										<td>
											<input type="text" name="description[]" class="form-control" required="" placeholder="Product Name" value="{{$item->name}}" />
										</td>
										<td>
											<input type="number" name="quantity[]" class="form-control" required="" placeholder="Product quantity" value="{{$item->qty}}" />
										</td>
										<td>
											<input type="text" name="unit[]" class="form-control" required="" placeholder="Product Unit" value="{{$item->unit}}" />
										</td>
										<td>
											<input type="text" name="unit_weight[]" class="form-control" placeholder="Unit Weight" value="{{$item->weight}}" />
										</td>
										<td>
											<input type="number" name="unit_price[]" class="form-control" required="" placeholder="Product Unit Price" value="{{$item->price}}" />
										</td>
										<td>
											<input type="text" name="remarks[]" class="form-control" placeholder="Product Remarks" value="{{$item->remarks}}" />
										</td>
										<td>
										<button type="button" name="add" class="btn btn-success btn-sm add">
											<i class='fa fa-plus text-orange-green'></i>
										</button>
										<button type="button" name="add" class="btn btn-danger btn-sm remove">
											<i style="color:yellow;" class="fa fa-times text-orange-red"></i>
										</button>
										</td>
									</tr>

									@endforeach

									@else
									<tr id="1">
										<td>1</td>
										<td>
											<input type="text" name="description[]" class="form-control" required="" placeholder="Product Name" value="" />
										</td>
										<td>
											<input type="number" name="quantity[]" class="form-control" required="" placeholder="Product quantity" value="" />
										</td>
										<td>
											<input type="text" name="unit[]" class="form-control" required="" placeholder="Product Unit" value="" />
										</td>
										<td>
											<input type="text" name="unit_weight[]" class="form-control" placeholder="Unit Weight" value="" />
										</td>
										<td>
											<input type="number" name="unit_price[]" class="form-control" required="" placeholder="Product Unit Price" value="" />
										</td>
										<td>
											<input type="text" name="remarks[]" class="form-control" placeholder="Product Remarks" value="" />
										</td>
										<td>
										<button type="button" name="add" class="btn btn-success btn-sm add">
											<i class='fa fa-plus text-orange-green'></i>
										</button>
										<button type="button" name="add" class="btn btn-danger btn-sm remove">
											<i style="color:yellow;" class="fa fa-times text-orange-red"></i>
										</button>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
							<h6>Terms &amp; Conditions:</h6>
							<div class="table-responsive">
								<table class="table table-striped" id="terms_table">
									<thead>
										<tr>
											<th>SN</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										@if($quotation->terms->count() >0)

										@foreach($quotation->terms as $term)
										<tr id="1">
											<td>1</td>
											<td>
												<input type="text" name="term[]" class="form-control" required="" placeholder="Description" value="{{$term->term}}" />
											</td>
											<td>
												<button type="button" name="add" class="btn btn-success btn-sm termsadd">
													<i class='fa fa-plus text-orange-green'></i>
												</button>
												<button type="button" name="add" class="btn btn-danger btn-sm termsremove">
													<i style="color:yellow;" class="fa fa-times text-orange-red"></i>
												</button>
											</td>
										</tr>
										@endforeach

										@else
										<tr id="1">
											<td>1</td>
											<td>
												<input type="text" name="term[]" class="form-control" required="" placeholder="Description" value="" />
											</td>
											<td>
												<button type="button" name="add" class="btn btn-success btn-sm termsadd">
													<i class='fa fa-plus text-orange-green'></i>
												</button>
												<button type="button" name="add" class="btn btn-danger btn-sm termsremove">
													<i style="color:yellow;" class="fa fa-times text-orange-red"></i>
												</button>
											</td>
										</tr>
										@endif

									</tbody>
								</table>
							</div>
						</div>

						<div class="col-md-6">
							<h6>Upload Photo (150px X 150px):</h6><br><br>


							<div class="form-group col-md-6">
								@if($quotation->signature)
								<img src="{{ URL::to('/') }}/signature/{{ $quotation->signature}}"  width="150" />
								@endif
								<input name="signature" type="file" class="form-control">
								<h6>Signature</h6>
							</div>
						</div>
					</div>


					<div class="col-md-12">
						<div class="row footer">
							<p>
								<div class="col-md-5 form-group">
									If you have any inquary about this, please feel free to contact
								</div>
								<div class="col-md-4 form-group">
									<input name="created_name_phone" value="{{ $quotation->created_name_phone}}" type="text" placeholder="Mr. Milon - 01728817223" class="form-control">
									<br />
								</div>
								<div class="col-md-3 form-group">
									Thank You For Your Business !!
								</div>
							</p>
						</div>
						<div class="form-group col-md-12 text-center">
							<button type="submit" class="btn btn-sm btn-primary">Update Quotation</button>
						</div>
					</div>
			</div>

		</div>
		</form>
		</div>
	</div>

</section>
@stop
@section('javascript')

	<script>
    $(document).ready(function(){
     $(document).on('click', '.add', function(){
        let count = 1;
        count = count + $('#item_table >tbody >tr').length;
        if(count <= 100)
        {
            let html = '';
            html += '<tr>';
            html += '<td>'+"#"+count  +'</td>';
            html += '<td><input autocomplete="off"  type="text" name="description[]" class="form-control" required/></td>';
            html += '<td><input autocomplete="off"  type="number" name="quantity[]" class="form-control" /></td>';
            html += '<td><input autocomplete="off"  type="text" name="unit[]" value=""  class="form-control" /></td>';
            html += '<td><input autocomplete="off"  type="text" name="unit_weight[]" value=""  class="form-control" /></td>';
            html += '<td><input autocomplete="off"  type="number" name="unit_price[]" class=" form-control" data-position="bottom right"></td>';
            html += '<td><input autocomplete="off"  type="text" name="remarks[]"   class=" form-control" data-position="bottom right"></td>';
            //html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option></select></td>';
            html += '<td><button type="button" name="add" class="btn btn-success btn-sm add" style="margin-right:2%;"><i class="fas fa-plus text-orange-green"></i></button><button type="button"  name="remove" class="btn btn-danger btn-sm remove"><i style="color:yellow;" class="fa fa-times text-orange-red"></i></button></td></tr>';
            $('#item_table').append(html);
        }
     });

     $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();

     });




     $(document).on('click', '.termsadd', function(){
        let count = 1;
        count = count + $('#terms_table >tbody >tr').length;
        if(count <= 100)
        {
            let html = '';
            html += '<tr>';
            html += '<td>'+"#"+count  +'</td>';
            html += '<td><input autocomplete="off"  type="text" name="term[]" class="form-control" required/></td>';
            html += '<td><button type="button" name="add" class="btn btn-success btn-sm termsadd" style="margin-right:2%;"><i class="fa fa-plus text-orange-green"></i></button><button type="button"  name="remove" class="btn btn-danger btn-sm termsremove"><i style="color:yellow;" class="fa fa-times text-orange-red"></i></button></td></tr>';
            $('#terms_table').append(html);
        }
     });

     $(document).on('click', '.termsremove', function(){
      $(this).closest('tr').remove();

     });
});
 </script>
@endsection
