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
        $data = request()->all(); // $data = $_POST (in php native) && all() ->> Method of Eloquent Model
        $title   = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;


        $post = Post::create([
            'title' => $title,
            'description' => $description,
        ]);
        // 2- store the submitted data in database

        // 3- redirection to posts.index
        return to_route('posts.index');
    }

    // Edit Action
    public function edit(Post $post)
    {
        // select * from users
        $usersFromDB = User::all();
        return view('posts.edit', ['users' => $usersFromDB, 'post' => $post]);
    }

    // Update Action
    public function update($postId)
    {
        // 1- get the post data
        $title   = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        // 1- select * from posts where id = $postId;
        $singlePostFromDB = Post::find($postId);
        // 2- Update the submited post data in database
        $singlePostFromDB->update([
            'title'=>$title,
            'description'=>$description
        ]);
        // 3- redirection to posts.index
        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        // 1- delete from DataBase
          //select or find post from database
          //delete the post from database
        $post = Post::find($postId);
        $post->delete();

        // 2- Redirect to posts.index
        return to_route('posts.index', $postId);
    }
}
