<?php
    include_once 'lib/Session.php';
    Session::session_start();

    include 'lib/Database.php';

    class Main_query{
        function __construct(){
			$this->db = new Database();
        }

        public function add_product($p_collection, $p_name, $p_image, $p_category, $p_price, $p_color, $p_size, $p_quantity, $p_description, $p_main_category, $p_featured, $p_delivery, $p_discount){
            $p_rand = rand();
            $p_date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `product_store`(`p_collection`, `p_name`, `p_image`, `p_category`, `p_price`, `p_color`, `p_size`, `p_quantity`, `p_description`, `p_main_category`, `p_featured`, `p_delivery`, `p_discount`, `p_id`, `p_modify`) VALUES ('$p_collection', '$p_name', '$p_image', '$p_category', '$p_price', '$p_color', '$p_size', '$p_quantity', '$p_description', '$p_main_category', '$p_featured', '$p_delivery', '$p_discount', '$p_rand','$p_date')";
            $result = $this->db->insert($sql);
			if ($result) {
                Session::set_value("success_msg", "<b>Success</b> Product add successfully!");
				header("Location: add-product.php");
			}
        }

        public function select_product(){
            $sql = "SELECT * FROM product_store";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_product_by_is($product_id){
            $sql = "SELECT * FROM product_store WHERE p_id  = '$product_id'";
            $result = $this->db->select($sql);
            return $result;
        }

        public function update_product($product_id, $u_name, $u_price, $u_quantity, $u_description){
            $u_date = date("Y-m-d H:i:s");
            $sql = "UPDATE product_store SET p_name  = '$u_name', p_price = '$u_price', p_quantity = '$u_quantity', p_description = '$u_description', p_modify = '$u_date' WHERE p_id = '$product_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                Session::set_value("update_msg", "<b>Success</b> Product update successfully!");
				header("Location: single-product.php?product_id=".urlencode(Session::show_value("product_id")));
			}
        }

        //select distinct order id
        public function select_distinct_order_id(){
            $sql = "SELECT DISTINCT(order_id) FROM order_details WHERE o_status = 'Pending' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select product id by order id
        public function select_product_id($order_id){
            $sql = "SELECT product_id FROM order_details WHERE o_status = 'Pending' AND order_id = '$order_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //select product details from order details
        public function select_product_order_details($product_id){
            $sql = "SELECT * FROM order_details WHERE product_id = '$product_id' ";
            $result = $this->db->select($sql);
            return $result;
        }
    }
?>