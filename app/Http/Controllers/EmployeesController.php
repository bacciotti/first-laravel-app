<?php


namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('Employees.create');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required|min:3'
//        ]);

        $employee = Employee::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Employee {$employee->id} created: {$employee->name}"
            );
        return redirect()->route('list_employees');
    }

    public function destroy(Request $request)
    {
        Employee::destroy($request->id);
        return redirect()->route('list_employees');
    }

    public function editEmployee($id, Request $request)
    {
        $newName = $request->name;
        $employees = Company::find($id);
        $employees->name = $newName;
        $employees->save();
    }
}
