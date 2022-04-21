<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ResponseStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    use ResponseStatus;
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
        // 'captcha' => 'required|captcha'
      ]);
  
      if ($validator->passes()) {
        DB::beginTransaction();
        try {
                $data =  Pengguna::create([
                'nama' => ucwords($request['nama']),
                'perusahaan' => $request['perusahaan'],
                'jabatan' => $request['jabatan'],
                'alamat' => $request['alamat'],
                'jadwal_datang' => $request['jadwal_datang'],
                'hp' => $request['hp'],
                ]);
        
                $response = response()->json([
                'id' =>$data['id'],
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
                ]);

                $cetak = $this->generatePDF($data);

                DB::commit();
                $response = response()->json($this->responseStore(true, route('frontend.home.index')));
            } catch (Throwable $throw) {
            DB::rollBack();
            $response = response()->json($this->responseStore(false));
        }
      } else {
        $response = response()->json(['error' => $validator->errors()->all()]);
      }
      return $response;
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function generatePDF($data)
    {
        $data = [
            'title' => 'Formulir',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('pdf.e_tiket', $data);
    
        return $pdf->stream('e_tiket.pdf');
    }
}
