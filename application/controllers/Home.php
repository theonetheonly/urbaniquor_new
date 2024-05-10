<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->helper('cookie');
        $this->load->helper('footer');
        $this->load->helper('book');
        $this->load->helper('form');


        $this->load->database();
        //        $this->loggedin_c = $this->checkLoginCookie();
        //			echo "<h1> logge in C: ". $this->loggedin_c."</h1>";
    }

    public function analytics()
    {
    
        $this->load->view("analytics");
  
    }

    public function index()
    {
        //   $this->flushSessionCookie();

        if (!$this->checkSessionCookie()) {
            $this->setSessionCookie();
			$current_url = current_url();
			echo  $current_url;
			sleep(2);
			redirect($current_url);
			exit();
        } else {
            $session_cookie = $this->input->cookie('web_session', true);;
              //      echo "<h1> WEB SESSION: " . $session_cookie . "</H1>";

	//		exit();
        }

		try {
			$data = array();
			$data["page_load_time"] = time();
			$page = "";
			$current_page = "index";
			@$page = $this->uri->segment('1');

//        echo "<h1>Page :".$page."</h1>";

			if (strlen($page) > 0) {
				$current_page = $page;
			}

		//	 echo  "<h1>Currenyb Page: ".$current_page."</h1>";

			$this->load->view($current_page, $data);
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
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

		// echo "<h1>Setting : ".$session_stamp."</h1>";
        set_cookie($cookie);
        sleep(2);
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
    public function checkSessionCookie()
    {
        return $this->input->cookie('web_session', true);
    }
}
