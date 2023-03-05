<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function index()
    {
        $jobPosts = JobPost::paginate();

        return view('job-posts.index', compact('jobPosts'))
            ->with('i', (request()->input('page', 1) - 1) * $jobPosts->perPage());
    }

    public function create()
    {
        $jobPost = new JobPost();
        $companies = Company::pluck('fantasy_name', 'id');
        return view('job-posts.create', compact('jobPost', 'companies'));
    }

    public function store(Request $request)
    {
        request()->validate(JobPost::$rules);

        $jobPost = JobPost::create($request->all());

        return redirect()->route('job-posts.index')
            ->with('success', 'JobPost created successfully.');
    }

    public function show($id)
    {
        $jobPost = JobPost::find($id);

        return view('job-posts.show', compact('jobPost'));
    }

    public function edit($id)
    {
        $jobPost = JobPost::find($id);
        $companies = Company::pluck('fantasy_name', 'id');
        return view('job-posts.edit', compact('jobPost', 'companies'));
    }

    public function update(Request $request, JobPost $jobPost)
    {
        request()->validate(JobPost::$rules);

        $jobPost->update($request->all());

        return redirect()->route('job-posts.index')
            ->with('success', 'JobPost updated successfully');
    }

    public function destroy($id)
    {
        $jobPost = JobPost::find($id)->delete();

        return redirect()->route('job-posts.index')
            ->with('success', 'JobPost deleted successfully');
    }

    public function search(Request $request)
    {
        try {

            $search = $request->input('search');
            $jobPosts = JobPost::filter()
                ->hasFilter()
                ->order()
                ->getPaginate();

            return view('job-posts.index', compact('jobPosts'));
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
