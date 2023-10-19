<?php

namespace App\Http\Controllers;

use App\Models\SharedFiles;
use Illuminate\Http\Request;
use Storage;

class SharedFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = SharedFiles::with('user')->paginate(10);
        return view('shared-files.index', compact('files'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shared-files.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,zip,doc|max:2048',
            // Set an appropriate max file size
        ]);

        $filePath = $request->file('file')->store('shared_files');

        SharedFiles::create([
            'user_id' => auth()->id(),
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'file_path' => $filePath,
            'file_type' => $request->file('file')->extension(),
        ]);

        return redirect()->route('shared-files.index')->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sharedFile = SharedFiles::findOrFail($id);
        if ($sharedFile->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('shared-files.edit', ['sharedFile' => $sharedFile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sharedFile = SharedFiles::findOrFail($id);

        // Check if the logged-in user is the owner of this file.
        if (auth()->id() !== $sharedFile->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'file' => 'file|mimes:pdf,zip,doc,docx|max:10240',
            // optional, because the user might not want to replace the file
        ]);

        $sharedFile->title_en = $request->title_en;
        $sharedFile->title_fr = $request->title_fr;

        // Check if a new file is being uploaded
        if ($request->hasFile('file')) {
            // Delete the old file from the storage
            Storage::delete($sharedFile->file_path);

            // Store the new file
            $file = $request->file('file');
            $path = $file->store('public/shared_files');
            $sharedFile->file_path = $path;
        }

        $sharedFile->save();

        return redirect()->route('shared-files.index')->with('success', 'File updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sharedFile = SharedFiles::findOrFail($id);

        // Check if the logged-in user is the owner of this file.
        if (auth()->id() !== $sharedFile->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete the file from storage
        Storage::delete($sharedFile->file_path);

        // Delete the record from the database
        $sharedFile->delete();

        return redirect()->route('shared-files.index')->with('success', 'File deleted successfully.');
    }

}
