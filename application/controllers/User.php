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
  $workspace_data = $this->user_model->get_workspaces($userid);
  $data = array();
  foreach ($workspace_data as $ws) {
    $data['workspace_'.$ws['workspace_ID']] = array('workspace_id' => $ws['workspace_ID'],
                                                    'name' => $ws['name'],
                                                    'desc' => $ws['description'],
                                                    'creater_id' => $ws['creater_ID'],
                                                    'create_time' => $ws['create_time'] );
  }

  $this->load->view('user_profile.php', $data);
}

public function get_workspaces(){
  $userid = $_POST['user_id'];
  $workspace_data = $this->user_model->get_workspaces($userid);

  echo json_encode($workspace_data);
}

public function get_channels(){
  $userid = $_POST['user_id'];
  $workspaceid = $_POST['workspace_id'];
  $channel_data = $this->user_model->get_channels($userid,$workspaceid);

  echo json_encode($channel_data);
}

public function get_channel_users(){
  $channelid = $_POST['channel_id'];

  $channel_user_data = $this->user_model->get_channel_users($channelid);

  echo json_encode($channel_user_data);
}

public function get_channel_messages(){
  $channelid = $_POST['channel_id'];

  $channel_message_data = $this->user_model->get_channel_messages($channelid);

  echo json_encode($channel_message_data);
}

public function get_nonmembers_workspace(){

  $workspaceid = $_POST['workspace_id'];
  $nonmembers_workspace_data = $this->user_model->get_nonmembers_workspace($workspaceid);

  echo json_encode($nonmembers_workspace_data);
}
public function get_members_workspace(){
  $workspaceid = $_POST['workspace_id'];
  $members_workspace_data = $this->user_model->get_workspace_members($workspaceid);

  echo json_encode($members_workspace_data);
}

public function get_non_channel_members(){
  $channelid = $_POST['channel_id'];
  $non_members_channel_data = $this->user_model->get_non_channel_members($channelid);
  echo json_encode($non_members_channel_data);
}

public function get_workspace_members(){

  $workspaceid = $_POST['workspace_id'];
  $members_workspace_data = $this->user_model->get_workspace_members($workspaceid);

  echo json_encode($members_workspace_data);
}

public function add_to_workspace(){

  $workspaceid = $_POST['workspace_id'];
  $userid = $_POST['user_id'];
  $role = $_POST['role'];

  $data = $this->user_model->add_to_workspace($workspaceid, $userid, $role);
  if ($data) {
    $this->session->set_flashdata('member_added_successfull', 'Member Added Successfully to the Workspace');
  }

  echo json_encode($data);
}

public function delete_from_workspace(){

  $workspaceid = $_POST['workspace_id'];
  $userid = $_POST['user_id'];
  $role = $_POST['role'];

  $data = $this->user_model->delete_from_workspace($workspaceid, $userid, $role);
  if ($data) {
    $this->session->set_flashdata('delete_ws_member', 'Member Deleted Successfully');
  }
  echo json_encode($data);
}

public function add_member_to_channel(){

  $workspaceid = $_POST['workspace_id'];
  $channelid = $_POST['channel_id'];
  $userid = $_POST['user_id'];

  $data = $this->user_model->add_member_to_channel($workspaceid, $channelid, $userid);
  if ($data) {
    $this->session->set_flashdata('add_channel_member_msg', 'Member Added Successfully to the Channel');
  }
  echo json_encode($data);
}

public function delete_member_from_channel(){

  $workspaceid = $_POST['workspace_id'];
  $channelid = $_POST['channel_id'];
  $userid = $_POST['user_id'];

  $data = $this->user_model->delete_member_from_channel($workspaceid, $channelid, $userid);
  if ($data) {
    $this->session->set_flashdata('delete_channel_member_msg', 'Member Deleted Successfully from the Channel');
  }
  echo json_encode($data);
}

public function add_msg_to_db(){

  $channelid = $_POST['channel_id'];
  $userid = $_POST['user_id'];
  $message = $_POST['message'];

  $data = $this->user_model->add_msg_to_db($channelid, $userid, $message);
  echo json_encode($data);
}

public function create_workspace(){

  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $user_id = $_POST['user_id'];

  $data = $this->user_model->create_workspace($name, $desc, $user_id);
  echo json_encode($data);
}

public function create_channel(){

  $workspaceid = $_POST['workspace_id'];
  $channel_type = $_POST['channel_type'];
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $user_id = $_POST['user_id'];

  $data = $this->user_model->create_channel($workspaceid, $name, $desc, $user_id, $channel_type);
  echo json_encode($data);
}

public function make_admin(){

  $workspaceid = $_POST['workspace_id'];
  $user_id = $_POST['user_id'];

  $data = $this->user_model->make_admin($workspaceid,$user_id);
  echo json_encode($data);
}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}


}

?>
