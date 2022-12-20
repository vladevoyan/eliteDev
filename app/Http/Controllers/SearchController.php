<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Books;
class SearchController extends Controller
{
    public function search (Request $request){
        $validator = Validator::make(["searchKeyword" => $request->route('searchKeyword')], ["searchKeyword" => "required|min:3"]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $books = Books::with('authors')
            ->where("books.title","LIKE","%".$validator->valid()['searchKeyword']."%")
            ->orWhereHas('authors', function($q) use ($validator){
                $q->where('name', 'LIKE', '%' . $validator->valid()['searchKeyword'] . '%');
            })
            ->simplePaginate(16);
        return response()->json($books);
    }
}
