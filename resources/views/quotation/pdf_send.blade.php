<div class="info-table" id="toprint">
    <div class="order-addresses">
        <div class="address">
           <h1 class="company-address" style="margin-bottom: 5px; padding: 6px 12px !important; background: #0a5fa2 !important; width: fit-content; color: white;">
                {{$quotation->company_name}}
            </h1>
            <h3 style="white-space: pre-line;">{{$quotation->fromany_activity}}</h3>
            <p style="margin-top: -15px;">{{$quotation->fropany_address}}, <br />
                Mobile: {{$quotation->fompany_phone}}<br />
                Email: {{$quotation->fompany_email}}
            </p>
            
        </div>
        <div class="shipping-address"></div>
        <table class="order-info">
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: center; background: #0a5fa2;">
                        <h1 style="margin-bottom: 0; color: white; font-weight: 500;">QUOTATION</h1>
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%;">
                        Quotation No
                    </th>
                    <td>
                    {{$quotation->quotation_no}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Date
                    </th>
                    <td>
                    {{ date("d M, Y", strtotime($quotation->quotation_date))}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Vailidty till
                    </th>
                    <td>
                        {{ date("d M, Y", strtotime($quotation->quotation_validity_date))}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Client ID
                    </th>
                    <td>
                        {{ $quotation->custom_client_id}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
   <div class="order-branding">
        <div class="billing-address" style="padding-bottom: 0;">
            <h3 style="padding: 6px 12px !important; background: #0a5fa2 !important; width: fit-content; color: white;">CLIENT INFORMARION</h3>
            <h4 style="margin-top: 5px;">{{$quotation->name}}</h4>
            <p style="white-space: pre-line; margin-top: -40px;">
                Address: {{ $quotation->city .' '. $quotation->landmark.' '.  $quotation->country}} 
                Mobile: {{ $quotation->mobile}} 
                Email: {{ $quotation->email}}
            </p>
        </div>
    </div>
    
    <div class="subject">
        <h4>Subject : {{$quotation->email_subject}}</h4>
		<p>
Dear Sir, <br>
As per our verbal discussion and according to the ‘ we are submitting our quotation as follows:
</p>
    </div>
	
	<style  type="text/css" media="print">
		@media print{
			.order-items th {
			background: #0a5fa2;
			}
		}
	</style>
    <table class="order-items">
        <thead>
            <tr style="background: #0a5fa2; color: #fff; text-align: center;">
                <th>
                    SN
                </th>
                <th>
                    Description
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Unit
                </th>
                <th>
                    Unit Weight
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Remarks
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->details as $key=> $item)
            <tr style="text-align: center;">
              <td>
                  {{ $key+1}}
                </td>
              <td>
                  {{$item->name}}
            </td>
              <td>
                  {{$item->qty}}
                </td>
              <td>
                {{$item->unit}}
            </td>
              <td>
                {{$item->weight}}
            </td>
              <td>
                {{$item->price}}
            </td>
              <td>
                {{$item->remarks}}
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Terms &amp; Conditions:</h4>
    <p>
        @foreach($quotation->terms as $key=>$term)
            {{$key+1}}) {{ $term->term}}. <br />
        @endforeach
    </p>
    <table class="signature">
        <tbody>
            <tr style="border-bottom: none;">
                <td class="signature" style="border: none;">
                    @if($quotation->signature)
                    <img src="{{ URL::to('/') }}/signature/{{ $quotation->signature}}" width="100" height="80" alt="signature" />
                    @else
                    <img src="https://smtradingbd.com/final_test/storage/quotation/signature/14.png" width="100" height="80" alt="signature" />
                    @endif
                    <p>Signature</p>
                </td>
                
            </tr>
        </tbody>
    </table>
    <div class="footer">
        <hr />
        <p style=" text-align: center; ">
            If you have any inquary about this, please feel free to contact mr joy 01818110013 <br />
            Thank You For Your Business !!
        </p>
    </div>
</div>


