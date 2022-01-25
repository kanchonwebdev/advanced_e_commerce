<?php 
    include_once 'lib/Session.php';
    Session::session_start();
    class Functions{
        public static $ok_alert = "ok";
        public $empty_err_msg = "";



        public function __construct(){

        }

        public static function data_validation($data, $name, $type){
            if ($type == "text") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "email") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }
            
            if ($type == "pass") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "number") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "select") {
                if ($data == "none") {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }


            self::filter_data($data);
            self::other_validation($data, $name, $type);
        }

        public static function filter_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public static function other_validation($data, $name, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only letters and white space allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only number allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }
        }

        public static function email_validation($data, $name){
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);

            if (!$data) {
                $empty_err_msg = "<b>Error!</b> invalid email address";
                Session::set_value($name, $empty_err_msg);
                self::$ok_alert = "not ok";
            }
        }
    }
?>