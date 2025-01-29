<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Books/Index', [

        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publishing_date' => 'nullable|date',
            'description' => 'required',
            'page_count' => 'required|integer',
            'image' => 'required|image|max:5096',
        ]);

        $uploadPath = public_path('uploads/covers');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->file('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->image->move($uploadPath, $imageName);

            $validated['image'] = $imageName;

            // Chceck if the image is uploaded in the folder
            if (!file_exists($uploadPath . '/' . $imageName)) {
                return Redirect::back()->with('error', 'Image not uploaded');
            }

        }


        $request->user()->books()->create($validated);

        return Redirect::route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
