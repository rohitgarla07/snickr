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
           <?php
           $counter = 1;
           while (true) {
             // creating a *variable* varibale name
             $a = 'workspace_'.$counter;
             if (isset($$a['name'])){
               $user_id=$this->session->userdata('user_id');
               $workspace_id = $$a['workspace_id'];
               echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
               // echo $$a['name'];
               $counter = $counter + 1;
             }else{
               break;
             }
           }
           ?>
        </select>

       </div>
       <div class="channel-div list-group list-group-flush">
       </div>

       <div class="list-group list-group-flush" style="position: fixed;bottom: 0;">
         <a href="#" data-toggle="modal" data-target="#exampleModalMember" class="list-group-item list-group-item-action bg-light">Invite Member</a>
         <a href="#" data-toggle="modal" data-target="#exampleModalDelete" class="list-group-item list-group-item-action bg-light">Delete A Member</a>
         <a href="#" data-toggle="modal" data-target="#exampleModalWork" class="list-group-item list-group-item-action bg-light">Create a Workspace</a>
         <a href="#" data-toggle="modal" data-target="#exampleModalChannel" class="list-group-item list-group-item-action bg-light">Create a Channel</a>

       </div>

      <!-- create a channel modal -->
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
                  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Channel -->
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
                  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <label class="radio-inline"><input type="radio" name="optradio" id="PRIVATE">   Private</label>&nbsp;&nbsp;
              <label class="radio-inline"><input type="radio" name="optradio" id="PUBLIC">   Public</label>&nbsp;&nbsp;
              <label class="radio-inline"><input type="radio" name="optradio" id='DIRECT'>   Direct</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

<!-- Add a member -->
      <div class="modal fade" id="exampleModalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add a Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <select id="select_workspace_invite_member" class="form-control border" style="margin-top: -8px; height: 45px;">
                  <?php
                  $counter = 1;
                  while (true) {
                    // creating a *variable* varibale name
                    $a = 'workspace_'.$counter;
                    if (isset($$a['name'])){
                      $user_id=$this->session->userdata('user_id');
                      $workspace_id = $$a['workspace_id'];
                      echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
                      // echo $$a['name'];
                      $counter = $counter + 1;
                    }else{
                      break;
                    }
                  }
                  ?>
               </select>
              </div>
              <br>
              <div>
                <select id="select_non_members" class="form-control border" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Admin</button>
              <button type="button" class="btn btn-primary">Member</button>
            </div>
          </div>
        </div>
      </div>

