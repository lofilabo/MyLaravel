<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatDef_SubjectRequest;
use App\Http\Requests\UpdateCatDef_SubjectRequest;
use App\Repositories\CatDef_SubjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatDef_SubjectController extends AppBaseController
{
    /** @var  CatDef_SubjectRepository */
    private $catDefSubjectRepository;

    public function __construct(CatDef_SubjectRepository $catDefSubjectRepo)
    {
        $this->catDefSubjectRepository = $catDefSubjectRepo;
    }

    /**
     * Display a listing of the CatDef_Subject.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catDefSubjects = $this->catDefSubjectRepository->all();

        return view('cat_def__subjects.index')
            ->with('catDefSubjects', $catDefSubjects);
    }

    /**
     * Show the form for creating a new CatDef_Subject.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_def__subjects.create');
    }

    /**
     * Store a newly created CatDef_Subject in storage.
     *
     * @param CreateCatDef_SubjectRequest $request
     *
     * @return Response
     */
    public function store(CreateCatDef_SubjectRequest $request)
    {
        $input = $request->all();

        $catDefSubject = $this->catDefSubjectRepository->create($input);

        Flash::success('Cat Def  Subject saved successfully.');

        return redirect(route('catDefSubjects.index'));
    }

    /**
     * Display the specified CatDef_Subject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catDefSubject = $this->catDefSubjectRepository->find($id);

        if (empty($catDefSubject)) {
            Flash::error('Cat Def  Subject not found');

            return redirect(route('catDefSubjects.index'));
        }

        return view('cat_def__subjects.show')->with('catDefSubject', $catDefSubject);
    }

    /**
     * Show the form for editing the specified CatDef_Subject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catDefSubject = $this->catDefSubjectRepository->find($id);

        if (empty($catDefSubject)) {
            Flash::error('Cat Def  Subject not found');

            return redirect(route('catDefSubjects.index'));
        }

        return view('cat_def__subjects.edit')->with('catDefSubject', $catDefSubject);
    }

    /**
     * Update the specified CatDef_Subject in storage.
     *
     * @param int $id
     * @param UpdateCatDef_SubjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatDef_SubjectRequest $request)
    {
        $catDefSubject = $this->catDefSubjectRepository->find($id);

        if (empty($catDefSubject)) {
            Flash::error('Cat Def  Subject not found');

            return redirect(route('catDefSubjects.index'));
        }

        $catDefSubject = $this->catDefSubjectRepository->update($request->all(), $id);

        Flash::success('Cat Def  Subject updated successfully.');

        return redirect(route('catDefSubjects.index'));
    }

    /**
     * Remove the specified CatDef_Subject from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catDefSubject = $this->catDefSubjectRepository->find($id);

        if (empty($catDefSubject)) {
            Flash::error('Cat Def  Subject not found');

            return redirect(route('catDefSubjects.index'));
        }

        $this->catDefSubjectRepository->delete($id);

        Flash::success('Cat Def  Subject deleted successfully.');

        return redirect(route('catDefSubjects.index'));
    }
}
