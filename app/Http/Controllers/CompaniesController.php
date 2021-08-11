<?php


namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required|min:3'
//        ]);

        $company = Company::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Company {$company->id} created: {$company->name}"
            );
        return redirect()->route('list_companies');
    }

    public function destroy(Request $request)
    {
        Company::destroy($request->id);
        return redirect()->route('list_companies');
    }

    public function editCompany($id, Request $request)
    {
        $newName = $request->name;
        $company = Company::find($id);
        $company->name = $newName;
        $company->save();
    }
}
