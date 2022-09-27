<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class FrontController extends Controller
{
    public function index(){
        $articles = Article::with('get_created_by', 'get_upload_image')->latest()->paginate(9);
        return view('frontend.index', compact('articles'));
    }
}
