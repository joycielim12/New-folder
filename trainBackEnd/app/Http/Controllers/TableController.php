<?php

namespace App\Http\Controllers;

use App\Models\TrainList;
use Illuminate\Http\Request;

class TrainListController extends Controller
{
    public function index()
    {
        $trainList = TrainList::all();
        return response()->json($trainList);
    }
}