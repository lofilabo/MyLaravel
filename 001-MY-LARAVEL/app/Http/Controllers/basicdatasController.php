<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebasicdatasRequest;
use App\Http\Requests\UpdatebasicdatasRequest;
use App\Repositories\basicdatasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class basicdatasController extends AppBaseController
{
    /** @var  basicdatasRepository */
    private $basicdatasRepository;

    public function __construct(basicdatasRepository $basicdatasRepo)
    {
        $this->basicdatasRepository = $basicdatasRepo;
    }

    /**
     * Display a listing of the basicdatas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $basicdatas = $this->basicdatasRepository->all();

        return view('basicdatas.index')
            ->with('basicdatas', $basicdatas);
    }

    /**
     * Show the form for creating a new basicdatas.
     *
     * @return Response
     */
    public function create()
    {
        return view('basicdatas.create');
    }

    /**
     * Store a newly created basicdatas in storage.
     *
     * @param CreatebasicdatasRequest $request
     *
     * @return Response
     */
    public function store(CreatebasicdatasRequest $request)
    {
        $input = $request->all();

        $basicdatas = $this->basicdatasRepository->create($input);

        Flash::success('Basicdatas saved successfully.');

        return redirect(route('basicdatas.index'));
    }

    /**
     * Display the specified basicdatas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $basicdatas = $this->basicdatasRepository->find($id);

        if (empty($basicdatas)) {
            Flash::error('Basicdatas not found');

            return redirect(route('basicdatas.index'));
        }

        return view('basicdatas.show')->with('basicdatas', $basicdatas);
    }

    /**
     * Show the form for editing the specified basicdatas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $basicdatas = $this->basicdatasRepository->find($id);

        if (empty($basicdatas)) {
            Flash::error('Basicdatas not found');

            return redirect(route('basicdatas.index'));
        }

        return view('basicdatas.edit')->with('basicdatas', $basicdatas);
    }

    /**
     * Update the specified basicdatas in storage.
     *
     * @param int $id
     * @param UpdatebasicdatasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebasicdatasRequest $request)
    {
        $basicdatas = $this->basicdatasRepository->find($id);

        if (empty($basicdatas)) {
            Flash::error('Basicdatas not found');

            return redirect(route('basicdatas.index'));
        }

        $basicdatas = $this->basicdatasRepository->update($request->all(), $id);

        Flash::success('Basicdatas updated successfully.');

        return redirect(route('basicdatas.index'));
    }

    /**
     * Remove the specified basicdatas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $basicdatas = $this->basicdatasRepository->find($id);

        if (empty($basicdatas)) {
            Flash::error('Basicdatas not found');

            return redirect(route('basicdatas.index'));
        }

        $this->basicdatasRepository->delete($id);

        Flash::success('Basicdatas deleted successfully.');

        return redirect(route('basicdatas.index'));
    }
}
