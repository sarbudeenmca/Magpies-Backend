<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller {
    public function index() {

        $leads = Lead::all();

        if ($leads->count() > 0) {
            $data = [
                'status' => 200,
                'leads' => $leads,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No records found!',
            ];
            return response()->json($data, 404);
        }
    }
}
