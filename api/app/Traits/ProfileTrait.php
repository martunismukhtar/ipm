<?php
namespace App\Traits;
use App\Models\Profile;

trait ProfileTrait
{
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
}

