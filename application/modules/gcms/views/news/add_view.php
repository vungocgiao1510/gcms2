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
                                <input type="text" name="new_name" class="form-control" id="title"
                                       placeholder="Tên tài khoản.." onkeyup="ChangeToSlug();" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="new_slug" class="form-control" id="slug"
                                       placeholder="Liên kết.." />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="new_description" id="" rows="3"
                                          placeholder="Mô tả.."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="new_content" id="content" rows="3"
                                          placeholder="Nội dung.."></textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a data-toggle="collapse" href="#collapseTwo">Cấu hình SEO</a></div>
                <div class="panel-body panel-collapse collapse" id="collapseTwo">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tiêu đề SEO</label>
                            <input type="text" name="new_titleseo" class="form-control"
                                   placeholder="Tên tiêu đề.."/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả SEO</label>
                            <textarea class="form-control" name="new_descriptionseo" id="" rows="3"
                                      placeholder="Mô tả.."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Thuộc tính</div>
                <div class="panel-body">
                    <select multiple class="form-control" name="cate_id[]" style="height:200px;">
                        <?php
                        callMenuPN($listMenu);
                        ?>
                    </select>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label>Trạng thái</label>
                            <select class="form-control" name="new_active">
                                <option value="1">Kích hoạt</option>
                                <option value="2">Chưa kích hoạt</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Kiểu loại</label>
                            <select class="form-control" name="new_type">
                                <option value="0">Bình thường</option>
                                <option value="1">Nổi bật</option>
                                <option value="2">Xem nhiều</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label><br>
                        <div class="upload_image text-right">
                            <a href="javascript:void(0)" readonly="readonly" onclick="openKCFinder(new_image)"> <i class="far fa-image"></i></a>
                        </div>
                        <input type="text" name="new_image" id="new_image" class="form-control" placeholder="Bấm vào đây để lựa chọn hình ảnh.."/>
                    </div>
                    <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>

</div>
</form>
</div>