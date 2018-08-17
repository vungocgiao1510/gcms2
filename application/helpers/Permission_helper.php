<?php
function Permissions($level,$permissons,$link_check){
    if($level != 1){
        redirect(base_url()."gcms");
    }
    $permisson = json_decode($permissons);
    foreach($permisson as $key=>$value){
        if($value == $link_check){
            redirect(base_url()."gcms/dashboard/index");
        }
    }
}