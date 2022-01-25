<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include 'lib/Database.php';

    class Main_query{
        public function __construct(){
            $this->db = new Database();
        }

        public function select_product(){
            $sql = "SELECT * FROM product_store";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_product_id($product_id){
            $sql = "SELECT * FROM product_store WHERE p_id = '$product_id' ";
            $result = $this->db->select($sql);
            if ($result) {
                return $result;
            }else {
                header("Location: 404.php");
            }
        }

        public function select_product_2(){
            $sql = "SELECT * FROM product_store WHERE id BETWEEN 1 AND 3";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_product_3(){
            $sql = "SELECT * FROM product_store WHERE id BETWEEN 4 AND 6";
            $result = $this->db->select($sql);
            return $result;
        }

        public function login($email, $password){
            $sql = "SELECT * FROM sign_up  WHERE email = '$email' AND password = '$password' ";
            $result = $this->db->select($sql);
            if ($result > 0) {
                Session::set_value("u_name", $email);
                header("Location: index.php");
            }else {
                $empty_err_msg = "<b>Error!</b> Password or Email doesn't match";
                Session::set_value("login_err", $empty_err_msg);
                header("Location: login.php");
            }
        }

        public function sign_up($email,$password){
            $sql = "SELECT email FROM sign_up WHERE email = '$email' ";
            $result = $this->db->select($sql);
            if ($result) {
                $empty_err_msg = "<b>Error!</b> Email already exist";
                Session::set_value("u_email", $empty_err_msg);
                header("Location: sign.php");
            }else {
                $sql = "INSERT INTO `sign_up`(`email`, `password`) VALUES ('$email','$password')";
                $result = $this->db->insert($sql);
                header("Location: index.php");
            }
        }

        public function recovery_mail($email){
            $sql = "SELECT email FROM sign_up WHERE email = '$email' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("recovery_ok", "ok");
            }else {
                $empty_err_msg = "<b>Error!</b> This email doesn't match or exist";
                Session::set_value("recovery_err", $empty_err_msg);
                Session::set_value("recovery_ok", "not ok");
                header("Location: forget.php");
            }
        }

        public function update_password($password, $email){
            $sql = "UPDATE `sign_up` SET `password`= '$password' WHERE email = '$email' ";
            $result = $this->db->update($sql);
            header("Location: index.php");
        }

        public function select_category(){
            $sql = "SELECT DISTINCT(p_category) FROM product_store";
            $result = $this->db->select($sql);
            return $result;
        }

        public function count_category_product($data){
            $sql = "SELECT COUNT(p_quantity) FROM product_store WHERE p_category = '$data' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_color(){
            $sql = "SELECT DISTINCT(p_color) FROM product_store";
            $result = $this->db->select($sql);
            return $result;
        }

        public function count_color_product($data){
            $sql = "SELECT COUNT(p_color) FROM product_store WHERE p_color = '$data' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function product_order($order_id){
            if(count(Session::show_value("cart_session_arr")) > 0){
                $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
                for($i = 0; $i < count($cart_session_arr_key); $i++){ 
                    $j = $cart_session_arr_key[$i];
                    if (empty($_SESSION["cart_session_arr"][$j])) {
                        unset($_SESSION["cart_session_arr"][$j]);
                    }

                    $product_id = $_SESSION["cart_session_arr"][$j][0];
                    $p_quantity = $_SESSION["cart_session_arr"][$j][7];
                    $u_name = $_SESSION["u_name"];

                    $sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `p_quantity`, `u_name`, `o_status`) VALUES ('$order_id','$product_id','$p_quantity','$u_name','Pending')";
                    $result = $this->db->insert($sql);

                    $sql3 = "SELECT p_quantity FROM product_store WHERE p_id = '$product_id' ";
                    $result3 = $this->db->select($sql3);

                    $data = $result3->fetch_assoc();

                    $p_quantity_2 = $data['p_quantity'];
                    $p_quantity_3 = $p_quantity_2 - $p_quantity;

                    $sql2 = "UPDATE `product_store` SET `p_quantity` = '$p_quantity_3' WHERE p_id = '$product_id'";
                    $result2 = $this->db->update($sql2);
                }
            }

            $name = $_SESSION["address_arr"][0]." ".$_SESSION["address_arr"][1];
            $b_name = $_SESSION["address_arr"][2];
            $r_name = $_SESSION["address_arr"][3];
            $s_name = $_SESSION["address_arr"][4];
            $o_email = $_SESSION["address_arr"][5];
            $u_name = $_SESSION["u_name"];

            $sql = "INSERT INTO `order_address`(`order_id`, `name`, `b_name`, `r_name`, `s_name`, `o_email`, `u_name`) VALUES ('$order_id','$name','$b_name','$r_name','$s_name','$o_email','$u_name')";
            $result = $this->db->insert($sql);
            header("Location: thank you.php");
        }

        public function select_product_price_high(){
            $sql = "SELECT * FROM `product_store` ORDER BY p_price DESC";
            $result = $this->db->select($sql);
            return $result;
        }

        
        public function select_product_price_low(){
            $sql = "SELECT * FROM `product_store` ORDER BY p_price ASC";
            $result = $this->db->select($sql);
            return $result;
        }
    }
?>