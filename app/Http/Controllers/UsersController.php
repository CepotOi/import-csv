<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::paginate(15);
    return view('users.index', compact('users'));
  }

  public function import()
  {
    Excel::import(new UsersImport, public_path('storage/users/users.csv'));

    return redirect()->route('user.index')->with('success', 'Users imported successfully.');
  }
}
