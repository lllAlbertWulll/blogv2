@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>设置<small>修改密码</small></h2>
            </div>

            <form class="card__body form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Origin Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection