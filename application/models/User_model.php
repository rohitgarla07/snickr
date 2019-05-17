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

  // $query = $this->db->query("SELECT u.nickname as nickname, m.body as body
  //                                   from message as m
  //                                   inner join user as u
  //                                   on u.user_ID = m.composer_ID
  //                                   where m.channel_ID = '$channel_id'
  //                                   order by m.create_time");
  $query = $this->db->query("SELECT * from workspace where workspace_ID in (Select workspace_id from workspacerole where member_ID = '$user_id')");

  if($query->result())
  {

    return $query->result_array();

  }
  else{
    return false;
  }


}

public function get_channels($user_id,$workspace_id){
// SELECT * FROM CHANNEL INNER JOIN WORKSPACEROLE as W using (membership_ID) where W.member_ID = 6 and workspace_ID = 1;

  $query = $this->db->query("SELECT c.channel_ID,c.name from CHANNEL as c
                              where channel_ID in
                              (Select channel_ID from CHANNELMEMBERSHIP where user_ID = $user_id)
                              and c.workspace_id = '$workspace_id'");

  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }
}

public function get_channel_users($channel_id){

  $query = $this->db->query('SELECT distinct username,nickname,user_ID FROM USER INNER JOIN CHANNELMEMBERSHIP USING (user_ID) WHERE channel_ID ='.$channel_id);

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
  $query = $this->db->query("SELECT u.username, u.user_ID, u.nickname as nickname, m.body as body
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
  $query = $this->db->query("SELECT  distinct u.user_ID,u.username
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

public function get_members_workspace($workspace_id){
  #$channel_id = mysql_real_escape_string($channel_id);
  $query = $this->db->query("SELECT u.user_ID, u.username
	                             from user as u
                               inner join WORKSPACEROLE as w
                               on w.member_ID  = u.user_ID
                               where w.workspace_ID ='$workspace_id' and w.role = 'MEMBER'");


  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}

public function get_non_channel_members($channel_id){

  $query = $this->db->query("SELECT username, user_ID from USER where user_ID in
    (SELECT member_ID from WORKSPACEROLE where workspace_ID =
      (SELECT workspace_ID from CHANNEL where channel_ID = '$channel_id') and user_ID not in (Select user_ID from CHANNELMEMBERSHIP where channel_ID ='$channel_id'))");


  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}

public function get_workspace_members($workspace_id){
  #$channel_id = mysql_real_escape_string($channel_id);
  $query = $this->db->query("SELECT u.user_ID, u.username
	                             from user as u
                               inner join WORKSPACEROLE as w
                               on w.member_ID  = u.user_ID
                               where w.workspace_ID ='$workspace_id' and w.role = 'MEMBER'");


  if($query->result())
  {

    return $query->result_array();
    // return "TEST";
  }
  else{
    return false;
  }


}


public function add_to_workspace($workspaceid, $userid, $role){
  if ($role == 'admin') {
    // code...
    $query = $this->db->query("INSERT INTO WORKSPACEROLE VALUES (default, $userid, $workspaceid, 'ADMIN',default)");

  }elseif ($role == 'member') {
    // code...
    $query = $this->db->query("INSERT INTO WORKSPACEROLE VALUES (default, $userid, $workspaceid, 'MEMBER',default)");
  }

  return TRUE;
}

public function delete_from_workspace($workspaceid, $userid, $role){
  if ($role == 'member') {
    $query = $this->db->query("DELETE FROM WORKSPACEROLE where member_ID = '$userid' and workspace_ID = '$workspaceid' and role = 'MEMBER'");
    return TRUE;
  }

  return FALSE;
}

public function add_member_to_channel($workspaceid, $channelid, $userid){
    $query = $this->db->query("INSERT into CHANNELMEMBERSHIP values($userid, $channelid, default)");
    return TRUE;

}

public function delete_member_from_channel($workspaceid, $channelid, $userid){
    $query = $this->db->query("DELETE FROM CHANNELMEMBERSHIP where channel_ID  = '$channelid' and user_ID = '$userid'");
    return TRUE;
}

public function add_msg_to_db($channelid, $userid, $message){
    $query = $this->db->query("INSERT INTO MESSAGE(message_ID,composer_ID, body, channel_ID, create_time) values(DEFAULT,'$userid','$message','$channelid',DEFAULT)");
    return TRUE;
}

}


?>
