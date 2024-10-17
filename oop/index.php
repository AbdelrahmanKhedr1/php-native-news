<?php

namespace App;

// class User {
//     public static $where;
//     public static $table='user';
//     public static function where($colomn,$value){
//         static::$where .= ' and where '.$colomn.' = "'.$value.'"';
//         return new self;
//     }
//     public static function get(){
//         $sql = ltrim(static::$where,' and');
//         return 'SELECT * FROM '.static::$table.' '.$sql;
//     }
// }

// $user = User::where('name','Ahmed')->where('name','omar')->get();
// echo $user;

enum Status:string
{
    case Found = '200';
    case NotFound = '404';
    public static function name($val)
    {
        return match ($val) {
            Status::Found->value => Status::Found->name, 
            Status::NotFound->value => Status::NotFound->name, 
        };
    }
}

echo Status::name('200'); // Outputs: Found