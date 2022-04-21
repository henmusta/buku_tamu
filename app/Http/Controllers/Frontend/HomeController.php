<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ResponseStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.home.index');  
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'perusahaan' => 'required',
        'jabatan' => 'required',
        'alamat' => 'required',
        'jadwal_datang' => 'required',
        'hp' => 'required',
      ]);
  
      if ($validator->passes()) {
        DB::beginTransaction();
        try {
                Pengguna::create([
                'nama' => ucwords($request['name']),
                'perusahaan' => $request['name'],
                'jabatan' => $request['jabatan'],
                'alamat' => $request['alamat'],
                'jadwal_datang' => $request['jadwal_datang'],
                'hp' => $request['hp'],
                ]);
        
                $response = response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
                ]);
            } catch (Throwable $throw) {
            DB::rollBack();
            $response = response()->json($this->responseStore(false));
        }
      } else {
        $response = response()->json(['error' => $validator->errors()->all()]);
      }
      return $response;
    }
}
