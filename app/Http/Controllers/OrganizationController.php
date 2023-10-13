<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'account_manager') {
            $this->show(auth()->user()->organization_id);
        }

        $organizations = Organization::all();
        return view('organization.index', compact('organizations'));
    }

    public function show($id)
    {
        $organization   = Organization::find($id);
        $persons         = $organization?->person;
        return view('organization.show', compact('organization', 'persons'));
    }

    public function create($id = null)
    {
        $organization = $id ? Organization::find($id) : null;
        return view('organization.form', compact('organization'));
    }

    public function store(OrganizationRequest $request)
    {
        $organization = new Organization();
        $this->payload($organization, $request);
        $organization->save();

        $message = ['success' => 'Organisasi telah disimpan'];
        return redirect()->route('organization.index')->with($message);
    }

    public function update(OrganizationRequest $request, $id)
    {
        $organization = Organization::find($id);
        $this->payload($organization, $request);
        $organization->update();

        $message = ['success' => 'Organisasi telah diupdate'];
        return redirect()->route('organization.index')->with($message);
    }

    public function payload($model, $request)
    {
        $model->name     = $request->name;
        $model->email    = $request->email;
        $model->phone    = $request->phone;
        $model->website  = $request->website;

        // upload file
        if($request->has('logo')) {
            $filename = $request->logo->getClientOriginalName();
            $request->logo->storeAs('logo', $filename, 'public');
            $model->logo     = $filename;
        }
    }

    public function destroy($id)
    {
        Organization::find($id)?->delete();

        $message = ['success' => 'Organisasi telah dihapus'];
        return redirect()->route('organization.index')->with($message);
    }
}
