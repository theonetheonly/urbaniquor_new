<?php
function root_url()
{
    return base_url() . "index.php/";
}

function theme_url()
{
    return base_url() . "theme/";
}
function product_url()
{
    return base_url() . "product/";
}


function validateVoucherX($voucher_code)
    {
       $status = getAnyCrossFieldValueX("voucher_code", $voucher_code, "status", "voucher");
       $quantity_to_give = getAnyCrossFieldValueX("voucher_code", $voucher_code, "quantity_to_give", "voucher");
    
       if((int)$quantity_to_give < 1)
            {
                $status = "EXPENDED";
            }
            else
            {
               return $status;
            }
    }

    function getVoucherDiscount($voucher_code)
    {
       $status = getAnyCrossFieldValueX("voucher_code", $voucher_code, "discount", "voucher");
        return $status;
    }


    function addvoucherBeneficiaries($firstname, $lastname, $phone, $voucher_code, $delivery_address, $order_id)
    {
        $ci= get_instance();

        $data = array();
        $data["firstname"] = $firstname;
        $data["lastname"] = $lastname;
        $data["phone"] = $phone;
        $data["order_id"] = $order_id;
        $data["voucher_code"] = $voucher_code;
        $data["delivery_address"] = $delivery_address;
      
        $ci->db->insert("voucher_beneficiaries", $data);
     

    }

    function updateAnyField($id, $field, $value, $table)
    {
        try{
                $ci = get_instance();
                $data = array($field =>$value );
                $ci->db->where('id', $id);
                $ci->db->update($table, $data);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }


function getAnyFieldValue($id, $field, $table)
{
    $ci = get_instance();
    $sql_query = "SELECT $field FROM $table WHERE id = '$id' ";
    $results = $ci->db->query($sql_query);
    $res = "";
    foreach ($results->result_array() as $row) {
        $res = $row[$field];
    }
    return $res;
}

function getAnyCrossFieldValueX($reffield, $refvalue, $search_field, $table, $comparator = "LIKE" )
{
    $ci = get_instance();
    $sql_query = "SELECT $search_field FROM $table WHERE $reffield $comparator '$refvalue' ";
    // echo $sql_query;
    $results = $ci->db->query($sql_query);
    $res = "";
    foreach ($results->result_array() as $row) {
        $res = $row[$search_field];
    }
    return $res;
}




function getOptions($name)
{
    $ci = get_instance();
    $sql_query = "SELECT value FROM options WHERE name LIKE '$name' AND status LIKE 'ENABLED' ";
    $results = $ci->db->query($sql_query);
    $res = "";
    foreach ($results->result_array() as $row) {
        $res = $row["value"];
    }
    return $res;
}

function getCategoires($ordering ="ORDER BY id ASC", $displayfilter="", $frontpage_sub_slider="")
{

	$x  =0;
	if ($displayfilter !=="")
	{
		$displayfilter  .= " WHERE display = '".$displayfilter."' ";
		$x++;
	}

	if ($frontpage_sub_slider !=="")
	{

		if ($x == 0) {
			$displayfilter .=" WHERE frontpage_sub_slider = '" . $frontpage_sub_slider . "' ";
		}
		else{
			$displayfilter .=" AND frontpage_sub_slider = '" . $frontpage_sub_slider . "' ";

		}

	}


	$ci = get_instance();
    $sql_query = "SELECT * FROM categories $displayfilter $ordering ";
  //  echo $sql_query;

	$results = $ci->db->query($sql_query);
    $res = array();
    foreach ($results->result_array() as $row) {
        $res[] = $row["category_name"];
    }
    return $res;
}

function checkVoucherBeneficiaries($voucher_code, $phone)
{

    $ci = get_instance();
    $sql_query = "SELECT * FROM voucher_beneficiaries WHERE voucher_code LIKE '$voucher_code' AND phone LIKE '%$phone' ";
    $results = $ci->db->query($sql_query);
    $res = array();
    foreach ($results->result_array() as $row) {
        $res[] = $row["firstname"];
    }
    if (count($res) >0 )
        {
             return "EXPENDED";
        }
        else
        {
            return "VALID";
        }
}


function doCurl($myurl, $post_data)
{
        $ci = get_instance();

        //  Calling cURL Library
        $ci->load->library('curl');
        //  Setting URL To Fetch Data From
        $ci->curl->create($myurl);
        $ci->curl->option('connecttimeout', 600);

        // For SSL Sites. Check whether the Host Name you are connecting to is valid
        $ci->curl->option('SSL_VERIFYPEER', false);

        //  Ensure that the server is the server you mean to be talking to
        $ci->curl->option('SSL_VERIFYHOST', false);

        // Defines the SSL Version to be Used
        $ci->curl->option('SSLVERSION', 3);

        //  To Temporarily Store Data Received From Server
        $ci->curl->option('buffersize', 10);
        //  To support Different Browsers
        $ci->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');

        //  To Receive Data Returned From Server
        $ci->curl->option('returntransfer', 1);

        //  To follow The URL Provided For Website
        $ci->curl->option('followlocation', 1);

        //  To Retrieve Server Related Data
        $ci->curl->option('HEADER', false);

        //  To Set Time For Process Timeout
        $ci->curl->option('connecttimeout', 600);
        //  To Execute 'option' Array Into cURL Library & Store Returned Data Into $data

        $ci->curl->post($post_data);
        $data = $ci->curl->execute();

        //  To Display Returned Data
        $result = $data;
}


function sendSMS($mobile, $message)
{

        try {
                $myurl = "http://192.168.100.106:85/goip/sendsms.php?";

                //    $myurl="http://41.212.112.52/goip/sendsms.php?";

                $myurl = "http://185.184.70.118/sendsms.php?";


                $post_data = array();

                $post_data["mobile"] = $mobile;
                $post_data["message"] = $message;
                $post_data["gatewayip"] = "192.168.100.3";
                $post_data["accesscode"] = "4321";
                /*                     $post_data["appkey"] = "4321";
                        $post_data["sender"] = "RANDOM";
                        $post_data["accesscode"] = "4321";
                              
*/

                //                        http://192.168.100.106:85/goip/sendsms.php?mobile=0725834359&message=testmessage3210&gatewayip=192.168.0.51&appkey=4321&sender=RANDOM&accesscode=4321

                   $res=  doCurl($myurl , $post_data);
                //                $post_data["mobile"] = "0725834359";
                //					   sleep(0.25);
                //                $res =  doCurl($myurl, $post_data);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    

    function  sendEmail($email, $subject, $message , $htmlmode="1")
    {
//        LV1?Q3[yRn71
 //$post_data = array('email' => $email, 'subject' => $subject, 'message' => $message, 'access_key' => 'superstar101', 'htmlmode' => $htmlmode);
// emailDoCurl("http://www.stationcom.net/routemail_msoft2.php", $post_data);


            if ($htmlmode =="1")
            {
                $message = base64_encode($message);
            }

            $post_data = array('email' => $email, 'subject' => $subject, 'message' => $message, 'access_key' => 'superstar101', 'htmlmode' => $htmlmode);
            doCurl("http://www.drinksasa.co.ke/routemail.php" , $post_data);
   //         sleep(2);
    
            $post_data = array('email' => "mbatiagithaiga@gmail.com", 'subject' => $subject, 'message' => $message, 'access_key' => 'superstar101', 'htmlmode' => $htmlmode);
            doCurl("http://www.drinksasa.co.ke/routemail.php" , $post_data);
     //       sleep(2);

    
        }

function record_hit()
{
        $data = array();
        $data["remote_addr"] = $_SERVER["REMOTE_ADDR"];
        $data["http_user_agent"] = $_SERVER["HTTP_USER_AGENT"];
		
		$ci = get_instance();
        $ci->db->insert("hits", $data);
        
		$text =$data["http_user_agent"];
		preg_match('#\((.*?)\)#', $text, $match);
		$device=  $match[1];
		
        $message = "urbanliquor.co.ke hit from\n".$data["remote_addr"]."\nDevice:".$device."\nat ".date("H:i:s - D d F y", time());
     //    sendSMS("0725834359", $message);   

  //      sendEmail("githaigz@gmail.com", "hit from drinksasa.co.ke", $message, "0");


    }

function record_hit_product($product_id, $product_title)
{
        $data = array();
        $data["remote_addr"] = $_SERVER["REMOTE_ADDR"];
        $data["http_user_agent"] = $_SERVER["HTTP_USER_AGENT"];
		$data["product_id"] = $product_id;
		$data["product_title"] =$product_title;
		$data["activity"] = "PRODUCT_VIEW";

        
		
		$ci = get_instance();
        $ci->db->insert("product_hits", $data);
        
		$text =$data["http_user_agent"];
		//	preg_match('#\((.*?)\)#', $text, $match);
		//$device=  $match[1];
		
		
        
        $message = "drinksasa.co.ke product view ";
		$message.= "- (Product ID ".$product_id;
		$message.= "-".$product_title;
		$message.= "- Date:".date("d-m-Y  H:i:s",time());
		$message.= " from ".$data["remote_addr"];
		
//        sendSMS("0725834359", $message);   
       // sendEmail("githaigz@gmail.com", "product view from drinksasa.co.ke", $message, "0");

    }

function add_to_cart_hit($product_id, $product_title, $quantity)
{
	    $data = array();
        $data["remote_addr"] = $_SERVER["REMOTE_ADDR"];
        $data["http_user_agent"] = $_SERVER["HTTP_USER_AGENT"];
		$data["product_id"] = $product_id;
		$data["product_title"] =$product_title;
		$data["activity"] ="ADD_TO_CART";
		$data["activity"] ="ADD_TO_CART";

		$ci = get_instance();
        $ci->db->insert("product_hits", $data);
        
		//$text =$data["http_user_agent"];
		//preg_match('#\((.*?)\)#', $text, $match);
		//$device=  $match[1];
		
		
        $message = "drinksasa.co.ke add to cart - (Product ID ".$product_id.") - QTY: ".$quantity." ".$product_title." Date ".date("d-m-Y  H:i:s",time())." from ".$data["remote_addr"];
        // sendSMS("0725834359", $message);   	
       //  sendEmail("githaigz@gmail.com", "add to cart from drinksasa.co.ke", $message, "0");


    }
function checkout_hit()
{
	
}


function getTableColumns($table)
    {
        $ci = get_instance();
        $sql_query = "SHOW columns FROM $table ";
        $results = $ci->db->query($sql_query);
        $res = array();
        foreach ($results->result_array() as $row) {
            $res[] = $row["Field"];
        }
        return $res;
    }

	function getWebsiteUrl()
	{
		try{
			return getAnyCrossFieldValueX("name", "WEBSITE_URL","value", "options");
		}
		catch (Exception $e)
		{

		}

	}
