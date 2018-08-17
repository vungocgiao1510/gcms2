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
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="img_title" class="form-control" id="title"
                                       placeholder="Tên tài khoản.." value="<?php echo $data['img_title']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="img_link" class="form-control" id=""
                                       placeholder="Liên kết.." value="<?php echo $data['img_link']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Thứ tự</label>
                                <input type="text" name="img_orderby" class="form-control" id="slug"
                                       placeholder="Liên kết.." value="<?php echo $data['img_orderby']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="img_description" id="" rows="10"
                                          placeholder="Mô tả.."><?php echo $data['img_description']; ?></textarea>
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
                    <select multiple class="form-control" name="img_type" style="height:200px;">
                        <option value="1" <?php echo ($data['img_type'] == 1) ? 'selected' : '' ?>>Banner trang chủ</option>
                        <option value="2" <?php echo ($data['img_type'] == 2) ? 'selected' : '' ?>>Mạng xã hội</option>
                        <option value="3" <?php echo ($data['img_type'] == 3) ? 'selected' : '' ?>>Thương hiệu</option>
                        <option value="4" <?php echo ($data['img_type'] == 4) ? 'selected' : '' ?>>Quảng cáo</option>
                        <option value="5" <?php echo ($data['img_type'] == 5) ? 'selected' : '' ?>>Icon</option>

                    </select>
                    <br>
                    <div class="form-group">
                        <label>Trạng thái</label><br>
                        <input type="radio" name="img_active" value="1" <?php echo ($data['img_active'] == 1) ? 'checked' : '' ?>/> Kích hoạt
                        <input type="radio" name="img_active" value="2" <?php echo ($data['img_active'] == 2) ? 'checked' : '' ?>/> Vô hiệu hóa
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <img src="<?php echo $data['img_avatar']; ?>" alt="" class="img-responsive">
                        <input type="text" name="img_avatar" readonly="readonly" class="form-control"
                               onclick="openKCFinder(this)"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer" value="<?php echo $data['img_avatar']; ?>"/>
                    </div>
                    <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>

</div>
</form>
</div>