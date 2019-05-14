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

public function get_channels($user_id,$workspace_id){
// SELECT * FROM CHANNEL INNER JOIN WORKSPACEROLE as W using (membership_ID) where W.member_ID = 6 and workspace_ID = 1;
  $this->db->select('*');
  $this->db->from('CHANNEL');
  $this->db->join('WORKSPACEROLE','WORKSPACEROLE.membership_ID = CHANNEL.membership_ID','inner');
  $this->db->where('member_ID',$user_id);
  $this->db->where('workspace_ID',$workspace_id);

  if($query=$this->db->get())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }
}

public function get_channel_users($channel_id){

  $query = $this->db->query('SELECT username,nickname FROM USER INNER JOIN CHANNELMEMBERSHIP USING (user_ID) WHERE channel_ID ='.$channel_id);

  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}

public function get_channel_messages($channel_id){
  #$channel_id = mysql_real_escape_string($channel_id);
  $query = $this->db->query("SELECT u.nickname as nickname, m.body as body
                                    from message as m
                                    inner join user as u
                                    on u.user_ID = m.composer_ID
                                    where m.channel_ID = '$channel_id'
                                    order by m.create_time");
  // $this->db->select('USER.nickname, MESSAGE.body');
  // $this->db->from('MESSAGE');
  // $this->db->join('USER','USER.user_ID = MESSAGE.composer_ID','inner');
  // $this->db->where('MESSAGE.channel_ID',$channel_id);
  // $this->db->order_by('MESSAGE.create_time');

  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}

public function get_nonmembers_workspace($workspace_id){
  #$channel_id = mysql_real_escape_string($channel_id);
  $query = $this->db->query("SELECT u.user_ID,u.username
                  from user as u where u.user_ID not in (select member_ID from WORKSPACEROLE where workspace_ID ='$workspace_id' ) ");


  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}

}


?>
