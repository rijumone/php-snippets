<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Merge;
use App\Branch;

// use App\Repositories\MergeRepository;

class MergeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $branches = Branch::get();
        $branchIdGroupedArr = array();
        foreach ($branches as $branch) {
            $branchIdGroupedArr[$branch->id] = $branch;
        }
        return view('merges.index', [
            'merges' => Merge::get(),
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

}
