<div class="col-md-12">
    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
</div>
<div class="form_main">
    <form action="<?php echo base_url() . "gcms/categories/edit/" . $data['cate_id']; ?>" method="post">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $title; ?></h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên chuyên mục</label>
                                <input type="text" name="cate_name" class="form-control" id="title"
                                        value="<?php echo $data['cate_name']; ?>"
                                       placeholder="Tên tài khoản.."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="cate_slug" class="form-control"
                                       value="<?php echo $data['cate_slug']; ?>" placeholder="Liên kết.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="cate_content" id="content" rows="3"
                                          placeholder="Nội dung.."><?php echo $data['cate_content']; ?>
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'content' );
                                </script>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tiêu đề SEO</label>
                                <input type="text" name="cate_title" class="form-control"
                                       value="<?php echo $data['cate_title']; ?>" placeholder="Tên tiêu đề.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả SEO</label>
                                <textarea class="form-control" name="cate_description" id="" rows="3"
                                          placeholder="Mô tả.."><?php echo $data['cate_description']; ?>
                                </textarea>
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
                        <select class="form-control" name="cate_parent">
                            <option value="0">Chuyên mục chính</option>
                            <?php
                            callMenu($listMenu,0,"|---",$data['cate_parent'],$data['cate_id']);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="cate_type">
                            <option value="1" <?php echo ($data['cate_type'] == 1) ? "selected" : ""; ?>>Gian hàng
                            </option>
                            <option value="2" <?php echo ($data['cate_type'] == 2) ? "selected" : ""; ?>>Blogs</option>
                            <option value="3" <?php echo ($data['cate_type'] == 3) ? "selected" : ""; ?>>Trang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Menu</label>
                        <select class="form-control" name="catetype_id">
                            <option value="0">Chọn menu</option>
                            <?php
                            foreach($type_list as $typelist){
                                ?>
                                <option value="<?php echo $typelist['id']; ?>" <?php echo ($data['catetype_id'] == $typelist['id']) ? "selected" : ""; ?>><?php echo $typelist['name'] ?></option>
                                <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="cate_active">
                            <option value="2" <?php echo ($data['cate_active'] == 2) ? "selected" : ""; ?>>Chưa kích
                                hoạt
                            </option>
                            <option value="1" <?php echo ($data['cate_active'] == 1) ? "selected" : ""; ?>>Kích hoạt
                            </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Thứ tự hiển thị</label>
                            <input type="text" name="cate_orderby" class="form-control"
                                   value="<?php echo $data['cate_orderby'] ?>"
                                   placeholder="Thứ tự hiển thị.."/>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Chứa nhiều Menu</label>
                            <select class="form-control" name="cate_check">
                                <option value="0" <?php echo ($data['cate_check'] == 0) ? "selected" : ""; ?>>Không</option>
                                <option value="1" <?php echo ($data['cate_check'] == 1) ? "selected" : ""; ?>>Có</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <img src="<?php echo $data['cate_image']; ?>" class="img-responsive"/>
                        <input type="text" name="cate_image" readonly="readonly" class="form-control"
                               onclick="openKCFinder(this)" value="<?php echo $data['cate_image']; ?>"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <img src="<?php echo $data['cate_banner']; ?>" class="img-responsive"/>
                        <input type="text" name="cate_banner" readonly="readonly" class="form-control"
                               onclick="openKCFinder(this)" value="<?php echo $data['cate_banner']; ?>"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>