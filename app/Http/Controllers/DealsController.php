<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealsController extends Controller {
    public function index(Request $request) {
        $limit = $request->input('limit', 5);
        $deals = Deal::limit($limit)->get();

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
