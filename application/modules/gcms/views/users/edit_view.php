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
                                <label>Tên tài khoản</label>
                                <input type="text" name="username" class="form-control"
                                       value="<?php echo $data['username']; ?>" placeholder="Tên tài khoản.."/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu.."/>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="password2" class="form-control"
                                       placeholder="Xác nhận mật khẩu.."/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>"
                                       placeholder="Email.."/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" class="form-control"
                                       value="<?php echo $data['phone']; ?>"
                                       placeholder="Số điện thoại.."/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" class="form-control"
                                       value="<?php echo $data['address']; ?>"
                                       placeholder="Địa chỉ.."/>
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
                        <label>Cấp độ</label>
                        <select multiple class="form-control" name="level">
                            <?php
                            if ($group != "") {
                                foreach ($group as $value) {
                                    ?>
                                    <option
                                            value="<?php echo $value['group_id']; ?>" <?php echo ($value['group_id'] == $data['group_id']) ? "selected" : ""; ?>><?php echo $value['name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <label>Trạng thái</label>
                        <select class="form-control" name="active">
                            <option value="1">Công khai</option>
                            <option value="2">Riêng tư</option>
                        </select>
                    </div>
                    <div class="add_main">
                        <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>