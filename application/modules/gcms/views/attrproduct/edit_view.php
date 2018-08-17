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
                                <input type="text" name="attr_name" class="form-control" value="<?php echo $data['attr_name']; ?>" id="title" onkeyup="ChangeToSlug();" placeholder="Tên tài khoản.."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="attr_slug" class="form-control" value="<?php echo $data['attr_slug']; ?>" id="slug" placeholder="Liên kết.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Form hiển thị</label>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <input type="radio" value="1" name="attr_form" <?php echo ($data['attr_form'] == 1) ? "checked='checked'" : "" ?> /> Checkbox
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" value="2" name="attr_form" <?php echo ($data['attr_form'] == 2) ? "checked='checked'" : "" ?>/> Radio
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" value="3" name="attr_form" <?php echo ($data['attr_form'] == 3) ? "checked='checked'" : "" ?>/> Select box
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="radio" value="4" name="attr_form" <?php echo ($data['attr_form'] == 4) ? "checked='checked'" : "" ?>/> Click
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
                            callAttr($listAttr,$data['attr_id']);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="attr_active">
                            <option value="2" <?php echo ($data['attr_active'] == 2) ? "selected" : "" ?>>Chưa kích hoạt</option>
                            <option value="1" <?php echo ($data['attr_active'] == 1) ? "selected" : "" ?>>Kích hoạt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input type="text" name="attr_orderby" class="form-control" <?php echo $data['attr_orderby'] ?> placeholder="Thứ tự.."/>
                    </div>
                    <button class="btn btn-primary" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>