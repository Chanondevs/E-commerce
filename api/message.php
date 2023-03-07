<?php

namespace message;

class Message {

    public function msg_success($title, $subtitle, $time, $link){
        if ($link == '') {
            if ($time == '') {
                echo '<script type="text/javascript">';
                echo 'Swal.fire(title: "' . $title . '", text: "' . $subtitle . '", icon: "success",{showConfirmButton: false,);';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'Swal.fire(title: "' . $title . '", text: "' . $subtitle . '", icon: "success", {closeOnClickOutside: false, timer: ' . $time . ',button: false,});';
            echo '</script>';
        } else {
            if ($time == '') {
                $time = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "Swal.fire({
                    title: \"" . $title . "\",
                    text: \"" . $subtitle . "\",
                    icon: \"success\",
                    timer: $time,
                    timerProgressBar: true,
                    showConfirmButton: false,
                  }).then((result) => {
                    if(result.isDismissed) {
                        window.location.href = \"" . $link . "\";
                    } 
                  })";
            echo "</script>";
        }
    }



    public function msg_error($title, $subtitle, $time, $link){
        if ($link == '') {
            if ($time == '') {
                echo '<script type="text/javascript">';
                echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "error",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "error", {closeOnClickOutside: false, timer: ' . $time . ',button: false,});';
            echo '</script>';
        } else {
            if ($time == '') {
                $time = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "Swal.fire({
                    title: \"" . $title . "\",
                    text: \"" . $subtitle . "\",
                    icon: \"error\",
                    timer: $time,
                    timerProgressBar: true,
                    showConfirmButton: false,
                  }).then((result) => {
                    if(result.isDismissed) {
                        window.location.href = \"" . $link . "\";
                    } 
                  })";
            echo "</script>";
        }
    }



    public function msg_info($title, $subtitle, $time, $link){
        if ($link == '') {
            if ($time == '') {
                echo '<script type="text/javascript">';
                echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "info",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "info", {closeOnClickOutside: false, timer: ' . $time . ',button: false,});';
            echo '</script>';
        } else {
            if ($time == '') {
                $time = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "Swal.fire({
                    title: \"" . $title . "\",
                    text: \"" . $subtitle . "\",
                    icon: \"info\",
                    timer: $time,
                    timerProgressBar: true,
                    showConfirmButton: false,
                  }).then((result) => {
                    if(result.isDismissed) {
                        window.location.href = \"" . $link . "\";
                    } 
                  })";
            echo "</script>";
        }
    }



    public function msg_warning($title, $subtitle, $time, $link){
        if ($link == '') {
            if ($time == '') {
                echo '<script type="text/javascript">';
                echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "warning",{closeOnClickOutside: false});';
                echo '</script>';
            }
            echo '<script type="text/javascript">';
            echo 'Swal.fire("' . $title . '", "' . $subtitle . '", "warning", {closeOnClickOutside: false, timer: ' . $time . ',button: false,});';
            echo '</script>';
        } else {
            if ($time == '') {
                $time = 2500;
            }
            echo "<script type=\"text/javascript\">";
            echo "Swal.fire({
                    title: \"" . $title . "\",
                    text: \"" . $subtitle . "\",
                    icon: \"warning\",
                    timer: $time,
                    timerProgressBar: true,
                    showConfirmButton: false,
                  }).then((result) => {
                    if(result.isDismissed) {
                        window.location.href = \"" . $link . "\";
                    } 
                  })";
            echo "</script>";
        }
    }

    public static function msg_toast_success($title, $time, $link){
        if ($link == "") {
            if ($time == "") {
                $time = 2500;
            }
            echo "<script>";
            echo "const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: \"" . $time . "\",
                timerProgressBar: true
              })
              Toast.fire({
                icon: 'success',
                title: \"" . $title . "\"
              })";
            echo "</script>";
        } else {
            echo "<script>";
            echo "const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: \"" . $time . "\",
                timerProgressBar: true
              })
              Toast.fire({
                icon: 'success',
                title: \"" . $title . "\"
              }).then((result) => {
                if(result.isDismissed) {
                    window.location.href = \"" . $link . "\";
                } 
              })";
            echo "</script>";
        }
    }

    public static function msg_toast_error($title, $time, $link){
        if ($link == "") {
            if ($time == "") {
                $time = 2500;
            }
            echo "<script>";
            echo "const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: \"" . $time . "\",
                timerProgressBar: true
              })
              Toast.fire({
                icon: 'error',
                title: \"" . $title . "\"
              })";
            echo "</script>";
        } else {
            echo "<script>";
            echo "const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: \"" . $time . "\",
                timerProgressBar: true
              })
              Toast.fire({
                icon: 'error',
                title: \"" . $title . "\"
              }).then((result) => {
                if(result.isDismissed) {
                    window.location.href = \"" . $link . "\";
                } 
              })";
            echo "</script>";
        }
    }
}