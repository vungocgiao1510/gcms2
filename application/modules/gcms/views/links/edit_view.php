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
                                <input type="text" name="link_title" class="form-control" id="title"
                                       placeholder="Tên tài khoản.." value="<?php echo $data['link_title']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="link_url" class="form-control" id=""
                                       placeholder="Liên kết.." value="<?php echo $data['link_url']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" name="link_icon" class="form-control" id="slug"
                                       placeholder="Liên kết.." value="<?php echo $data['link_icon']; ?>" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Thứ tự</label>
                                <input type="text" name="link_orderby" class="form-control" id="slug"
                                       placeholder="Liên kết.." value="<?php echo $data['link_orderby']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="link_description" id="" rows="10"
                                          placeholder="Mô tả.."><?php echo $data['link_title']; ?></textarea>
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
                    <select multiple class="form-control" name="link_type" style="height:200px;">
                        <option value="1" <?php echo ($data['link_type'] == 1) ? 'selected' : '' ?>>Footer 1</option>
                        <option value="2" <?php echo ($data['link_type'] == 2) ? 'selected' : '' ?>>Footer 2</option>
                        <option value="3" <?php echo ($data['link_type'] == 3) ? 'selected' : '' ?>>Footer 3</option>
                        <option value="4" <?php echo ($data['link_type'] == 4) ? 'selected' : '' ?>>Footer 4</option>
                    </select>
                    <br>
                    <div class="form-group">
                        <label>Trạng thái</label><br>
                        <input type="radio" name="link_active" value="1" <?php echo ($data['link_active'] == 1) ? 'checked' : '' ?>/> Kích hoạt
                        <input type="radio" name="link_active" value="2" <?php echo ($data['link_active'] == 2) ? 'checked' : '' ?>/> Vô hiệu hóa
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <img src="<?php echo $data['link_image']; ?>" alt="" class="img-responsive">
                        <input type="text" name="link_image" readonly="readonly" class="form-control"
                               onclick="openKCFinder(this)"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer" value="<?php echo $data['link_image']; ?>"/>
                    </div>
                    <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>

</div>
</form>
</div>