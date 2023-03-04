<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use App\Classes\document\UploadDocument;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Visibility;
class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate();

        return view('document.index', compact('documents'))
            ->with('i', (request()->input('page', 1) - 1) * $documents->perPage());
    }
    public function create()
    {
        $document = new Document();
        return view('document.create', compact('document'));
    }
    public function store(Request $request)
    {
        request()->validate(Document::$rules);

        $document = Document::create($request->all());

        return redirect()->route('documents.index')
            ->with('success', 'Document created successfully.');
    }
    public function show($id)
    {
        $document = Document::find($id);

        return view('document.show', compact('document'));
    }
    public function edit($id)
    {
        $document = Document::find($id);

        return view('document.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        request()->validate(Document::$rules);

        $document->update($request->all());

        return redirect()->route('documents.index')
            ->with('success', 'Document updated successfully');
    }
    public function destroy($id)
    {
        $document = Document::find($id)->delete();

        return redirect()->route('documents.index')
            ->with('success', 'Document deleted successfully');
    }
    public function individual(Request $request)
    {
        $document_type = $request->input('type');
        //TODO cambiar organization y poner seguridad que no pueda subir si no esta registrado en esa organization el tipo de documento
        $organization = 1;
        $document_type = DocumentType::find($document_type);
        $files = $request->file('document');
        foreach ($files as $file) {
            if ($document_type) {
                $data = [
                    'request' => $request,
                    'masive' => $document_type->masive == 1 ? true : false
                ];
                $uploadDocument = new UploadDocument($data);
                // $route = Auth::user()->organization_id.'/';
                $route = $organization . '/';
                $basename_file = $request->input('basename_file');
                if ($basename_file) {
                    $uploadDocument->masive_document($file,$basename_file,$route);
                }else {
                    $query = $uploadDocument->query();
                    $info = $uploadDocument->array($query);
                    Document::insert($info->toArray());
                    if ($document_type->masive == 1) {
                        if (isset($info[0]['file_path'])) {
                            $file_name = $info[0]['file_path'];
                            $uploadDocument->store_file($route, $file_name, $file);
                        }
                    } else {
                        foreach ($info as $documento) {
                            $file_name = $documento['file_path'];
                            $uploadDocument->store_file($route, $file_name, $file);
                        }
                    }
                }
                
            }
        }
    }

                    
}
