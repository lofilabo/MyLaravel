<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezzzTEST02Request;
use App\Http\Requests\UpdatezzzTEST02Request;
use App\Repositories\zzzTEST02Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzzTEST02Controller extends AppBaseController
{
    /** @var  zzzTEST02Repository */
    private $zzzTEST02Repository;

    public function __construct(zzzTEST02Repository $zzzTEST02Repo)
    {
        $this->zzzTEST02Repository = $zzzTEST02Repo;
    }

    /**
     * Display a listing of the zzzTEST02.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzzTEST02s = $this->zzzTEST02Repository->all();

        return view('zzz_t_e_s_t02s.index')
            ->with('zzzTEST02s', $zzzTEST02s);
    }

    /**
     * Show the form for creating a new zzzTEST02.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzz_t_e_s_t02s.create');
    }

    /**
     * Store a newly created zzzTEST02 in storage.
     *
     * @param CreatezzzTEST02Request $request
     *
     * @return Response
     */
    public function store(CreatezzzTEST02Request $request)
    {
        $input = $request->all();

        $zzzTEST02 = $this->zzzTEST02Repository->create($input);

        Flash::success('Zzz T E S T02 saved successfully.');

        return redirect(route('zzzTEST02s.index'));
    }

    /**
     * Display the specified zzzTEST02.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzzTEST02 = $this->zzzTEST02Repository->find($id);

        if (empty($zzzTEST02)) {
            Flash::error('Zzz T E S T02 not found');

            return redirect(route('zzzTEST02s.index'));
        }

        return view('zzz_t_e_s_t02s.show')->with('zzzTEST02', $zzzTEST02);
    }

    /**
     * Show the form for editing the specified zzzTEST02.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzzTEST02 = $this->zzzTEST02Repository->find($id);

        if (empty($zzzTEST02)) {
            Flash::error('Zzz T E S T02 not found');

            return redirect(route('zzzTEST02s.index'));
        }

        return view('zzz_t_e_s_t02s.edit')->with('zzzTEST02', $zzzTEST02);
    }

    /**
     * Update the specified zzzTEST02 in storage.
     *
     * @param int $id
     * @param UpdatezzzTEST02Request $request
     *
     * @return Response
     */
    public function update($id, UpdatezzzTEST02Request $request)
    {
        $zzzTEST02 = $this->zzzTEST02Repository->find($id);

        if (empty($zzzTEST02)) {
            Flash::error('Zzz T E S T02 not found');

            return redirect(route('zzzTEST02s.index'));
        }

        $zzzTEST02 = $this->zzzTEST02Repository->update($request->all(), $id);

        Flash::success('Zzz T E S T02 updated successfully.');

        return redirect(route('zzzTEST02s.index'));
    }

    /**
     * Remove the specified zzzTEST02 from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzzTEST02 = $this->zzzTEST02Repository->find($id);

        if (empty($zzzTEST02)) {
            Flash::error('Zzz T E S T02 not found');

            return redirect(route('zzzTEST02s.index'));
        }

        $this->zzzTEST02Repository->delete($id);

        Flash::success('Zzz T E S T02 deleted successfully.');

        return redirect(route('zzzTEST02s.index'));
    }
}
