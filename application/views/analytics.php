<?php
pageheader();
?>
<div class="container-fluid">
    <div clas="row">
        <div class="col-sm-12">
                <h1>Analytics</h1>
                <table class="table table-striped">                       
                <tr>
                            <td>Total Overall</td><td><?php echo getTotalHits(); ?></td>
                        </tr>
                        <tr>
                            <td>Total Today</td><td><?php echo getTotalHits("today"); ?></td>
                        </tr>
                        <tr>
                            <td>Total Unique Visitors Overall</td><td><?php echo getTotalUniqueVisitors(); ?></td>
                        </tr>
                        <tr>
                            <td>Total Unique Visitors Today</td><td><?php echo getTotalUniqueVisitors("today"); ?></td>
                        </tr>
                        <tr>
                            <td>Total Unique Product Hits Overall</td><td><?php echo getTotalUniqueProductHits(); ?></td>
                        </tr>
                        <tr>
                            <td>Total Unique Product Hits Today</td><td><?php echo getTotalUniqueProductHits("today"); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Total Product Hits By Name Overall</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                            <table class="table table-dark" style="font-size: 9px; max-width: 50%" align="right">
                         <tr>
                                    <td>
                                     <?php $data = implode("</td></tr><tr><td>", getProductHitByProduct("")); 
                                    $data = str_replace(", ","</td><td>", $data);
                                    echo $data;
                                     ?>
                                    </td></tr>
                             </table>
                            </td>
                        </tr>
                        <tr>
                             
                             <td colspan="2">Total Unique Product Hits By Name Today</td>
                             </tr>
                              <tr>
                                           <td colspan="2" align="right">
                               <table class="table table-dark" style="font-size: 9px; max-width: 50%" align="right">
                             <tr><td>
                             <?php $data = implode("</td></tr><tr><td>", getProductHitByProduct("today")); 
                                    $data = str_replace(", ","</td><td>", $data);
                                    if ($data=="0")
                                    {
                                        echo "None";
                                    }else
                                    {
                                    echo $data;
                                    }
                             ?>
                             </td></tr>
                             </table>
                             </td>
                        </tr>
                

                </table>
        </div>
    </div>
</div>
<?php
footer();

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
                        $query2 ="SELECT COUNT(*) as total FROM product_hits WHERE product_id = '$product_id' AND (timestamp >='$start' AND timestamp <='$stop') ";
                        echo $query2;
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




?>