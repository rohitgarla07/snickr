<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{
$this->load->view("register.php");
}

public function register_user(){

      $user=array(
      'username'=>$this->input->post('user_name'),
      'email'=>$this->input->post('user_email'),
      'password'=>md5($this->input->post('user_password')),
      'nickname'=>$this->input->post('user_nickname'),
      // 'user_mobile'=>$this->input->post('user_mobile')
        );
        print_r($user);

$email_check=$this->user_model->email_check($user['user_email']);

if($email_check){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('user');


}

}

public function login_view(){

$this->load->view("login.php");


}

function login_user(){
  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>md5($this->input->post('user_password'))

    );

    $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
      if($data)
      {
        $this->session->set_userdata('user_id',$data['user_ID']);
        $this->session->set_userdata('user_email',$data['email']);
        $this->session->set_userdata('user_name',$data['username']);
        $this->session->set_userdata('user_nickname',$data['nickname']);

        redirect('user/user_profile');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login.php");

      }

}


function user_profile(){
  $userid = $_SESSION['user_id'];
  $workspace_data = $this->user_model->workspace($userid);

  $data = array();
  foreach ($workspace_data as $ws) {
    $data['workspace_'.$ws['workspace_ID']] = array('name' => $ws['name'],
                                                    'desc' => $ws['description'],
                                                    'creater_id' => $ws['creater_ID'],
                                                    'create_time' => $ws['create_time'] );
  }

  $this->load->view('user_profile.php', $data);
}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}

}

?>
