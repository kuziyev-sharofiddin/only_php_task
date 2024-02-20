<?php

namespace BaseInterface;

interface BaseInterface
{
    public function create(array $data);

    public function update($id,array $data);

    public function getById($id);

    public function paginate($limit);

    public function delete($id);
}
