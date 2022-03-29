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

        return response()->json([
            'status'=>'success', 
            'data'=>Profile::select(\DB::raw('YEAR(tanggal_lahir)'))->get() 
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
