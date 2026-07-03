<?php
// 2- Define Controller that render a view
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Post;

use App\Models\User;


class PostController extends Controller
{
    public function index()
    {
        // Full-Text Search
        $search = request('search');
        // select * from posts;
        $postsFromDB = Post::when($search, function ($query) use ($search) {
            $query->whereFullText(['title', 'description'], $search);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(6)
            ->withQueryString();

        if (request('page') > $postsFromDB->lastPage() && $postsFromDB->lastPage() > 0) {
            return redirect()->route('posts.index', [
                'search' => $search,
                'page' => $postsFromDB->lastPage(),
            ]);
        }

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post) // This way called Route Model Binding (Implicit Blinding)
    {
        // select * from posts where id = $postId;
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        // select * from users
        $usersFromDB = User::all();
        return view('posts.create', ['users' => $usersFromDB]);
    }

    public function store(Request $request): RedirectResponse
    {

        // validate data
        $validated = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'post_creator' => 'required|exists:users,id' // exists:table,column
        ]);

        // 1- get the user data
        $title   = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;


        $post = Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['post_creator']
        ]);
        // 2- store the submitted data in database

        // 3- redirection to posts.index
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        // select * from users
        $usersFromDB = User::all();
        return view('posts.edit', ['users' => $usersFromDB, 'post' => $post]);
    }

    public function update($postId)
    {
        // 1- get the data to update -- data from inputs
        $title   = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // 1- select * from posts where id = $postId;
        $post = Post::find($postId);

        //Data Validation
        if (
            $post->title === $title &&
            $post->description === $description &&
            $post->user_id == $postCreator
        ) {
            return back()->with('info', 'Nothing changed.');
        }
        $validated = request()->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'post_creator' => 'required|exists:users,id' // exists:table,column
        ]);

        // 2- Update the Validate Submited post data in database
        $post->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['post_creator']
        ]);

        // 3- redirection to posts.index
        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        // 1- delete from DataBase
        $post = Post::find($postId);
        $post->delete();
        return to_route('posts.index', $postId);
    }
}
