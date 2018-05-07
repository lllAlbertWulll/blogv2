@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>列表 — 评论
                    <small>或许你想了解一下游客曾写下的评论...</small>
                </h2>
            </div>
            <div class="card__body">
                <table id="data-table-command" class="table table-striped table--vmiddle">
                    <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric">编号</th>
                        <th data-column-id="sender">文章标题</th>
                        <th data-column-id="content">评论内容</th>
                        <th data-column-id="ip">IP地址</th>
                        <th data-column-id="received" data-order="desc">发布时间</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->article->title }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->ip }}</td>
                            <td>{{ $comment->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="/admin/js/comment-index-data-table.js"></script>
@endsection
