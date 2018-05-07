@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>目录 — 文章册子
                    <small>或许你想了解一下自己曾写下的文章...</small>
                </h2>
            </div>
            <div class="card__body">
                <table id="data-table-command" class="table table-striped table--vmiddle">
                    <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric">编号</th>
                        <th data-column-id="sender">标题</th>
                        <th data-column-id="received" data-order="desc">发布时间</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->published_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="/admin/js/article-index-data-table.js"></script>
@endsection
