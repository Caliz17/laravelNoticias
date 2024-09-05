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

    public function userLogin(Request $request)
    {
        $data = $request->all();

        // Validación
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'success' => false,
                'message' => 'Error al iniciar sesión',
                'errors' => $validator->errors(),
            ]);
        }

        // Intentar autenticación
        if (!$token = Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return response()->json([
                'status' => 401,
                'success' => false,
                'message' => 'Credenciales inválidas',
            ]);
        }

        // Si la autenticación es correcta
        return $this->respondWithToken($token);
    }

    public function respondWithToken($token)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'success' => true,
            'message' => 'Inicio de sesión correcto',
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function userProfile()
    {
        if (auth()->user()) {
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Perfil de usuario',
                'data' => auth()->user(),
            ]);
        } else {
            return response()->json([
                'status' => Response::HTTP_UNAUTHORIZED,
                'success' => false,
                'message' => 'No autorizado',
            ]);
        }
    }

}
