<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        $h=date('G');
        if ($h<11) $sayhi = "早安！";
        else if ($h<13) $sayhi = "午安！按时吃饭～";
        else if ($h<17) $sayhi = "下午好！";
        else $sayhi = "晚上好！";

        $post =  Post::paginate(5);
        $this->layout->content = View::make('home.index',array('post_list'=>$post,'sayhi'=>$sayhi,'tips'=>"您还没有完成今日总结，不如来看看其他人写的总结吧～"));

	}

    public function showProgress()
    {

        $progress =  Progress::paginate(15);
        $this->layout->content = View::make('home.indexp',array('progress_list'=>$progress));

    }


    public function showMemo()
    {

        $memo =  Memo::paginate(15);
        $this->layout->content = View::make('home.indexm',array('memo_list'=>$memo));

    }



    public function help()
    {

        echo "<script>alert('暂无帮助，如有任何问题请在群里反馈，立即回复！');history.back();</script>";

    }

    public function about()
    {

        echo "<script>alert('Coding...');history.back();</script>";

    }

    public function feedback()
    {

        echo "<script>alert('Coding...');history.back();</script>";

    }

    public function notice()
    {

        echo "<script>alert('下一版本集中更新...');history.back();</script>";

    }


}
