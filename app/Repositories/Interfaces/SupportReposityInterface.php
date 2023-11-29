<?php

namespace App\Repositories\Interfaces;

use App\DTO\Support\{CreateSupportDTO, UpdateSupportDTO};
use stdClass;

interface SupportReposityInterface
{
    public function getAll(string $filter = null): array;

    public function getById(int | string $id): stdClass | null;

    public function new(CreateSupportDTO $createSupportDTO): stdClass;

    public function update(UpdateSupportDTO $updateSupportDTO): stdClass | null;

    public function delete(int | string $id): void;
}
