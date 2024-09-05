<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function userRegister(Request $request)
    {
        $status = null;
        $message = null;
        $success = null;
        $request = $request->all();

        // reglas
        $validator = Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator) {
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $result = $user->save();
            if ($result) {
                $status = Response::HTTP_OK;
                $message = 'Usuario registrado correctamente';
                $success = true;
            } else {
                $status = Response::HTTP_INTERNAL_SERVER_ERROR;
                $message = 'Error al registrar usuario';
                $success = false;
                Log::error('Error al registrar usuario'. $validator->errors());
            }
        } else {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = 'Error al registrar usuario';
            $success = false;
            Log::error('Error al registrar usuario'. $validator->errors());
        }

        return response()->json([
            'status' => $status,
            'success' => $success,
            'message' => $message,
        ]);
    }
}
