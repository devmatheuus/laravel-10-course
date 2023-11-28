<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id, Support $support)
    {
        $supportFinded = $support->find($id);

        if (!$supportFinded) {
            return redirect()->back();
        };

        return view('admin.supports.show', compact('supportFinded'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(string|int $id, Support $support)
    {
        $supportEditted = $support->where('id', $id)->first();

        if (!$supportEditted) {
            return redirect()->back();
        };

        return view('admin.supports.edit', compact('supportEditted'));
    }

    public function update(string|int $id, Support $support, StoreUpdateSupport $request)
    {
        $supportToEdit = $support->find($id);

        if (!$supportToEdit) {
            return redirect()->back();
        };

        $supportToEdit->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id, Support $support)
    {
        $supportToDestroy = $support->find($id);

        if (!$supportToDestroy) {
            return redirect()->back();
        };

        $supportToDestroy->delete();

        return redirect()->route('supports.index');
    }
}
