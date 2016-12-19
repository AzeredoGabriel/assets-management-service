<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService; 


class ProjectController extends Controller
{
    protected $project_service; 

    public function __construct(
    	ProjectService $project_service)
    {
    	$this->project_service = $project_service; 
    }

    public function index()
    {
    	
    	$projects = $this->project_service->getProjectList(); 

    	return view('projects.index', $projects); 

    }

    public function create()
    {
    	return view('projects.create'); 
    }

    public function store()
    {
    	$req = Request::instance()->all(); 
    	$inputs = $req->all(); 

    	$saved = $this->project_service->save($inputs); 

    	Session::flash("notification", [ 
    		"class" 	=> $saved->getLabel(), 
    		"message"   => $saved->getMessage() 
    	]);
		
    	return $saved->success ? view('projects.index') : redirect()->back(); 
    }

    public function show($id)
    {
    	$project = $this->project_service->getProject($id); 

    	if (!$project)
    		abort(404, 'Projeto não encontrado.');

    	return view('projects.show', $project); 
    }

    public function edit($id)
    {
    	$project = $this->project_service->getProject($id); 

    	if (!$project)
    		abort(404, 'Projeto não encontrado.');

    	return view('projects.edit', $project); 
    }

    public function update($id)
    {
    	$req = Request::instance()->all(); 
    	$inputs = $req->all(); 

    	$updated = $this->project_service->update($inputs); 

    	Session::flash("notification", [ 
    		"class" 	=> $updated->getLabel(), 
    		"message"   => $updated->getMessage() 
    	]);
		
    	return $updated->success ? view('projects.index') : redirect()->back(); 
    }

    public function destroy($id)
    {
    	$deleted = $this->project_service->deleteProject($id); 

    	Session::flash("notification", [ 
    		"class" 	=> $deleted->getLabel(), 
    		"message"   => $deleted->getMessage() 
    	]);

    	return $deleted->success ? view('projects.index') : redirect()->back(); 
    }
}
