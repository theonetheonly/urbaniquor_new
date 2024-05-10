<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_controller extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/index.php/welcome
     * - or -
     * http://example.com/index.php/welcome/index
     * - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.
     * 
     */


    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('common');
        $this->load->helper('navigation');
        $this->load->helper('header');
        $this->load->helper('body');
        $this->load->helper('product');
        $this->load->helper('cart');
        $this->load->helper('footer');
        $this->load->helper('cookie');
        $this->load->helper('book');
        $this->load->helper('form');
        
        
        $this->load->database();
        //        $this->loggedin_c = $this->checkLoginCookie();
        //			echo "<h1> logge in C: ". $this->loggedin_c."</h1>";
    }


    public function mobilevieworders()
    {
            $filter = $this->input->post('filter');
            $filter_string ="";
            $res_a = array();

            $tablecolumns = getTableColumns("orders");

            if (strtolower($filter) == "pending")
                    {
                        $filter_string  =  " WHERE  delivered LIKE 'PENDING' ";
                    }
            else if(strtolower($filter) =="delivered")
                    {
                        $filter_string  =  " WHERE  delivered LIKE 'DELIVERED' ";
                    }


            $query = "SELECT * FROM orders $filter_string ORDER BY id ASC LIMIT 100 ";
            $result =  $this->db->query($query);
            if ($result->num_rows() > 0) {
                foreach ($result->result_array() as $r) {
                            $res_b = array();
                       /*     foreach($tablecolumns as $tablecolumn)
                                {
                                        $res_b[] = $tablecolumn."::".$r[$tablecolumn];
                                }*/
                                $res_b[] = "=====================";
                                $res_b[] = "Date: ". $r["timestamp"];
                                $res_b[] = "---------------------";
                                $res_b[] = "ORDER ID: ". $r["id"];
                                $res_b[] = "---------------------";
                                $res_b[] = "Customer Phone: ". $r["mpesa_number"];
                                $res_b[] = "---------------------";
                                $res_b[] = "Delivery Address: ". $r["delivery_address"];
                                $res_b[] = "---------------------";
                                $res_b[] = "Items Ordered: ". $r["items"];
                                $res_b[] = "---------------------";
                                $res_b[] = "Total Cost: KSH ". $r["grand_total"];
                                $res_b[] = "=====================";
                            
                                if(strlen($r["voucher_code"])>0 )
                                    {
                                        $res_b[] ="<br><br>This is a discounted order<br>with voucher ".$r["voucher_code"];
                                    }

                             $d = implode("<br>",$res_b);
 //                             echo $d;
                                $res_a[] = $d;

                }
            }

                echo implode("~!~", $res_a);
          
    }

    public function orders()
    {
        $this->load->view("orders");
    }


    public function confirmpayment()
    {
        $id = $this->uri->segment('2');

//        echo "<h1>P ID: ".$id."</h1>";
        $data= array("payment_confirmed" =>"CONFIRMED");
        $this->db->where('id', $id);
        $this->db->update('orders', $data);
        $data= array();
        $data["passcode_2"] ="machine123";
        $this->load->view("orders", $data);
    }

    public function confirmdelivery()
    {
        $id = $this->uri->segment('2');

//        echo "<h1>P ID:".$id."</h1>";

        $data= array("delivered" =>"CONFIRMED");
        $this->db->where('id', $id);
        $this->db->update('orders', $data);

        $data= array();
        $data["passcode_2"] ="machine123";
        $this->load->view("orders", $data);
    }

    public function getcarttotals()
    {

//            $data = array();
            $cart_session_id =0;
            $session_cookie = $this->input->cookie('web_session', true);
            $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";
            $result =  $this->db->query($query);
            if ($result->num_rows() > 0) {

                foreach ($result->result_array() as $r) {
                    $cart_session_id=  $r["id"];
                }
            }
        $quantity = 0;
        $total = 0;

        $query = "SELECT * FROM shopping_cart_cache WHERE cart_session_id = '$cart_session_id' ORDER BY id ASC ";
        $result =  $this->db->query($query);
        if ($result->num_rows() > 0) {

            foreach ($result->result_array() as $r) {

                $quantity = $quantity + (double)$r["quantity"];
                $total = $total + (double)$r["total"];
            }
        }
        echo $quantity.":".$total;
    }

    public function deactivateSession($cart_session_id)
    {   
    
        $data= array("status" =>"EXPENDED");
        $this->db->where('id', $cart_session_id);
        $this->db->update('cart_session', $data);
//        echo 'order has successfully been updated';
    }

    public function finalcheckout()
    {

        try {
            $data = array();
            $data["cart_session_id"] = "-1";
            $session_cookie = $this->input->cookie('web_session', true);
            $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";
            $result =  $this->db->query($query);
            if ($result->num_rows() > 0) {

                foreach ($result->result_array() as $r) {
                    $data["cart_session_id"] =  $r["id"];
                }
            }
            $this->load->view("checkout", $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function flushSessionCookie()
    {
        $expire = time() - 3600;
        $cookie = array(
            'name'   => 'web_session',
            'value'  => "",
            'expire' => $expire,
            'path' => '/'

        );
        set_cookie($cookie);
        sleep(2);
    }

    public function setSessionCookie()
    {
        $expire  = 60 * 60 * 3;
        $session_stamp = md5(date("ymdhis", time())); //getUserDetails($id, "username");
        $session_stamp = md5($session_stamp);
        $session_stamp .= rand(10000, 90000);
        $session_stamp = md5($session_stamp);
        //  $session_time = date("y-m-d H:i:s");

        //        echo "<h1>" . $session_stamp . "</h1>";

        $cookie = array(
            'name'   => 'web_session',
            'value'  => $session_stamp,
            'expire' => $expire,
            'path' => '/'

        );
        set_cookie($cookie);
        sleep(2);
    }

    public function updateOrderSection($order_id)
    {
       
    }

    public function complete_order()
    {
        /*
        1	idPrimary	int(11)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
        More More
            2	timestamp	timestamp		on update CURRENT_TIMESTAMP	No	CURRENT_TIMESTAMP		ON UPDATE CURRENT_TIMESTAMP	Change Change	Drop Drop	
        More More
            3	shopping_cart_cache_id	text	latin1_swedish-+
            _ci		No				Change Change	Drop Drop	
        More More
            4	customer_name	varchar(100)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
        More More
            5	mspesa_phone	varchar(30)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
        More More
            6	sub_total	double			No	None			Change Change	Drop Drop	
        More More
            7	shipping	double			No	None			Change Change	Drop Drop	
        More More
            8	grand_total	double			No	None			Change Change	Drop Drop	
        More More
            9	payment_confirmed	varchar(10)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
        More More
            10	mpesa_trans_no	varchar(100)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
        More More
            11	delivered	varchar(10)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
        More More
            12	items

            */

            $data=array();
            $order = array();
        
            $data["disc_order_state"] ="";
            $data["disc_order_voucher"] = "";


            $order["cart_session_id"] = $this->input->post("cart_session_id");
            $order["customer_name"] = $this->input->post("customer_name");
            $order["mpesa_number"] = $this->input->post("mpesa_number");
            $order["delivery_address"] = $this->input->post("delivery_address");
            $order["sub_total"] = $this->input->post("sub_total");
            $order["shipping"] = $this->input->post("shipping");
            $order["grand_total"] = $this->input->post("grand_total");
            $order["items"] = $this->input->post("items");
            $order["delivered"] ="PENDING";
            $order["payment_confirmed"] ="PENDING";
            $order["mpesa_trans_no"] ="";
            $order["voucher_code"] = $this->input->post("voucher_code");

			// var_dump($order);

            $customer_name  = $order["customer_name"];
            $mpesa_number  = $order["mpesa_number"];
            $delivery_address  = $order["delivery_address"];

//            $voucher_code = $order["voucher_code"];

  //          $has_voucher =0;

    //        $voucher_valid = "";

            $data["order_id"] ="";
            $data["customer_name"] = $order["customer_name"];
            $data["order_state"] ="";
            $data["order_message"] ="";
            
            $beneficiary ="";
            $order_safe =0;


  /*          if(strlen($voucher_code) >0)
            {
                    $has_voucher =1;
                    $voucher_valid = validateVoucherX($order["voucher_code"]);
                    $beneficiary = checkVoucherBeneficiaries($voucher_code, $mpesa_number);
            
            }
            
            if ($has_voucher == 0)
            {
                $order_safe =1;
                $data["disc_order_state"] ="NONE";
                $data["disc_order_voucher"] = "";
            }
*/
     /*       if ($has_voucher==1 && $voucher_valid =="VALID" && $beneficiary=="VALID")
                {
                            $order_safe =1;
    
                            $data["disc_order_state"] ="SUCCESS";
                            $data["disc_order_voucher"] = $voucher_code;
                
                }
                else 
                {
                    $data["disc_order_state"] ="FAIL";
                    $data["disc_order_voucher"] = $voucher_code;
                        
                        $order_safe = 0;
                }
*/

			$order_safe = 1;
            if($order_safe == 1)
            {
            $this->db->insert("orders", $order);
            $order_id = $this->db->insert_id();
            $data["order_id"] = $order_id;

			$has_voucher =0;
                if ($has_voucher ==1)
                    {
                        $voucher_code_id = getAnyCrossFieldValueX("voucher_code", $voucher_code, "id","voucher");
                        $quantity_to_give = getAnyFieldValue($voucher_code_id, "quantity_to_give", "voucher" );

                        $new_quauntity_to_give = (int)$quantity_to_give - 1;
                        if($new_quauntity_to_give < 1)
                            {  
                 			       updateAnyField($voucher_code_id,"status", "EXPENDED", "voucher");
                            }
                            else
                            {
                                updateAnyField($voucher_code_id,"quantity_to_give", $new_quauntity_to_give, "voucher");
                            }

                        $order_message_1 = "Dear ".ucwords($order["customer_name"]).", Congratulatons! Your order (ID $order_id) with voucher $voucher_code has been received and will be on the way soon!";
                        $order_message_1.= " Thank you for choosing www.drinksasa.co.ke";
                        updateAnyField($voucher_code_id, "order_id", $order_id, "voucher");
               
                        addvoucherBeneficiaries($order["customer_name"], "-", $mpesa_number, $voucher_code, $delivery_address, $order_id);

   
         //               sendSMS($order["mpesa_number"], $order_message_1);
       //                sendEmail("mbatiagithaiga@gmail.com","Voucher Applied", "Voucher: $voucher_code has been applied by $customer_name  $mpesa_number $delivery_address", "0");
     //               sendSMS("0725834359", "Voucher: $voucher_code has been applied by $customer_name  $mpesa_number $delivery_address");
                        }
                    else{

                        $order_message_1 = "Dear ".ucwords($order["customer_name"])." your order (ID $order_id) has been received and will be on the way as soon as confirmed.";
                        $order_message_1.= " Thank you for choosing www.urbanliquor.co.ke";
          //             sendSMS($order["mpesa_number"], $order_message_1);
               
                      }

				/*
            	    $x_voucher_code = $voucher_code;
                    if($x_voucher_code =="")
                        {
                            $x_voucher_code ="No voucher";
                        }
                */

                $order_message_2 = "Attention: Drinksasa Order: CUST. NAME: ".$order["customer_name"]." PHONE: ".$order["mpesa_number"]." D.ADDR: ".$order["delivery_address"];
                $order_message_2.="ORDER:".$order["items"]; //" Voucher(".$x_voucher_code.")";
              
   //             sendEmail("mbatiagithaiga@gmail.com", "Drinksasa order $order_id", $order_message_2, "0");
     //           sendSMS("0725834359", $order_message_2);
            // sendSMS("0742437679", $order_message_2);
            //            unset("c")
                 
            $this->deactivateSession($order["cart_session_id"]);
            $this->flushSessionCookie();
            $this->setSessionCookie();
            }
            $this->load->view("completed_order", $data);
    }


    public function showcart()
    {
        // Show the cart here        
        $data = array(); // Array to hold the shopping cart information
        $this->load->view("cart", $data);
    }

    public function validateVoucher($voucher_code)
    {
       $status = getAnyCrossFieldValueX("voucher_code", $voucher_code, "status", "voucher");
        return $status;
    }


	function writeToCartFile($data)
	{
	//	$this->load->helper('file');

		/*
		try {
			$myFile = "cartFileNew.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $data;
			fwrite($fh, $stringData);
			fclose($fh);
		}
		catch (Exception $e)
		{

		}
		*/

	//	file_put_content('cartFileNew.txt',$data.'\n', PHP_EOL,FILE_APPEND);
	}


    public function additemtocart()
    {
        $product_id = $this->uri->segment("3");


        $quantity = $this->input->post("quantity");

		$this->writeToCartFile("1-QUANTITY: ".$quantity."\n");

		$currency = $this->input->post("currency");

		$this->writeToCartFile("2-CURRENCY: ".$currency."\n");

		$vcode = $this->input->post("voucher_code");

        $vcode = str_replace(" ", "", $vcode);

		$this->writeToCartFile("3-VOUCHERCODE: ".$vcode."\n");

		$voucher_valid  = "0";
        
        $has_voucher ="0";
        $invalid_voucher ="0";
        
        

        if (strlen($vcode) > 0)
                {   
                    $has_voucher ="1";

					$this->writeToCartFile("4-has voucher: ".$has_voucher."\n");

					//                   echo  "Voucher code detected\n";
                    // Validate voucher
                        if (validateVoucherX($vcode) ==="VALID")
                             {
   //                             echo "Voucher is valid:$vcode\n";
                   //     echo "SUCCESS_VOUCHER:$vcode";
                              
                            $voucher_valid = "1";

								 $this->writeToCartFile("5-voucher_valid: ".$voucher_valid."\n");

                            }
               }

		$session_cookie = $this->input->cookie('web_session', true);

		$this->writeToCartFile("6-session_cookie: ".$session_cookie."\n");

        //      echo "<h1>" . $product_id . "</h1>";
        //    echo "<h1>" . $session_cookie . "</h1>";
        // check if web session exists it cart session
        $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";


		$this->writeToCartFile("7-query_1: ".$query."\n");

        $result =  $this->db->query($query);
        // echo $result;
        if ($result->num_rows() > 0) {
            //  add item to shopping cart

			$this->writeToCartFile("8-query_1_result_count: ".$result->num_rows()."\n");

			if ($has_voucher== "1")
            {

				$this->writeToCartFile("9-has_voucher: ".$result->num_rows()."\n");

                if($voucher_valid =="1")
                {
					$this->writeToCartFile("10-voucher_valid: ".$result->num_rows()."\n");

					foreach ($result->result_array() as $r) {
                                $csid =$r["id"];
                                 $query = "DELETE FROM shopping_cart_cache WHERE cart_session_id = '$csid' ";
						$this->writeToCartFile("11-delete_cache_query: ".$query."\n");
						$this->db->query($query);

					}
                            foreach ($result->result_array() as $r) {
                                echo "Adding to exising cart session<BR />";
                                echo "12-quantity: ".$quantity;

								$this->writeToCartFile("adding_to_cart_session: ".$quantity."\n");

								$this->addItemToShoppingCartCache($r["id"], $product_id, $quantity, $currency, $vcode);
                            }
                            echo "SUCCESS_VOUCHER:$vcode";

					$this->writeToCartFile("SUCCESS_VOUCHER: ".$vcode."\n");

				}
                else
                {
					echo "FAIL_VOUCHER:$vcode";
					$this->writeToCartFile("13-FAIL_VOUCHER: ".$vcode."\n");

                }
            }
            else{
                foreach ($result->result_array() as $r) {
                    echo "Adding to exising cart session<BR />";
                    echo "quantity: ".$quantity;
					$this->writeToCartFile("14-ADD TO EXISTING CART: ".$quantity."\n");
                    $this->addItemToShoppingCartCache($r["id"], $product_id, $quantity, $currency, $vcode);



				}
            
            }
        } else {

            if ($has_voucher== "1")
            {
				$this->writeToCartFile("15-HAS-VOUCHER: ".$has_voucher."\n");

				if($voucher_valid =="1")
                {
					$this->writeToCartFile("16-VOUCHER_VALID: ".$voucher_valid."\n");


					$data = array();
                    $data["web_session"] = $session_cookie;
                    $data["remote_host"] = $_SERVER["REMOTE_ADDR"];
                    $data["http_user_agent"] = $_SERVER["HTTP_USER_AGENT"];
                    $data["user_id"] = "-1";
                    $data["currency"] = "KSH";
                    $data["item_count"] = "1";
                    $data["total_cost"] = "0";
                    $data["status"] = "ACTIVE";
       
                    $this->db->insert("cart_session", $data);
                    $cart_session_id = $this->db->insert_id();
                    $this->addItemToShoppingCartCache($cart_session_id, $product_id, $quantity, $currency, $vcode);
                    echo "SUCCESS_VOUCHER:$vcode";
					$this->writeToCartFile("17-SUCCESS_VOUCHER: ".$vcode."\n");

				}
                else
                {
                    echo "FAIL_VOUCHER:$vcode";
					$this->writeToCartFile("18-FAIL_VOUCHER: ".$vcode."\n");

				}
            }
            else
            {

		$session_cookie = $this->input->cookie('web_session', true);
				$this->writeToCartFile("19-SESSION_COOKIE: ".$session_cookie."\n");

			if ($session_cookie !==NULL)
			{

				$this->writeToCartFile("20-SESSION COOKIE NOT NULL: ".$session_cookie."\n");

				$data = array();
            $data["web_session"] = $session_cookie;
            $data["remote_host"] = $_SERVER["REMOTE_ADDR"];
            $data["http_user_agent"] = $_SERVER["HTTP_USER_AGENT"];
            $data["user_id"] = "-1";
            $data["currency"] = "KSH";
            $data["item_count"] = "1";
            $data["total_cost"] = "0";
            $data["status"] = "ACTIVE";

            $this->db->insert("cart_session", $data);
            $cart_session_id = $this->db->insert_id();

				$this->writeToCartFile("21-CART_SESSION_ID: ".$cart_session_id."\n");

				$this->addItemToShoppingCartCache($cart_session_id, $product_id, $quantity, $currency, $vcode);
			}
			}
        }
        
    }



    public function addItemToShoppingCartCache($cart_session_id, $product_id, $the_quantity, $currency, $voucher_code="")
    {
    
        /*
	1   id              Primary	int(11)
	2	cart_session_id	int(11)	
	3	prodict_id  	int(11)		
	4	product_title	varchar(100)	
	5	currency	    varchar(10)	latin1_swedish_ci
	6	cost_per_unit	double	
	7	quantity	    int(11)	
	8	total
                */
    try{
        $currency ="KSH";

        $data = array();
        $data["cart_session_id"] = $cart_session_id;
        $data["product_id"] = $product_id;
        $data["product_title"] = getAnyFieldValue($product_id, "product_title", "product");
        $data["currency"] = $currency;
        // if ($currency == "KSH") {
            $data["cost_per_unit"] =  getAnyFieldValue($product_id, "product_cost_ksh", "product");;
        /*}
        if ($currency == "USD") {
            $data["cost_per_unit"] =  getAnyFieldValue($product_id, "product_cost_usd", "product");;
        }*/

        $data["quantity"] = $the_quantity;
        $data["total"] = $total = (float)$the_quantity * (float)$data["cost_per_unit"];
        $data["voucher_code"] = $voucher_code;
        $this->db->insert("shopping_cart_cache", $data);
		
		$product = getAnyFieldValue($product_id, "product_title", "product");
		// echo "<h1>".$product."</h1>";
		//sleep(1);
		add_to_cart_hit($product_id, $product, $the_quantity);
    }
    catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function checkout()
    {
        try {
            $data = array();
            $data["cart_session_id"] = "-1";
            $session_cookie = $this->input->cookie('web_session', true);
            $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";

//			echo "<h3>".$query."</h3>";
			$result =  $this->db->query($query);
            if ($result->num_rows() > 0) {

                foreach ($result->result_array() as $r) {

//					echo "<h3>Cart Session =".$r["id"]."</h3>";

                    $data["cart_session_id"] =  $r["id"];
                }
            }
            $this->load->view("cart", $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function removeitemfromcart()
    {
        try {
            $shopping_cart_cache_id = $this->uri->segment('3');
           //  echo "<h1>" . $shopping_cart_cache_id . "</h1>";
            // remove the URI
            $query = "DELETE FROM shopping_cart_cache WHERE id= '$shopping_cart_cache_id' ";
            $result = $this->db->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


	public function fetchorders()
	{
		try{
			$orders_array = array();
			$query = "SELECT * FROM orders WHERE remote_processing_status LIKE 'PENDING' ";
			$result = $this->db->query($query);
			if ($result && $result->num_rows() > 0) {

				foreach ($result->result_array() as $r) {
					$orders_array[] = $r;
				}
			}
			else {
					$orders_array["results"]= "none";
			}
			echo json_encode($orders_array);
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function fetchsingleorder()
	{
		try{


			$order_id = $this->uri->segment("3");
			$orders_array = array();

			$cart_session_id = getAnyFieldValue($order_id,"cart_session_id","orders");

			$query = "SELECT * FROM shopping_cart_cache WHERE cart_session_id='$cart_session_id' ";
			$result = $this->db->query($query);
			if ($result && $result->num_rows() > 0) {

				foreach ($result->result_array() as $r) {
//					$cart_session_id = $r["cart_session_id"];
					$orders_array[] = $r;
				}
			}
			else {
				$orders_array["results"]= "none";
			}

//			echo $query;
			echo json_encode($orders_array);
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function remotecheckout()
	{
		try{
			$order_id = $this->uri->segment("3");
		//	$orders_array = array();
		//	$cart_session_id = getAnyFieldValue($order_id,"cart_session_id","orders");
			$query = "UPDATE orders SET remote_processing_status='CHECKED_OUT' WHERE id='$order_id' ";

			$result = $this->db->query($query);

			if ($result)
			{
				echo "SUCCESS";
			}

		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}


	public function requestdispatch()
	{
		try{
			$order_id = $this->uri->segment("3");
			//	$orders_array = array();
			//	$cart_session_id = getAnyFieldValue($order_id,"cart_session_id","orders");
			$query = "UPDATE orders SET delivered='REQUESTED' WHERE id='$order_id' ";

			$result = $this->db->query($query);

			if ($result)
			{
				echo "SUCCESS";
			}

		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}


}
