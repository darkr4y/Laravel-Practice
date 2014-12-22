<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-16
 * Time: 上午10:02
 */

class Subprogress extends Eloquent {

    protected $table = 'subprogress';

    protected $fillable = array('tid', 'content','uid','create_date','last_change');

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('User','uid');
    }

}