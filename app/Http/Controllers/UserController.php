<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'userName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt(['name' => $incomingFields['userName'], 'password' => $incomingFields['loginPassword']])){
            $request->session()->regenerate();
            return redirect('/home');
        }
        
        return back()->withErrors(['loginPassword' => 'Gegevens kloppen niet']);
    }

    public function register(Request $request){
        $incominmgFields = $request->validate([
            'name' => ['required', 'min:3', 'max:26', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:26'],
        ]);

        $incomingFields['password'] = bcrypt($incominmgFields['password']);
        $user = User::create($incominmgFields);
        auth()->login($user);
        return redirect('/home');
    }

    public function showEditForm(){
        return view('editAccount');
    }

    public function updateAccount(Request $request){
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $validationRules = [
            'name' => ['required', 'min:3', 'max:26', Rule::unique('users', 'name')->ignore($user->id)],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')->ignore($user->id)],
            'current_password' => 'required',
        ];

        if ($request->filled('new_password')) {
            $validationRules['new_password'] = ['min:6', 'max:26', 'confirmed'];
        }

        $validatedData = $request->validate($validationRules);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        
        if ($request->filled('new_password')) {
            $user->password = Hash::make($validatedData['new_password']);
        }

        $user->save();

        return redirect('/myPost')->with('success', 'Account updated successfully!');
    }

    public function deleteAccount(Request $request){
        $user = auth()->user();
        

        $user->posts()->delete();
        
        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully');
    }
}
