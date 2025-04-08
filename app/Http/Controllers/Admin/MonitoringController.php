<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMonitoringRequest;
use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonitoringController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.monitorings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('monitoring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.monitorings.create');
    }

    public function store(StoreMonitoringRequest $request)
    {
        $monitoring = Monitoring::create($request->all());

        return redirect()->route('admin.monitorings.index');
    }

    public function edit(Monitoring $monitoring)
    {
        abort_if(Gate::denies('monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.monitorings.edit', compact('monitoring'));
    }

    public function update(UpdateMonitoringRequest $request, Monitoring $monitoring)
    {
        $monitoring->update($request->all());

        return redirect()->route('admin.monitorings.index');
    }

    public function show(Monitoring $monitoring)
    {
        abort_if(Gate::denies('monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.monitorings.show', compact('monitoring'));
    }

    public function destroy(Monitoring $monitoring)
    {
        abort_if(Gate::denies('monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitoring->delete();

        return back();
    }

    public function massDestroy(MassDestroyMonitoringRequest $request)
    {
        $monitorings = Monitoring::find(request('ids'));

        foreach ($monitorings as $monitoring) {
            $monitoring->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
