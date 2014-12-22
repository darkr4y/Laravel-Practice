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
                {{ $progress_item->title }}
            </h3>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span9">
            <blockquote>
                <p>
                    by {{ $progress_item->author->email }}
                </p> <small>创建时间： <cite>{{ date( 'Y-m-d H:i:s' ,$progress_item->create_date) }}</cite></small>
            </blockquote>
        </div>
        @if ( $ismypost === true)
        <div class="span3">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::action('ProgressController@edit', array('id'=>$progress_item->pid)) }}"><button class="btn">修改</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('ProgressController@delete', array('id'=>$progress_item->pid)) }}"><button class="btn">删除</button></a>
                </div>
                <div class="btn-group">
                    <a href="{{ URL::action('ProgressController@sub_create', array('id'=>$progress_item->pid)) }}"><button class="btn">添加新的子进度</button></a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row-fluid">
        <div class="span2">
            <p>项目预计花费时间：<font color="red"> {{ $progress_item->days }}</font> 天</p>
        </div>
        <div class="span10">
            <pre>
            {{ "\r\n".$progress_item->content }}
            </pre>
        </div>
    </div>
    <hr>
    @foreach ( $subprogress_list as $sub_item)
    <div class="row-fluid">
        <div class="span2">
            {{ $sub_item->author->email }} <br>
            <strong>create@</strong>  {{ date( 'Y-m-d H:i:s' ,$sub_item->create_date) }} <br>
            <strong>update@</strong>  {{ date( 'Y-m-d H:i:s' ,$sub_item->last_change) }} <br>
        </div>
        <div class="span8">
            {{ $sub_item->content }}
        </div>
        <div class="span2">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::action('ProgressController@sub_edit', array('id'=>$sub_item->sid)) }}"><button class="btn">修改</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('ProgressController@sub_delete', array('id'=>$sub_item->sid)) }}"><button class="btn">删除</button></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row-fluid">
        <div class="span9">

        </div>
        <div class="span3">
            {{ $subprogress_list->links() }}
        </div>

    </div>



</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop