<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-15
 * Time: 下午4:59
 */
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends BaseController {

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
                'title' => 'required',
                'content' => 'required|min:280',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('PostController@create')->withErrors($validator);
            }

            $title = Input::get('title');
            $catalog = Input::get('group');
            $content = Input::get('content');
            $userid = $this->uid;
            $createdate = time();
            $lastupdate =  time();

            $post = new Post(array(
                'title'=>$title,
                'cid'=>$catalog,
                'content'=>"\r\n".$content,
                'uid'=>$userid,
                'create_date'=>$createdate,
                'last_change'=>$lastupdate,
            ));

            $post->save();
            return Redirect::action('PostController@create');

        }
        return View::make('post.create');
    }


    public function lists()
    {
        $post = Post::where('uid', '=', $this->uid)->paginate(15);
        return View::make('post.index')->with('post_list',$post);
    }


    public function view($id)
    {
        $post = Post::where('tid', '=', $id)->firstOrFail();
        $mypostcount = Post::whereRaw('tid = ? and uid = ?', array($id,$this->uid))->count();
        if ( $mypostcount > 0) {
            $isMyPost = true;
        }
        else{
            $isMyPost = false;
        }

        return View::make('post.view',array('post_item'=>$post , 'ismypost'=>$isMyPost));
    }


    public function edit($id)
    {
        $mypost = Post::whereRaw('tid = ? and uid = ?', array($id,$this->uid))->firstOrFail();
        if (Input::has('editnew'))
        {
            $rules = array(
                'title' => 'required',
                'content' => 'required|min:280',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::action('PostController@edit',array('id'=>$id))->withErrors($validator);
            }

            $title = Input::get('title');
            $catalog = Input::get('group');
            $content = Input::get('content');
            $userid = $this->uid;
            $lastupdate =  time();

            $updatepost = array(
                'title'=>$title,
                'cid'=>$catalog,
                'content'=>"\r\n".$content,
                'uid'=>$userid,
                'last_change'=>$lastupdate,
            );

            $newpost = Post::whereRaw('tid = ? and uid = ?', array($id,$this->uid))->update($updatepost);
            return Redirect::action('PostController@lists');
        }
        return View::make('post.edit',array('post_item'=>$mypost));
    }


    public function delete($id)
    {
        $mypost = Post::whereRaw('tid = ? and uid = ?', array($id,$this->uid))->delete();
        return Redirect::action('PostController@lists');

    }

    public function test()
    {
        var_dump($this->uid);
    }

} 