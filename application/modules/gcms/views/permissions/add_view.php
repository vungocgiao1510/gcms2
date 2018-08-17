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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên.."/>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($permissions as $key => $value) {
                                    ?>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for=""><?php echo $value['name']; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <?php

                                            foreach ($value as $value2) {
                                                if (is_array($value2)) {
                                                    foreach ($value2 as $key3 => $value3) {
                                                        ?>
                                                        <label class="checkbox-inline checkbox_form2">
                                                            <input name="per[]" type="checkbox" id=""
                                                                   value="<?php echo $key3; ?>"><span class="checkmark"></span>
                                                            <?php echo $value3[0]; ?>
                                                        </label>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
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
                            <option value="1">Administrator</option>
                            <option selected value="2">Member</option>
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
