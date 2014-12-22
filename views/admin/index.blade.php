@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>用户名</th>
                    <th>操作</th>
                    <th>最后登陆时间</th>
                    <th>总结数量</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user_list as $user_item)
                <tr>
                    <td>{{ $user_item->id }}</td>
                    <td><a href="{{ URL::action('AdminController@updateuser', array('id'=>$user_item->id)) }}">{{ $user_item->email }}</a></td>
                    <td><a href="{{ URL::action('AdminController@deleteuser', array('id'=>$user_item->id)) }}"><button class="btn">删除用户</button></a></td>
                    <td>{{ $user_item->updated_at }}</td>
                    <td><a href="{{ URL::action('AdminController@lists', array('id'=>$user_item->id)) }}">{{ $user_item->title }}</a></td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span9">

        </div>
        <div class="span3">

        </div>

    </div>
</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop