<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ResponseStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pengguna;
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
            ->addColumn('action', function ($row) {
              return
                '<div class="dropdown">
                <button type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                  Aksi <i class="mdi mdi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu">
                  <li> <a href="#" data-bs-toggle="modal" data-bs-target="#modalUpdate" data-bs-id="' . $row->id . '" class="edit dropdown-item">Update</a></li>
                  <li> <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete" data-bs-id="' . $row->id . '" class="delete dropdown-item">Delete</a></li>
                </ul>
              </div>';
    
            })
            ->make(true);
        }
    
        return view('backend.pengguna.index', compact('config', 'page_breadcrumbs'));  
    }

  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
