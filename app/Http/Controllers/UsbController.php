<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsbController extends Controller
{
    public function insert(Request $request)
    {
        DB::table('usb')->insert([
            'ip' => $request->input('ip'),
            'hostname' => $request->input('hostname'),
            'color' => $request->input('color'),
            'created_at' => now(),
        ]);
        #return response()->json(['message' => 'IP-Adresse erfolgreich gespeichert.']);
    }
}
