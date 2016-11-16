<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/11/16 0016
 * Time: 上午 7:03
 */


namespace app\models;

use Pheasant\Types;

class Post extends BaseModel
{
    public function properties()
    {
        return array(
            'postid'   => new Types\SequenceType(),
            'title'    => new Types\StringType(255, 'required'),
            'subtitle' => new Types\StringType(255),
            'status'   => new Types\EnumType(array('closed','open')),
            'authorid' => new Types\IntegerType(11),
        );
    }

    public function relationships()
    {
        return array(
            'Author' => Author::hasOne('authorid')
        );
    }
}
