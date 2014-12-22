<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-15
 * Time: 下午3:00
 */

?>
<!DOCTYPE html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>

    <title>生产系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('http://code.jquery.com/jquery.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h1>
                    工作总结及打卡系统 <small>@tuopeike</small>
                </h1>
            </div>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="#" class="brand"></a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li class="active">
                                    <a href="{{URL::action('HomeController@showWelcome')}}">总结</a>
                                </li>
                                <li>
                                    <a href="{{URL::action('HomeController@showProgress')}}">进度</a>
                                </li>
                                <li>
                                    <a href="{{URL::action('HomeController@showMemo')}}">备忘</a>
                                </li>
                                <li>
                                    <a href="https://tuopeike.ddns.net" target="_blank">NAS</a>
                                </li>
                                <li>
                                    <a href="{{URL::action('HomeController@about')}}">关于</a>
                                </li>

                            </ul>
                            <ul class="nav pull-right">
                                <li>
                                    <a href="{{URL::action('HomeController@feedback')}}">反馈</a>
                                </li>

<!--                                <li class="divider-vertical">-->
<!--                                </li>-->
<!--                -->
<!--                                <li class="dropdown">-->
<!--                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">打卡<strong class="caret"></strong></a>-->
<!--                                    <ul class="dropdown-menu">-->
<!--                                        <li>-->
<!--                                            <a href="#">上班</a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">下班</a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">请假申请</a>-->
<!--                                        </li>-->
<!--                                        <li class="divider">-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">错误纠正</a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->

                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row-fluid">
        @yield('content')
        @yield('sidebar')
    </div>
</div>


</body>
</html>