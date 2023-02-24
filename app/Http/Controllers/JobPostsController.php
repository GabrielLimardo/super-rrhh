<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }

    public function index()
    {
        $jobPosts = JobPost::paginate();
        return $jobPosts;
    }

    public function store(Request $request)
    {
        $jobPost = JobPost::create($request->all());
        return $jobPost;
    }

    public function show($id)
    {
        $jobPost = JobPost::find($id);
        return $jobPost;
    }

    public function update(Request $request, $id)
    {
        $jobPost = JobPost::find($id);
        $jobPost->update($request->all());

        return $jobPost;
    }

    public function destroy($id)
    {
        $jobPost = JobPost::find($id)->delete();

        return $jobPost;
    }

    public function search()
    {
        try {

            $jobPosts = JobPost::filter()
                ->hasFilter()
                ->order()
                ->getPaginate();

            return response()->json($jobPosts, 200);
        } catch (\Exception $e) {

            $errores_lista = [
                'error' => $e->getMessage(),
                'line' => $e->getline(),
                'file' => $e->getfile()
            ];

            return response()->json(['msj' => $errores_lista], 500);
        }
    }
}
