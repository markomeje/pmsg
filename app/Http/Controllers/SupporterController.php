<?php

namespace App\Http\Controllers;
use App\Models\Supporter;
use Exception;
use Validator;

class SupporterController extends Controller
{
    /**
     * Add a supporter
     */
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [ 
            'title' => ['nullable', 'string',], 
            'firstname' => ['required', 'string', 'max:50'], 
            'lastname' => ['required', 'string', 'max:50'], 
            'email' => ['required', 'email', 'unique:users'], 
            'phone' => ['required', 'unique:users'], 
            'lga' => ['required', 'string'],
        ], ['lga.required' => 'Select your local government.']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        // try {
            $supporter = Supporter::create($data);
            if ($supporter) {
                return response()->json([
                    'status' => 1,
                    'info' => 'Operation successful',
                    'redirect' => route('support', ['success' => 'true']),
                ]);
            }

            throw new Exception('Error Processing Request');

        // } catch (Exception $error) {
        //     return response()->json([
        //         'status' => 0,
        //         'info' => 'Unknown error. Try again later',
        //     ]);
        // }
    }
}
