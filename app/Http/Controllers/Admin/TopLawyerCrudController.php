<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TopLawyerRequest as StoreRequest;
use App\Http\Requests\TopLawyerRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Config;
use Alert;
use App\Models\TopLawyer;

/**
 * Class MainPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TopLawyerCrudController extends CrudController
{
    private $error_place = "Это место уже занято";
    private $error_company = "Этот юрист уже используется";
    private $redirect = "admin/top-lawyer";

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\TopLawyer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/top-lawyer');
        $this->crud->setEntityNameStrings('', 'Юристы');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
            'label' => 'Юристы',
            'type' => 'select',
            'name' => 'company_id',
            'entity' => 'top',
            'attribute' => 'last_name',
            'model' => "App\Models\Lawyer"
        ]);

        $this->crud->addColumn('place');

        $this->crud->addField([   // select_from_array
            'name' => 'place',
            'label' => "Место в сортировке",
            'type' => 'select_from_array',
            'options' => Config::get('constants.top'),
            'allows_null' => false
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([
            'label' => "Юристы",
            'name' => "lawyer_id",
            'type' => 'select',
            'entity' => 'top',
            'attribute' => 'last_name',
            'model' => 'App\Models\Lawyer'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        // $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in MainPageRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $place = $request->input('place');
        $lawyer = $request->input('lawyer_id');
        $exist = TopLawyer::where('place',$place)->count();
        $existLawyer = TopLawyer::where('lawyer_id',$lawyer)->count();
        if($exist > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_place)->flash()]);
        elseif ($existLawyer > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_company)->flash()]);

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $id = $request->input('id');
        $place = $request->input('place');
        $lawyer = $request->input('lawyer_id');
        $exist = TopLawyer::where('place',$place)->where('id','!=',$id)->count();
        $existLawyer = TopLawyer::where('lawyer_id',$lawyer)->where('id','!=',$id)->count();
        if($exist > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_place)->flash()]);
        elseif ($existLawyer > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_company)->flash()]);

        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
