<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-10-27
 * Time: 下午12:21
 */
class MemoController extends BaseController {

    protected $uid;

    public  function __construct()
    {
        $this->uid = Auth::user()->id;

        App::error(function(ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        });
    }

    public function create()
    {


        if (Input::has('addnew'))
        {
            $rules = array(
                'sitename' => 'required',
                'url'=> 'required',
                'group' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('MemoController@create')->withErrors($validator);
            }

            $sitename = Input::get('sitename');
            $url = Input::get('url');
            $cid = Input::get('group');
            $mark = Input::get('mark');
            $userid = $this->uid;
            $system = Input::get('system');
            $webserver = Input::get('webserver');
            $priv = Input::get('priv');
            $breakpoint = Input::get('breakpoint');
            $controlmethod = Input::get('controlmethod');


            $memo = new Memo(array(
                'sitename'=>$sitename,
                'url'=>$url,
                'cid'=>$cid,
                'mark'=>$mark,
                'uid'=>$userid,
                'system'=>$system,
                'webserver'=>$webserver,
                'priv'=>$priv,
                'breakpoint'=>$breakpoint,
                'controlmethod'=>$controlmethod,
            ));

            $memo->save();
            return Redirect::action('MemoController@create');

        }
        return View::make('projectm.create');
    }

    public function sub_create($id)
    {


        if (Input::has('addnew'))
        {
            $rules = array(
                'sitename' => 'required',
                'url'=> 'required',
                'group' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('MemoController@sub_create')->withErrors($validator);
            }
            //$hid = Input::get('id');
            $sitename = Input::get('sitename');
            $url = Input::get('url');
            $cid = Input::get('group');
            $mark = Input::get('mark');
            $userid = $this->uid;
            $system = Input::get('system');
            $webserver = Input::get('webserver');
            $priv = Input::get('priv');
            $breakpoint = Input::get('breakpoint');
            $controlmethod = Input::get('controlmethod');


            $memo = new Submemo(array(
                'sitename'=>$sitename,
                'url'=>$url,
                'hid'=>$id,
                'cid'=>$cid,
                'mark'=>$mark,
                'uid'=>$userid,
                'system'=>$system,
                'webserver'=>$webserver,
                'priv'=>$priv,
                'breakpoint'=>$breakpoint,
                'controlmethod'=>$controlmethod,
            ));

            $memo->save();
            return Redirect::action('MemoController@lists');

        }
        $host = Memo::where('id', '=', $id)->firstOrFail();
        return View::make('projectm.sub_create',array('host_item'=>$host));
    }


    public function lists()
    {
        $memo = Memo::where('uid', '=', $this->uid)->paginate(15);
        return View::make('projectm.index')->with('memo_list',$memo);
    }


    public function view($id)
    {
        $host = Memo::where('id', '=', $id)->firstOrFail();
        $subdomain = Submemo::where('hid', '=', $id)->paginate(15);
        $subcount = Memo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->count();

        if ( $subcount > 0) {
            $isMyPost = true;
        }
        else{
            $isMyPost = false;
        }

        return View::make('projectm.view',array('host_item'=>$host ,'subdomain_list' => $subdomain, 'ismypost'=>$isMyPost ));

    }

    public function sub_view($id)
    {
        $subdomain = Submemo::where('id', '=', $id)->FirstOrFail();
        $subcount = Submemo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->count();

        if ( $subcount > 0) {
            $isMyPost = true;
        }
        else{
            $isMyPost = false;
        }

        return View::make('projectm.sub_view',array('subdomain_item' => $subdomain, 'ismypost'=>$isMyPost ));

    }


    public function edit($id)
    {
        $memo = Memo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        if (Input::has('editnew'))
        {
            $rules = array(
                'sitename' => 'required',
                'url' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('MemoController@edit',array('id'=>$id))->withErrors($validator);
            }

            $sitename = Input::get('sitename');
            $url = Input::get('url');
            $cid = Input::get('group');
            $mark = Input::get('mark');
            $userid = $this->uid;
            $system = Input::get('system');
            $webserver = Input::get('webserver');
            $priv = Input::get('priv');
            $breakpoint = Input::get('breakpoint');
            $controlmethod = Input::get('controlmethod');


            $updatepost = array(
                'sitename'=>$sitename,
                'url'=>$url,
                'cid'=>$cid,
                'mark'=>$mark,
                'uid'=>$userid,
                'system'=>$system,
                'webserver'=>$webserver,
                'priv'=>$priv,
                'breakpoint'=>$breakpoint,
                'controlmethod'=>$controlmethod,
            );

            $newmemo = Memo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->update($updatepost);

            return Redirect::action('MemoController@lists');
        }
        return View::make('projectm.edit',array('host_item'=>$memo));
    }

    public function sub_edit($id)
    {
        $submemo = Submemo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        if (Input::has('editnew'))
        {
            $rules = array(
                'sitename' => 'required',
                'url' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('MemoController@edit',array('id'=>$id))->withErrors($validator);
            }

            $sitename = Input::get('sitename');
            $url = Input::get('url');
            $cid = Input::get('group');
            $mark = Input::get('mark');
            $userid = $this->uid;
            $system = Input::get('system');
            $webserver = Input::get('webserver');
            $priv = Input::get('priv');
            $breakpoint = Input::get('breakpoint');
            $controlmethod = Input::get('controlmethod');


            $updatepost = array(
                'sitename'=>$sitename,
                'url'=>$url,
                'cid'=>$cid,
                'mark'=>$mark,
                'uid'=>$userid,
                'system'=>$system,
                'webserver'=>$webserver,
                'priv'=>$priv,
                'breakpoint'=>$breakpoint,
                'controlmethod'=>$controlmethod,
            );

            $newsubmemo = Submemo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->update($updatepost);
            return Redirect::action('MemoController@lists');
        }

        return View::make('projectm.sub_edit',array('subdomain_item'=>$submemo));
    }

    public function sub_delete($id)
    {
        $mypost = Submemo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->delete();
        return Redirect::action('MemoController@lists');

    }


    public function delete($id)
    {
        $mypost = Memo::whereRaw('id = ? and uid = ?', array($id,$this->uid))->delete();
        return Redirect::action('MemoController@lists');

    }

}