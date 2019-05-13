<?php
class User_model extends CI_model{


public function register_user($user){


$this->db->insert('user', $user);

}


public function login_user($email,$pass){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('email',$email);
  $this->db->where('password',$pass);

  if($query=$this->db->get())
  {
      $data = $query->row_array();
      // $workspacedata = $this->workspace($data['user_ID']);

      return $data;

  }
  else{
    return false;
  }


}

public function email_check($email){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function workspace($user_id){

  $this->db->select('*');
  $this->db->from('workspace');
  $this->db->where('creater_ID',$user_id);

  if($query=$this->db->get())
  {

    return $query->result_array();

  }
  else{
    return false;
  }


}

}


?>
