<?php

namespace App\Services;

use App\DTO\Support\CreateSupportDTO;
use App\DTO\Support\UpdateSupportDTO;
use App\Repositories\Interfaces\SupportReposityInterface;
use stdClass;

class SupportService
{

    public function __construct(
        protected SupportReposityInterface $repository
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function getById(int | string $id): stdClass | null
    {
        return $this->repository->getById($id);
    }

    public function new(
        CreateSupportDTO $createSupportDTO
    ): stdClass {
        return $this->repository->new($createSupportDTO);
    }

    public function update(UpdateSupportDTO $updateSupportDTO): stdClass | null
    {
        return $this->repository->update($updateSupportDTO);
    }

    public function delete(int | string $id): void
    {
        $this->repository->delete($id);
    }
}
