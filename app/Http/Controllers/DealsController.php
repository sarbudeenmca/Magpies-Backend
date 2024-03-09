<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealsController extends Controller {
    public function index(Request $request) {
        $limit = $request->input('limit', 5);
        // $deals = Deal::with('lead')->limit($limit)->get();
        $deals = DB::table('deals')
            ->join('leads', 'deals.lead_id', '=', 'leads.id')
            ->select('leads.lead_name', 'deals.service_type', 'deals.estimated_price', 'deals.kick_off_date', 'deals.status', 'deals.id')
            ->limit($limit)
            ->get();

        foreach ($deals as $deal) {
            $deal->estimated_price = number_format($deal->estimated_price, 2);
        }


        if ($deals->count() > 0) {
            $data = [
                'status' => 200,
                'deals' => $deals,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No Records Found',
            ];

            return response()->json($data, 404);
        }
    }
}
