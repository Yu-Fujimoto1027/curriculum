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
        return response()->json(['message' => 'ok'], 201);
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
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }


    /**
     * Destroy
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(['message' => 'ok']);
    }

}
