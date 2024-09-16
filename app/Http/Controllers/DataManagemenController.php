<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class DataManagemenController extends Controller
{
  public function kabupaten(){
      $kabupaten = Kabupaten::all();
      return view('datamanagement.kabupaten.index',[
        'kab' => $kabupaten
      ]);
  }


}
