<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;

class ProjectsController extends Controller
{
    public function index(Projects $project)
    {
    	$this->data['projects'] = $project->getActive();
    	return view('projects.index', $this->data);
    }
}
