<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatDef_ConceptRequest;
use App\Http\Requests\UpdateCatDef_ConceptRequest;
use App\Repositories\CatDef_ConceptRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatDef_ConceptController extends AppBaseController
{
    /** @var  CatDef_ConceptRepository */
    private $catDefConceptRepository;

    public function __construct(CatDef_ConceptRepository $catDefConceptRepo)
    {
        $this->catDefConceptRepository = $catDefConceptRepo;
    }

    /**
     * Display a listing of the CatDef_Concept.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catDefConcepts = $this->catDefConceptRepository->all();

        return view('cat_def__concepts.index')
            ->with('catDefConcepts', $catDefConcepts);
    }

    /**
     * Show the form for creating a new CatDef_Concept.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_def__concepts.create');
    }

    /**
     * Store a newly created CatDef_Concept in storage.
     *
     * @param CreateCatDef_ConceptRequest $request
     *
     * @return Response
     */
    public function store(CreateCatDef_ConceptRequest $request)
    {
        $input = $request->all();

        $catDefConcept = $this->catDefConceptRepository->create($input);

        Flash::success('Cat Def  Concept saved successfully.');

        return redirect(route('catDefConcepts.index'));
    }

    /**
     * Display the specified CatDef_Concept.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catDefConcept = $this->catDefConceptRepository->find($id);

        if (empty($catDefConcept)) {
            Flash::error('Cat Def  Concept not found');

            return redirect(route('catDefConcepts.index'));
        }

        return view('cat_def__concepts.show')->with('catDefConcept', $catDefConcept);
    }

    /**
     * Show the form for editing the specified CatDef_Concept.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catDefConcept = $this->catDefConceptRepository->find($id);

        if (empty($catDefConcept)) {
            Flash::error('Cat Def  Concept not found');

            return redirect(route('catDefConcepts.index'));
        }

        return view('cat_def__concepts.edit')->with('catDefConcept', $catDefConcept);
    }

    /**
     * Update the specified CatDef_Concept in storage.
     *
     * @param int $id
     * @param UpdateCatDef_ConceptRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatDef_ConceptRequest $request)
    {
        $catDefConcept = $this->catDefConceptRepository->find($id);

        if (empty($catDefConcept)) {
            Flash::error('Cat Def  Concept not found');

            return redirect(route('catDefConcepts.index'));
        }

        $catDefConcept = $this->catDefConceptRepository->update($request->all(), $id);

        Flash::success('Cat Def  Concept updated successfully.');

        return redirect(route('catDefConcepts.index'));
    }

    /**
     * Remove the specified CatDef_Concept from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catDefConcept = $this->catDefConceptRepository->find($id);

        if (empty($catDefConcept)) {
            Flash::error('Cat Def  Concept not found');

            return redirect(route('catDefConcepts.index'));
        }

        $this->catDefConceptRepository->delete($id);

        Flash::success('Cat Def  Concept deleted successfully.');

        return redirect(route('catDefConcepts.index'));
    }
}
