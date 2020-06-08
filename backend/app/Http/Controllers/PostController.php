<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function insert(Request $request)
    {
        try {
            $body = $request->all();
            $body['user_id'] = Auth::id();
            if($request->has('imagen')){
                $imageName = time() . '-' . request()->imagen->getClientOriginalName(); //time() es como Date.now()
                request()->imagen->move('images/posts', $imageName); //mueve el archivo subido al directorio indicado (en este caso public path es dentro de la carpeta public)
                $body['imagen'] = $imageName;    
            }
            $post = Post::create($body);
            return response($post, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function GetAll(Request $request)
    {
        try {
            $body = Post::with('user')->get();
            return response($body, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function PostByUser()
    {
        try {
            $body = Post::with('user')->get();
            return response($body, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}


