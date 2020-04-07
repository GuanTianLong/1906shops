<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
<<<<<<< HEAD
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'p_users';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

=======
    //指派表名
    protected $table="p_users";
>>>>>>> 22d05047ef4fdc9ce601241992e890c966837162
}
