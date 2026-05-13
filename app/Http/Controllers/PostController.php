<?php
// 2- Define Controller that render a view
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\info;

use App\Models\Post;
use App\Models\Customer;

class PostController extends Controller
{
    public function index()
    {
        // get all data from database
            // id,title(VARCHAR),description(TEXT),created_at,updated_at

            $postsFromDB = Post::all(); 
            return view('posts.index', ['posts' => $postsFromDB]);
        // $allPosts = [
        //     ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '22-10-10 09:00:00'],
        //     ['id' => 2, 'title' => 'Javascript', 'posted_by' => 'Yassien', 'created_at' => '25-03-18 04:00:00'],
        //     ['id' => 3, 'title' => 'HTML', 'posted_by' => 'Maged', 'created_at' => '23-11-25 02:00:00'],
        //     ['id' => 4, 'title' => 'CSS', 'posted_by' => 'Abdo', 'created_at' => '26-03-19 01:15:00'],
        //     ['id' => 5, 'title' => 'Laravel', 'posted_by' => 'Khaled', 'created_at' => '26-01-01 11:15:00']
        // ];
        // return view('posts.index', ['posts' => $allPosts]);
    }

    // Show Action
    public function show($postId) // this is how to get the post id or URL Parameter value in variable then return this var
    {
        $singlePost = ['id' => 1, 'title' => 'Ruby', 'description' => 'This is description of this post', 'posted_by' => 'Mohamed', 'created_at' => '22-10-10 09:00:00'];
        $userInfo = ['email' => 'mohamedyo44@test.com', 'name' => 'Yosry'];
        return view('posts.show', ['post' => $singlePost], ['user' => $userInfo]);
    }

    // Create Action
    public function create() // this is how to get the post id or URL Parameter value in variable then return this var
    {
        return view('posts.create');
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
        return to_route('posts.show',1);
    }

    public function destroy(){
        // 1- delete from DataBase
        // 2- Redirect to posts.index
        return to_route('posts.index');
    }
}
