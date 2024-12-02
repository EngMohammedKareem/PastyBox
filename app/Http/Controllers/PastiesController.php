<?php

namespace App\Http\Controllers;

use App\Models\Pasty;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PastiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasties = Pasty::latest()->paginate(6);  // Fetch all pasties
        return view('pasties.index', compact('pasties'));  // Pass the pasties to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize("create.pasty");
        return view('pasties.create');  // Return the create form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        // Generate a slug from the title (you can also do this in the Pasty model, as shown earlier)
        $slug = Str::slug($request->title, '-');

        // Store the paste in the database
        $pasty = $request->user()->pasties()->create([
            'title' => $request->title,
            'details' => $request->details,
            'slug' => $slug,  // Store the slug
        ]);

        // Redirect to the pasties index with a success message
        return redirect()->route('pasties.index')
            ->with('success', 'Pasty created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Retrieve the pasty by its slug
        $pasty = Pasty::where('slug', $slug)->firstOrFail();

        // Pass the pasty to the view
        return view('pasties.show', compact('pasty'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        // Retrieve the pasty by its slug
        $pasty = Pasty::where('slug', $slug)->firstOrFail();

        // Check if the current user is authorized to edit the pasty
        Gate::authorize("edit.pasty", $pasty);

        // Return the edit form for a specific paste
        return view('pasties.edit', compact('pasty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        // Retrieve the pasty by its slug
        $pasty = Pasty::where('slug', $slug)->firstOrFail();

        // Check if the current user is authorized to update the pasty
        Gate::authorize("edit.pasty", $pasty);

        // Validate the request
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        // Update the paste
        $pasty->update([
            'title' => $request->title,
            'details' => $request->details,
            // Optionally update the slug if the title changes
            'slug' => Str::slug($request->title, '-'),
        ]);

        // Redirect to the pasties index with a success message
        return redirect()->route('pasties.index')
            ->with('success', 'Pasty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasty $pasty)
    {
        Gate::authorize("delete.pasty", $pasty);
        // Delete the paste
        $pasty->delete();

        return redirect()->route('pasties.index')
            ->with('success', 'Pasty deleted successfully');
    }
}
