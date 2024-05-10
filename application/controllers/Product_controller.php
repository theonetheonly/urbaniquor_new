<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_controller extends CI_Controller
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
        $this->load->view('product');
    }


    public function showinmylove()
        {
  		//          sendEmail("mbatiagithaiga@gmail.com", "showinmylove hit", "Showin my love hit ".date("H:i:a M d Y", time())." ".$_SERVER["REMOTE_ADDR"]." ".rand(1000000,9999999), "0");
                $this->product("27", "redeemable","");
              
              //  sendSMS("0725834359", "Showinmylove promo hit");
      }

    public function product($pdid ="", $rmode="",$rmsg ="")
    {
    
        /*
        echo "<h1>" . $this->uri->segment("1") . "</h1>";
        echo "<h1>" . $this->uri->segment("2") . "</h1>";
        echo "<h1>" . $this->uri->segment("3") . "</h1>";
        */
       $redeem_mode ="";
       $redeem_message ="";
       
       $product_id =0;

       if(strlen($pdid) > 0)
        {
            $product_id =$pdid;         
        }
        else
        {
        $product_id = $this->uri->segment("2");
        }

        if(strlen($rmode) > 2)
        {
            $redeem_mode =$rmode;        
            $redeem_message = $rmsg; 
        }
        else{
            @$redeem_mode = $this->uri->segment("3");
            @$redeem_message = $this->uri->segment("4");
        }


//            echo "<h1>" . $product_id . "</h1>";
  //          echo "<h1>" . $redeem_mode . "</h1>";

        $data = array();
        
        

        $data["product_id"] = $product_id;
        $data["redeem_mode"] = $redeem_mode;
        $data["redeem_message"] = $redeem_message;
                
        $this->load->view("product", $data);
    }



    public function search()
    {
        try{
                $searchtextx = $this->input->post("searchtextx");

       //         echo "<h1> Search Text: -- > ".$searchtextx."</h1>";
                $data = array();
                $data["searchtextx"] = $searchtextx;
                $this->load->view("shop", $data);
        }
        catch(Exception $e)
        {
                echo $e->getMessage();
        }
    }

}
