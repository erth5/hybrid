<?php

namespace App\Http\Controllers;

use App\Models\Github;
use App\Http\Requests\StoreGithubRequest;
use App\Http\Requests\UpdateGithubRequest;

class GithubController extends Controller
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
    public function store(StoreGithubRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Github $github)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Github $github)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGithubRequest $request, Github $github)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Github $github)
    {
        //
    }
}
