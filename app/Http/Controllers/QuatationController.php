<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Quatation;
use App\Models\Contact;
use Illuminate\Http\Request;
use DB;
use PDF;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\QuotationMail;
class QuatationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');
            $purchases = DB::table('quatations')
                        ->Leftjoin('contacts','contacts.id','=','quatations.client_id')
                        ->select('quatations.*','contacts.name')
                        ->orderby('quatations.id','desc');
            return Datatables::of($purchases)

            ->addColumn('action',
                    '@can("brand.update")
                    <a href="{{ route(\'quatations.senMail\', [$id]) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-envelope"></i> Send Mail</a>
                    <a href="{{ route(\'quotations.edit\', [$id]) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang("messages.edit")</a>
                        &nbsp;
                    <a href="{{ route(\'quotations.show\',[$id]) }}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-envelope"></i> View</a>
                    &nbsp;
                    @endcan
                    @can("brand.delete")

                         <button data-info="This Dish Will be Deleted!" data-href="{{ route(\'quotations.destroy\', [$id]) }}" class="btn btn-xs btn-danger delete_package_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>
                    @endcan')

            ->rawColumns(['action'])
            ->make(true);
            }

        return view('quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts=Contact::where('type','customer')->select('name','id')->get();
        return view('quotation.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $quotation=Quatation::create([
            'client_id'=>request('client_id'),
            'company_name'=>request('company_name'),
            'fromany_activity'=>request('fromany_activity'),
            'fropany_address'=>request('fropany_address'),
            'fompany_phone'=>request('fompany_phone'),
            'fompany_email'=>request('fompany_email'),
            'quotation_no'=>request('quotation_no'),
            'email_subject'=>request('email_subject'),
            'created_name_phone'=>request('created_name_phone'),
            'quotation_date'=>request('quotation_date'),
            'quotation_validity_date'=>request('quotation_validity_date'),
            'custom_client_id'=>request('custom_client_id'),

        ]);

        if(!empty($request->file('signature'))){
            $file = $request->file('signature') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/signature/' ;
            $file->move($destinationPath,$fileName);

            $quotation->signature=$fileName;
            $quotation->save();
        }


        if(isset($request->description)){
            $data=[];
            foreach (request('description') as $key => $value) {
                $data[]=[

                    'quotation_id'=>$quotation->id,
                    'name'=>$value,
                    'qty'=>request('quantity')[$key],
                    'price'=>request('unit_price')[$key],
                    'unit'=>request('unit')[$key],
                    'remarks'=>request('remarks')[$key],
                    'weight'=>request('unit_weight')[$key],
                ];
            }
        }

        if(isset($request->term)){
            $term=[];
            foreach (request('term') as $key => $v) {
                $term[]=[

                    'quotation_id'=>$quotation->id,
                    'term'=>$v
                ];
            }
        }


        // dd($request->description[0]);

        // dd($data);

        if(!empty($data)){
            DB::table('quatation_details')->insert($data);
        }

        if(!empty($term)){

            DB::table('quatation_terms')->insert($term);
        }

        $output = ['success' => 1,
                            'msg' => __('Quotation Created Successfully !')
                        ];

        return redirect('quotations')->with('status', $output);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quatation  $quatation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation=Quatation::Leftjoin('contacts as c','c.id','quatations.client_id')
                    ->select('quatations.*','c.name','c.email','c.city','c.landmark','c.country','c.mobile','c.supplier_business_name')
                    ->with('details','terms')
                    ->find($id);
        // dd($quotation);
        return view('quotation.view', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quatation  $quatation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts=Contact::where('type','customer')->select('name','id')->get();

        $quotation=Quatation::with('details','terms')->find($id);

        // dd($quatation);
        return view('quotation.edit', compact('contacts','quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quatation  $quatation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $quotation=Quatation::find($id);

        // dd($quotation);
        DB::table('quatations')->where('id',$id)->update([
            'client_id'=>request('client_id'),
            'company_name'=>request('company_name'),
            'fromany_activity'=>request('fromany_activity'),
            'fropany_address'=>request('fropany_address'),
            'fompany_phone'=>request('fompany_phone'),
            'fompany_email'=>request('fompany_email'),
            'quotation_no'=>request('quotation_no'),
            'email_subject'=>request('email_subject'),
            'created_name_phone'=>request('created_name_phone'),
            'quotation_date'=>request('quotation_date'),
            'quotation_validity_date'=>request('quotation_validity_date'),
            'custom_client_id'=>request('custom_client_id'),

        ]);

        if(!empty($request->file('signature'))){
            $file = $request->file('signature') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/signature/' ;
            $file->move($destinationPath,$fileName);

            $quotation->signature=$fileName;
            $quotation->save();
        }


        if(isset($request->description)){
            $data=[];
            foreach (request('description') as $key => $value) {
                $data[]=[

                    'quotation_id'=>$quotation->id,
                    'name'=>$value,
                    'qty'=>request('quantity')[$key],
                    'price'=>request('unit_price')[$key],
                    'unit'=>request('unit')[$key],
                    'remarks'=>request('remarks')[$key],
                    'weight'=>request('unit_weight')[$key],
                ];
            }
        }

        if(isset($request->term)){
            $term=[];
            foreach (request('term') as $key => $v) {
                $term[]=[

                    'quotation_id'=>$quotation->id,
                    'term'=>$v
                ];
            }
        }


        // dd($request->description[0]);

        if($quotation->details->count() >0){
            $quotation->details()->delete();
        }

        if($quotation->terms->count() >0){
            $quotation->terms()->delete();
        }

        // dd($data);

        if(!empty($data)){
            DB::table('quatation_details')->insert($data);
        }

        if(!empty($term)){

            DB::table('quatation_terms')->insert($term);
        }

        $output = ['success' => 1,
                            'msg' => __('Quotation Updated Successfully !')
                        ];

        return redirect('quotations')->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quatation  $quatation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation=Quatation::find($id);

        if($quotation->details->count() >0){
            $quotation->details()->delete();
        }

        if($quotation->terms->count() >0){
            $quotation->terms()->delete();
        }

        $quotation->delete();
       $output=['success' => true,
                        'msg' => __("contact.deleted_success")
                ];
        return $output;
    }

    public function sendMail($id){

        $quotation=Quatation::Leftjoin('contacts as c','c.id','quatations.client_id')
                    ->select('quatations.*','c.name','c.email','c.city','c.landmark','c.country','c.mobile','c.supplier_business_name')
                    ->with('details','terms')->find($id);



        $pdf = PDF::loadView('quotation.pdf_send',compact('quotation'));



        $newFilename='/pdf/'.$id.date('ymdhi').'invoice.pdf';



        Storage::disk('local')->put($newFilename, $pdf->output());




        $filename='public/uploads/pdf/'.$id.date('ymdhi').'invoice.pdf';
        $file_path = url()->to($filename);



        $subject=$quotation->email_subject ?? 'Quotation Mail';
        $url = asset($file_path);
        $data=[
                'url'=>$url
            ];
        $email=$quotation->email;



        $msg='Mail Address Not Currect';
        $status=0;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            Mail::send('quotation.mail',$data,
            function($message)use($email,$subject)
            {
                $message->from('email@smtradingbd.com','Smtradingbd');
                $message->to($email);
                $message->subject($subject);
            });


            $msg='Mail Send Successfully To User';
            $status=1;
        }

        $output = ['success' => $status,
                            'msg' => $msg
                        ];

        return back()->with('status', $output);


    }
}
