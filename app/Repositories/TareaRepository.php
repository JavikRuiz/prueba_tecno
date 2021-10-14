<?php

namespace App\Repositories;

use App\Models\Tarea;
use App\Repositories\BaseRepository;

/**
 * Class TareaRepository
 * @package App\Repositories
 * @version October 14, 2021, 4:31 pm UTC
*/

class TareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tarea::class;
    }
}
