<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Str;
use Validator;
class ProfileController extends Controller
{
    
    public function listPekerjaan() {
        return response()->json([
            'status'=>'success', 
            'data'=>Profile::select('pekerjaan')
                ->orderBy('pekerjaan', 'DESC')
                ->groupBy('pekerjaan')->get()
        ]);
    }
    public function listTahunLahir() {
        $tahun = \DB::select( \DB::raw("SELECT EXTRACT(YEAR FROM tanggal_lahir) as tahun
        from profile group by 1") );
        return response()->json([
            'status'=>'success', 
            'data'=>$tahun
        ]);

        return response()->json([
            'status'=>'success', 
            'data'=>Profile::select(\DB::raw('YEAR(tanggal_lahir)'))->get() 
        ]);
    }
    public function listBulanLahir() {
        $bulan = \DB::select( \DB::raw("SELECT EXTRACT(MONTH FROM tanggal_lahir) as bulan
        from profile group by 1") );
        return response()->json([
            'status'=>'success', 
            'data'=>$bulan
        ]);

    }
    public function index() {
        // print_r(request()->segment(0));exit();
        return response()->json([
            'status'=>'success', 
            'data'=>Profile::orderBy('id', 'DESC')->paginate(10)
        ]);

    }

    // function steps($templateID, $step)

    public function show($pekerjaan=null, $tahun=null, $bulan=null) {
        return response()->json([
            'status'=>'success', 
            'data'=>Profile::orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    public function filter(Request $request) {
        $txt = $request['cari'];
        $pekerjaan = $request['pekerjaan'];
        $tahun = $request['tahun'];
        $bulan = $request['bulan'];
        $filter = [
            'txt'=>$txt,
            'pekerjaan'=>$pekerjaan,
            'tahun'=>$tahun,
            'bulan'=>$bulan
        ];
        $profile = Profile::where(function ($query) use ($filter){
            if(!empty($filter['pekerjaan']) && $filter['pekerjaan']!=0) {
                $query->orWhere('pekerjaan',$filter['pekerjaan']);
            }
            if(!empty($filter['bulan']) && $filter['bulan']!=0) {
                $query->orWhereRaw(\DB::raw("EXTRACT(MONTH FROM tanggal_lahir) = '".$filter['bulan']."'"));
            }
            if(!empty($filter['tahun']) && $filter['tahun']!=0) {
                $query->orWhereRaw(\DB::raw("EXTRACT(YEAR FROM tanggal_lahir) = '".$filter['tahun']."'"));
            }
            if(!empty($filter['txt'])) {
                $query->orWhereRaw(\DB::raw("nama like '%".$filter['txt']."%'"));
                $query->orWhereRaw(\DB::raw("pekerjaan like '%".$filter['txt']."%'"));
            }
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);
        
        return response()->json([
            'status'=>'success', 
            'data'=>$profile
        ]);
    }
    public function checkout(Request $request) {
        $va           = '0000005260142060'; //get on iPaymu dashboard
    $secret       = 'SANDBOXC4CC5262-3437-4A57-B6BC-063568084C49-20220328152500'; //get on iPaymu dashboard

$url          = 'https://my.ipaymu.com/api/v2/payment'; //url
$method       = 'POST'; //method

//Request Body//
$body['product']    = array('headset', 'softcase');
$body['qty']        = array('1', '3');
$body['price']      = array('100000', '20000');
$body['returnUrl']  = 'https://mywebsite.com/thankyou';
$body['cancelUrl']  = 'https://mywebsite.com/cancel';
$body['notifyUrl']  = 'https://mywebsite.com/notify';
//End Request Body//

//Generate Signature
// *Don't change this
$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
$requestBody  = strtolower(hash('sha256', $jsonBody));
$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
$signature    = hash_hmac('sha256', $stringToSign, $secret);
$timestamp    = Date('YmdHis');
//End Generate Signature


$ch = curl_init($url);

$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
    'va: ' . $va,
    'signature: ' . $signature,
    'timestamp: ' . $timestamp
);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POST, count($body));
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$err = curl_error($ch);
$ret = curl_exec($ch);
curl_close($ch);
if($err) {
    echo $err;
} else {

    //Response
    $ret = json_decode($ret);
    if($ret->Status == 200) {
        $sessionId  = $ret->Data->SessionID;
        $url        =  $ret->Data->Url;
        header('Location:' . $url);
    } else {
        print_r($ret);
    }
    //End Response
}
    }
    public function store(Request $request) {
        $validation = Validator::make($request->all(),[
            'nama'=>'required|string',
            'pekerjaan'=>'required|string',
            'tanggal_lahir'=>'required|date'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $record = Profile::create([
            'nama' => $request->get('nama'),
            'pekerjaan' => $request->get('pekerjaan'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'uuid' => Str::uuid()->toString()
        ]);

        return response()->json([
            'status'=>'success', 
            'data'=>$record
            ]
        );
    }

    public function update(Request $request, $id) {
        $validation = Validator::make($request->all(),[
            'nama'=>'required|string',
            'pekerjaan'=>'required|string',
            'tanggal_lahir'=>'required|date'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $record = Profile::find($id);
        $record->nama = $request->get('nama');
        $record->pekerjaan = $request->get('pekerjaan');
        $record->tanggal_lahir = $request->get('tanggal_lahir');
        $record->save();

        return response()->json([
            'status'=>'success', 
            'data'=>$record
            ]
        );
    }

    public function destroy($id){
        $record = Profile::find($id);
        if(!empty($record)) {
            $record->delete();
            return response()->json([
                'status'=>'success'
                ]
            );
        } else {
            return response()->json([
                'status'=>'success', 
                'data'=>"Data tidak ditemukan"
                ]
            );
        }
    }
}
