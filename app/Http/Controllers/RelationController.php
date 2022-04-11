<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Insurance;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
        // $user = User::find(2);

        // $insurance = Insurance::where('user_id', $user->id)->first();

        // dd($user->insurance);

        $insurance = Insurance::find(1);
        // $insurances = Insurance::with('user')->get();
        // $insurances = Insurance::get();

        dd($insurance->user);
        return view('relations.one_to_one', compact('insurances'));
    }

    public function one_to_many()
    {
        // $post = Post::find(1);
        // dd($post->comments);

        // $post = Post::find(2);
        // dd($post->comments);

        $comment = Comment::find(61);
        dd($comment->post);
    }

    public function posts()
    {
        $posts = Post::all();
        return view('relations.posts', compact('posts'));
    }

    public function post_single($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);

        // $next_post = Post::find($id+1);
        // $prev_post = Post::find($id-1);
        $next_post = Post::where('id', '>', $post->id)->first();
        $prev_post = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        // dd($next_post);

        return view('relations.post_single', compact('post', 'id', 'next_post', 'prev_post'));
    }

    public function register_subject()
    {
        $subjects = Subject::all();

        $student = Student::find(2);
        // dd($student->subjects->find(4));
        return view('relations.register_subject', compact('subjects', 'student'));
    }

    public function register_subject_submit(Request $request)
    {
        $student = Student::find(2);
        // dd($request->subject);
        // attache
        // detache
        // sync

        $student->subjects()->sync($request->subject);

        return redirect()->back();

    }
}
