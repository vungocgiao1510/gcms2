<?php
//function callMenu($data, $select = "", $parent = 0, $text = "")
//{
//    foreach ($data as $key => $value) {
//        if ($value['cate_parent'] == $parent) {
//            echo "<option value='" . $value['cate_id'] . "'";
//            if ($select != "") {
//                if ($select == $value['cate_id']) {
//                    echo "disabled selected value";
//                }
//            }
//            echo ">" . $text . $value['cate_name'] . "</option>";
//            unset($data[$key]);
//            callMenu($data, $select, $value['cate_id'], $text . '|---');
//        }
//    }
//}
function callMenu($data, $parent = 0, $text = "|---", $select = 0, $uid="") {
    foreach ( $data as $k => $value ) {
        if ($value ['cate_parent'] == $parent) {
            $id = $value ['cate_id'];
            if ($select != 0 && $id == $select) {
                echo "<option value='$value[cate_id]' selected='selected'>" . $text . $value ['cate_name'] . "</option>";
            } else {
                if($uid == $id){
                    echo "<option value='$value[cate_id]' disabled style='font-weight:bold;'>" . $text.  $value ['cate_name'] . "</option>";
                } else {
                    echo "<option value='$value[cate_id]'>" . $text.  $value ['cate_name'] . "</option>";
                }
            }
            unset ( $data [$k] );
            callMenu ( $data, $id, $text . "|---", $select, $uid);
        }
    }
}
function showCategories($categories, $type_id = 0, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['cate_parent'] == $parent_id) {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    $cate_type = "";
    if ($cate_child) {
        echo '<ul>';
        foreach ($cate_child as $key => $item) {
            if ($item['cate_type'] == 1) {
                $cate_type = "Gian hàng";
            } elseif ($item['cate_type'] == 2) {
                $cate_type = "Blog";
            } else {
                $cate_type = "Trang";
            }
            // Hiển thị tiêu đề chuyên mục
            echo '<li>
<div class="menu_border">
<a class="cate_name" href="' . base_url() . 'gcms/categories/edit/' . $item['cate_id'] . '">' . $item['cate_name'] . '</a> - <a style="color:red;" href="' . base_url() . 'gcms/categories/deactive_menu/' . $item['cate_id'] . '/' . $type_id . '">Tắt kích hoạt</a> - <span class="cate_type">' . $cate_type . '</span>

</div>';

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $type_id, $item['cate_id'], $char . '|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}

function callMenuPN($data, $select = null, $parent = 0, $text = "")
{
    foreach ($data as $key => $value) {
        if ($value['cate_parent'] == $parent) {
            echo "<option value='" . $value['cate_id'] . "'";
            if (is_array($select) && $select != "") {
                foreach ($select as $rela) {
                    if ($rela['cate_id'] == $value['cate_id']) {
                        echo "selected";
                    }
                }
            } elseif($select && $select != "") {
                if ($select == $value['cate_id']) {
                    echo "selected";
                }
            }
            echo ">" . $text . $value['cate_name'] . "</option>";
            unset($data[$key]);
            callMenuPN($data, $select, $value['cate_id'], $text . '|---');
        }
    }
}

function callAttr($data, $select = "", $parent = 0, $text = "")
{
    foreach ($data as $key => $value) {
        if ($value['attr_parent'] == $parent) {
            echo "<option value='" . $value['attr_id'] . "'";
            if ($select != "") {
                if ($select == $value['attr_id']) {
                    echo "disabled selected value";
                }
            }
            echo ">" . $text . $value['attr_name'] . "</option>";
            unset($data[$key]);
            callAttr($data, $select, $value['attr_id'], $text . '|---');
        }
    }
}

function callAttrProduct($categories, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['attr_parent'] == $parent_id) {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    $cate_type = "";
    if ($cate_child) {
        echo '<ul>';
        foreach ($cate_child as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>
<div class="menu_border">
<a class="cate_name" href="' . base_url() . 'gcms/attrproduct/edit/' . $item['attr_id'] . '">' . $item['attr_name'] . '</a>
<a class="pull-right" href="' . base_url() . 'gcms/attrproduct/delete/' . $item['attr_id'] . '" onclick="return ConfirmDelete();"><i class="fas fa-trash-alt"></i></a>
</div>';

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            callAttrProduct($categories, $item['attr_id'], $char . '|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}

function callAttrCB($data, $select = "", $parent = 0)
{
    echo "<ul>";
    foreach ($data as $key => $value) {
        if ($value['attr_parent'] == $parent) {
            echo '<div class="form-group">';
            echo '<li><label class="checkbox-inline">';
            echo ' <input type="checkbox" name="attr_id[]" id=""';
            if ($select != "") {
                if ($select == $value['attr_id']) {
                    echo "checked";
                }
            }
            echo 'value="' . $value['attr_id'] . '"> ' . $value['attr_name'] . '';
            echo '</label></li>';
            echo '</div>';
            unset($data[$key]);
            callAttrCB($data, $select, $value['attr_id']);
        }
    }
    echo "</ul>";
}

function callAttrCB2($data, $select = "", $parent = 0)
{
    echo "<ul>";
    foreach ($data as $value) {
        echo "<li>";
        if ($value['attr_parent'] == 0) {
            echo "<label class='checkbox-inline'>
            <input type='checkbox' name='attr_id[]' value='" . $value['attr_id'] . "'> " . $value['attr_name'] . "
        </label>";
        }
        $id = $value['attr_id'];
        echo "<ul>";
        foreach ($data as $value2) {
            if ($value2['attr_parent'] == $id) {
                echo "<li><label class='checkbox-inline'>
            <input type='checkbox' name='attr_id[]' value='" . $value2['attr_id'] . "'> " . $value2['attr_name'] . "
        </label></li>";
            }
        }
        echo '</ul></li>';
    }
    echo "</ul>";
}

function callAttrCB3($data, $select = array(), $parent = 0, $text = "")
{
    echo "<ul>";
    foreach ($data as $key => $value) {
        echo "<li>";
        if ($value['attr_parent'] == $parent) {
            echo '<label class="checkbox_form2">';
            echo "<input name='attr_id[]' type='checkbox' value='" . $value['attr_slug'] . "'";
            if (is_array($select)) {
                foreach ($select as $rela) {
                    if ($rela['attr_id'] == $value['attr_id']) {
                        echo "checked";
                    }
                }
            }
            echo "><span class='checkmark'></span><label class='attr_name'>" . $value['attr_name'] . "</label><br />";
            echo "</label>";
            unset($data[$key]);
            callAttrCB3($data, $select, $value['attr_id'], $text . '|---');

        }
        echo "</li>";
    }
    echo "</ul>";
}