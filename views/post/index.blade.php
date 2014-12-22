@extends('layouts.main')
@section('content')

<div class="span9">
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>标题</th>
                    <th>最后修改时间</th>
                    <th>作者</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($post_list as $post_item)
                <tr>
                    <td>{{ $post_item->tid }}</td>
                    <td><a href="{{ URL::action('PostController@view', array('id'=>$post_item->tid)) }}">{{ $post_item->title }}</a></td>
                    <td>{{ date( 'Y-m-d H:i:s' , $post_item->last_change) }}</td>
                    <td>{{ $post_item->author->email }}</td>
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
            {{ $post_list->links() }}
        </div>

    </div>
</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop