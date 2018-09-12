<!--main-container-part-->
<div id="content">
    <div class="container-fluid">
        <div id="view-here" style="margin: 20px auto;"></div>
        <div id="download-btn" style="margin: 20px auto;"></div>
    </div>
	 
</div>
<!--end-main-container-part-->

<!-- Modal -->
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
      </div>
      <div class="modal-body">
            <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $_SESSION["data"]->id; ?>">
                    <div class="control-group">
                            <label class="control-label">Client Name :</label>
                            <div class="controls">
                            <input class="span5" required name="client_name" type="text"  placeholder="Client Name" value="<?php echo isset($_SESSION['data']->name) ? $_SESSION['data']->name : "";  ?>"/>
                            </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">Username:</label>
                            <div class="controls">
                            <input class="span5" required name="username" type="text" placeholder="Username"  value="<?php echo isset($_SESSION['data']->username) ? $_SESSION['data']->username : "";  ?>"/>
                            </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">Password:</label>
                            <div class="controls">
                            <input class="span5" required name="password" type="text" placeholder="Password" value="<?php echo isset($_SESSION['data']->password) ? $_SESSION['data']->password : "";  ?>" />
                            </div>
                    </div>   
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    jQuery(function(){
        jQuery(".banner").click(function(){
           var id =  jQuery(this).attr( "attr-id" );
            console.log(id);

             $.ajax(
		                {
		                    type:"post",
		                    url: "<?php echo base_url(); ?>/banner/getFile",
		                    data:{ banner_id: id },
		                    success:function(response)
		                    {
                                console.log(response);
								var id = response[0];
								var size = response[1].split("x");

		                    	$('#view-here').html("<iframe style='overflow:hidden;' width='"+size[0]+"' height='"+size[1]+"' frameborder='0' src='"+response[2]+"'></iframe>");
                                $('#download-btn').html("<a class='btn btn-success btn-mini' href='/banner/downloadFile/"+id+"'>Download Files</a>");
		                    },
		                    error: function(response) 
		                    {
								console.log(response)
		                        //alert("Invalid!");
		                    }
		                }
		            );
        });    

        jQuery(".save").click(function(){

            var id = $('[name=id]').val();
            var name = $('[name=client_name]').val();
            var username = $('[name=username]').val();
            var password = $('[name=password]').val();


                $.ajax(
		                {
		                    type:"post",
		                    url: "<?php echo base_url(); ?>client/editLogin",
		                    data:{ id: id, name : name, username: username, password: password },
		                    success:function(response)
		                    {
                                console.log(response);
								
		                    },
		                    error: function(response) 
		                    {
								console.log(response)
		                        //alert("Invalid!");
		                    }
		                }
		            );

            $('#settings').modal('toggle');
        });
    });
</script>