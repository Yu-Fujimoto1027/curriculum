<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct(
      private Company $company
    ) {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $this->company->fill($validated)->save();
        return ['message' => 'ok'];
    }

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, int $id)
    {
        $validated = $request->validated();
        $this->company->findOrFail($id)->update($validated);
        return ['message' => 'ok'];
    }

    /**
     * Show
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    /**
     * Destroy
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return ['message' => 'ok'];
    }



}
