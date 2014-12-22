<?php
/**
 * Created by PhpStorm.
 * User: darkray
 * Date: 14-9-15
 * Time: 下午3:55
 */
?>
@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span12">
            <h3>
                {{ $host_item->sitename }}
            </h3>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span8">
            <table class="table table-striped">

                <tbody>
                <tr>
                    <td>站点：</td>
                    <td>{{ $host_item->sitename }}</td>
                </tr>
                <tr>
                    <td>URL：</td>
                    <td>{{ $host_item->url }}</td>
                </tr>
                <tr>
                    <td>类型：</td>
                    <td>{{ $host_item->cid }}</td>
                </tr>
                <tr>
                    <td>Web服务器版本：</td>
                    <td>{{ $host_item->webserver }}</td>
                </tr>
                <tr>
                    <td>操作系统版本：</td>
                    <td>{{ $host_item->system }}</td>
                </tr>
                <tr>
                    <td>当前所有权限：</td>
                    <td>{{ $host_item->priv }}</td>
                </tr>
                <tr>
                    <td>突破点：</td>
                    <td>{{ $host_item->breakpoint }}</td>
                </tr>
                <tr>
                    <td>控制方法：</td>
                    <td>{{ $host_item->controlmethod }}</td>
                </tr>
                <tr>
                    <td>备注：</td>
                    <td>{{ $host_item->mark }}</td>
                </tr>

                </tbody>
            </table>

        </div>
        @if ( $ismypost === true)
        <div class="span4">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::action('MemoController@edit', array('id'=>$host_item->id)) }}"><button class="btn">修改主站信息</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('MemoController@delete', array('id'=>$host_item->id)) }}"><button class="btn">删除主站信息</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('MemoController@sub_create', array('id'=>$host_item->id)) }}"><button class="btn">添加子域名信息</button></a>
                </div>
            </div>
        </div>
        @endif

    </div>
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>名称</th>
                    <th>URL</th>
                    <th>提供人</th>
                </tr>
                </thead>
                <tbody>
                @foreach ( $subdomain_list as $sub_item)
                <tr>
                    <td>{{ $sub_item->id }}</td>
                    <td><a href="{{ URL::action('MemoController@sub_view', array('id'=>$sub_item->id)) }}">{{ $sub_item->sitename }}</a></td>
                    <td>{{  $sub_item->url }}</td>
                    <td>{{ $sub_item->author->email }}</td>
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
            {{ $subdomain_list->links() }}
        </div>

    </div>


</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop