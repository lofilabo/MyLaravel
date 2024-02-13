<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezzzwibbleRequest;
use App\Http\Requests\UpdatezzzwibbleRequest;
use App\Repositories\zzzwibbleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class zzzwibbleController extends AppBaseController
{
    /** @var  zzzwibbleRepository */
    private $zzzwibbleRepository;

    public function __construct(zzzwibbleRepository $zzzwibbleRepo)
    {
        $this->zzzwibbleRepository = $zzzwibbleRepo;
    }

    /**
     * Display a listing of the zzzwibble.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $zzzwibbles = $this->zzzwibbleRepository->all();

        return view('zzzwibbles.index')
            ->with('zzzwibbles', $zzzwibbles);
    }

    /**
     * Show the form for creating a new zzzwibble.
     *
     * @return Response
     */
    public function create()
    {
        return view('zzzwibbles.create');
    }

    /**
     * Store a newly created zzzwibble in storage.
     *
     * @param CreatezzzwibbleRequest $request
     *
     * @return Response
     */
    public function store(CreatezzzwibbleRequest $request)
    {
        $input = $request->all();

        $zzzwibble = $this->zzzwibbleRepository->create($input);

        Flash::success('Zzzwibble saved successfully.');

        return redirect(route('zzzwibbles.index'));
    }

    /**
     * Display the specified zzzwibble.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zzzwibble = $this->zzzwibbleRepository->find($id);

        if (empty($zzzwibble)) {
            Flash::error('Zzzwibble not found');

            return redirect(route('zzzwibbles.index'));
        }

        return view('zzzwibbles.show')->with('zzzwibble', $zzzwibble);
    }

    /**
     * Show the form for editing the specified zzzwibble.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zzzwibble = $this->zzzwibbleRepository->find($id);

        if (empty($zzzwibble)) {
            Flash::error('Zzzwibble not found');

            return redirect(route('zzzwibbles.index'));
        }

        return view('zzzwibbles.edit')->with('zzzwibble', $zzzwibble);
    }

    /**
     * Update the specified zzzwibble in storage.
     *
     * @param int $id
     * @param UpdatezzzwibbleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezzzwibbleRequest $request)
    {
        $zzzwibble = $this->zzzwibbleRepository->find($id);

        if (empty($zzzwibble)) {
            Flash::error('Zzzwibble not found');

            return redirect(route('zzzwibbles.index'));
        }

        $zzzwibble = $this->zzzwibbleRepository->update($request->all(), $id);

        Flash::success('Zzzwibble updated successfully.');

        return redirect(route('zzzwibbles.index'));
    }

    /**
     * Remove the specified zzzwibble from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zzzwibble = $this->zzzwibbleRepository->find($id);

        if (empty($zzzwibble)) {
            Flash::error('Zzzwibble not found');

            return redirect(route('zzzwibbles.index'));
        }

        $this->zzzwibbleRepository->delete($id);

        Flash::success('Zzzwibble deleted successfully.');

        return redirect(route('zzzwibbles.index'));
    }
}
