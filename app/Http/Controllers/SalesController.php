<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class SalesController extends Controller
{
  public function venta()
  {
    $users = User::all();

    return view('sales.new', compact('users'));
  }
}
