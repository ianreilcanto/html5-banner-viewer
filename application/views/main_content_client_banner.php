<!--main-container-part-->
<div id="content">
	 <div id="content-header">
	    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"><?php echo $title; ?></a> <button href="" class="btn-danger pull-right remove-client" data-client_id="<?php echo $clientId ?>" style="color: #fff;margin-right: 20px">Remove Client </button></div>
	    <h1><?php echo $title; ?></h1>

	  </div>
		 <div class="container-fluid">
		    <hr>
		<div class="widget-box">
	        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
	          <h5>Add-Banner</h5>
	        </div>
	        <div class="widget-content nopadding">
		          <form enctype="multipart/form-data" action="<?php echo base_url(); ?>client/do_upload" method="post" class="form-horizontal">
		          		<input type="hidden" name="clientName" value="<?php echo $clientName; ?>">
		          		<input type="hidden" name="clientId" value="<?php echo $clientId ?>">
			            <div class="control-group">
				              <label class="control-label">Banner Name :</label>
				              <div class="controls">
				                <input required name="banner_name" type="text" class="span9" placeholder="Banner name" />
				              </div>
			            </div>
			            <div class="control-group">
				              <label class="control-label">Banner Size :</label>
				              <div class="controls">
				                <input required name="banner_size" type="text" class="span9" placeholder="(WxH) Banner Size" />
				              </div>
			            </div>
			            <div class="control-group">
				              <label class="control-label">Html File</label>
				              <div class="controls">
				                <input type="file" name="html_file" />
				              </div>
			            </div>
			             <div class="control-group">
				              <label class="control-label">Js File</label>
				              <div class="controls">
				                <input type="file" name="js_file" />
				              </div>
			            </div>
			            <div class="form-actions">
			             	 <button type="submit" class="btn btn-success">Save</button>
			            </div>
		          </form>
	        </div>
      </div>
       <hr>
       	<div class="banner-view" id="view-here">
       		
       	</div>
       <hr>
       	<div class="widget-box">
	          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
	            <h5>Available Banner</h5>
	          </div>
	          <div class="widget-content nopadding">
		            <table class="table table-bordered table-striped">
			              <thead>
				                <tr>
				                 <th>Banner Name</th>
				                 <th>Remove</th>
				             	 <th>Preview</th>
				             	 <th>Client Link</th>
				                </tr>
			              </thead>
			              <tbody>
				                <?php 
				                	$cnt = 0;
				                foreach ($banners as $key => $banner) { 
				                	$cnt++;
				                 ?>
				                	<tr class="<?php echo $cnt % 2 == 0 ? "even" : "odd" ?>">
					                  <td><?php echo $banner->name; ?></td>
					                  <td><button class="btn-danger remove" data-banner_id="<?php echo $banner->id; ?>">Remove</button></td>
					                  <td> <button class="btn-primary preview" data-banner_id="<?php echo $banner->id; ?>">Preview</button> </td>
					                  <td><a target="_bank" href="<?php echo base_url()."banner/view/".$clientName."/".$banner->id; ?>"><?php echo base_url()."banner/view/".$clientName."/".$banner->id; ?></a></td>
					                </tr>
				             	 <?php  

				             			} 

				             	 ?>

			              </tbody>
		            </table>
	          </div>
        </div>
       <hr>
       <script>
		    $(function(){
		        $( ".preview" ).click(function(event)
		        {
		          
		          var id = $(this).data("banner_id");


		            $.ajax(
		                {
		                    type:"post",
		                    url: "<?php echo base_url(); ?>/banner/getFile",
		                    data:{ banner_id: id },
		                    success:function(response)
		                    {
								console.log(response)
								var id = response[0];
								var size = response[1].split("x");

		                    	$('#view-here').html("<iframe style='overflow:hidden;' width='"+size[0]+"' height='"+size[1]+"' frameborder='0' src='<?php echo base_url(); ?>/banner/iframe/"+ id +"'></iframe>");
		                    },
		                    error: function() 
		                    {
		                        alert("Invalide!");
		                    }
		                }
		            );
		        });

		        $( ".remove" ).click(function(event)
		        {
		          
		          var id = $(this).data("banner_id");


		            $.ajax(
		                {
		                    type:"post",
		                    url: "<?php echo base_url(); ?>/banner/remove",
		                    data:{ banner_id: id },
		                    success:function(response)
		                    {
		                    	 window.location.reload();
		                    },
		                    error: function() 
		                    {
		                        alert("Invalid!");
		                    }
		                }
		            );
		        });

		          $( ".remove-client" ).click(function(event)
		        {
		          
		          var id = $(this).data("client_id");


		            $.ajax(
		                {
		                    type:"post",
		                    url: "<?php echo base_url(); ?>/client/remove",
		                    data:{ client_id: id },
		                    success:function(response)
		                    {
		                    	 window.location.replace(response);
		                    },
		                    error: function() 
		                    {
		                        alert("Invalid!");
		                    }
		                }
		            );
		        });
		    });
		</script>
		</div>
	 </div>
</div>
<!--end-main-container-part-->