<?php
pageheader();
$passcode ="";
@$passcode = $_REQUEST["passcode"];

$root_url = root_url();

$access=0;

if ($passcode =="machine123" || $passcode_2 ="machine123" )
{
    $access =1;
}
if ($access < 1 )
{
?>
    <h1>You are not allowed to view this page</h1>
<?php
}
else
/*
    1   id  Primary	
	2	timestamp	
	3	cart_session_id	
	4	customer_name	
	5	mpesa_number	
	6	delivery_address	
	7	sub_total	
	8	shipping	
	9	grand_total	
	10	payment_confirmed	
	11	mpesa_trans_no	
	12	delivered	
    13	items
  */  
    {
?>
<div class="container-fluid">
    <div clas="row">
        <div class="col-sm-12 col-md-12">
                <h1>Orders</h1>
                <div class="table-responsive">
                <table class="table table-striped" style="font-size:10px;">                       
                <tr>
                    <th>Order ID</th>
                    <th>Timestamp</th>
                    <th width="300px">Order</th>
                    <th>Customer</th>
                    <th>MPESA Number</th>
                    <th>Delivery Address</th>
                    <th>Subtotal</th>
                    <th>Shipping</th>
                    <th>Grand Total</th>
                    <th>Payment Confirmed</th>
                    <th>MPESA Code</th>                  
                    <th>Delivery Status</th>                  
                </tr>
            <?php
                    {
                    $query = "SELECT * FROM orders ORDER BY id DESC ";
											$result =  $this->db->query($query);
											if ($result->num_rows() > 0) {

												foreach ($result->result_array() as $r) {
                                                        ?>  
                                                        <tr>
                                                                <td><?php echo $r["id"]; ?></td>
                                                                <td><?php echo $r["timestamp"]; ?></td>
                                                                <td><?php echo $r["items"]; ?></td>
                                                                <td><?php echo $r["customer_name"]; ?></td>
                                                                <td><?php echo $r["mpesa_number"]; ?></td>
                                                                <td><?php echo $r["delivery_address"]; ?></td>
                                                                <td><?php echo $r["sub_total"]; ?></td>
                                                                <td><?php echo $r["shipping"]; ?></td>
                                                                <td><?php echo $r["grand_total"]; ?></td>
                                                                <td><?php echo $r["payment_confirmed"]; ?>
                                                                <?php if($r["payment_confirmed"]=="PENDING")
                                                                        {
                                                                            ?>
        <a class="btn-outline-info btn-sm" href="<?php echo $root_url."confirmpayment/".$r["id"]; ?>">Confirm</a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $r["mpesa_trans_no"]; ?></td>
                                                                <td><?php echo $r["delivered"]; ?>
                                                                <?php if($r["delivered"]=="PENDING")
                                                                        {
                                                                            ?>
        <a class="btn-outline-info btn-sm" href="<?php echo $root_url."confirmdelivery/".$r["id"]; ?>">Confirm</a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                  
                                                                
                                                                </td>
                                                                
                                                        </tr>
                                                        <?php
                                                      }
                                                    }
                                                    ?>
                    </tr>
                <?php
                    }
                ?>

               
                </table>
        </div>
        </div>
    </div>
</div>
<?php
}
footer();
/*
function getTotalHits($filter= "")
{
    $ci = get_instance();
    $query ="SELECT COUNT(*) AS total FROM hits ";
    
    if($filter =="today")
        {
            $start = date("Y-m-d", time())." 00:00:00";
            $stop = date("Y-m-d", time())." 23:59:59";
            $query ="SELECT COUNT(*) AS total FROM hits WHERE (timestamp >='$start' AND timestamp <='$stop') ";
        }
  
  
    $res = $ci->db->query($query);
        
    $total = 0;
    if ($res->num_rows() > 0)
    {      
        foreach($res->result_array() as $r)
            {
                    $total =$r["total"];              
            }
    }

    return $total;
}

function getTotalUniqueVisitors($filter= "")
{
    $ci = get_instance();
    $query ="SELECT COUNT(DISTINCT remote_addr) AS total FROM hits ";
    
    if($filter =="today")
        {
            $start = date("Y-m-d", time())." 00:00:00";
            $stop = date("Y-m-d", time()). " 23:59:59";
            $query ="SELECT COUNT(DISTINCT remote_addr) AS total FROM hits WHERE (timestamp >='$start' AND timestamp <='$stop') ";
        }
  
  
    $res = $ci->db->query($query);
        
    $total = 0;
    if ($res->num_rows() > 0)
    {      
        foreach($res->result_array() as $r)
            {
                    $total =$r["total"];              
            }
    }

    return $total;
}

function getTotalUniqueProductHits($filter= "")
{
    $ci = get_instance();
    $query ="SELECT COUNT(DISTINCT product_id) AS total FROM product_hits ";
    
    if($filter =="today")
        {
            $start = date("Y-m-d", time())." 00:00:00";
            $stop = date("Y-m-d", time())." 23:59:59";
            $query ="SELECT COUNT(DISTINCT product_id) AS total FROM product_hits WHERE (timestamp >='$start' AND timestamp <='$stop') ";
        }
  
  
    $res = $ci->db->query($query);
        
    $total = 0;
    if ($res->num_rows() > 0)
    {      
        foreach($res->result_array() as $r)
            {
                    $total =$r["total"];              

           
                }
    }

    return $total;
}

function getProductHitByProduct($filter= "")
{
    $product_data =array();

    $ci = get_instance();
    $query ="SELECT DISTINCT product_id AS product_id FROM product_hits ";
    


    if($filter =="today")
        {
            $start = date("Y-m-d", time())." 00:00:00";
            $stop = date("Y-m-d", time())." 23:59:59";
            $query ="SELECT COUNT(DISTINCT product_id) AS product_id FROM product_hits WHERE (timestamp >='$start' AND timestamp <='$stop') ";
        }
  
  
    $res = $ci->db->query($query);
        
    $total = 0;
    if ($res->num_rows() > 0)
    {      
        foreach($res->result_array() as $r)
            {
                    $product_id =$r["product_id"];              

                    $query2 ="SELECT COUNT(*) as total FROM product_hits WHERE product_id = '$product_id' ";

                    if($filter =="today")
                    {
                        $start = date("Y-m-d", time())." 00:00:00";
                        $stop = date("Y-m-d", time())." 23:59:59";
                        $query ="SELECT COUNT(*) as total FROM product_hits WHERE product_id = '$product_id' AND (timestamp >='$start' AND timestamp <='$stop') ";
                    }
        
                    $res2= $ci->db->query($query2);
                    if ($res2->num_rows() > 0)
                    {      
                        foreach($res2->result_array() as $r2)
                            {
                                 $product_data[] = getAnyFieldValue($product_id, "product_title", "product").",  ".$r2["total"];
                            }
                        }
            }
    }

    return $product_data;
}
*/



?>