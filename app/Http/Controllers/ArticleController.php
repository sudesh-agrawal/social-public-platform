<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Auth;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::with('get_created_by')->latest()->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function create(){
        return view('admin.article.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'upload_image' => 'required',
            'upload_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $data = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'tags' => $request->tags,
                'created_by' => Auth::user()->id
            ];

            $article = Article::create($data);
            if(!empty($request->upload_image)){
                if(count($request->upload_image) > 0){
                    foreach($request->upload_image as $image){
                        self::upload($image, $article->id);
                    }
                }
            }

            return redirect()->route('article.index')->with(['type' => 'success', 'msg' => "Data save successfully!"]);
        }catch (Exception $e){
            return redirect()->back()->with(['type' => 'danger', 'msg' => "Something went wrong! Please try again"]);
        }
    }

    public function edit($id){
        $article = Article::with('get_upload_image')->find($id);
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required'
        ]);

        try {
            $data = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'tags' => $request->tags
            ];

            Article::where('id', $id)->update($data);
            if(!empty($request->upload_image)){
                if(count($request->upload_image) > 0){
                    foreach($request->upload_image as $image){
                        self::upload($image, $id);
                    }
                }
            }
            return redirect()->route('article.index')->with(['type' => 'success', 'msg' => "Data save successfully!"]);
        }catch (Exception $e){
            return redirect()->back()->with(['type' => 'danger', 'msg' => "Something went wrong! Please try again"]);
        }
    }

    public static function upload($image, $article_id){
        $fileDbPath = "";
        if(!Storage::disk('public')->has('images')){
            Storage::disk('public')->makeDirectory('images');
        }
        if($image){
            $file = $image;
            $filename = time().'.'.$image->extension();
            $file->storeAs('public/images/',$filename);
            $fileDbPath = 'storage/images/'.$filename;

            $imageData = [
                'article_id' => $article_id,
                'image_name' => $fileDbPath
            ];

            Upload::create($imageData);
        }
    }

    public function deleteImage($id){
        try {
            Upload::where('id', $id)->delete();
            return redirect()->back()->with(['type' => 'success', 'msg' => "Image delete successfully!"]);
        }catch (Exception $e){
            return redirect()->back()->with(['type' => 'danger', 'msg' => "Something went wrong! Please try again"]);
        }
    }

    public function destroy($id){
        try {
            Article::where('id', $id)->delete();
            Upload::where('article_id', $id)->delete();
            return redirect()->back()->with(['type' => 'success', 'msg' => "Data delete successfully!"]);
        }catch (Exception $e){
            return redirect()->back()->with(['type' => 'danger', 'msg' => "Something went wrong! Please try again"]);
        }
    }

    public function show($id){
        $article = Article::with('get_upload_image')->find($id);
        return view('admin.article.show', compact('article'));
    }
}
