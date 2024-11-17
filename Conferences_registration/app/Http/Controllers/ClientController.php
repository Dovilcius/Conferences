<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->get(); 
        $workers = User::where('role', 'worker')->get(); 
        $admins = User::where('role', 'admin')->get();
        
        return view('contacts.index', compact('clients', 'workers', 'admins'));
    }

    public function edit($id)
    {
        $client = User::findOrFail($id);
        
        return view('contacts.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        $client = User::findOrFail($id);

        $client->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Client information updated successfully!');
    }
}
