<?php

namespace Modules\LocationModule\Services;

use Modules\LocationModule\Repository\CityRepository;

class CityService
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function findAll()
    {
        return $this->cityRepository->findAll();
    }

    public function findOne($id)
    {
        return $this->cityRepository->find($id);
    }

    public function create($data)
    {  
        return $this->cityRepository->create($data);
    }
    public function update($data)
    {
        return $this->cityRepository->update($data, $data['id']);
    }

}
