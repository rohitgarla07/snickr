var baseURL= "<?php echo base_url();?>";

 function display_channels(data){
   $(".channel-div").html('');
   for (var i = 0; i < data.length; i++) {
     $(".channel-div").append('<div data-channelid='+data[i]["channel_ID"]+
                             ' class="channel-div-child list-group-item \
                             list-group-item-action bg-light">'+
                             data[i]["name"]+'</div>');}
 }

 function display_channel_users(data, channel_id, flag){
   if (flag == 'display_user') {
     $(".channel-users-div").html('');
     for (var i = 0; i < data.length; i++) {
       $(".channel-users-div").append('<div data-username='+data[i]["username"]+
                             ' data-channelid='+channel_id+' style="border: 0px; background-color: antiquewhite;" \
                             class="channel-users-div-child bold italic list-group-item \
                             list-group-item-action"> '+'# '+data[i]["username"]+
                             ' ( '+data[i]["nickname"]+' ) '+'</div>');}

     // Dynamically create the Add a Member and Delete a MEMBER
     $(".channel-members").append('<div class="list-group list-group-flush" \
                                     style="position: fixed;bottom: 0; \
                                     background-color: antiquewhite;"> \
                                     <a href="#" data-toggle="modal" data-channelid='+channel_id+'\
                                     data-target="#exampleModalMemberChannel" \
                                     class="add-delete-a-member list-group-item list-group-item-action" \
                                     style="background-color: antiquewhite;">Add A Member</a> \
                                     <a href="#" data-toggle="modal" data-channelid='+channel_id+'\
                                     data-target="#exampleModalDeleteFromChannel" \
                                     class="add-delete-a-member list-group-item list-group-item-action" \
                                     style="background-color: antiquewhite;">Delete A Member</a> \
                                     </div>');
   }else if (flag == 'display_user_to_delete') {
     $(".delete-channel-users-options").html("");
     for (var i = 0; i < data.length; i++) {
       $(".delete-channel-users-options").append('<option class="dropdown-item" value= >'+data[i]['username']+' '+data[i]['nickname']+'</option>');
     }

   }

 }

 function display_channel_messages(data){
   $(".channel-messages-div").html('');
   for (var i = 0; i < data.length; i++) {
     $(".channel-messages-div").append('<div data-username='+data[i]["username"]+
                                       'class="channel-messages-div-child list-group-item \
                                       list-group-item-action"> '+'# '+data[i]["nickname"]+
                                       '<br> ( '+data[i]["body"]+' ) '+'</div>');}
 }


 function display_non_members(data){
   $("#select_non_members").html("");
   for (var i = 0; i < data.length; i++) {
     $("#select_non_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
 }

 function display_members(data){
   $("#select_members").html("");
   for (var i = 0; i < data.length; i++) {
     $("#select_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
 }

 function display_non_channel_members(data){
   $("#select_non_channel_members").html("");
   for (var i = 0; i < data.length; i++) {
     $("#select_non_channel_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
 }

 function display_workspace_members(data,flag){
     $("#select_workspace_members").html("");
     for (var i = 0; i < data.length; i++) {
       $("#select_workspace_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
   // $("#select_workspace_members").html("");
   // for (var i = 0; i < data.length; i++) {
   //   $("#select_workspace_members").append('<option class="dropdown-item" >'+data[i]["username"]+' </option>');}
 }


 function get_channels(user_id, workspace_id){
   console.log(user_id, workspace_id);
   $.ajax({
       type: "POST",
       url: baseURL+'user/get_channels',
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
 }

 function get_channel_users(channel_id, flag){

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
         display_channel_users(data, channel_id, flag);
       },
       error: function(data) {
         console.log("Error Occurred in the controller");
       }
   });
 }

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
 }

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
 }

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
 }

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
 }

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
 }

 // send an ajax request to fetch the channels for particular user_id and workspace id
  $( "#select_workspace" ).change(function() {
    $(".channel-users-div").html("");
    var workspace_id = Number($(this).val());
    var user_id = $("#user").data("userid");
    var channels = get_channels(user_id, workspace_id);

    $(".make-admin").html('<li class="nav-item text-nowrap"> \
                           <a class="make-admin-button nav-link" href="" \
                           data-toggle="modal" \
                           data-workspaceid='+workspace_id+' \
                           data-target="#exampleModalMemberAdmin"> \
                           Make Admin</a> \
                           </li>');
  }).change();

// send an ajax request to fetch the users for particular channel id
 $(document).on('click', ".channel-div-child", function() {
  var channel_id = $(this).data("channelid");
  get_channel_users(channel_id, 'display_user');
  get_channel_messages(channel_id);

});

// send an ajax request to fetch non members of the workspace to send invites to
$( "#select_workspace_invite_member" ).change(function() {
  var workspace_id = Number($(this).val());
  var non_members = get_nonmembers_workspace(workspace_id);

}).change();

// to delete users from workspace
$( "#select_members" ).change(function() {
  var workspace_id = Number($(this).val());
 var workspace_members = get_members_workspace(workspace_id);

}).change();

$(document).on('click', ".add-delete-a-member", function() {
  var channel_id = $(this).data("channelid");
  console.log(channel_id);
  $(".add-member-to-channel-title").html('Add a member to Channel '+channel_id);
  $(".delete-member-from-channel-title").html('Delete a member from channel '+channel_id);
  get_non_channel_members(channel_id);
  get_channel_users(channel_id, 'display_user_to_delete')


});

$(document).on('click', ".make-admin-button", function() {
 var workspace_id = $(this).data("workspaceid");
 $(".make-admin-modal-header").html('Make Admin for Workspace '+workspace_id);

 get_workspace_members(workspace_id);
});