<!-- Add a member -->
      <div class="modal fade" id="exampleModalMemberAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Make Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">
                  <?php
                  $counter = 1;
                  while (true) {
                    // creating a *variable* varibale name
                    $a = 'workspace_'.$counter;
                    if (isset($$a['name'])){
                      $user_id=$this->session->userdata('user_id');
                      $workspace_id = $$a['workspace_id'];
                      echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
                      // echo $$a['name'];
                      $counter = $counter + 1;
                    }else{
                      break;
                    }
                  }
                  ?>
               </select>
              </div>
              <br>
              <div>
                <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">
                  <?php
                  $counter = 1;
                  while (true) {
                    // creating a *variable* varibale name
                    $a = 'workspace_'.$counter;
                    if (isset($$a['name'])){
                      $user_id=$this->session->userdata('user_id');
                      $workspace_id = $$a['workspace_id'];
                      echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
                      // echo $$a['name'];
                      $counter = $counter + 1;
                    }else{
                      break;
                    }
                  }
                  ?>
               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModalMemberChannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add a Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">
                  <?php
                  $counter = 1;
                  while (true) {
                    // creating a *variable* varibale name
                    $a = 'workspace_'.$counter;
                    if (isset($$a['name'])){
                      $user_id=$this->session->userdata('user_id');
                      $workspace_id = $$a['workspace_id'];
                      echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
                      // echo $$a['name'];
                      $counter = $counter + 1;
                    }else{
                      break;
                    }
                  }
                  ?>
               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Add Member</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete a Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">
                  <?php
                  $counter = 1;
                  while (true) {
                    // creating a *variable* varibale name
                    $a = 'workspace_'.$counter;
                    if (isset($$a['name'])){
                      $user_id=$this->session->userdata('user_id');
                      $workspace_id = $$a['workspace_id'];
                      echo '<option class="dropdown-item" value='.$$a['workspace_id'].' >'.$$a['name'].'</option>';
                      // echo $$a['name'];
                      $counter = $counter + 1;
                    }else{
                      break;
                    }
                  }
                  ?>
               </select>
              </div>
              <br>
              <div>
                <select id="select_workspace" class="form-control border" style="margin-top: -8px; height: 45px;">

               </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Delete Member</button>
            </div>
          </div>
        </div>
      </div>

     </div>


     <!-- /#sidebar-wrapper -->

     <div class=" border-right" id="sidebar-wrapper" style="background-color: antiquewhite;">
       <div class="sidebar-heading bold italic" > Channel Members </div>
       <div class="channel-users-div list-group list-group-flush" ></div>

       <div class="list-group list-group-flush" style="position: fixed;bottom: 0;background-color: antiquewhite;">
         <a href="#" data-toggle="modal" data-target="#exampleModalMemberChannel" class="list-group-item list-group-item-action" style="background-color: antiquewhite;">Add A Member</a>
         <a href="#" data-toggle="modal" data-target="#exampleModalDelete" class="list-group-item list-group-item-action" style="background-color: antiquewhite;">Delete A Member</a>
       </div>
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
             <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModalMemberAdmin">Make Admin</a>
           </li>
           <li class="nav-item text-nowrap">
             <a class="nav-link" href="<?php echo base_url('user/user_logout');?>">Logout</a>
           </li>
         </ul>
        </div>
       </nav>



       <div class="channel-messages-div" style="margin-bottom:70px">
         <!-- meesages body -->
       </div>

       <div class="input-group mb-3" style="position: fixed;bottom: 0;max-width:80%">
        <input type="text" class="form-control" style="margin-left:10px; max-width:80%" placeholder="Message" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append" style="max-width:90%">
          <span class="input-group-text" style="max-width:90%;" id="basic-addon2">@</span>
        </div>
      </div>
     </div>

     <!-- /#page-content-wrapper -->

   </div>
   <!-- /#wrapper -->

   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Menu Toggle Script -->
   <script>
     $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
   </script>


   <script>
    function display_channels(data){
      $(".channel-div").html('');
      for (var i = 0; i < data.length; i++) {
        $(".channel-div").append('<div data-channelid='+data[i]["channel_ID"]+
                                ' class="channel-div-child list-group-item \
                                list-group-item-action bg-light">'+
                                data[i]["name"]+'</div>');}
    };

    function display_channel_users(data){
      $(".channel-users-div").html('');
      for (var i = 0; i < data.length; i++) {
        $(".channel-users-div").append('<div data-username='+data[i]["username"]+
                              ' style="border: 0px; background-color: antiquewhite;" \
                              class="channel-users-div-child bold italic list-group-item \
                              list-group-item-action"> '+'# '+data[i]["username"]+
                              ' ( '+data[i]["nickname"]+' ) '+'</div>');}
    };

    function display_channel_messages(data){
      $(".channel-messages-div").html('');
      for (var i = 0; i < data.length; i++) {
        $(".channel-messages-div").append('<div data-username='+data[i]["username"]+
                                          'class="channel-messages-div-child list-group-item \
                                          list-group-item-action"> '+'# '+data[i]["nickname"]+
                                          '<br> ( '+data[i]["body"]+' ) '+'</div>');}
    };

    function display_non_members(data){
      $("#select_non_members").html("");
      for (var i = 0; i < data.length; i++) {
        $("#select_non_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
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
            display_channels(data);
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };

    function get_channel_users(channel_id){
      $.ajax({
          type: "POST",
          url: "<?=base_url('user/get_channel_users')?>",
          crossDomain: true,
          data: {
              channel_id: channel_id,
          },
          dataType: "json",
          success: function(data, status, xhr) {
            console.log("Success");
            display_channel_users(data);
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
            console.log(data);
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
            console.log(data);
            display_non_members(data)
          },
          error: function(data) {
            console.log("Error Occurred in the controller");
          }
      });
    };


    // send an ajax request to fetch the channels for particular user_id and workspace id
     8$( "#select_workspace" ).change(function() {
       $(".channel-users-div").html("");
       var workspace_id = Number($(this).val());
       var user_id = $("#user").data("userid");
       var channels = get_channels(user_id, workspace_id);
     }).change();

   // send an ajax request to fetch the users for particular channel id
    $(document).on('click', ".channel-div-child", function() {
     var channel_id = $(this).data("channelid");
     get_channel_users(channel_id);
     get_channel_messages(channel_id);

   });

   $( "#select_workspace_invite_member" ).change(function() {
     var workspace_id = Number($(this).val());
     var non_members = get_nonmembers_workspace(workspace_id);

   }).change();

   </script>

 </body>

 </html>
