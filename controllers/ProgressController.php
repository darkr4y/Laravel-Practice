<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-10-27
 * Time: 下午12:21
 */

class ProgressController extends BaseController {

    protected $uid;

    public  function __construct()
    {
        $this->uid = Auth::user()->id;

        App::error(function(ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        });
    }

    public function timediff($starttime , $endtime)
    {
        $passtime =$endtime - $starttime;
        $days =  floor($passtime/(24*60*60));
        return $days;
    }

    public function create()
    {

        if (Input::has('addnew'))
        {
            $rules = array(
                'title' => 'required',
                'days'=> 'required',
                'content' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('ProgressController@create')->withErrors($validator);
            }

            $title = Input::get('title');
            $days = Input::get('days');
            $content = Input::get('content');
            $userid = $this->uid;
            $createdate = time();
            $lastupdate =  time();

            $progress = new Progress(array(
                'title'=>$title,
                'days'=>$days,
                'content'=>$content,
                'uid'=>$userid,
                'create_date'=>$createdate,
                'last_change'=>$lastupdate,
            ));

            $progress->save();
            return Redirect::action('ProgressController@lists');
        }
        return View::make('projectp.create');
    }


    public function sub_create($id)
    {
        $progress = Progress::where('pid', '=', $id)->firstOrFail();
        $timediff = $this->timediff($progress->create_date,time());
        if ($timediff < $progress->days )
        {
            if (Input::has('addnew'))
            {
                $rules = array(
                    'content' => 'required',
                );

                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails())
                {
                    return Redirect::action('ProgressController@sub_create')->withErrors($validator);
                }

                $content = Input::get('content');
                $userid = $this->uid;
                $createdate = time();
                $lastupdate =  time();

                $subprogress = new Subprogress(array(
                    'content'=>$content,
                    'uid'=>$userid,
                    'tid'=>$id,
                    'create_date'=>$createdate,
                    'last_change'=>$lastupdate,
                ));

                $subprogress->save();
                return Redirect::action('ProgressController@lists');
            }

            return View::make('projectp.sub_create',array('progress_item'=>$progress,'timediff'=>$timediff));

        }
        else
        {
            echo "<script>alert('啊哦～醒目已经过期了，赶紧添加备忘吧！');history.back();</script>";
        }

    }


    public function lists()
    {
        $progress = Progress::where('uid', '=', $this->uid)->paginate(15);
        return View::make('projectp.index')->with('progress_list',$progress);
    }


    public function view($id)
    {
        $progress = Progress::where('pid','=',$id)->firstOrFail();
        $subproress = Subprogress::where('tid', '=', $id)->paginate(15);
        $mypostcount = Progress::whereRaw('pid = ? and uid = ?', array($id,$this->uid))->count();
        if ( $mypostcount > 0) {
            $isMyPost = true;
        }
        else{
            $isMyPost = false;
        }

        return View::make('projectp.view',array('progress_item'=>$progress ,'subprogress_list'=>$subproress, 'ismypost'=>$isMyPost));
    }


    public function edit($id)
    {
        if (Input::has('editnew'))
        {
            $rules = array(
                'title' => 'required',
                'days' => 'required',
                'content' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('ProgressController@edit',array('id'=>$id))->withErrors($validator);
            }

            $title = Input::get('title');
            $days = Input::get('days');
            $content = Input::get('content');
            $userid = $this->uid;
            $lastupdate =  time();

            $updatepost = array(
                'title'=>$title,
                'days'=>$days,
                'content'=>$content,
                'uid'=>$userid,
                'last_change'=>$lastupdate,
            );

            $new_progress = Progress::whereRaw('pid = ? and uid = ?', array($id,$this->uid))->update($updatepost);
            return Redirect::action('ProgressController@lists');
        }
        $progress = Progress::whereRaw('pid = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        return View::make('projectp.edit',array('progress_item'=>$progress));
    }


    public function sub_edit($id)
    {
        $subprogress = Subprogress::whereRaw('sid = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        $progress = Progress::whereRaw('pid = ? and uid = ?', array($subprogress->tid,$this->uid))->firstOrFail();
        if ( $this->timediff($subprogress->create_date,time()) < $progress->days )
        {
            if (Input::has('editnew'))
            {
                $rules = array(
                    'content' => 'required',
                );

                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails())
                {
                    return Redirect::action('ProgressController@sub_edit',array('id'=>$id))->withErrors($validator);
                }

                $content = Input::get('content');
                $userid = $this->uid;
                $lastupdate =  time();

                $updatepost = array(
                    'content'=>$content,
                    'uid'=>$userid,
                    'last_change'=>$lastupdate,
                );

                $new_sub_progress = Subprogress::whereRaw('sid = ? and uid = ?', array($id,$this->uid))->update($updatepost);
                return Redirect::action('ProgressController@lists');
            }

            return View::make('projectp.sub_edit',array('subprogress_item'=>$subprogress));

        }
        else
        {
            echo "<script>alert('啊哦～醒目已经过期了，赶紧添加备忘吧！');history.back();</script>";
        }
    }


    public function delete($id)
    {
        $progress = Progress::whereRaw('pid = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        if ( $this->timediff($progress->create_date,time()) < $progress->days )
        {
            $del_progress = Progress::whereRaw('pid = ? and uid = ?', array($progress->pid,$this->uid))->delete();
            $subprogress = Subprogress::whereRaw('tid = ? and uid = ?', array($id,$this->uid))->delete();
            return Redirect::action('ProgressController@lists');
        }
        else
        {
            echo "<script>alert('啊哦～醒目已经过期了，赶紧添加备忘吧！');history.back();</script>";
        }


    }

    public function sub_delete($id)
    {
        $subprogress = Subprogress::whereRaw('sid = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        $progress = Progress::whereRaw('pid = ? and uid = ?', array($subprogress->tid,$this->uid))->firstOrFail();
        if ( $this->timediff($subprogress->create_date,time()) < $progress->days )
        {
            $subprogress = Subprogress::whereRaw('sid = ? and uid = ?', array($id,$this->uid))->delete();
            return Redirect::action('ProgressController@lists');
        }
        else
        {
            echo "<script>alert('啊哦～醒目已经过期了，赶紧添加备忘吧！');history.back();</script>";
        }
    }

    public function test()
    {
        var_dump($this->uid);
    }

}