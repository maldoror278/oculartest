<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{


        public function login(Request $request)
        {
            //  $credentials = [
            //      'usuario'    => $request->usuario,
            //      'password' => $request->password,
            //  ];

             if ( $request->usuario === 'admin' && $request->password === 'admin'  ) {
                 $success = true;
                 $message = 'Logeado Satisfaactoriamente!';
             } else {
                 $success = false;
                 $message = 'No Autorizado';
             }

            // response
            $response = [
                'success' => $success,
                'message' => $message
            ];
            return response()->json($response);
        }


}
