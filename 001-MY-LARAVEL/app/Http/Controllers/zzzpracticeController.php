<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezzzpracticeRequest;
use App\Http\Requests\UpdatezzzpracticeRequest;
use App\Repositories\zzzpracticeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzzpracticeController extends AppBaseController
{
    /** @var  zzzpracticeRepository */
    private $zzzpracticeRepository;

    public function __construct(zzzpracticeRepository $zzzpracticeRepo)
    {
        $this->zzzpracticeRepository = $zzzpracticeRepo;
    }

    /**
     * Display a listing of the zzzpractice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzzpractices = $this->zzzpracticeRepository->all();

        return view('zzzpractices.index')
            ->with('zzzpractices', $zzzpractices);
    }

    /**
     * Show the form for creating a new zzzpractice.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzzpractices.create');
    }

    /**
     * Store a newly created zzzpractice in storage.
     *
     * @param CreatezzzpracticeRequest $request
     *
     * @return Response
     */
    public function store(CreatezzzpracticeRequest $request)
    {
        $input = $request->all();

        $zzzpractice = $this->zzzpracticeRepository->create($input);

        Flash::success('Zzzpractice saved successfully.');

        return redirect(route('zzzpractices.index'));
    }

    /**
     * Display the specified zzzpractice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzzpractice = $this->zzzpracticeRepository->find($id);

        if (empty($zzzpractice)) {
            Flash::error('Zzzpractice not found');

            return redirect(route('zzzpractices.index'));
        }

        return view('zzzpractices.show')->with('zzzpractice', $zzzpractice);
    }

    /**
     * Show the form for editing the specified zzzpractice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzzpractice = $this->zzzpracticeRepository->find($id);

        if (empty($zzzpractice)) {
            Flash::error('Zzzpractice not found');

            return redirect(route('zzzpractices.index'));
        }

        return view('zzzpractices.edit')->with('zzzpractice', $zzzpractice);
    }

    /**
     * Update the specified zzzpractice in storage.
     *
     * @param int $id
     * @param UpdatezzzpracticeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezzzpracticeRequest $request)
    {
        $zzzpractice = $this->zzzpracticeRepository->find($id);

        if (empty($zzzpractice)) {
            Flash::error('Zzzpractice not found');

            return redirect(route('zzzpractices.index'));
        }

        $zzzpractice = $this->zzzpracticeRepository->update($request->all(), $id);

        Flash::success('Zzzpractice updated successfully.');

        return redirect(route('zzzpractices.index'));
    }

    /**
     * Remove the specified zzzpractice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzzpractice = $this->zzzpracticeRepository->find($id);

        if (empty($zzzpractice)) {
            Flash::error('Zzzpractice not found');

            return redirect(route('zzzpractices.index'));
        }

        $this->zzzpracticeRepository->delete($id);

        Flash::success('Zzzpractice deleted successfully.');

        return redirect(route('zzzpractices.index'));
    }
}
