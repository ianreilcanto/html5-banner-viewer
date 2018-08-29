<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"><?php echo $title; ?></a> </div>
    <h1><?php echo $title; ?></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <!-- content here -->
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/client/insert_entry" method="post" class="form-horizontal">
              <div class="control-group">
                  <label class="control-label">Name :</label>
                  <div class="controls">
                    <input name="clientName" type="text" class="span9" placeholder="Name" />
                  </div>
              </div>
              <div class="form-actions">
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
<!--end-main-container-part-->