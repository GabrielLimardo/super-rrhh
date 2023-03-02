<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;
use App\Classes\document\UploadDocument;
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
        $data = [
            'request' => $request
        ];
        if ($document_type) {
            $corteClass = new UploadDocument($data);
            $query =  $corteClass ->query();
            $info =  $corteClass ->array($query);
            Document::insert($info->toArray());
            if ($document_type->masive == 1) {
                $user = 1;
                // $user =  Auth::user()->id;
               $this->store_file($request, $organization, $user);
            }else {
                foreach ($query as $document) {
                    $this->store_file($request, $organization, $document->user_id);
                }

            }
        }

        
    }

                    
}
