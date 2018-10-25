@extends('manager.index.index')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">表单信息填写</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- 错误信息 -->
                    <div class="row">
                        <label for="name" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            @include('manager.common.editError')
                        </div>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ old('id')??$ret['id'] }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="class_name" class="col-sm-2 control-label">
                                    名称<i style="color: red">*</i>
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="alt" name="alt"
                                           value="{{old('alt')??$ret['alt']}}" placeholder="名称" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pid" class="col-sm-2 control-label">
                                    位置<i style="color: red">*</i>
                                </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="pid" name="class_id">
                                        <option value="">请选择位置...</option>
                                        @foreach($ret['class_list'] as $val)
                                            <option value="{{$val['id']}}" {{ old('class_id') == $val['id'] ||
                                    isset($ret['class_id'])&&$ret['class_id'] == $val['id']?'selected':'' }}>{{$val['class_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">文章封面图</label>
                                <div class="col-sm-6">
                                    <input name="pic" placeholder="文章封面图" type="file">
                                    <input type="hidden" value="{{ old('pic')??$ret['pic'] }}" name="pic" >
                                    <img src="/uploads/{{ old('pic')??$ret['pic'] }}" alt="" style="width:50px;height:auto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_name" class="col-sm-2 control-label">
                                    链接
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="url" name="url"
                                           value="{{old('url')??$ret['url']}}" placeholder="链接" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="col-sm-2 control-label">
                                    排序
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="sort" name="sort"
                                           value="{{ old('sort')??$ret['sort'] }}" placeholder="分类排序" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-3">
                                <a type="button" href="javascript:history.go(-1)" class="btn btn-default pull-right">返回</a>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-info pull-right">提交</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
@stop