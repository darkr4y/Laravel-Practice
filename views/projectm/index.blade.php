@extends('layouts.main')
@section('content')

<div class="span9">
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
                @foreach ($memo_list as $memo_item)
                <tr>
                    <td>{{ $memo_item->id }}</td>
                    <td><a href="{{ URL::action('MemoController@view', array('id'=>$memo_item->id)) }}">{{ $memo_item->sitename }}</a></td>
                    <td>{{  $memo_item->url }}</td>
                    <td>{{ $memo_item->author->email }}</td>
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
            {{ $memo_list->links() }}
        </div>

    </div>
</div>

@stop

@section('sidebar')
    @include('layouts.sider')
@stop