<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    private int $_linesPerPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.company.index')->with('companies', Company::paginate($this->_linesPerPage));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->active = $request->active;
        $company->zipcode = $request->zipcode;
        $company->address = $request->address;
        $company->save();

        return View("admin.company.edit", [
            "company" => $company
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return View("admin.company.show", [
            "company" => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return View("admin.company.edit", [
            "company" => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->active = $request->active;
        $company->zipcode = $request->zipcode;
        $company->address = $request->address;
        $company->save();

        return View("admin.company.edit", [
            "company" => $company
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return View::make('admin.company.index')->with('companies', Company::paginate($this->_linesPerPage));
    }

    /**
     * Delete the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Company::destroy($id);

        return View::make('admin.company.index')->with('companies', Company::paginate($this->_linesPerPage));
    }

    /**
     * Search a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $companies = Company::where(DB::raw("lower(concat(name, ' ', address))"), 'like', '%' . strtolower($request->search) . '%')
            ->paginate($this->_linesPerPage)
            ->appends(['search' => $request->search]);

        return View::make('admin.company.index')->with('companies', $companies);
    }
}