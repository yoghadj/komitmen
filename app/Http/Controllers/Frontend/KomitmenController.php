<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKomitmanRequest;
use App\Http\Requests\StoreKomitmanRequest;
use App\Http\Requests\UpdateKomitmanRequest;
use App\Models\Komitman;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KomitmenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('komitman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $komitmen = Komitman::all();

        return view('frontend.komitmen.index', compact('komitmen'));
    }

    public function create()
    {
        abort_if(Gate::denies('komitman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.komitmen.create');
    }

    public function store(StoreKomitmanRequest $request)
    {
        $komitman = Komitman::create($request->all());

        return redirect()->route('frontend.komitmen.index');
    }

    public function edit(Komitman $komitman)
    {
        abort_if(Gate::denies('komitman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.komitmen.edit', compact('komitman'));
    }

    public function update(UpdateKomitmanRequest $request, Komitman $komitman)
    {
        $komitman->update($request->all());

        return redirect()->route('frontend.komitmen.index');
    }

    public function show(Komitman $komitman)
    {
        abort_if(Gate::denies('komitman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.komitmen.show', compact('komitman'));
    }

    public function destroy(Komitman $komitman)
    {
        abort_if(Gate::denies('komitman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $komitman->delete();

        return back();
    }

    public function massDestroy(MassDestroyKomitmanRequest $request)
    {
        $komitmen = Komitman::find(request('ids'));

        foreach ($komitmen as $komitman) {
            $komitman->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
