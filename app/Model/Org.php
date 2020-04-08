<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    /**关联到数据库 */
    protected $table="org";


    public $primaryKey='org';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['oldpwd','newpwd','newspwd'];


     /**打上时间戳 */
     public $timestamps = false;
}
