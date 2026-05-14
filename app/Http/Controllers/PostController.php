<?php
// 2- Define Controller that render a view
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\info;

use App\Models\Post;

use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // select * from posts;
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    // Show Action
    public function show(Post $post) // This way called Route Model Binding (Implicit Blinding)
    {
        // select * from posts where id = $postId;
        return view('posts.show', ['post' => $post]);
    }

    // Create Action
    public function create()
    {        
        // select * from users
        $usersFromDB = User::all();
        return view('posts.create', ['users' => $usersFromDB]);
    }

    // Store Action
    public function store()
    {
        // 1- get the user data
        // $request = request();  // global helper method
        // dd($request->title, $request->name, $request->all());  // all() ->> Method of Eloquent Model 
        $data = request()->all();
        $title   = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        // dd($data, $title, $description, $postCreator);
        // 2- store the user data in database

        // 3- redirection to posts.index
        return to_route('posts.index');
    }

    // Edit Action
    public function edit()
    {
        $editPost = ['title' => 'Ruby', 'description' => 'This is description of this post', 'post_creator' => 'Mohamed'];
        return view('posts.edit', ['post' => $editPost]);
    }

    // Update Action
    public function update()
    {
        // 1- get the user data
        // $data = request()->all();
        // $title   = request()->title;
        // $description = request()->description;
        // $postCreator = request()->post_creator;
        // dd($title, $description, $postCreator);
        // 2- Update the user data in database
        // 3- redirection to posts.index
        return to_route('posts.show', 1);
    }

    public function destroy()
    {
        // 1- delete from DataBase
        // 2- Redirect to posts.index
        return to_route('posts.index');
    }
}
