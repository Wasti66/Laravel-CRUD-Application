<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserPages(){
        return view('pages.user');
    }
    public function AllUserPages(){
        return view('pages.AllUser');
    }
    public function StoreUser(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:11',
            'address' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->back()->with('success', 'User Added Successfully');

    }
    public function AllUser(){
        return response()->json([
            'data' => User::all()
        ]);
    }
    public function UpdateUserPages($id){
        $user = User::findOrFail($id);
        return view('pages.UpdateUser', compact('user'));
    }
    public function UpdateUser(Request $request, $id)
    {
        try {

            $user = User::find($id);
            if(!$user){
                return response()->json([
                    'message' => 'User not found',
                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return view('pages.AllUser');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
   public function DeleteUser(Request $request, $id) {
    try {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
        
        $user->delete();
        
        return response()->json([
            'message' => 'User deleted successfully', 
        ]);
        
    } catch (\Exception $e) { 
        return response()->json([
            'message' => $e->getMessage(),
        ], 500);
    }
}
}