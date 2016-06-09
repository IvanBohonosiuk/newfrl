<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\Project_cat;
use App\Bid;

class ProjectsController extends Controller
{
    public function index(Projects $project, Project_cat $cats)
    {
    	$this->data['projects'] = $project->getActive();
    	$this->data['cats'] = $cats->getActive();

    	return view('projects.index', $this->data);
    }

    public function show($id, Projects $project, Bid $bids)
    {
    	$this->data['project'] = $project->getById($id);
        $this->data['bids'] = $bids->getOrder();

    	return view('projects.show', $this->data);
    }

    public function create(Request $request)
    {
    	$project = new Projects;

        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->end_date = $request['end_date'];
        $project->price = $request['price'];
        if (isset($request['remote'])) {
            $project->remote = $request['remote'];
        }

        if ($request->user()->projects()->save($project)) {
            $message = 'Проект опубликован успешно!';
        } else {
            $message = 'Произошла ошыбка!';
        }

        return redirect()->back()->with(['message' => $message]);
    }

    public function cat_show($slug, Project_cat $cat, Projects $project)
    {
        $this->data['cat'] = $cat->getBySlug($slug);
    	$this->data['cats'] = $cat->getActive();
        $this->data['projects'] = $project->getActive();
        $this->data['projects_cat'] = $cat->getCategory($slug);

    	return view('projects.cat', $this->data);
    }
}
