<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController extends BaseController {
    public function indexAction() {
        $jobs = Job::all();
        $project1 = new Project('Project 1', 'Description 1');
        $projects = [
            $project1
        ];

        $limitMonths = 15;
        $filterFunction = function ($job) use ($limitMonths) {
            return $job['months'] >= $limitMonths;
        };

        $jobs = array_filter($jobs->toArray(), $filterFunction);

        $name = 'Mariana Valencia';

        return $this->renderHTML('index.twig', [
            'name' => $name,
            'jobs' => $jobs
        ]);
    }
}