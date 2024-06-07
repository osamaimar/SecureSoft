<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view pages')->only(['index']);
        $this->middleware('checkPermission:create page')->only(['create','store']);
        $this->middleware('checkPermission:edit page')->only(['edit','update']);
        $this->middleware('checkPermission:delete page')->only(['destroy']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.page.pages-list');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.page.add-page');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $request->rules();

        $page = new Page();
        $page->title = $request->title;
        $page->slug = Str::lower($request->title);
        $page->content = $request->content;
        if($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $image_path_name = time().$image_path->getClientOriginalName();
            $image_path->move(public_path('images'), $image_path_name);
            $page->image_path = $image_path_name;
        }
        $page->is_active = $request->status;
        $page->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('Admin.page.edit-page', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $request->rules();
        $page->title = $request->title;
        $page->slug = Str::lower($request->title);
        $page->content = $request->content;
        if($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $image_path_name = time().$image_path->getClientOriginalName();
            $image_path->move(public_path('images'), $image_path_name);
            $page->image_path = $image_path_name;
        }
        $page->is_active = $request->status;
        $page->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back();
    }
}
