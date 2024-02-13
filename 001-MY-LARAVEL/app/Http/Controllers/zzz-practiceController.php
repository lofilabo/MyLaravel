<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createzzz-practiceRequest;
use App\Http\Requests\Updatezzz-practiceRequest;
use App\Repositories\zzz-practiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzz-practiceController extends AppBaseController
{
    /** @var  zzz-practiceRepository */
    private $zzzPracticeRepository;

    public function __construct(zzz-practiceRepository $zzzPracticeRepo)
    {
        $this->zzzPracticeRepository = $zzzPracticeRepo;
    }

    /**
     * Display a listing of the zzz-practice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzzPractices = $this->zzzPracticeRepository->all();

        return view('zzz-practices.index')
            ->with('zzzPractices', $zzzPractices);
    }

    /**
     * Show the form for creating a new zzz-practice.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzz-practices.create');
    }

    /**
     * Store a newly created zzz-practice in storage.
     *
     * @param Createzzz-practiceRequest $request
     *
     * @return Response
     */
    public function store(Createzzz-practiceRequest $request)
    {
        $input = $request->all();

        $zzzPractice = $this->zzzPracticeRepository->create($input);

        Flash::success('Zzz-Practice saved successfully.');

        return redirect(route('zzzPractices.index'));
    }

    /**
     * Display the specified zzz-practice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzzPractice = $this->zzzPracticeRepository->find($id);

        if (empty($zzzPractice)) {
            Flash::error('Zzz-Practice not found');

            return redirect(route('zzzPractices.index'));
        }

        return view('zzz-practices.show')->with('zzzPractice', $zzzPractice);
    }

    /**
     * Show the form for editing the specified zzz-practice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzzPractice = $this->zzzPracticeRepository->find($id);

        if (empty($zzzPractice)) {
            Flash::error('Zzz-Practice not found');

            return redirect(route('zzzPractices.index'));
        }

        return view('zzz-practices.edit')->with('zzzPractice', $zzzPractice);
    }

    /**
     * Update the specified zzz-practice in storage.
     *
     * @param int $id
     * @param Updatezzz-practiceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatezzz-practiceRequest $request)
    {
        $zzzPractice = $this->zzzPracticeRepository->find($id);

        if (empty($zzzPractice)) {
            Flash::error('Zzz-Practice not found');

            return redirect(route('zzzPractices.index'));
        }

        $zzzPractice = $this->zzzPracticeRepository->update($request->all(), $id);

        Flash::success('Zzz-Practice updated successfully.');

        return redirect(route('zzzPractices.index'));
    }

    /**
     * Remove the specified zzz-practice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzzPractice = $this->zzzPracticeRepository->find($id);

        if (empty($zzzPractice)) {
            Flash::error('Zzz-Practice not found');

            return redirect(route('zzzPractices.index'));
        }

        $this->zzzPracticeRepository->delete($id);

        Flash::success('Zzz-Practice deleted successfully.');

        return redirect(route('zzzPractices.index'));
    }
}
