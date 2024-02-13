<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticlecategoriesRequest;
use App\Http\Requests\UpdateArticlecategoriesRequest;
use App\Repositories\ArticlecategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ArticlecategoriesController extends AppBaseController
{
    /** @var  ArticlecategoriesRepository */
    private $articlecategoriesRepository;

    public function __construct(ArticlecategoriesRepository $articlecategoriesRepo)
    {
        $this->articlecategoriesRepository = $articlecategoriesRepo;
    }

    /**
     * Display a listing of the Articlecategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articlecategories = $this->articlecategoriesRepository->all();

        return view('articlecategories.index')
            ->with('articlecategories', $articlecategories);
    }

    /**
     * Show the form for creating a new Articlecategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('articlecategories.create');
    }

    /**
     * Store a newly created Articlecategories in storage.
     *
     * @param CreateArticlecategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateArticlecategoriesRequest $request)
    {
        $input = $request->all();

        $articlecategories = $this->articlecategoriesRepository->create($input);

        Flash::success('Articlecategories saved successfully.');

        return redirect(route('articlecategories.index'));
    }

    /**
     * Display the specified Articlecategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articlecategories = $this->articlecategoriesRepository->find($id);

        if (empty($articlecategories)) {
            Flash::error('Articlecategories not found');

            return redirect(route('articlecategories.index'));
        }

        return view('articlecategories.show')->with('articlecategories', $articlecategories);
    }

    /**
     * Show the form for editing the specified Articlecategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articlecategories = $this->articlecategoriesRepository->find($id);

        if (empty($articlecategories)) {
            Flash::error('Articlecategories not found');

            return redirect(route('articlecategories.index'));
        }

        return view('articlecategories.edit')->with('articlecategories', $articlecategories);
    }

    /**
     * Update the specified Articlecategories in storage.
     *
     * @param int $id
     * @param UpdateArticlecategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticlecategoriesRequest $request)
    {
        $articlecategories = $this->articlecategoriesRepository->find($id);

        if (empty($articlecategories)) {
            Flash::error('Articlecategories not found');

            return redirect(route('articlecategories.index'));
        }

        $articlecategories = $this->articlecategoriesRepository->update($request->all(), $id);

        Flash::success('Articlecategories updated successfully.');

        return redirect(route('articlecategories.index'));
    }

    /**
     * Remove the specified Articlecategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articlecategories = $this->articlecategoriesRepository->find($id);

        if (empty($articlecategories)) {
            Flash::error('Articlecategories not found');

            return redirect(route('articlecategories.index'));
        }

        $this->articlecategoriesRepository->delete($id);

        Flash::success('Articlecategories deleted successfully.');

        return redirect(route('articlecategories.index'));
    }
}
