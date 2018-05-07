@extends('admin.layout.master')


@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>管家先生</h2>
            </div>

            <div class="card__body">
                <div id="chart-donut" class="flot-chart flot-chart--lg"></div>
                <div class="flot-chart-legend flot-chart-legend--donut"></div>
            </div>
        </div>

    </section>
@endsection

