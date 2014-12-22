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
                {{ $post_item->title }}
            </h3>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span10">
            <blockquote>
                <p>
                    by {{ $post_item->author->email }}
                </p> <small>创建时间： <cite>{{ date( 'Y-m-d H:i:s' ,$post_item->create_date) }}</cite></small>
            </blockquote>
        </div>
        @if ( $ismypost === true)
        <div class="span2">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::action('PostController@edit', array('id'=>$post_item->tid)) }}"><button class="btn">修改</button></a>
                </div>

                <div class="btn-group">
                    <a href="{{ URL::action('PostController@delete', array('id'=>$post_item->tid)) }}"><button class="btn">删除</button></a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row-fluid">
        <div class="span12">
            <pre>
            {{ $post_item->content }}
            </pre>
        </div>
    </div>


</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop