@extends('admin.layout.master')

@section('content')
    <!--内容面板-->
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>写点什么...
                    <small>不管写得怎样，写下来总是好的。</small>
                </h2>
            </div>

            <div class="card-padding card__header">

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('/admin/article/store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>主标题</label>
                                    <input name="title" type="text" class="form-control" placeholder="写在这里..."
                                           value="{{ old('title') }}">
                                    <i class="form-group__bar"></i>
                                </div>
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>副标题</label>
                                    <input name="subtitle" type="text" class="form-control input-sm"
                                           placeholder="写在这里..."
                                           value="{{ old('subtitle') }}">
                                    <i class="form-group__bar"></i>
                                </div>
                                @if ($errors->has('subtitle'))
                                    <span class="help-block">{{ $errors->first('subtitle') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>文章关键词</label>
                                    <select name="keywords[]"
                                            class="select2 js-keywords-multiple js-data-example-ajax form-control"
                                            multiple="multiple">
                                    </select>
                                </div>
                                @if ($errors->has('keywords'))
                                    <span class="help-block">{{ $errors->first('keywords') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('page_image') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>封面大图</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview" data-trigger="fileinput"></div>

                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">Remove</a>
                                        <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="page_image">
                                </span>
                                    </div>
                                </div>
                                @if ($errors->has('page_image'))
                                    <span class="help-block">{{ $errors->first('page_image') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>文章</label>
                                    <textarea name="content" id="simplemde">{{ old('content') }}</textarea>
                                </div>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>类别</label>
                                    <select name="tags[]"
                                            class="select2 js-tags-multiple js-data-example-ajax form-control"
                                            multiple="multiple">
                                    </select>
                                </div>
                                @if ($errors->has('tags'))
                                    <span class="help-block">{{ $errors->first('tags') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                                <div class="form-group__inner">
                                    <label>选择日期</label>
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>--}}
                                        <div class="form-group">
                                            <input name="published_at" type="text" class="form-control date-time-picker"
                                                   placeholder="Click here..." value="{{ old('published_at') }}">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    {{--</div>--}}
                                </div>
                                @if ($errors->has('published_at'))
                                    <span class="help-block">{{ $errors->first('published_at') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn--light btn-lg">提交</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("simplemde")
        });
    </script>
    {{--Keyeword Select--}}
    <script type="text/javascript">
        $(document).ready(function () {
            function formatKeyword(keyword) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                keyword.keyword ? keyword.keyword : "" +
                    "</div></div></div>";
            }

            function formatKeywordSelection(keyword) {
                return keyword.keyword || keyword.text;
            }

            $(".js-keywords-multiple").select2({
                tags: true,
                placeholder: '设置文章关键词',
                minimumInputLength: 2,
                ajax: {
                    url: '/api/keywords',
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        return {
                            keyword: params.term
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: formatKeyword,
                templateSelection: formatKeywordSelection,
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });
    </script>

    {{--Tag Select--}}
    <script type="text/javascript">
        $(document).ready(function () {
            function formatTag(tag) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                tag.tag ? tag.tag : "" +
                    "</div></div></div>";
            }

            function formatTagSelection(tag) {
                return tag.tag || tag.text;
            }

            $(".js-tags-multiple").select2({
                tags: true,
                placeholder: '设置文章类别',
                minimumInputLength: 2,
                ajax: {
                    url: '/api/tags',
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        return {
                            tag: params.term
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: formatTag,
                templateSelection: formatTagSelection,
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });
    </script>
@endsection