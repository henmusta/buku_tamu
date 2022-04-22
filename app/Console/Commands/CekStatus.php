<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class CekStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:cekstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
          $pengguna = Pengguna::where([
            ['status', '0'],
            ])->select('*');
          $pengguna->chunk(500, function ($pengguna) {
            foreach ($pengguna as $item) {
                Pengguna::find($item['id'])->update(['status' => '2']);
            }
          });
          DB::commit();     
        } catch (\Throwable $throw) {
          Log::error($throw);
          DB::rollBack();
          // $response = response()->json($this->responseStore(false, 'Pastikan format sudah sesuai dengan contoh'));
        }
    }
}
