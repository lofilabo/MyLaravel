<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezzznibbleRequest;
use App\Http\Requests\UpdatezzznibbleRequest;
use App\Repositories\zzznibbleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzznibbleController extends AppBaseController
{
    /** @var  zzznibbleRepository */
    private $zzznibbleRepository;

    public function __construct(zzznibbleRepository $zzznibbleRepo)
    {
        $this->zzznibbleRepository = $zzznibbleRepo;
    }

    /**
     * Display a listing of the zzznibble.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzznibbles = $this->zzznibbleRepository->all();

        return view('zzznibbles.index')
            ->with('zzznibbles', $zzznibbles);
    }

    /**
     * Show the form for creating a new zzznibble.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzznibbles.create');
    }

    /**
     * Store a newly created zzznibble in storage.
     *
     * @param CreatezzznibbleRequest $request
     *
     * @return Response
     */
    public function store(CreatezzznibbleRequest $request)
    {
        $input = $request->all();

        $zzznibble = $this->zzznibbleRepository->create($input);

        Flash::success('Zzznibble saved successfully.');

        return redirect(route('zzznibbles.index'));
    }

    /**
     * Display the specified zzznibble.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzznibble = $this->zzznibbleRepository->find($id);

        if (empty($zzznibble)) {
            Flash::error('Zzznibble not found');

            return redirect(route('zzznibbles.index'));
        }

        return view('zzznibbles.show')->with('zzznibble', $zzznibble);
    }

    /**
     * Show the form for editing the specified zzznibble.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzznibble = $this->zzznibbleRepository->find($id);

        if (empty($zzznibble)) {
            Flash::error('Zzznibble not found');

            return redirect(route('zzznibbles.index'));
        }

        return view('zzznibbles.edit')->with('zzznibble', $zzznibble);
    }

    /**
     * Update the specified zzznibble in storage.
     *
     * @param int $id
     * @param UpdatezzznibbleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezzznibbleRequest $request)
    {
        $zzznibble = $this->zzznibbleRepository->find($id);

        if (empty($zzznibble)) {
            Flash::error('Zzznibble not found');

            return redirect(route('zzznibbles.index'));
        }

        $zzznibble = $this->zzznibbleRepository->update($request->all(), $id);

        Flash::success('Zzznibble updated successfully.');

        return redirect(route('zzznibbles.index'));
    }

    /**
     * Remove the specified zzznibble from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzznibble = $this->zzznibbleRepository->find($id);

        if (empty($zzznibble)) {
            Flash::error('Zzznibble not found');

            return redirect(route('zzznibbles.index'));
        }

        $this->zzznibbleRepository->delete($id);

        Flash::success('Zzznibble deleted successfully.');

        return redirect(route('zzznibbles.index'));
    }
}
