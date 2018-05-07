@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>设置 <small>网站设置</small></h2>
            </div>

            <div class="card-padding card__header">

                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">

                            <div class="form-group">
                                <label>首页大图</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview" data-trigger="fileinput"></div>

                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select Avatar</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="...">
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Title名称</label>
                                <input type="text" class="form-control" placeholder="Touch here to update title first name...">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Header标题</label>
                                <input type="text" class="form-control" placeholder="Touch here to update header first name...">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Header副标题</label>
                                <input type="text" class="form-control input-sm" placeholder="Touch here to update header second name...">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>网站关键词</label>
                                <select class="select2" multiple data-placeholder="Select one or more key words...">
                                    <option>Subaru</option>
                                    <option>Mitsubishi</option>
                                    <option>Scion</option>
                                    <option>Daihatsu</option>
                                    <option>Hino</option>
                                </select>
                            </div>

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