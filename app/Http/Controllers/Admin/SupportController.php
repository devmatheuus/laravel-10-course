<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Support\CreateSupportDTO;
use App\DTO\Support\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $supportService)
    {
    }

    public function index(Request $request)
    {
        $supports = $this->supportService->getAll($request->filter);

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        $supportFinded = $this->supportService->getById($id);

        if (!$supportFinded) {
            return redirect()->back();
        };

        return view('admin.supports.show', compact('supportFinded'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->supportService->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string|int $id)
    {
        $supportEditted = $this->supportService->getById($id);

        if (!$supportEditted) {
            return redirect()->back();
        };

        return view('admin.supports.edit', compact('supportEditted'));
    }

    public function update(StoreUpdateSupport $request)
    {
        $support =
            $this->supportService->update(
                UpdateSupportDTO::makeFromRequest($request)
            );

        if (!$support) {
            return redirect()->back();
        };

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id)
    {
        $this->supportService->delete($id);

        return redirect()->route('supports.index');
    }
}
