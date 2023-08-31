<?php

namespace App\Http\Controllers;

use App\Models\Edge;
use Illuminate\Http\Request;

class EdgesController extends Controller
{
    public function addEdge (Request $request) {
        $edge = new Edge();
        $edge->source = $request->source;
        $edge->sourceHandle = $request->sourceHandle;
        $edge->target = $request->target;
        $edge->save();
        return response()->json(['success'=>true]);
    }

    public function edges () {
        $edges = Edge::all();
        return response()->json(['data' => $edges]);
    }
}
