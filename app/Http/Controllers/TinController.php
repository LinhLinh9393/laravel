<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use App\Http\Requests\StoreTinRequest;
use App\Http\Requests\UpdateTinRequest;
use App\Models\Comment;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tin = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->get();

        $new = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('created_at')->paginate(6);

        $tinDL= DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title','img', 'desc')
        ->where('categories.title', '=', 'Du lịch')->get();

        $top1 = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('view')->first();

        $danhmuc= DB::table('categories')
        ->select('id', 'title')
        ->get();

        return view('client.index',['tin' => $tin, 'new' => $new, 'tinDL'=> $tinDL, 'top1' => $top1, 'danhmuc' => $danhmuc]);
    }

    public function loadAll($id)
    {
        // $tin
        $tins = DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title as name','img', 'desc')
         ->where('categories.id', $id)
        ->get();

        $new = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('created_at')->paginate(6);

        $tinDL= DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title','img', 'desc')
        ->where('categories.title', '=', 'Du lịch')->get();

        $top5 = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('view')->paginate(5);

        $danhmuc= DB::table('categories')
        ->select('id', 'title')
        ->get();

        return view('client.content',['tins' => $tins, 'new' => $new, 'tinDL'=> $tinDL, 'top5' => $top5, 'danhmuc' => $danhmuc]);
    }

    public function gioithieu()
    {
        return view('client.gioithieu');
    }

    public function chiTiet($id)
    {
        Tin::where('id', $id)->increment('view');

        $tin = Tin::findOrFail($id);

        $tins = DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title as name','img', 'desc')
         ->where('categories.id', $id)
        ->get();

        $new = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('created_at')->paginate(6);

        $tinDL= DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title','img', 'desc')
        ->get();

        $top5 = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('view')->paginate(5);

        $danhmuc= DB::table('categories')
        ->select('id', 'title')
        ->get();

        $binhluan = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.id as idbl', 'users.name', 'content', 'comments.created_at','parent_id')
        ->where('comments.tin_id', $id)
        ->get();

        $commentsByParents = [];

        foreach ($binhluan as $comment) {
            if ($comment->parent_id === null) {
                $comment->replies = [];
                $commentsByParents[$comment->idbl] = $comment;
            } else {
                if (isset($commentsByParents[$comment->parent_id])) {
                    $commentsByParents[$comment->parent_id]->replies[] = $comment;
                }
            }
        }


        // $binhluan2 = DB::table('comments')
        // ->join('users', 'comments.user_id', '=', 'users.id')
        // ->select('comments.id as idbl', 'users.name', 'content', 'comments.created_at')
        // ->where('comments.tin_id', $id)
        // ->where('comments.parent_id','comments.id')
        // ->get();



        return view('client.chiTiet',['tins' => $tins,'tin' => $tin, 'new' => $new, 'tinDL'=> $tinDL, 'top5' => $top5, 'danhmuc' => $danhmuc, 'binhluan' => $commentsByParents]);
    }

    public function lienHe(){
        return view('client.lienHe');
    }

    public function search(Request $request){


        $key = $request->input('key');

        $tin = Tin::where('title', 'like', "%$key%")
                    ->orWhere('desc', 'like', "%$key%")
                    ->orWhere('content', 'like', "%$key%")
                    ->get();

        $new = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('created_at')->paginate(6);

        $tinDL= DB::table('tins')
        ->join('categories', 'tins.id_categories', '=', 'categories.id')
        ->select('tins.id', 'tins.title','img', 'desc')
        ->get();

        $top5 = DB::table('tins')
        ->select('id', 'title','img', 'desc')
        ->orderByDesc('view')->paginate(5);

        $danhmuc= DB::table('categories')
        ->select('id', 'title')
        ->get();

        return view('client.search', ['tin'=> $tin,'new' => $new, 'tinDL'=> $tinDL, 'top5' => $top5, 'danhmuc' => $danhmuc,'key' => $key]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTinRequest $request, $tin_id)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::query()->create([
            'tin_id' => $tin_id,
            'user_id' => Auth::id(),
            'parent_id' =>$request->parent_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('msg', 'Bình luận đã gửi thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tin $tin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tin $tin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTinRequest $request, Tin $tin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tin $tin)
    {
        //
    }
}
