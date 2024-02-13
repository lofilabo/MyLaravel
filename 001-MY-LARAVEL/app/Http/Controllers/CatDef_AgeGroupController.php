<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatDef_AgeGroupRequest;
use App\Http\Requests\UpdateCatDef_AgeGroupRequest;
use App\Repositories\CatDef_AgeGroupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatDef_AgeGroupController extends AppBaseController
{
    /** @var  CatDef_AgeGroupRepository */
    private $catDefAgeGroupRepository;

    public function __construct(CatDef_AgeGroupRepository $catDefAgeGroupRepo)
    {
        $this->catDefAgeGroupRepository = $catDefAgeGroupRepo;
    }

    /**
     * Display a listing of the CatDef_AgeGroup.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catDefAgeGroups = $this->catDefAgeGroupRepository->all();

        return view('cat_def__age_groups.index')
            ->with('catDefAgeGroups', $catDefAgeGroups);
    }

    /**
     * Show the form for creating a new CatDef_AgeGroup.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_def__age_groups.create');
    }

    /**
     * Store a newly created CatDef_AgeGroup in storage.
     *
     * @param CreateCatDef_AgeGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateCatDef_AgeGroupRequest $request)
    {
        $input = $request->all();

        $catDefAgeGroup = $this->catDefAgeGroupRepository->create($input);

        Flash::success('Cat Def  Age Group saved successfully.');

        return redirect(route('catDefAgeGroups.index'));
    }

    /**
     * Display the specified CatDef_AgeGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catDefAgeGroup = $this->catDefAgeGroupRepository->find($id);

        if (empty($catDefAgeGroup)) {
            Flash::error('Cat Def  Age Group not found');

            return redirect(route('catDefAgeGroups.index'));
        }

        return view('cat_def__age_groups.show')->with('catDefAgeGroup', $catDefAgeGroup);
    }

    /**
     * Show the form for editing the specified CatDef_AgeGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catDefAgeGroup = $this->catDefAgeGroupRepository->find($id);

        if (empty($catDefAgeGroup)) {
            Flash::error('Cat Def  Age Group not found');

            return redirect(route('catDefAgeGroups.index'));
        }

        return view('cat_def__age_groups.edit')->with('catDefAgeGroup', $catDefAgeGroup);
    }

    /**
     * Update the specified CatDef_AgeGroup in storage.
     *
     * @param int $id
     * @param UpdateCatDef_AgeGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatDef_AgeGroupRequest $request)
    {
        $catDefAgeGroup = $this->catDefAgeGroupRepository->find($id);

        if (empty($catDefAgeGroup)) {
            Flash::error('Cat Def  Age Group not found');

            return redirect(route('catDefAgeGroups.index'));
        }

        $catDefAgeGroup = $this->catDefAgeGroupRepository->update($request->all(), $id);

        Flash::success('Cat Def  Age Group updated successfully.');

        return redirect(route('catDefAgeGroups.index'));
    }

    /**
     * Remove the specified CatDef_AgeGroup from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catDefAgeGroup = $this->catDefAgeGroupRepository->find($id);

        if (empty($catDefAgeGroup)) {
            Flash::error('Cat Def  Age Group not found');

            return redirect(route('catDefAgeGroups.index'));
        }

        $this->catDefAgeGroupRepository->delete($id);

        Flash::success('Cat Def  Age Group deleted successfully.');

        return redirect(route('catDefAgeGroups.index'));
    }
}
