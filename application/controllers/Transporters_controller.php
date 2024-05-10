<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transporters_controller extends CI_Controller
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
		$this->load->helper('book');
		$this->load->helper('form');


		$this->load->database();
		//        $this->loggedin_c = $this->checkLoginCookie();
		//			echo "<h1> logge in C: ". $this->loggedin_c."</h1>";
	}

	public function index()
	{
		$this->load->view('transporters');
	}
	// View transporters

//
	public function fetchtransporters()
	{
		try{
		// 1. Transporters

			$query = "SELECT * FROM transporters ORDER BY first_name ASC ";
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
			echo  $e->getMessage();
		}


	}

	public function savetransporter()
	{
		try{
				// 1. Transporters
			$postdata = $this->input->post();
			$this->db->insert("transporters", $postdata);
			echo "New transporter added successfully";
		}
		catch (Exception $e)
		{
			echo  $e->getMessage();
		}


	}

	public function updateorderdispatchrequested($order_id)
	{
		try{
			// $order_id = $this->uri->segment("3");
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
	public function  requesttransporter()
	{
		try{
			$order_id = $this->uri->segment("3");
			$this->updateorderdispatchrequested($order_id);


			$transporter_id = $this->uri->segment("4");
			/*
	1 	idPrimary 	int(11) 			No 	None 		AUTO_INCREMENT 	Change Change 	Drop Drop
	2 	timestamp 	timestamp 			No 	CURRENT_TIMESTAMP 			Change Change 	Drop Drop
	3 	trasporter_id 	int(11) 			Yes 	NULL 			Change Change 	Drop Drop
	4 	names 	varchar(64) 	utf8mb4_general_ci 		Yes 	NULL 			Change Change 	Drop Drop
	5 	order_id 	int(11) 			Yes 	NULL 			Change Change 	Drop Drop
	6 	customer_name 	varchar(64) 	utf8mb4_general_ci 		Yes 	NULL 			Change Change 	Drop Drop
	7 	order_message 	text 	utf8mb4_general_ci 		Yes 	NULL 			Change Change 	Drop Drop
	8 	status
			*/

			$transporter_mobile = getAnyFieldValue($transporter_id, "mobile","transporters");
			$transporter_first_name = getAnyFieldValue($transporter_id, "first_name","transporters");
			$transporter_last_name = getAnyFieldValue($transporter_id, "last_name","transporters");

			$order_items = getAnyFieldValue($order_id, "items", "orders");
			$order_customer = getAnyFieldValue($order_id, "customer_name", "orders");
			$order_delivery_address = getAnyFieldValue($order_id, "delivery_address", "orders");

			$data = array();
			$data["names"] = $transporter_first_name." ".$transporter_last_name;
			$data["customer_name"] = $order_customer;
			$data["order_message"] = "Attention $transporter_last_name, please deliver $order_items  to $order_customer at $order_delivery_address";
			$data["order_id"] = $order_id;
			$data["transporter_id"] = $transporter_id;
			$data["delivery_address"] = $order_delivery_address;
			$data["status"] ="PENDING";
			$data["mobile"] = $transporter_mobile;

			if ($this->db->insert("transport_requests", $data))
			{
				echo "SUCCESS:Transport request ID ".$this->db->insert_id()." has been made to ".$transporter_first_name." ".$transporter_last_name." ".$transporter_mobile;

			///	sendEmail("githaigz@gmail.com", "Transport request", $data["order_message"]);

			}
			else
			{
				 echo "There was a problem requesting transport";
			}

		}
		catch (Exception $e)
		{
			echo  $e->getMessage();
		}
	}
}
