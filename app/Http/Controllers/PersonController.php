<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Organization;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index($id=null)
    {
        $query = Person::query();

        if($id) {
            $query->where('organization_id', $id);
        }

        if(auth()->user()->role === 'account_manager') {
            $query->where('organization_id', auth()->user()->organization_id);
        }

        $persons = $query->get();

        return view('person.index', compact('persons'));
    }

    public function create($id = null)
    {
        $organizations  = Organization::all();
        $person         = $id ? Person::find($id) : null;
        return view('person.form', compact('organizations', 'person'));
    }

    public function store(PersonRequest $request)
    {
        $person = new Person();
        $this->payload($person, $request);
        $person->save();

        $message = ['success' => 'Data berhasil disimpan'];
        return redirect()->route('organization.show', $request->organization)->with($message);
    }

    public function update(PersonRequest $request, $id)
    {
        $person = Person::find($id);
        $this->payload($person, $request);
        $person->update();

        $message = ['success' => 'Data telah diupdate'];
        return redirect()->route('person.index')->with($message);
    }

    public function payload($model, $request)
    {
        $model->name            = $request->name;
        $model->email           = $request->email;
        $model->phone           = $request->phone;
        $model->organization_id = $request->organization;

        // upload file
        if($request->has('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('avatar', $filename, 'public');
            $model->avatar          = $filename;
        }
    }

    public function destroy($id)
    {
        Person::find($id)?->delete();

        $message = ['success' => 'Data telah dihapus'];
        return redirect()->route('person.index')->with($message);
    }

    public function search(Request $request)
    {
        $query = Person::query();
        $query->where('name', 'like', "%{$request->keyword}%");
        $query->orWhereHas('organization', function ($organization) use($request) {
            $organization->where('name', 'like', "%{$request->keyword}%");
        });

        $persons = $query->get();
        return view('person.index', compact('persons'));
    }
}
