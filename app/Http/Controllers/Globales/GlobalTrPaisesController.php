<?php

namespace App\Http\Controllers\Globales;

use App\Http\Controllers\Controller;
use App\Models\Globales\GlobalTrPaises;
use Illuminate\Http\Request;

class GlobalTrPaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instancia = new GlobalTrPaises();

        return response(['data' => $instancia->listarTodo(), 'status' => 200]);
    }
}
