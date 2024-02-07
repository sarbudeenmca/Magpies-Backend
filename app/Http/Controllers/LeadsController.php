<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
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

    public function create(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'lead_name' => 'required|string|max:191',
                'company_name' => 'required|string|max:191',
                'phone_number' => 'required|digits|max:14',
                'mobile_number' => 'required|digits|max:14',
                'email_address' => 'required|email|max:191',
                'city' => 'required|string|max:191',
                'country' => 'required|string|max:191',
                'lead_status' => 'required|string|max:191',
                'descritpion' => 'required|string|max:1500'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 201,
                'errors' => $validator->message()
            ], 422);
        } else {
            $leads = Lead::create([
                'lead_name' => $request->lead_name,
                'company_name' => $request->company_name,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number,
                'email_address' => $request->email_address,
                'city' => $request->city,
                'country' => $request->country,
                'lead_status' => $request->lead_status,
                'description' => $request->description,
            ]);

            if ($leads) {
                return response()->json([
                    'status' => 200,
                    'message' => "Lead Created successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong!"
                ], 500);
            }
        }
    }
}
