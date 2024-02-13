<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezzzCHECKpracticeRequest;
use App\Http\Requests\UpdatezzzCHECKpracticeRequest;
use App\Repositories\zzzCHECKpracticeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzzCHECKpracticeController extends AppBaseController
{
    /** @var  zzzCHECKpracticeRepository */
    private $zzzCHECKpracticeRepository;

    public function __construct(zzzCHECKpracticeRepository $zzzCHECKpracticeRepo)
    {
        $this->zzzCHECKpracticeRepository = $zzzCHECKpracticeRepo;
    }

    /**
     * Display a listing of the zzzCHECKpractice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzzCHECKpractices = $this->zzzCHECKpracticeRepository->all();

        return view('zzz_c_h_e_c_kpractices.index')
            ->with('zzzCHECKpractices', $zzzCHECKpractices);
    }

    /**
     * Show the form for creating a new zzzCHECKpractice.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzz_c_h_e_c_kpractices.create');
    }

    /**
     * Store a newly created zzzCHECKpractice in storage.
     *
     * @param CreatezzzCHECKpracticeRequest $request
     *
     * @return Response
     */
    public function store(CreatezzzCHECKpracticeRequest $request)
    {
        $input = $request->all();

        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->create($input);

        Flash::success('Zzz C H E C Kpractice saved successfully.');

        return redirect(route('zzzCHECKpractices.index'));
    }

    /**
     * Display the specified zzzCHECKpractice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->find($id);

        if (empty($zzzCHECKpractice)) {
            Flash::error('Zzz C H E C Kpractice not found');

            return redirect(route('zzzCHECKpractices.index'));
        }

        return view('zzz_c_h_e_c_kpractices.show')->with('zzzCHECKpractice', $zzzCHECKpractice);
    }

    /**
     * Show the form for editing the specified zzzCHECKpractice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->find($id);

        if (empty($zzzCHECKpractice)) {
            Flash::error('Zzz C H E C Kpractice not found');

            return redirect(route('zzzCHECKpractices.index'));
        }

        return view('zzz_c_h_e_c_kpractices.edit')->with('zzzCHECKpractice', $zzzCHECKpractice);
    }

    /**
     * Update the specified zzzCHECKpractice in storage.
     *
     * @param int $id
     * @param UpdatezzzCHECKpracticeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezzzCHECKpracticeRequest $request)
    {
        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->find($id);

        if (empty($zzzCHECKpractice)) {
            Flash::error('Zzz C H E C Kpractice not found');

            return redirect(route('zzzCHECKpractices.index'));
        }

        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->update($request->all(), $id);

        Flash::success('Zzz C H E C Kpractice updated successfully.');

        return redirect(route('zzzCHECKpractices.index'));
    }

    /**
     * Remove the specified zzzCHECKpractice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzzCHECKpractice = $this->zzzCHECKpracticeRepository->find($id);

        if (empty($zzzCHECKpractice)) {
            Flash::error('Zzz C H E C Kpractice not found');

            return redirect(route('zzzCHECKpractices.index'));
        }

        $this->zzzCHECKpracticeRepository->delete($id);

        Flash::success('Zzz C H E C Kpractice deleted successfully.');

        return redirect(route('zzzCHECKpractices.index'));
    }
}
