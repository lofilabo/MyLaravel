<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtestfield2sRequest;
use App\Http\Requests\Updatetestfield2sRequest;
use App\Repositories\testfield2sRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class testfield2sController extends AppBaseController
{
    /** @var  testfield2sRepository */
    private $testfield2sRepository;

    public function __construct(testfield2sRepository $testfield2sRepo)
    {
        $this->testfield2sRepository = $testfield2sRepo;
    }

    /**
     * Display a listing of the testfield2s.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testfield2s = $this->testfield2sRepository->all();

        return view('testfield2s.index')
            ->with('testfield2s', $testfield2s);
    }

    /**
     * Show the form for creating a new testfield2s.
     *
     * @return Response
     */
    public function create()
    {
        return view('testfield2s.create');
    }

    /**
     * Store a newly created testfield2s in storage.
     *
     * @param Createtestfield2sRequest $request
     *
     * @return Response
     */
    public function store(Createtestfield2sRequest $request)
    {
        $input = $request->all();

        $testfield2s = $this->testfield2sRepository->create($input);

        Flash::success('Testfield2S saved successfully.');

        return redirect(route('testfield2s.index'));
    }

    /**
     * Display the specified testfield2s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testfield2s = $this->testfield2sRepository->find($id);

        if (empty($testfield2s)) {
            Flash::error('Testfield2S not found');

            return redirect(route('testfield2s.index'));
        }

        return view('testfield2s.show')->with('testfield2s', $testfield2s);
    }

    /**
     * Show the form for editing the specified testfield2s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testfield2s = $this->testfield2sRepository->find($id);

        if (empty($testfield2s)) {
            Flash::error('Testfield2S not found');

            return redirect(route('testfield2s.index'));
        }

        return view('testfield2s.edit')->with('testfield2s', $testfield2s);
    }

    /**
     * Update the specified testfield2s in storage.
     *
     * @param int $id
     * @param Updatetestfield2sRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetestfield2sRequest $request)
    {
        $testfield2s = $this->testfield2sRepository->find($id);

        if (empty($testfield2s)) {
            Flash::error('Testfield2S not found');

            return redirect(route('testfield2s.index'));
        }

        $testfield2s = $this->testfield2sRepository->update($request->all(), $id);

        Flash::success('Testfield2S updated successfully.');

        return redirect(route('testfield2s.index'));
    }

    /**
     * Remove the specified testfield2s from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testfield2s = $this->testfield2sRepository->find($id);

        if (empty($testfield2s)) {
            Flash::error('Testfield2S not found');

            return redirect(route('testfield2s.index'));
        }

        $this->testfield2sRepository->delete($id);

        Flash::success('Testfield2S deleted successfully.');

        return redirect(route('testfield2s.index'));
    }
}
