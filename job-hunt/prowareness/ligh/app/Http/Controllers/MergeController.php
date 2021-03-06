<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Merge;
use App\Branch;
use App\Repositories\MergeRepository;

class MergeController extends Controller {

    /**
     * The merge repository instance.
     *
     * @var MergeRepository
     */
    protected $merges;

    public function __construct(MergeRepository $merges) {
        $this->middleware('auth');
        $this->merges = $merges;
    }

    public function index(Request $request) {
        $branches = Branch::get();
        $branchIdGroupedArr = array();
        foreach ($branches as $branch) {
            $branchIdGroupedArr[$branch->id] = $branch;
        }
        return view('merges.index', [
            'merges' => $this->merges->forUser($request->user()),
            'branches' => $branchIdGroupedArr,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'status' => 'required',
            'branch_id' => 'required',
        ]);

        $request->user()->merges()->create([
            'status' => $request->status,
            'branch_id' => $request->branch_id,
        ]);

        return redirect('/merges');
    }

    /**
     * Destroy the given merge
     * @param Request $request
     * @param Merge $merge
     * @return Response
     */

    public function destroy(Request $request, Merge $merge){
    	$this->authorize('destroy', $merge);
    	$merge->delete();
    	return redirect('/merges');
    }

}
