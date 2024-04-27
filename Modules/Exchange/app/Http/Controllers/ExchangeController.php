<?php

namespace Modules\Exchange\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ExchangeRate;
use App\Models\ExchangeRateDetail;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource with loadPage helper.
     * @return Renderable
     */
    public function index()
    {
        return loadPage('exchange::index');
    }

    public function init_table(){
        $query = ExchangeRate::all();
        return select_table($query);
    }

    public function init_table_detail(Request $request){
        $data = $request->all();
        $idex = $data['id_exchange'];
        $query = ExchangeRateDetail::query();
        $query->where('id_exchange', $idex);
        $query->orderBy('exchange_rate', 'desc');
        $query->get();
        return select_table($query);
    }

    public function sync(){
        $query = sync_exchange();
        if($query['status'] == 200){
            $data = $query['data'];

            // Masukkan data induknya
            $idex = md5(rand(0, 100).generateCode());
            $arr = [
                'id_exchange' => $idex,
                'timestamp' => ts_conv($data['timestamp']),
                'base' => $data['base'],
                'date' => $data['date'],
                'created_at' => now(),
            ];
            $query = ExchangeRate::create($arr);

            // Ambil ratesnya
            foreach($data['rates'] as $key => $val){
                $ratlist = [
                    'id_exchange_detail' => md5(rand(0, 100).generateCode()),
                    'id_exchange' => $idex,
                    'currency_name' => $key,
                    'exchange_rate' => $val,
                    'created_at' => now(),
                ];
                $query = ExchangeRateDetail::create($ratlist);
            }

            if($query){
                return response()->json(['success' => true], 200);
            }else{
                return response()->json(['success' => false], 500);
            }
        }else{
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function create(Request $request)
    {
        $data = $request->all();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function read(Request $request)
    {
        $data = $request->all();
        $idex = $data['id_exchange'];
        $query = ExchangeRate::where('id_exchange', $idex)->first();
        if($query){
            $query2 = ExchangeRateDetail::where('id_exchange', $idex)->get();
            return response()->json(['success' => true, 'parent' => $query, 'detail' => $query2], 200);
        }else{
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $data = $request->all();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request)
    {
        $data = $request->all();
    }
}
