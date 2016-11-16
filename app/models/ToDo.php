<?php

namespace app\models;

use \Pheasant\Types;

class ToDo extends BaseModel {

    public function properties()
    {
        return array(
            'id'   => new Types\SequenceType(),
            'title'    => new Types\StringType(255, 'required'),
            'status'   => new Types\BooleanType(),
        );
    }



}