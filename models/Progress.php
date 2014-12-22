<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-16
 * Time: 上午10:02
 */

class Progress extends Eloquent {

    protected $table = 'progress';

    protected $fillable = array('title', 'days','content','uid','create_date','last_change');

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('User','uid');
    }


}