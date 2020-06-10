<?php

namespace App\Http\Controllers;

use App\Likeable;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeableController extends Controller
{
public function like($id, Request $request)
    {
        {
            $user_id = Auth::id();
            $post = Post::find($id);
            $likes = $post->likes()->where('user_id',$user_id)->get();
            if($likes->isNotEmpty()){
                return response([
                    'message' => 'No puedes meter más like'
                ],400);
            }
            $post->likes()->create(['user_id'=>$user_id]);
            return response([
                'message' => 'thanks u '
            ],201);
        }
    }
    public function disLike($id, Request $request){
        $user_id = Auth::id();
        $dislikes = DB::table('likeables')->where('user_id',$user_id)->where('likeable_id',$request->likeable_id)->delete();
         return response([
             'message' => 'No me gusta'
         ],201);  
    }
}
