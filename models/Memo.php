<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-16
 * Time: 上午10:02
 */

class Memo extends Eloquent {

    protected $table = 'host';

    protected $fillable = array( 'uid', 'cid','sitename','url','system','webserver','breakpoint','priv','controlmethod','mark');

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('User','uid');
    }

}