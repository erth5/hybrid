<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBackgroundRequest;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Models\Background;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreBackgroundRequest $request)
    {
        $request->validate(
            ['image' => 'required']
        );
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request != true) {
            return redirect()->route('images')->with('statusError', __('image.validateError'));
        }

        if ($request->hasFile('image')) {
            $name = auth()->user() . "_" . time() . "_" . $request->file('image')->has('name');
            $request->file('image')->storeAs('images', $name, 'public');
            $metadata = Image::create();
            $metadata->name = $name;
            $metadata->path = 'images/';
            $metadata->extension = $request->file('image')->extension();
            $metadata->saveOrFail();
            session()->put('success', 'image ' . $metadata->name . ' saved (session)');
            session()->put('image', $metadata->name);
            return redirect()->route('image')
                ->with('statusSuccess', __('image.uploadSuccess') . $metadata->name . 'with()lang()')
                ->with('image', storage_path($metadata->path . $metadata->name));
        }
        return redirect()->route('image')->withErrors('Request has no image');
    }

    /**
     * Display the specified resource.
     */
    public function show(Background $background)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Background $background)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBackgroundRequest $request, Background $background)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Background $background)
    {
        //
    }
}
