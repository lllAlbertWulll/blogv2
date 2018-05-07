@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>第三方链接
                    <small>让别人通过这些链接更了解你...</small>
                </h2>
            </div>
            <div class="card__body">
                <table id="data-table-command" class="table table-striped table--vmiddle">
                    <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric">ID</th>
                        <th data-column-id="sender">Domain</th>
                        <th data-column-id="received" data-order="desc">Url</th>
                        {{--<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>10238</td>
                        <td>github</td>
                        <td>github.com/lllalbertlll/</td>
                    </tr>
                    <tr>
                        <td>10243</td>
                        <td>weibo</td>
                        <td>weibo.com/jakldf/</td>
                    </tr>
                    <tr>
                        <td>10248</td>
                        <td>qq</td>
                        <td>411163122</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
