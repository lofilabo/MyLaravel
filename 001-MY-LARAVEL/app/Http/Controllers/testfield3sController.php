<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtestfield3sRequest;
use App\Http\Requests\Updatetestfield3sRequest;
use App\Repositories\testfield3sRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class testfield3sController extends AppBaseController
{
    /** @var  testfield3sRepository */
    private $testfield3sRepository;

    public function __construct(testfield3sRepository $testfield3sRepo)
    {
        $this->testfield3sRepository = $testfield3sRepo;
    }

    /**
     * Display a listing of the testfield3s.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testfield3s = $this->testfield3sRepository->all();

        return view('testfield3s.index')
            ->with('testfield3s', $testfield3s);
    }

    /**
     * Show the form for creating a new testfield3s.
     *
     * @return Response
     */
    public function create()
    {
        return view('testfield3s.create');
    }

    /**
     * Store a newly created testfield3s in storage.
     *
     * @param Createtestfield3sRequest $request
     *
     * @return Response
     */
    public function store(Createtestfield3sRequest $request)
    {
        $input = $request->all();

        $testfield3s = $this->testfield3sRepository->create($input);

        Flash::success('Testfield3S saved successfully.');

        return redirect(route('testfield3s.index'));
    }

    /**
     * Display the specified testfield3s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testfield3s = $this->testfield3sRepository->find($id);

        if (empty($testfield3s)) {
            Flash::error('Testfield3S not found');

            return redirect(route('testfield3s.index'));
        }

        return view('testfield3s.show')->with('testfield3s', $testfield3s);
    }

    /**
     * Show the form for editing the specified testfield3s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testfield3s = $this->testfield3sRepository->find($id);

        if (empty($testfield3s)) {
            Flash::error('Testfield3S not found');

            return redirect(route('testfield3s.index'));
        }

        return view('testfield3s.edit')->with('testfield3s', $testfield3s);
    }

    /**
     * Update the specified testfield3s in storage.
     *
     * @param int $id
     * @param Updatetestfield3sRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetestfield3sRequest $request)
    {
        $testfield3s = $this->testfield3sRepository->find($id);

        if (empty($testfield3s)) {
            Flash::error('Testfield3S not found');

            return redirect(route('testfield3s.index'));
        }

        $testfield3s = $this->testfield3sRepository->update($request->all(), $id);

        Flash::success('Testfield3S updated successfully.');

        return redirect(route('testfield3s.index'));
    }

    /**
     * Remove the specified testfield3s from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testfield3s = $this->testfield3sRepository->find($id);

        if (empty($testfield3s)) {
            Flash::error('Testfield3S not found');

            return redirect(route('testfield3s.index'));
        }

        $this->testfield3sRepository->delete($id);

        Flash::success('Testfield3S deleted successfully.');

        return redirect(route('testfield3s.index'));
    }
}
