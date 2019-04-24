<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;

class ComentsController extends Controller
{
    public function index(Request $request)
    {
        $com = new Coment();
        $com->msg = $request->msg;
        $com->prod_id = $request->prod_id;
        $com->save();
        return redirect()->back();
    }
}
