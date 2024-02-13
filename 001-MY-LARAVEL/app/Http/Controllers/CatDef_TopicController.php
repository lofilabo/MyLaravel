<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatDef_TopicRequest;
use App\Http\Requests\UpdateCatDef_TopicRequest;
use App\Repositories\CatDef_TopicRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CatDef_TopicController extends AppBaseController
{
    /** @var  CatDef_TopicRepository */
    private $catDefTopicRepository;

    public function __construct(CatDef_TopicRepository $catDefTopicRepo)
    {
        $this->catDefTopicRepository = $catDefTopicRepo;
    }

    /**
     * Display a listing of the CatDef_Topic.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catDefTopics = $this->catDefTopicRepository->all();

        return view('cat_def__topics.index')
            ->with('catDefTopics', $catDefTopics);
    }

    /**
     * Show the form for creating a new CatDef_Topic.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_def__topics.create');
    }

    /**
     * Store a newly created CatDef_Topic in storage.
     *
     * @param CreateCatDef_TopicRequest $request
     *
     * @return Response
     */
    public function store(CreateCatDef_TopicRequest $request)
    {
        $input = $request->all();

        $catDefTopic = $this->catDefTopicRepository->create($input);

        Flash::success('Cat Def  Topic saved successfully.');

        return redirect(route('catDefTopics.index'));
    }

    /**
     * Display the specified CatDef_Topic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catDefTopic = $this->catDefTopicRepository->find($id);

        if (empty($catDefTopic)) {
            Flash::error('Cat Def  Topic not found');

            return redirect(route('catDefTopics.index'));
        }

        return view('cat_def__topics.show')->with('catDefTopic', $catDefTopic);
    }

    /**
     * Show the form for editing the specified CatDef_Topic.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catDefTopic = $this->catDefTopicRepository->find($id);

        if (empty($catDefTopic)) {
            Flash::error('Cat Def  Topic not found');

            return redirect(route('catDefTopics.index'));
        }

        return view('cat_def__topics.edit')->with('catDefTopic', $catDefTopic);
    }

    /**
     * Update the specified CatDef_Topic in storage.
     *
     * @param int $id
     * @param UpdateCatDef_TopicRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatDef_TopicRequest $request)
    {
        $catDefTopic = $this->catDefTopicRepository->find($id);

        if (empty($catDefTopic)) {
            Flash::error('Cat Def  Topic not found');

            return redirect(route('catDefTopics.index'));
        }

        $catDefTopic = $this->catDefTopicRepository->update($request->all(), $id);

        Flash::success('Cat Def  Topic updated successfully.');

        return redirect(route('catDefTopics.index'));
    }

    /**
     * Remove the specified CatDef_Topic from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catDefTopic = $this->catDefTopicRepository->find($id);

        if (empty($catDefTopic)) {
            Flash::error('Cat Def  Topic not found');

            return redirect(route('catDefTopics.index'));
        }

        $this->catDefTopicRepository->delete($id);

        Flash::success('Cat Def  Topic deleted successfully.');

        return redirect(route('catDefTopics.index'));
    }
}
