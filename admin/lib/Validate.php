<?php
    include_once 'lib/Session.php';
    Session::session_start();
    

    class Validate{

        public $empty_err_msg = "";
        public static $ok_alert = "ok";

        
        public $empty_err_msg_2 = "";
        public static $ok_alert_2 = "ok";
        public $id = "";



        function __construct(){
        }

        public static function image_validation($data, $p_location, $size, $tmp_name){
            $target_dir = "upload_image/";
            $target_file = $target_dir . basename($data);
            $ok = 1;
            $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



            if (empty($data)) {
                $err_msg = "This field should not be empty";
                Session::set_value($p_location, $err_msg);
                $ok = 0;
                self::$ok_alert = "not ok";
            }

            if (file_exists($target_file)) {
                $err_msg = "File already exits";
                Session::set_value($p_location, $err_msg);
                $ok = 0;
                self::$ok_alert = "not ok";
            }

            if ($size > 500000) {
                $err_msg = "File is too large";
                Session::set_value($p_location, $err_msg);
                $ok = 0;
                self::$ok_alert = "not ok";
            }

            if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif" ) {
                $err_msg = "only JPG, JPEG, PNG & GIF files are allowed";
                Session::set_value($p_location, $err_msg);
                $ok = 0;
                self::$ok_alert = "not ok";
            }

            if ($ok == 1) {
                move_uploaded_file($tmp_name, $target_file);
            }
        }

        public static function checkbox_validation($data, $p_location){
            if ($data !== "YES") {
                $empty_err_msg = "This field should not be empty";
                Session::set_value($p_location, $empty_err_msg);
                self::$ok_alert = "not ok";
                return $data;
            }
        }

        public static function empty_validation($data, $p_location, $type){
            if ($type == "text" or $type == "number") {
                if (empty($data)) {
                    $empty_err_msg = "This field should not be empty";
                    Session::set_value($p_location, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return $data;
                }
            }

            if ($type == "select") {
                if ($data == "NONE") {
                    $empty_err_msg2 = "This field should not be empty";
                    Session::set_value($p_location, $empty_err_msg2);
                    self::$ok_alert = "not ok";
                }
            }

            self::filter_data($data);
            self::other_validation($data, $p_location, $type);
            
            if (self::$ok_alert == "not ok") {
                header("Location: add-product.php");
            }
        }

        public static function filter_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public static function other_validation($data, $p_location, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg = "Only letters and white space allowed";
                    Session::set_value($p_location, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "Only number allowed";
                    Session::set_value($p_location, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }
        }

        public static function empty_validation_2($data, $p_location, $type){
            if ($type == "text" or $type == "number") {
                if (empty($data)) {
                    $empty_err_msg_2 = "This field should not be empty";
                    Session::set_value($p_location, $empty_err_msg_2);
                    self::$ok_alert_2 = "not ok";
                    return $data;
                }
            }

            if ($type == "select") {
                if ($data == "NONE") {
                    $empty_err_msg_2 = "This field should not be empty";
                    Session::set_value($p_location, $empty_err_msg_2);
                    self::$ok_alert_2 = "not ok";
                }
            }

            self::filter_data_2($data);
            self::other_validation_2($data, $p_location, $type);
            
            if (self::$ok_alert_2 == "not ok") {
                header("Location: single-product.php?product_id=".urlencode(Session::show_value("product_id")));
            }
        }

        public static function filter_data_2($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public static function other_validation_2($data, $p_location, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg_2 = "Only letters and white space allowed";
                    Session::set_value($p_location, $empty_err_msg_2);
                    self::$ok_alert_2 = "not ok";
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg_2 = "Only number allowed";
                    Session::set_value($p_location, $empty_err_msg_2);
                    self::$ok_alert_2 = "not ok";
                }
            }
        }
    }

?>