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
use App\Project_cat_project;
use App\Bid;
use App\User;

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
        // $this->data['project_bids'] = $bids->getByProjectId($id);

    	return view('projects.show', $this->data);
    }

    public function createForm(Project_cat $cats)
    {
        $this->data['cats'] = $cats->getActive();
        return view('projects.create', $this->data);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'end_date' => 'required',
            'description' => 'required|max:1000'
        ]);

    	$project = new Projects;

        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->end_date = $request['end_date'];
        $project->price = $request['price'];
        if (isset($request['remote'])) {
            $project->remote = $request['remote'];
        }
        $project->user_id = $request['user_id'];

        if ($request->user()->projects()->save($project)) {
            $message = 'Проект опубликован успешно!';
        } else {
            $message = 'Произошла ошыбка!';
        }

        $project->categories()->attach(Project_cat_project::where('project_cat_id', $request['cat_id'])->first());

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

    public function use_freelancer(Request $request, $id, User $user)
    {
        $freelancer = Projects::find($id);

        $freelancer->freelancer_id = $request->freelancer_id;
        $freelancer->status = $request->status;

        if ($freelancer->save()) {
            $message = 'Исполнитель выбран успешно!';
            
        } else {
            $message = 'Произошла ошыбка!';
        }

        return redirect()->back()->with(['message' => $message]);
    }

    public function completed(Request $request, $id, User $user)
    {
        $freelancer = Projects::find($id);

        $freelancer->freelancer_id = $request->freelancer_id;
        $freelancer->status = $request->status;

        if ($freelancer->save()) {
            $message = 'Задание выполнено успешно!';
            
        } else {
            $message = 'Произошла ошыбка!';
            
        }

        return redirect()->back()->with(['message' => $message]);
    }

    public function canceled(Request $request, $id, User $user)
    {
        $freelancer = Projects::find($id);

        $freelancer->freelancer_id = $request->freelancer_id;
        $freelancer->status = $request->status;

        if ($freelancer->save()) {
            $message = 'Задание не выполнено!';
            
        } else {
            $message = 'Произошла ошыбка!';
            
        }

        return redirect()->back()->with(['message' => $message]);
    }
}
