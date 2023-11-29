<?php

namespace App\Repositories;

use App\DTO\Support\CreateSupportDTO;
use App\DTO\Support\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\Interfaces\SupportReposityInterface;
use stdClass;

class SupportRepository implements SupportReposityInterface
{
    public function __construct(
        protected Support $supportModel
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->supportModel
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }
    public function getById(int | string $id): stdClass | null
    {
        $support = $this->supportModel->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    public function new(CreateSupportDTO $createSupportDTO): stdClass
    {
        $support = $this->supportModel->create((array)$createSupportDTO);

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $updateSupportDTO): stdClass | null
    {
        $support = $this->supportModel->find($updateSupportDTO->id);

        if (!$support) {
            return null;
        }

        $support->update((array)$updateSupportDTO);

        return (object) $support->toArray();
    }

    public function delete(int | string $id): void
    {
        $this->supportModel->findOrFail($id)->delete();
    }
}
