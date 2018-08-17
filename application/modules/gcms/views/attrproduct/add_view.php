<div class="col-md-12">
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
</div>
<div class="form_main">
    <form action="" method="post">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $title; ?></h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" name="attr_name" class="form-control" id="title"
                                       onkeyup="ChangeToSlug();" placeholder="Tên tài khoản.."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="attr_slug" class="form-control" id="slug"
                                       placeholder="Liên kết.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Form hiển thị</label>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <input type="radio" name="attr_form"/> Checkbox
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" name="attr_form"/> Radio
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" name="attr_form"/> Select box
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" name="attr_form"/> Click
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Thuộc tính</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="attr_parent">
                            <option value="0">Thuộc tính chính</option>
                            <?php
                            callAttr($data);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="attr_active">
                            <option value="2">Chưa kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input type="text" name="attr_orderby" class="form-control" id="" placeholder="Thứ tự.."/>
                    </div>
                    <button class="btn btn-primary" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>