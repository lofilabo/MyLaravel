<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonsTwoColsRequest;
use App\Http\Requests\UpdateLessonsTwoColsRequest;
use App\Repositories\LessonsTwoColsRepository;
use App\Http\Requests\CreatelessonsRequest;
use App\Http\Requests\UpdatelessonsRequest;
use App\Repositories\lessonsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Articlecategories;

use App\Models\CatDef_AgeGroup;
use App\Models\CatDef_Subject;
use App\Models\CatDef_Topic;
use App\Models\CatDef_Concept;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Flash;
use Response;


class LessonsTwoColsController extends AppBaseController
{
    /** @var  lessonsRepository */
    private $lessonsRepository;

    public function __construct(lessonsRepository $lessonsRepo)
    {
        $this->lessonsRepository = $lessonsRepo;

        $this->optionslist =    Articlecategories::pluck('optionval','id');
        $this->ls_agegroup =    CatDef_AgeGroup::pluck('optionval','id');
        $this->ls_subject =     CatDef_Subject::pluck('optionval','id');
        $this->ls_topic =       CatDef_Topic::pluck('optionval','id');
        $this->ls_concept =     CatDef_Concept::pluck('optionval','id');
    }

    /**
     * Display a listing of the lessons.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lessons = $this->lessonsRepository->all();

        return view('lessons_two_cols.index')
            ->with('lessons', $lessons)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);
    }

    /**
     * Show the form for creating a new lessons.
     *
     * @return Response
     */
    public function create()
    {
        return view('lessons_two_cols.create')->with('isCreate',1)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);;
    }

    /**
     * Store a newly created lessons in storage.
     *
     * @param CreatelessonsRequest $request
     *
     * @return Response
     */
    public function store(CreatelessonsRequest $request)
    {
        $input = $request->all();

        $lessons = $this->lessonsRepository->create($input);
        $lessons->author =Auth::user()->id;//exfield1 holds the authors' id, which is got from their logged-in Auth user
        $lessons->save();

        Flash::success('Lessons saved successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified lessons.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons_two_cols.show')->with('lessons', $lessons)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);
    }

    /**
     * Show the form for editing the specified lessons.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons_two_cols.edit')->with('lessons', $lessons)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);
    }

    /**
     * Update the specified lessons in storage.
     *
     * @param int $id
     * @param UpdatelessonsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelessonsRequest $request)
    {

        $lessons = $this->lessonsRepository->find($id);


        if (empty($lessons)) {
            Flash::error('Lessons not found');
            return redirect(route('lessons.index'));
        }

        $r = $request->all();
        /*
        only an admin or this lesson's Author may save this item.
        */
        if( Auth::user()->hasRole('admin') || ( Auth::user()->id == $r['author'] )  ){
            /*
            what??
            The extref fields might return as arrays or strings.
            If their type is array, we have to implode into a string.
            If not, we just use as a string as normal.
            */
            isset($r['extref1']) ? $r['extref1'] = gettype($r['extref1'])=='array' ? implode(",", $r['extref1']) : $r['extref1'] : $w=0;
            isset($r['extref2']) ? $r['extref2'] = gettype($r['extref2'])=='array' ? implode(",", $r['extref2']) : $r['extref2'] : $w=0 ;
            isset($r['extref3']) ? $r['extref3'] = gettype($r['extref3'])=='array' ? implode(",", $r['extref3']) : $r['extref3'] : $w=0 ;
            isset($r['extref4']) ? $r['extref4'] = gettype($r['extref4'])=='array' ? implode(",", $r['extref4']) : $r['extref4'] : $w=0 ;
            isset($r['extref5']) ? $r['extref5'] = "true" : $r['extref5'] = "" ;
            //dd($r);        
            $lessons = $this->lessonsRepository->update( $r , $id);

            Flash::success('Lessons updated successfully.');
        }

        return redirect(route('lessons.index'));
    }

    /**
     * Remove the specified lessons from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        $this->lessonsRepository->delete($id);

        Flash::success('Lessons deleted successfully.');

        return redirect(route('lessons.index'));
    }
}



class LessonsTwoColsControllerOLD extends AppBaseController
{
    /** @var  LessonsTwoColsRepository */
    private $lessonsTwoColsRepository;

    public function __construct(LessonsTwoColsRepository $lessonsTwoColsRepo)
    {
        $this->lessonsTwoColsRepository = $lessonsTwoColsRepo;
    }

    /**
     * Display a listing of the LessonsTwoCols.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lessonsTwoCols = $this->lessonsTwoColsRepository->all();

        return view('lessons_two_cols.index')
            ->with('lessonsTwoCols', $lessonsTwoCols);
    }

    /**
     * Show the form for creating a new LessonsTwoCols.
     *
     * @return Response
     */
    public function create()
    {
        return view('lessons_two_cols.create');
    }

    /**
     * Store a newly created LessonsTwoCols in storage.
     *
     * @param CreateLessonsTwoColsRequest $request
     *
     * @return Response
     */
    public function store(CreateLessonsTwoColsRequest $request)
    {
        $input = $request->all();

        $lessonsTwoCols = $this->lessonsTwoColsRepository->create($input);

        Flash::success('Lessons Two Cols saved successfully.');

        return redirect(route('lessonsTwoCols.index'));
    }

    /**
     * Display the specified LessonsTwoCols.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lessonsTwoCols = $this->lessonsTwoColsRepository->find($id);

        if (empty($lessonsTwoCols)) {
            Flash::error('Lessons Two Cols not found');

            return redirect(route('lessonsTwoCols.index'));
        }

        return view('lessons_two_cols.show')->with('lessonsTwoCols', $lessonsTwoCols);
    }

    /**
     * Show the form for editing the specified LessonsTwoCols.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lessonsTwoCols = $this->lessonsTwoColsRepository->find($id);

        if (empty($lessonsTwoCols)) {
            Flash::error('Lessons Two Cols not found');

            return redirect(route('lessonsTwoCols.index'));
        }

        return view('lessons_two_cols.edit')->with('lessonsTwoCols', $lessonsTwoCols);
    }

    /**
     * Update the specified LessonsTwoCols in storage.
     *
     * @param int $id
     * @param UpdateLessonsTwoColsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLessonsTwoColsRequest $request)
    {
        $lessonsTwoCols = $this->lessonsTwoColsRepository->find($id);

        if (empty($lessonsTwoCols)) {
            Flash::error('Lessons Two Cols not found');

            return redirect(route('lessonsTwoCols.index'));
        }

        $lessonsTwoCols = $this->lessonsTwoColsRepository->update($request->all(), $id);

        Flash::success('Lessons Two Cols updated successfully.');

        return redirect(route('lessonsTwoCols.index'));
    }

    /**
     * Remove the specified LessonsTwoCols from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lessonsTwoCols = $this->lessonsTwoColsRepository->find($id);

        if (empty($lessonsTwoCols)) {
            Flash::error('Lessons Two Cols not found');

            return redirect(route('lessonsTwoCols.index'));
        }

        $this->lessonsTwoColsRepository->delete($id);

        Flash::success('Lessons Two Cols deleted successfully.');

        return redirect(route('lessonsTwoCols.index'));
    }
}
