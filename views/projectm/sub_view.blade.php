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
        <div class="span3"></div>
        <div class="span6">
        <h4>{{ $subdomain_item->sitename }} 的详细信息</h4>
            <table class="table table-striped">

                <tbody>
                <tr>
                    <td>URL：</td>
                    <td>{{ $subdomain_item->url }}</td>
                </tr>
                <tr>
                    <td>类型：</td>
                    <td>{{ $subdomain_item->cid }}</td>
                </tr>
                <tr>
                    <td>Web服务器版本：</td>
                    <td>{{ $subdomain_item->webserver }}</td>
                </tr>
                <tr>
                    <td>操作系统版本：</td>
                    <td>{{ $subdomain_item->system }}</td>
                </tr>
                <tr>
                    <td>当前所有权限：</td>
                    <td>{{ $subdomain_item->priv }}</td>
                </tr>
                <tr>
                    <td>突破点：</td>
                    <td>{{ $subdomain_item->breakpoint }}</td>
                </tr>
                <tr>
                    <td>控制方法：</td>
                    <td>{{ $subdomain_item->controlmethod }}</td>
                </tr>
                <tr>
                    <td>备注：</td>
                    <td>{{ $subdomain_item->mark }}</td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="span3"></div>
    </div>
    @if ( $ismypost === true)
    <div class="row-fluid">
        <div class="span7"></div>
        <div class="span3">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::action('MemoController@sub_edit', array('id'=>$subdomain_item->id)) }}"><button class="btn">修改</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('MemoController@sub_delete', array('id'=>$subdomain_item->id)) }}"><button class="btn">删除</button></a>
                </div>

                <div class="btn-group">
                    <a href="#" onclick="javascript:window.history.go(-1)" class="btn">返回</a>
                </div>

            </div>
        </div>
        <div class="span2"></div>
    </div>
    @endif




</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop