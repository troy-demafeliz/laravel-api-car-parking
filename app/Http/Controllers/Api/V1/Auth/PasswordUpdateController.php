<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class PasswordUpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json([
            'message' => 'Password updated successfully',
        ], Response::HTTP_ACCEPTED);
    }
}
