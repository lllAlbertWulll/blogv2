@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>我... <small>个人信息</small></h2>
            </div>

            <div class="card-padding card__header">

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url("/admin/profile/$admin->id") }}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label>个人头像</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview" data-trigger="fileinput">
                                        <img src="{{ asset($admin->avatar) }}">
                                    </div>

                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select Avatar</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="avatar">
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>电邮</label>
                                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" placeholder="Email Address">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>昵称</label>
                                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" placeholder="Nick Name">
                                <i class="form-group__bar"></i>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label>口头禅</label>--}}
                                {{--<textarea class="form-control" rows="7" placeholder="Always say something"></textarea>--}}
                                {{--<i class="form-group__bar"></i>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <button class="btn btn--light btn-lg">提交</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection