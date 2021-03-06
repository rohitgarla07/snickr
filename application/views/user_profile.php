<?php
$user_id=$this->session->userdata('user_id');

if(!$user_id){

  redirect('user/login_view');
}
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Simple Sidebar - Start Bootstrap Template</title>

   <!-- Bootstrap core CSS -->
   <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <!-- Custom styles for this template -->
   <link href="<?php echo base_url(); ?>assets/css/final_sidebar.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">


 </head>

 <body>

   <div class="d-flex" id="wrapper">

     <!-- Sidebar -->
     <div class="bg-light border-right" id="sidebar-wrapper" >
       <div id="user" class="sidebar-heading" data-userid="<?php echo $_SESSION['user_id']; ?>"><?php echo $_SESSION['user_name']; ?> </div>
       <div class="dropdown-divider"></div>
       <div>
         <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">

        </select>

       </div>
       <div class="channel-div list-group list-group-flush">
       </div>

       <div class="workspace-footer-options list-group list-group-flush" style="position: fixed;bottom: 0;">


       </div>
       <?php
          $delete_msg= $this->session->flashdata('delete_ws_member');
          $member_added_successfull= $this->session->flashdata('member_added_successfull');
          $channel_delete_msg= $this->session->flashdata('delete_channel_member_msg');
          $channel_added_msg= $this->session->flashdata('add_channel_member_msg');
              if($delete_msg){
                ?>
                <div class="alert alert-success">
                  <?php echo $delete_msg; ?>
                </div>
              <?php
              }
              if($member_added_successfull){
                ?>
                <div class="alert alert-success">
                  <?php echo $member_added_successfull; ?>
                </div>
                <?php
              }
              if($channel_delete_msg){
                ?>
                <div class="alert alert-success">
                  <?php echo $channel_delete_msg; ?>
                </div>
                <?php
              }
              if($channel_added_msg){
                ?>
                <div class="alert alert-success">
                  <?php echo $channel_added_msg; ?>
                </div>
                <?php
              }
        ?>
      <!-- create a workspace modal -->
      <div class="modal fade" id="exampleModalWork" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create A Workspace</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class=" input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" class="create-workspace-name form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class=" input-group-text" id="inputGroup-sizing-default">Description</span>
                </div>
                <input type="text" class="create-workspace-desc form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="create-workspace-button btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for create a Channel -->
      <div class="modal fade" id="exampleModalChannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create a Channel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class=" input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" class="create-channel-name-input form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                </div>
                <input type="text" class="create-channel-desc-input form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <form id="myForm-channel">
                <label class="radio-inline"><input type="radio" name="optradio" value="PRIVATE">   Private</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="optradio" value="PUBLIC">   Public</label>&nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" name="optradio" value='DIRECT'>   Direct</label>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="create-channel-button btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

<!-- Add a member to a workspace -->
      <div class="modal fade" id="exampleModalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="add-member-to-workspace-header modal-title" id="exampleModalLabel">Add a Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div>
                <!-- SELECTING MEMBERS OF Snickr members who are not members of workspace -->
                <select id="select_non_members" class="form-control border" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="add-admin-to-workspace-button btn btn-secondary" data-dismiss="modal">Admin</button>
              <button type="button" class="add-member-to-workspace-button btn btn-primary">Member</button>
            </div>
          </div>
        </div>
      </div>

<!-- DELETE A MEMBER FROM A WORKSPACE -->
      <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="delete-member-from-workspace-header modal-title" id="exampleModalLabel">Delete a Member from workspace </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div>
                <!-- SELECTING MEMBERS TO DELETE FROM WORKSPACE -->
                <select id="select_members" class="form-control border" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="delete-member-button btn btn-primary">Delete Member</button>
            </div>
          </div>
        </div>
      </div>

<!-- Make a member Admin-->
      <div class="modal fade" id="exampleModalMemberAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="make-admin-modal-header modal-title" id="exampleModalLabel">Make Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <select id="select_workspace_members" class="make-admin-options-users form-control border" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="make-admin-confirm-button btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add a workspace member to a channel  -->
      <div class="modal fade" id="exampleModalMemberChannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title add-member-to-channel-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
              <div class="add-member-to-channel">
                <div class="display-channel">
                </div>
                <select id="select_non_channel_members" class="form-control border" style="margin-top: -8px; height: 45px;">
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="add-member-to-channel-button btn btn-primary">Add Member</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete a workspace member from a channel  -->
      <div class="modal fade" id="exampleModalDeleteFromChannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title delete-member-from-channel-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <!-- SELECTING MEMBERS TO DELETE FROM WORKSPACE -->
                <select id="select_channel_members" class="form-control border delete-channel-users-options" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="delete-from-channel-button btn btn-primary">Delete Member</button>
            </div>
          </div>
        </div>
      </div>



     </div>


     <!-- /#sidebar-wrapper listing channels of a workspace -->

     <div class="channel-members border-right" id="sidebar-wrapper" style="background-color: antiquewhite;">
       <div class="sidebar-heading bold italic" > Channel Members </div>
       <div class="channel-users-div list-group list-group-flush" ></div>
       <div class="add-delete-buttons list-group list-group-flush" style="position: fixed;bottom: 0; background-color: antiquewhite;"> </div>

     </div>

     <div id="page-content-wrapper">
       <nav class="navbar navbar-expand-lg navbar-light border-bottom" >
         <div class="input-group mb-3" style="max-width:750px">
          <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Search</button>
          </div>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="<?php echo base_url('user/user_logout');?>">Logout</a>
            </li>
          </ul>
         <ul class="make-admin navbar-nav ml-auto mt-2 mt-lg-0">
         </ul>
        </div>
       </nav>




       <div class="channel-messages-div" style="margin-bottom:70px">
         <!-- meesages body -->
       </div>

       <div class="message-div input-group mb-3" style="position: fixed;bottom: 0;max-width:80%">
         <input type="text" class="message-textbox form-control" style="margin-left:10px; max-width:80%" placeholder="Message" aria-label="Recipient's username" aria-describedby="basic-addon2">
         <div class="input-group-append" style="max-width:90%">
           <button type="button" class="send-msg-button btn btn-secondary">Send</button>
         </div>
      </div>
     </div>

     <!-- /#page-content-wrapper -->

   </div>
   <!-- /#wrapper -->

   <!-- Bootstrap core JavaScript
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   -->
   <!-- Menu Toggle Script -->
   <script>
     $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
   </script>


   <script>
   function escapeRegExp(string){
      return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // $& means the whole matched string
    }

    function display_channels(data){
      $(".channel-div").html('');
      for (var i = 0; i < data.length; i++) {
        $(".channel-div").append('<div data-channelid='+data[i]["channel_ID"]+' \
                                    data-channel_type='+data[i]["type"]+' \
                                    class="channel-div-child list-group-item \
                                    list-group-item-action bg-light" \
                                    id="channel_'+data[i]["channel_ID"]+'">'+data[i]["name"]+' \
                                  </div>');}
    };

    function display_channel_users(data, workspace_id, channel_id, flag, channel_type){
      if (flag == 'display_user') {
        $(".channel-users-div").html('');
        for (var i = 0; i < data.length; i++) {
          $(".channel-users-div").append('<div data-username='+data[i]["username"]+
                                ' data-channelid='+channel_id+' style="border: 0px; background-color: antiquewhite;" \
                                class="channel-users-div-child bold italic list-group-item \
                                list-group-item-action"> '+'# '+data[i]["username"]+
                                ' ( '+data[i]["nickname"]+' ) '+'</div>');}

        // Dynamically create the Add a Member and Delete a MEMBER
        no_of_user = $(".channel-users-div-child").length;
        if (channel_type == "DIRECT" && no_of_user >= 2) {
          $(".add-delete-buttons").html("");
        }else{
          $(".add-delete-buttons").html("");
          $(".add-delete-buttons").append('<a href="#" data-toggle="modal" data-channelid='+channel_id+'\
                                          data-target="#exampleModalMemberChannel" data-workspaceid='+workspace_id+' \
                                          class="add-delete-a-member list-group-item list-group-item-action" \
                                          style="background-color: antiquewhite;">Add A Member</a> \
                                          <a href="#" data-toggle="modal" data-channelid='+channel_id+'\
                                          data-target="#exampleModalDeleteFromChannel" data-workspaceid='+workspace_id+'\
                                          class="add-delete-a-member list-group-item list-group-item-action" \
                                          style="background-color: antiquewhite;">Delete A Member</a> ');
        }

      }else if (flag == 'display_user_to_delete') {
        $(".delete-channel-users-options").html("");
        for (var i = 0; i < data.length; i++) {
          $(".delete-channel-users-options").append('<option class="dropdown-item" data-userid='+data[i]['user_ID']+' value= >'+data[i]['username']+' '+data[i]['nickname']+'</option>');
        }

      }

    };

    function display_channel_messages(data){
      $(".channel-messages-div").html('');
      for (var i = 0; i < data.length; i++) {
        $(".channel-messages-div").append('<div data-username='+data[i]["username"]+' \
                                          class="channel-messages-div-child list-group-item \
                                          list-group-item-action"> '+'# '+data[i]["nickname"]+
                                          '<br> ( '+data[i]["body"]+' ) '+'</div>');}
    };


    function display_non_members(data){
      $("#select_non_members").html("");
      for (var i = 0; i < data.length; i++) {
        $("#select_non_members").append('<option class="dropdown-item" data-userid='+data[i]['user_ID']+'>'+data[i]["username"]+' </option>');}
    };

    function display_members(data){
      $("#select_members").html("");
      for (var i = 0; i < data.length; i++) {
        $("#select_members").append('<option class="dropdown-item" data-userid='+data[i]['user_ID']+'>'+data[i]["username"]+' </option>');}
    };

    function display_non_channel_members(data){
      $("#select_non_channel_members").html("");
      for (var i = 0; i < data.length; i++) {
        $("#select_non_channel_members").append('<option class="dropdown-item" data-userid='+data[i]['user_ID']+'>'+data[i]["username"]+' </option>');}
    };

    function display_workspace_members(data,flag){
        $("#select_workspace_members").html("");
        for (var i = 0; i < data.length; i++) {
          $("#select_workspace_members").append('<option class="dropdown-item" data-userid='+data[i]['user_ID']+'>'+data[i]["username"]+' </option>');}
      // $("#select_workspace_members").html("");
      // for (var i = 0; i < data.length; i++) {
      //   $("#select_workspace_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
    };


    function get_channels(user_id, workspace_id){
      console.log(user_id, workspace_id);
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_channels')?>",
          crossDomain: true,
          data: {
              user_id: user_id,
              workspace_id: workspace_id,
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success");
            console.log(data)
            display_channels(data);
          },
          error: function(data) {
            console.log(data);
            console.log("Error Occurred in the controller");
          }
      });
    };

    function  get_channel_users(workspace_id, channel_id, flag, channel_type){

      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_channel_users')?>",
          crossDomain: true,
          data: {
              channel_id: channel_id,
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success", data['length']);
            console.log(data);
            let number_of_user = data['length'];
            display_channel_users(data, workspace_id, channel_id, flag, channel_type);
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_channel_messages(channel_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_channel_messages')?>",
          crossDomain: true,
          data: {
              channel_id:channel_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            // console.log(data);
            
            display_channel_messages(data);
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_nonmembers_workspace(workspace_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_nonmembers_workspace')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            // console.log(data);
            display_non_members(data)
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_members_workspace(workspace_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_members_workspace')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            // console.log(data);
            display_members(data)
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_non_channel_members(channel_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_non_channel_members')?>",
          crossDomain: true,
          data: {
              channel_id:channel_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
            display_non_channel_members(data)
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_workspace_members(workspace_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_workspace_members')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
            display_workspace_members(data)
          },
          error: function(data) {
            console.log('Eror');
            console.log("Error Occurred in the controller");
          }
      });
    };

    function add_to_workspace(workspace_id, user_id, role){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/add_to_workspace')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id,
              user_id : user_id,
              role : role
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {

          }
      });
    };

    function add_member_to_channel(workspace_id, channel_id, user_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/add_member_to_channel')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id,
              channel_id:channel_id,
              user_id : user_id,
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {

          }
      });
    };

    function delete_from_workspace(workspace_id, user_id, role){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/delete_from_workspace')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id,
              user_id : user_id,
              role : role
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {
            console.log('Error');
          }
      });
    };

    function delete_member_from_channel(workspace_id, channel_id, user_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/delete_member_from_channel')?>",
          crossDomain: true,
          data: {
              workspace_id:workspace_id,
              channel_id:channel_id,
              user_id : user_id,
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {

          }
      });
    };

    function add_msg_to_db(channel_id, user_id, message){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/add_msg_to_db')?>",
          crossDomain: true,
          data: {
              channel_id :channel_id,
              user_id : user_id,
              message : message
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {
            console.log('Error');
          }
      });
    };

    function create_workspace(name, desc, user_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/create_workspace')?>",
          crossDomain: true,
          data: {
              name : name,
              desc : desc,
              user_id : user_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {
            console.log('Error');
          }
      });
    };

    function create_channel(workspace_id, name, desc, user_id, channel_type){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/create_channel')?>",
          crossDomain: true,
          data: {
              workspace_id : workspace_id,
              name : name,
              desc : desc,
              user_id : user_id,
              channel_type : channel_type
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {
            console.log(data);
            console.log('Error');
          }
      });
    };

    function make_admin(workspace_id, user_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/make_admin')?>",
          crossDomain: true,
          data: {
              workspace_id : workspace_id,
              user_id : user_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
          },
          error: function(data) {
            console.log(data);
            console.log('Error');
          }
      });
    };

    $( document ).ready(function() {
      var user_id = "<?php echo $this->session->userdata('user_id');?>";

      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_workspaces')?>",
          crossDomain: true,
          data: {
              user_id : user_id
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success message");
            console.log(data);
            $( "#select_workspace" ).html("");
            for (var i = 0; i < data.length; i++) {
              console.log(data[i]['workspace_ID']);
              $( "#select_workspace" ).append('<option class="dropdown-item" data-workspacename="'+data[i]["name"]+'" data-workspaceid="'+data[i]["workspace_ID"]+'" value="'+data[i]["workspace_ID"]+'" >'+data[i]["name"]+'</option>');
            }

          },
          error: function(data) {
            console.log('Error');
          }
      });

    });

    // send an ajax request to fetch the channels for particular user_id and workspace id
     $( "#select_workspace" ).change(function() {
       $(".channel-users-div").html("");
       var workspace_id = Number($(this).val());
       var workspace_name = $("#select_workspace").find(':selected').data("workspacename");
       var user_id = $("#user").data("userid");
       var channels = get_channels(user_id, workspace_id);

       $(".make-admin").html('<li class="nav-item text-nowrap"> \
                              <a class="make-admin-button nav-link" href="" \
                              data-toggle="modal" \
                              data-workspaceid='+workspace_id+' \
                              data-target="#exampleModalMemberAdmin"> \
                              Make Admin</a> \
                              </li>');

      $(".workspace-footer-options").html('<a href="#" data-toggle="modal" \
                                          data-target="#exampleModalMember" \
                                          data-workspaceid='+workspace_id+' \
                                          data-workspacename="'+workspace_name+'" \
                                          class="add-member-to-workspace list-group-item list-group-item-action bg-light">Invite Member</a> \
                                          <a href="#" data-toggle="modal" data-target="#exampleModalDelete" \
                                          data-workspaceid='+workspace_id+' \
                                          class="delete-member-from-workspace list-group-item list-group-item-action bg-light">Delete A Member</a> \
                                          <a href="#" data-toggle="modal" data-target="#exampleModalWork" \
                                          class="list-group-item list-group-item-action bg-light">Create a Workspace</a> \
                                          <a href="#" data-toggle="modal" data-target="#exampleModalChannel" \
                                          data-workspaceid='+workspace_id+' \
                                          class="create-channel list-group-item list-group-item-action bg-light">Create a Channel</a>');
     }).change();

     $(document).on('click', ".make-admin-button", function() {
       var workspace_id = $(this).data("workspaceid");
       $(".make-admin-confirm-button").attr('data-workspaceid', workspace_id);
     });

     $(document).on('click', ".make-admin-confirm-button", function() {
       var workspace_id = $(this).data("workspaceid");
       var user_id = $("#select_workspace_members").find(':selected').data('userid');
       console.log(workspace_id, user_id);
       make_admin(workspace_id, user_id);
     });

   // send an ajax request to fetch the users for particular channel id
    $(document).on('click', ".channel-div-child", function() {
     var channel_id = $(this).data("channelid");
     var channel_type = $(this).data("channel_type");
     var workspace_id = Number($("#select_workspace").find(':selected').val());

     console.log(channel_id, workspace_id);
     get_channel_users(workspace_id, channel_id, 'display_user', channel_type);
     get_channel_messages(channel_id);

     $(".message-div").html('<input type="text" data-channelid='+channel_id+' class="message-textbox form-control" style="margin-left:10px; max-width:80%" placeholder="Message" aria-label="Recipient"s username" aria-describedby="basic-addon2"> \
                             <div class="input-group-append" style="max-width:90%"> \
                               <button type="button" class="send-msg-button btn btn-secondary">Send</button> \
                             </div> ');

   });

   // send an ajax request to fetch non members of the workspace to send invites to
   // $( "#select_workspace_invite_member" ).change(function() {
   //   var workspace_id = Number($(this).val());
   //   var non_members = get_nonmembers_workspace(workspace_id);
   //
   // }).change();

   // to delete users from workspace
   // $( "#select_members" ).change(function() {
   //   var workspace_id = Number($(this).val());
   //  var workspace_members = get_members_workspace(workspace_id);
   //
   // }).change();

   $(document).on('click', ".add-delete-a-member", function() {
     var channel_id = $(this).data("channelid");
     var workspace_id = $(this).data("workspaceid");
     $(".add-member-to-channel-title").html('Add a member to Channel '+channel_id);
     $(".delete-member-from-channel-title").html('Delete a member from channel '+channel_id);
     $(".delete-from-channel-button").attr('data-channelid', channel_id);
     $(".add-member-to-channel-button").attr('data-channelid', channel_id);

     get_non_channel_members(channel_id);
     get_channel_users(workspace_id, channel_id, 'display_user_to_delete')


   });

   $(document).on('click', ".make-admin-button", function() {
    var workspace_id = $(this).data("workspaceid");
    $(".make-admin-modal-header").html('Make Admin for Workspace '+workspace_id);

    get_workspace_members(workspace_id);
  });

  $(document).on('click', ".add-member-to-workspace", function() {
   var workspace_id = $(this).data("workspaceid");
   var workspace_name = $(this).data("workspacename");
   console.log(workspace_name);
   $(".add-member-to-workspace-header").html('Add member to '+workspace_name);
   $(".add-member-to-workspace-button").attr('data-workspaceid', workspace_id);
   $(".add-admin-to-workspace-button").attr('data-workspaceid', workspace_id);

   get_nonmembers_workspace(workspace_id);

 });

 $(document).on('click', ".delete-member-from-workspace", function() {
  var workspace_id = $(this).data("workspaceid");
  $(".delete-member-from-workspace-header").html('Delete a member from Workspace '+workspace_id);
  $(".delete-member-button").attr('data-workspaceid', workspace_id);

  get_members_workspace(workspace_id);

  });

  $(document).on('click', ".add-admin-to-workspace-button", function() {
    var workspace_id = $(this).data("workspaceid");
    var user_id = $("#select_non_members").find(':selected').data('userid');
    add_to_workspace(workspace_id, user_id, 'admin');
    location.reload();
  });

  $(document).on('click', ".add-member-to-workspace-button", function() {
    var workspace_id = $(this).data("workspaceid");
    var user_id = $("#select_non_members").find(':selected').data('userid');
    add_to_workspace(workspace_id, user_id, 'member');
    location.reload();
  });

  $(document).on('click', ".delete-member-button", function() {
    var workspace_id = $(this).data("workspaceid");
    var user_id = $("#select_members").find(':selected').data('userid');
    console.log(user_id, workspace_id);
    delete_from_workspace(workspace_id, user_id, 'member');
    location.reload();
  });

  $(document).on('click', ".add-member-to-channel-button", function() {
    var channel_id = $(this).data("channelid");
    var workspace_id = $(this).data("workspaceid");
    var user_id = $("#select_non_channel_members").find(':selected').data('userid');
    console.log(user_id, channel_id, workspace_id);
    add_member_to_channel(workspace_id, channel_id, user_id);
    location.reload();
  });

  $(document).on('click', ".delete-from-channel-button", function() {
    var channel_id = $(this).data("channelid");
    var workspace_id = $(this).data("workspaceid");
    var user_id = $("#select_channel_members").find(':selected').data('userid');
    console.log(user_id, channel_id);
    delete_member_from_channel(workspace_id, channel_id, user_id);
    location.reload();
  });

  $(document).on('click', ".send-msg-button", function() {
    var message = $(".message-textbox").val();
    var channel_id = $(".message-textbox").data("channelid");
    var user_id = "<?php echo $this->session->userdata('user_id');?>";
    console.log(message, channel_id, user_id);
    message = escapeRegExp(message);
    add_msg_to_db(channel_id, user_id, message);
    $('#channel_'+channel_id).click();
  });

  $(document).on('click', ".create-workspace-button", function() {
    var name = $(".create-workspace-name").val();
    var desc = $(".create-workspace-desc").val();
    var user_id = "<?php echo $this->session->userdata('user_id');?>";
    console.log(name, desc, user_id);
    name = escapeRegExp(name);
    desc = escapeRegExp(desc);
    create_workspace(name, desc, user_id);
    location.reload();
  });

  $(document).on('click', ".create-channel", function() {
    var workspace_id = $(this).data("workspaceid");
    $(".create-channel-button").attr('data-workspaceid', workspace_id);
  });

  $(document).on('click', ".create-channel-button", function() {
    var name = $(".create-channel-name-input").val();
    var workspace_id = $(this).data("workspaceid");
    var desc = $(".create-channel-desc-input").val();
    var user_id = "<?php echo $this->session->userdata('user_id');?>";
    var channel_type = $('input[name=optradio]:checked', '#myForm-channel').val();
    console.log(name, desc, user_id, channel_type, workspace_id);
    name = escapeRegExp(name);
    desc = escapeRegExp(desc);
    create_channel(workspace_id, name, desc, user_id, channel_type);
    location.reload();

  });
  </script>

 </body>

 </html>
