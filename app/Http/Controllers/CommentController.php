<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Tin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __construct()
{
    $this->authorizeResource(Comment::class, 'comment');
}
    public function index()
    {
        $data = Comment::query()
        ->join('tins', 'comments.tin_id', '=', 'tins.id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('tins.title', 'comments.content', 'users.name','comments.created_at', 'comments.id')
        ->latest('comments.id')
        ->paginate(5);
       return view('admin.comment.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tins = Tin::all();
        return view('admin.comment.create', compact('tins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::query()->create([
            'tin_id' =>$request->tin_id,
            'user_id' => Auth::id(),
            'parent_id' =>$request->parent_id,
            'content' => $request->content,
        ]);

        return redirect()->route('comment.index')->with('msg', 'Bình luận đã gửi thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('msg', 'Xoá thành công');
    }
}
