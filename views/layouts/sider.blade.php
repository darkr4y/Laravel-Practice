<div class="span3">
    <div class="row-fluid">
        <div class="span12">
            <ul class="nav nav-list">
                <li class="nav-header">
                    功能
                </li>
                <li class="active">
                    <a href="{{URL::action('UserController@profile')}}">个人资料</a>
                </li>
                <li>
                    <a href="{{URL::action('PostController@create')}}">创建总结</a>
                </li>
                <li>
                    <a href="{{URL::action('PostController@lists')}}">总结管理</a>
                </li>
                <li>
                    <a href="{{URL::action('ProgressController@create')}}">添加项目进度</a>
                </li>
                <li>
                    <a href="{{URL::action('ProgressController@lists')}}">项目进度管理</a>
                </li>
                <li>
                    <a href="{{URL::action('MemoController@create')}}">添加备忘管理</a>
                </li>
                <li>
                    <a href="{{URL::action('MemoController@lists')}}">项目备忘管理</a>
                </li>
                <li>
                    <a href="{{URL::action('UserController@logout')}}">注销</a>
                </li>

                @if (Auth::user()->isAdmin == 1)
                <li class="divider">
                </li>
                <li class="nav-header">
                    管理员
                </li>
                <li class="active">
                    <a href="{{URL::action('AdminController@index')}}">用户管理</a>
                </li>
                <li>
                    <a href="{{URL::action('AdminController@createuser')}}">添加用户</a>
                </li>
                @endif

                <li class="divider">
                </li>
                <li>
                    <a href="{{URL::action('HomeController@help')}}">帮助</a>
                </li>
                <li>
                    <a href="{{URL::action('HomeController@notice')}}">公告</a>
                </li>
            </ul>
        </div>
    </div>
</div>