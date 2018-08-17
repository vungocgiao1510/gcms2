<ul class="nav flex-column <?php echo ($this->uri->segment(1) != "") ? "left_menu_primary" : ""; ?>" id="menu-left">
    <?php
    if ($menu_left) {
        foreach ($menu_left as $key => $value) {
            if ($value['cate_parent'] == 0) {
                ?>
                <li class="nav-item">
                    <a class="nav-link active"
                       href="<?php echo $value['cate_slug']; ?>"><?php echo $value['cate_name']; ?>
                    <span class="arrow_menu"><i class="fas fa-angle-right"></i></span>
                    </a>
                    <?php
                    if ($value['cate_check'] != 0) {
                        ?>
                        <ul class="sub-menu">
                            <?php
                            $id = $value['cate_id'];
                            foreach ($menu_left as $key2 => $value2) {
                                if ($value2['cate_parent'] == $id) {
                                    ?>
                                    <li><a class="nav-link"
                                           href="<?php echo $value2['cate_slug']; ?>"><?php echo $value2['cate_name']; ?></a>
                                        <ul class="sub-menu">
                                            <?php
                                            $id2 = $value2['cate_id'];
                                            foreach ($menu_left

                                            as $key3 => $value3) {
                                            if ($value3['cate_parent'] == $id2) {
                                            ?>
                                            <li><a class="nav-link"
                                                   href="<?php echo $value3['cate_slug']; ?>"><?php echo $value3['cate_name'] ?></a>
                                                <?php
                                                }
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </li>
                <?php
            }
        }
    }
    ?>
</ul>
