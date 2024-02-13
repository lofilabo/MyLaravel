<?php

namespace App\Http\Controllers;

use App\DataTables\pulldown1sDataTable;
use App\Http\Requests;
use App\Http\Requests\Createpulldown1sRequest;
use App\Http\Requests\Updatepulldown1sRequest;
use App\Repositories\pulldown1sRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class pulldown1sController extends AppBaseController
{
    /** @var  pulldown1sRepository */
    private $pulldown1sRepository;

    public function __construct(pulldown1sRepository $pulldown1sRepo)
    {
        $this->pulldown1sRepository = $pulldown1sRepo;
    }

    /**
     * Display a listing of the pulldown1s.
     *
     * @param pulldown1sDataTable $pulldown1sDataTable
     * @return Response
     */
    public function index(pulldown1sDataTable $pulldown1sDataTable)
    {
        return $pulldown1sDataTable->render('pulldown1s.index');
    }

    /**
     * Show the form for creating a new pulldown1s.
     *
     * @return Response
     */
    public function create()
    {
        return view('pulldown1s.create');
    }

    /**
     * Store a newly created pulldown1s in storage.
     *
     * @param Createpulldown1sRequest $request
     *
     * @return Response
     */
    public function store(Createpulldown1sRequest $request)
    {
        $input = $request->all();

        $pulldown1s = $this->pulldown1sRepository->create($input);

        Flash::success('Pulldown1S saved successfully.');

        return redirect(route('pulldown1s.index'));
    }

    /**
     * Display the specified pulldown1s.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pulldown1s = $this->pulldown1sRepository->find($id);

        if (empty($pulldown1s)) {
            Flash::error('Pulldown1S not found');

            return redirect(route('pulldown1s.index'));
        }

        return view('pulldown1s.show')->with('pulldown1s', $pulldown1s);
    }

    /**
     * Show the form for editing the specified pulldown1s.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pulldown1s = $this->pulldown1sRepository->find($id);

        if (empty($pulldown1s)) {
            Flash::error('Pulldown1S not found');

            return redirect(route('pulldown1s.index'));
        }

        return view('pulldown1s.edit')->with('pulldown1s', $pulldown1s);
    }

    /**
     * Update the specified pulldown1s in storage.
     *
     * @param  int              $id
     * @param Updatepulldown1sRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepulldown1sRequest $request)
    {
        $pulldown1s = $this->pulldown1sRepository->find($id);

        if (empty($pulldown1s)) {
            Flash::error('Pulldown1S not found');

            return redirect(route('pulldown1s.index'));
        }

        $pulldown1s = $this->pulldown1sRepository->update($request->all(), $id);

        Flash::success('Pulldown1S updated successfully.');

        return redirect(route('pulldown1s.index'));
    }

    /**
     * Remove the specified pulldown1s from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pulldown1s = $this->pulldown1sRepository->find($id);

        if (empty($pulldown1s)) {
            Flash::error('Pulldown1S not found');

            return redirect(route('pulldown1s.index'));
        }

        $this->pulldown1sRepository->delete($id);

        Flash::success('Pulldown1S deleted successfully.');

        return redirect(route('pulldown1s.index'));
    }
}
