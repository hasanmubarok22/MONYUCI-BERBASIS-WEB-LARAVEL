<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        $type = '';
        $services = auth('laundry')->user()->services;
        return view('laundry.services', ['search' => $search, 'type' => $type, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laundry.service-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'picture.*' => 'required',
        ]);

        $pictureUrl = null;
        if ($request->file('picture')) {
            $request->file('picture')->move(
                'storage/image/services/',
                Str::slug($request->name, '-') . '_' . now()->format('d-m-Y')
            );
            $pictureUrl = 'storage/image/services/' . Str::slug($request->name, '-') . '_' . now()->format('d-m-Y');
        }


        $service = new Service([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'unit' => $request->unit,
            'picture' => $pictureUrl,
        ]);

        auth('laundry')->user()->services()->save($service);

        return redirect()->route('laundry.services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('laundry.service-edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'unit' => 'required',
            // 'picture.*' => 'required',
        ]);

        $pictureUrl = null;
        if ($request->file('picture')) {
            $request->file('picture')->move(
                'storage/image/services/',
                Str::slug($request->name, '-') . '_' . now()->format('d-m-Y')
            );
            if ($service->picture)
                Storage::disk('local')->delete($service->picture);
            $pictureUrl = 'storage/image/services/' . Str::slug($request->name, '-') . '_' . now()->format('d-m-Y');
        }

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'unit' => $request->unit,
            'picture' => $pictureUrl,
        ]);

        return redirect()->route('laundry.services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('laundry.services');
    }
}
