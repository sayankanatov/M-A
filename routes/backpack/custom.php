<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('city', 'CityCrudController');
    CRUD::resource('service_category', 'ServiceCategoryCrudController');
    CRUD::resource('service', 'ServiceCrudController');
    CRUD::resource('company', 'CompanyCrudController');
    CRUD::resource('lawyer', 'LawyerCrudController');
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('role', 'RoleCrudController');
    CRUD::resource('permission', 'PermisssionCrudController');
}); // this should be the absolute last line of this file