@extends('layouts.app')
@section('title', __('Combo Package'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Combo Package</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Create Combo Package </h3>
      </div>

      <div class="box-body">
        <form action="{{ action('PackageController@store')}}" method="post">
          {{ csrf_field()}}
          <div class="col-md-5">
            <div class="form-group">
              <label>Combo Product</label>
              <select name="product_id" class="form-control" required>
                <option value="" hidden>Select A Product</option>
                @foreach($ps as $item)
                  <option value="{{$item->id}}">{{ $item->sku}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-7">
            <div class="col-md-12">
              <div class="form-group">
                <label>product Search Here</label>
                <input type="text" name="q" id="search" class="form-control" placeholder="search Here..">
              </div>
            </div><br><br>
            <div class="col-md-12">
              <table class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Sku</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="data">
                  
                </tbody>
              </table>
            </div>
          </div>
          <input type="submit" value="Submit" class="btn btn-primary">
        </form>
      </div>
  </div>

</section>
<!-- /.content -->

@endsection

@section('javascript')

<script type="text/javascript">
   $(function(){
    var arr=[];
    var url='{{ action("PackageController@list")}}';
        $( "#search" ).autocomplete({
          source: function(request, response) {
              $.getJSON(url, {  term: request.term }, response);
              },
          minLength: 2,
          response: function(event,ui) {
            if (ui.content.length == 1)
            {
              ui.item = ui.content[0];
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete('close');
            } else if (ui.content.length == 0) {
                    swal('No Product Found')
                    .then((value) => {
                  $('input#search').select();
              });
            }
          },
          focus: function( event, ui ) {
            
          },
          select: function( event, ui ) {
            var key=ui.item.id;
            if (arr.indexOf(key)  == -1) {
                product_row(ui.item.id);
                arr.push(key);
            }
          }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
              var string =  "<div>";
              string += ' (' + item.sku + ')' + "</div>";
              return $( "<li>" ).append(string).appendTo( ul );
          };
      });


   function product_row(citizen_id){

        $.ajax({
          method: "GET",
          url: "{{ action('PackageController@entryList')}}",
          async: false,
          data: {id:citizen_id},
          dataType: "json",
          success: function(result){
            if(result.success){
                $('tbody#data').append(result.view);
            } else {
              swal('No Item  Found');
            }
          }
        });
    }


    $(document).on('click','a#remove',function(e){
        var whichtr = $(this).closest("tr");
        whichtr.remove();

    });
    


</script>



@endsection