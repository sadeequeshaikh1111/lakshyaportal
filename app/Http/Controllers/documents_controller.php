<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\educational_detail;
use App\Models\document_detail;
use DataTables;




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
        $user_id=$request->input('user_id');
        $document=$request->input('document');
        
        // Handle the file upload
        if ($request->hasFile('documentFile')) {
            $file = $request->file('documentFile');
            $fileName = time() . '_'.$document.'_'. $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/documents/'.$user_id, $fileName, 'public');

            // Save the document details in the database
            $document = new document_detail();
            $document->category = $request->input('documentCategory');
            $document->course = $request->input('document');
            $document->file_name = $fileName;
            $document->file_path = '/storage/' . $filePath;
            $document->email = $request->input('email');
            $document->user_id = $request->input('user_id');
            
            $document->save();

            // Return a success response
            return response()->json(['message' => 'Document uploaded and details saved successfully!'], 200);
        }

        // Return an error response if file is not present
        return response()->json(['message' => 'File not uploaded. Please try again.'], 400);
    }

    }

    public function fetch_doc_details(Request $request)
    {
        $user_id=$request->user_id;
        $data=document_detail::where('user_id', $user_id)->get();

        return DataTables::of($data)->addColumn('action', function($data){
        $btn = '<a type="button" id='.$data->id.' class="btn btn-danger btn-sm" onclick=Delete(this.id)>Delete</a>';
        return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }   

    public function delete_doc_detail(Request $request)
{
try{
    $data=document_detail::findorfail($request->id);
    $data->delete();
    return response()->json(['message' => 'Record deleted successfully'], 200);

}
catch(Exception $e)
{
    return response()->json(['message' => 'Record not found or could not be deleted', 'error' => $e->getMessage()], 400);
    
}

}

}


