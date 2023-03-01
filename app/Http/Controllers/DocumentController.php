<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;
use App\Models\Branch;
use App\Models\Management;
use App\Models\Company;
use App\Models\User;

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
        if ($document_type) {
            if ($document_type->masive == 1) { 
                $user = 1;
                // $user =  Auth::user()->id;
                $file_path = $this->store_file($request, $organization, $user);
                $type_upload = $request->input('type_upload');
                switch ($type_upload) {
                    case 'organization':
                        $query = User::query();
                        $company = $request->input('company');
                        if ($company) {
                            $query->where('company_id', $company);
                            $branches = $request->input('branches');
                            if ($branches) {
                                $query->Where('branches_id', $branches);
                                $managements = $request->input('managements');
                                if ($managements) {
                                    $query->Where('managements_id', $managements);
                                }
                            }
                        }
                        //TODO ver si todo esto lo puedo hacer para ambos el que es masivo y el que no 
                        // foreach($group as $user){
                        //     $docData = [
                        //         'perido' => $periodo,
                        //         'view' => $visible
                        //     ];
                        
                        //     if(count($docs) == 0){
                        //         $docData['visible'] = 1;
                        //         $flow = DocumentXStatus::where('document_type_id', $request->document_type_id)->get();
                        //         $siguiente_estado = count($flow) == 2 ? $flow[1]->document_type_id : 5;
                        //         $docData['id_tipo_estado'] = $flow ? $flow[0]->id_estados_documentos : null;
                        //     }
                        
                        //     $data[] = $docData;
                        // }
                        
                        // Document::insert($data);
                        
                        // $docs = Document::where('id_usuario', $group[0]->id)
                        //     ->whereIn('id_tipo_documento', $request->tipo_documento)
                        //     ->pluck('id')
                        //     ->toArray();
                        
                        // $info = [
                        //     'docs' => $docs,
                        //     'siguiente_estado' => $siguiente_estado
                        // ];
                        
                        // return $info;

                        break;
                    case 'profile':
                      // Hacer algo cuando type_upload sea igual a 'legajo'
                      break;
                    case 'document':
                      // Hacer algo cuando type_upload sea igual a 'documento'
                      break;
                    default:
                      // Hacer algo por defecto si type_upload no es igual a ninguna de las opciones anteriores
                      break;
                  }
                

            }else {
                
            }
            return 'fin';
        }

        
    }
    public function store_file($request,$organization,$user)
    {
        $storage_path = Storage::disk('fs_disk')->path($organization . '/' . date('Ymd_His'). '_' . $user . '_' . uniqid() . '.pdf');
        $request->file('document')->move(dirname($storage_path), basename($storage_path));
        $file_path= $request->file('document')->path();
        return $file_path;
    }
    // public function database_document($id)
    // {
    //     $document = Document::find($id)->delete();

    //     return redirect()->route('documents.index')
    //         ->with('success', 'Document deleted successfully');
    // }
}
