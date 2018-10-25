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
                            <label for="title" class="col-sm-2 control-label">
                                商品标题<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="title" name="title"
                                       value="{{ old('title')??$ret['title'] }}" placeholder="文章标题" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">
                                券结束时间
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="end_time" name="end_time"
                                       value="{{ old('end_time')??$ret['end_time'] }}" placeholder="券结束时间" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="old_price" class="col-sm-2 control-label">
                                原价格<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="old_price"
                                       value="{{ old('old_price')??$ret['old_price'] }}" id="old_price" placeholder="原价格" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_price" class="col-sm-2 control-label">
                                新价格<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="new_price"
                                       value="{{ old('new_price')??$ret['new_price'] }}" id="new_price" placeholder="新价格" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label">
                                券<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="ticket"
                                       value="{{ old('ticket')??$ret['ticket'] }}" id="ticket" placeholder="券" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label">
                                已领券数量
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="ticket_num"
                                       value="{{ old('ticket_num')??$ret['ticket_num'] }}" id="ticket" placeholder="已领券数量" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label">
                                1包邮0不包邮
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="postcode"
                                       value="{{ old('postcode')??$ret['postcode'] }}" id="ticket" placeholder="1包邮0不包邮" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">
                                商品排序（正序0/1/2/3）<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="sort"
                                       value="{{ old('sort')??$ret['sort'] }}" id="sort" placeholder="文章排序" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="look" class="col-sm-2 control-label">
                                商品浏览量
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="look"
                                       value="{{ old('look')??$ret['look'] }}" id="look" placeholder="文章浏览量" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">
                                商品关键词<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="key"
                                       value="{{ old('key')??$ret['key'] }}" id="key" placeholder="文章关键词(用于SEO)" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">
                                商品关键词（SEO）
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="website_key"
                                       value="{{ old('website_key')??$ret['website_key'] }}" id="key" placeholder="文章关键词(用于SEO)" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">商品封面图</label>
                            <div class="col-sm-6">
                                <input name="pic" placeholder="封面图" type="file">
                                <input type="hidden" value="{{ old('pic')??$ret['pic'] }}" name="pic" >
                                <img src="/uploads/{{ old('pic')??$ret['pic'] }}" alt="" style="width:200px;height:auto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pid" class="col-sm-2 control-label">
                                商品分类<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <select class="form-control" id="pid" name="class_id">
                                    <option value="">请选择商品分类...</option>
                                    @foreach($ret->class_list as $val)
                                    <option value="{{$val->id}}" {{ old('class_id') == $val->id ||
                                    isset($ret['class_id'])&&$ret['class_id'] == $val->id?'selected':'' }}>{{$val->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_nav" class="col-sm-2 control-label">
                                是否显示首页
                            </label>
                            <div class="col-sm-6 checkbox-inline">
                                <input type="radio" name="is_index"
                                       {{ old('is_index') == 0 || isset($ret['is_nav']) && 0 == $ret['is_nav'] ? 'checked' : '' }}
                                       value="0"> 否
                                <input type="radio" name="is_index"
                                       {{ old('is_index') == 1 || isset($ret['is_nav']) && 1 == $ret['is_nav'] ? 'checked' : '' }}
                                       value="1"> 是
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">
                                商品描述SEO
                            </label>
                            <div class="col-sm-6">
                                <textarea id="" name="website_desc" rows="10" cols="80">
                                     {{ old('website_desc')??$ret['website_desc'] }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">
                                商品描述<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
						<textarea id="editor" name="desc" rows="10" cols="80" style="visibility: hidden; display: none;">
							 {{ old('desc')??$ret['desc'] }}
						</textarea>
                            </div>
                            <script src="{{asset('./common/bower_components/ckeditor/ckeditor.js')}}"></script>
                            <script>
                                CKEDITOR.replace('editor',
                                    {filebrowserUploadUrl:'/common/commonUpload'})
                            </script>
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