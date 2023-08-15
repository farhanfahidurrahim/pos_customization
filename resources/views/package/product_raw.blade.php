@foreach($products as $product)
<tr>
	<input type="hidden" name="raw_product_id[]" value="{{$product->id}}">
	<td>{{$product->sku}}</td>
	<td>
		<a class="btn btn-xs btn-danger" id="remove">remove</a>
	</td>
</tr>
@endforeach