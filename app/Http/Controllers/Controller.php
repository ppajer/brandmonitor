<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model;
    protected $resourceType;

    // CREATE

    protected function createResource(Request $request) {
    	$model = new $this->model;
    	$return = $request->get('return') ?? sprintf("/%ss", $this->resourceType);
        return view('resource.create', ['resource' => $this->resourceType, 'fillable' => $model->getFillable(), 'return' => $return]);
    }

    protected function storeResource(Request $request) {
    	$request->validate($this->getValidationFields(new $this->model));
    	$model = new $this->model($this->getRequestFields($request, new $this->model));
    	$model->save();
    	return redirect($request->get('redirect_to'))->with('success', sprintf('%s created!', ucfirst($this->resourceType)));
    }

    // READ

    // UPDATE

    // DESTROY

    protected function getRequestFields(Request $request, $model) {
    	return array_reduce($model->getFillable(), function($all, $item) use ($request) {
    		$all[$item] = $request->get($item);
    		return $all;
    	}, []) ?? [];
    }

    protected function getValidationFields($model) {
    	return array_reduce($model->getFillable(), function($all, $item) {
    		$all[$item] = 'required';
    		return $all;
    	}, []) ?? [];
    }
}
