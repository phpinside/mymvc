<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/11/16 0016
 * Time: 上午 7:03
 */
namespace app\models;

use Pheasant\Types;

class Author extends BaseModel
{
    public function properties()
    {
        return array(
            'authorid' => new Types\SequenceType(),
            'fullname' => new Types\StringType(255, 'required')
        );
    }

    public function relationships()
    {
        return array(
            'Posts' => Post::hasOne('authorid')
        );
    }
}