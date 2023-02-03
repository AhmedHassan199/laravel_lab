<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $allPosts = Post::paginate(5);
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()
    {
        $users = User::get();

        return view('posts.create',[
            'users' => $users,
        ]);    }

    public function store(StorePostRequest $request)
    {

        // return 'insert in database';
        $data = $request->all();
        $title = $data['title'];
        $description = $data['description'];
        // $userId = $data['post_creator'];
        // dd( $title ,$description ,$userId) ;
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' =>$request->userId,
        ]);
              return redirect('/posts') ;

    }

    public function show($postId)
    {
        $allComments = Comment::get();
        $users = User::get();
        $post = Post::find($postId);
        // dd( $users);
        // dd($post);
        return view('posts.show',[
            'posts'=> $post,
            'users' => $users,
            'comments' => $allComments,
             'id' => $postId
        ]);
    }
    public function edit($id )
    {
        $users = User::get();
        $post = Post::find($id);
        // dd($users);
        // dd($post);
        // return $id ;
        return view('posts.edit',[
            'posts'=> $post,
            'users' => $users,

        ]);
    }
    public function update($id ,StorePostRequest $request)
    {
        // dd($postId);
        // return view('posts.update');

        $post = Post::find($id);
        $post->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'user_id' =>$request->userId,

        ]);
        return redirect('/posts') ;

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts') ;

        // dd($postId);

    }

}
