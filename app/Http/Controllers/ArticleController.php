<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use App\Http\Requests\StoreTinRequest;
use App\Http\Requests\UpdateTinRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tin::query()->latest('id')->paginate(5);
        return view('admin.tin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.tin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTinRequest $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tac_gia' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'content' => 'required|string',
            'id_categories' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('images', 'public');
        }

        Tin::create([
            'title' => $request->title,
            'tac_gia' => $request->tac_gia,
            'desc' => $request->desc,
            'content' => $request->content,
            'id_categories' => $request->id_categories,
            'img' => $imgPath,
        ]);

        return redirect()->route('tin.index')->with('msg', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tin $tin)
    {
        $categories = Category::all();
        return view('admin.tin.show', compact('tin', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tin $tin)
    {
        $categories = Category::all();
        return view('admin.tin.edit', compact('categories', 'tin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTinRequest $request, Tin $tin)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tac_gia' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'content' => 'required|string',
            'id_categories' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('images', 'public');
        }

        $tin->update([
            'title' => $request->title,
            'tac_gia' => $request->tac_gia,
            'desc' => $request->desc,
            'content' => $request->content,
            'id_categories' => $request->id_categories,
            'img' => $imgPath,
        ]);

        return redirect()->route('tin.index') ->with('msg', 'Sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tin $tin)
    {
        $tin->delete();

        return redirect()->route('tin.index') ->with('msg', 'Xoá thành công');

    }
}
