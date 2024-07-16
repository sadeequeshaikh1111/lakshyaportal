<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\educational_detail;
use App\Models\document_detail;



class documents_controller extends Controller
{
    //

    public function load_docs(Request $request)
    {
    
        $user = educational_detail::where('email', $request->email)->get()->pluck('edu_category');;
        return $user;

        
    }

    public function save_document_details(Request $request)
    {

 {
        // Validate the request
        $request->validate([
            'documentCategory' => 'required|string|max:255',
            'document' => 'required|string|max:255',
            'documentFile' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'email' => 'required|email',
        ]);

        // Handle the file upload
        if ($request->hasFile('documentFile')) {
            $file = $request->file('documentFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/documents', $fileName, 'public');

            // Save the document details in the database
            $document = new document_detail();
            $document->category = $request->input('documentCategory');
            $document->course = $request->input('document');
            $document->file_name = $fileName;
            $document->file_path = '/storage/' . $filePath;
            $document->email = $request->input('email');
            $document->save();

            // Return a success response
            return response()->json(['message' => 'Document uploaded and details saved successfully!'], 200);
        }

        // Return an error response if file is not present
        return response()->json(['message' => 'File not uploaded. Please try again.'], 400);
    }

    }
}
