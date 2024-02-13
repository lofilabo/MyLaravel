<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtestfield1sRequest;
use App\Http\Requests\Updatetestfield1sRequest;
use App\Repositories\testfield1sRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class testfield1sController extends AppBaseController
{
    /** @var  testfield1sRepository */
    private $testfield1sRepository;

    public function __construct(testfield1sRepository $testfield1sRepo)
    {
        $this->middleware(['role:admin']);
        $this->testfield1sRepository = $testfield1sRepo;
    }

    /**
     * Display a listing of the testfield1s.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testfield1s = $this->testfield1sRepository->all();

        return view('testfield1s.index')
            ->with('testfield1s', $testfield1s);
    }

    /**
     * Show the form for creating a new testfield1s.
     *
     * @return Response
     */
    public function create()
    {
        return view('testfield1s.create');
    }

    /**
     * Store a newly created testfield1s in storage.
     *
     * @param Createtestfield1sRequest $request
     *
     * @return Response
     */
    public function store(Createtestfield1sRequest $request)
    {
        $input = $request->all();

        $testfield1s = $this->testfield1sRepository->create($input);

        Flash::success('Testfield1S saved successfully.');

        return redirect(route('testfield1s.index'));
    }

    /**
     * Display the specified testfield1s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testfield1s = $this->testfield1sRepository->find($id);

        if (empty($testfield1s)) {
            Flash::error('Testfield1S not found');

            return redirect(route('testfield1s.index'));
        }

        return view('testfield1s.show')->with('testfield1s', $testfield1s);
    }

    /**
     * Show the form for editing the specified testfield1s.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testfield1s = $this->testfield1sRepository->find($id);

        if (empty($testfield1s)) {
            Flash::error('Testfield1S not found');

            return redirect(route('testfield1s.index'));
        }

        return view('testfield1s.edit')->with('testfield1s', $testfield1s);
    }

    /**
     * Update the specified testfield1s in storage.
     *
     * @param int $id
     * @param Updatetestfield1sRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetestfield1sRequest $request)
    {
        $testfield1s = $this->testfield1sRepository->find($id);

        if (empty($testfield1s)) {
            Flash::error('Testfield1S not found');

            return redirect(route('testfield1s.index'));
        }

        $testfield1s = $this->testfield1sRepository->update($request->all(), $id);

        Flash::success('Testfield1S updated successfully.');

        return redirect(route('testfield1s.index'));
    }

    /**
     * Remove the specified testfield1s from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testfield1s = $this->testfield1sRepository->find($id);

        if (empty($testfield1s)) {
            Flash::error('Testfield1S not found');

            return redirect(route('testfield1s.index'));
        }

        $this->testfield1sRepository->delete($id);

        Flash::success('Testfield1S deleted successfully.');

        return redirect(route('testfield1s.index'));
    }
}
