<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

        public function login(Request $request)
        {
            if ( $request->usuario === 'admin' && $request->password === 'admin'  ) {
                 $success = true;
                 $message = 'Logeado Satisfaactoriamente!';
             } else {
                 $success = false;
                 $message = 'No Autorizado';
             }

            $response = [
                'success' => $success,
                'message' => $message
            ];
            return response()->json($response);
        }


}
