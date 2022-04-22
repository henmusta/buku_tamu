<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ResponseStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengguna;
use PDF;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    use ResponseStatus;

    public function __construct()
    {
    //  $this->middleware('can:backend-data-pengguna-list', ['only' => ['index']]);
    //  $this->middleware('can:backend-data-pengguna-create', ['only' => ['create', 'store']]);
    //  $this->middleware('can:backend-data-pengguna-edit', ['only' => ['edit', 'update']]);
    //  $this->middleware('can:backend-data-pengguna-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $config['page_title'] = "Data Pengunjung";
        $page_breadcrumbs = [
          ['url' => '#', 'title' => "Data Pengunjung"],
        ];
        if ($request->ajax()) {
          $data = Pengguna::query();
          return DataTables::of($data)
          ->addColumn('print', function ($row){
            return $return = '<a class="btn btn-primary" href="pengguna/' . $row->id . '/generatePDF" target="_blank">Cetak E tiket</a>';
          })->addColumn('action', function ($row) {
              return
                '<div class="dropdown">
                <button type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                  Aksi <i class="mdi mdi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu">
                  <li> <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit" 
                        data-bs-id="' . $row->id . '"
                        data-bs-nama="' . $row->nama . '"
                        data-bs-perusahaan="' . $row->perusahaan . '"
                        data-bs-jabatan="' . $row->jabatan . '"
                        data-bs-alamat="' . $row->alamat . '"
                        data-bs-hp="' . $row->hp . '"
                        data-bs-jadwal_datang="' . $row->jadwal_datang . '"
                        data-bs-status="' . $row->status . '"
                        class="edit dropdown-item">Update</a></li>
                  <li> <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete" data-bs-id="' . $row->id . '" class="delete dropdown-item">Delete</a></li>
                </ul>
              </div>';
    
            })
            ->rawColumns(['action','print'])->make(true);
        }
    
        return view('backend.pengguna.index', compact('config', 'page_breadcrumbs'));  
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
               $data = Pengguna::create([
                  'nama' => ucwords($request['nama']),
                  'perusahaan' => $request['perusahaan'],
                  'jabatan' => $request['jabatan'],
                  'alamat' => $request['alamat'],
                  'jadwal_datang' => $request['jadwal_datang'],
                  'hp' => $request['hp'],
                  'status' => $request['selectStatus'],
                ]);
                DB::commit();
                if($data->save()){
                  $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan'
                  ]);
                } 
            } catch (Throwable $throw) {
            DB::rollBack();
            $response = response()->json($this->responseStore(false));
        }
      } else {
        $response = response()->json(['error' => $validator->errors()->all()]);
      }
      return $response;
    }

    public function show(Pengguna $pengguna)
    {
        //
    }

   
    public function update(Request $request, $id)
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
          $data = Pengguna::findOrFail($id);
          $data->update([
            'nama' => ucwords($request['nama']),
            'perusahaan' => $request['perusahaan'],
            'jabatan' => $request['jabatan'],
            'alamat' => $request['alamat'],
            'jadwal_datang' => $request['jadwal_datang'],
            'hp' => $request['hp'],
            'status' => $request['selectStatus'],
          ]);
          DB::commit();
          $response = response()->json($this->responseUpdate(true));
  
        } catch (Throwable $throw) {
          DB::rollBack();
          $response = response()->json($this->responseUpdate(false));
        }
      } else {
        $response = response()->json(['error' => $validator->errors()->all()]);
      }
      return $response;
    }

    public function destroy(Pengguna $pengguna)
    {
        //
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
