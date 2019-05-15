<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class SearchController extends Controller
{
    public function searchFullText(Request $request)
    {
        if ($request->q != '') {
            $data = Movie::Search($request->q)->get();

            return response()->json($data);
        }
    }
}
