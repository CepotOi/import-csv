<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
  private function validateRequest(Request $request)
  {
    return $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:6',
    ]);
  }

  public function index()
  {
    $users = User::paginate(15);
    return view('users.index', compact('users'));
  }

  public function show(User $user)
  {
    return view('users.show', compact('user'));
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    $data = $this->validateRequest($request);
    $user = new User;
    $user->fill($data);
    $user->password = bcrypt($data['password']);
    $user->save();
    return redirect()->route('users.index')->with('success', 'User created successfully');
  }

  public function edit(User $user)
  {
    return view('users.edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    $data = $this->validateRequest($request, $user);
    $user->fill($data);
    $user->save();
    return redirect()->route('users.index')->with('success', 'User updated successfully');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
  }

  public function import()
  {
    Excel::import(new UsersImport, public_path('storage/users/users.csv'));

    return redirect()->route('user.index')->with('success', 'Users imported successfully.');
  }
}
