<?php
$id = $id->Product_id;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Product Management
        <small>Add / Edit Products</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Product Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url(); ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                        <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="Product_id">Product ID</label>
                                        <input type="text" class="form-control" value="<?php echo ($id + 1); ?>" id="Product_id" name="Product_id" maxlength="128" readonly>
                                    </div>
                                    
                                </div>
                        </div>
                            <div class="row">
                                <!--<div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="Product_id">Product ID</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('Product_id'); ?>" id="Product_id" name="Product_id" maxlength="128">
                                    </div>
                                    
                                </div>-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Product_name">Product Name</label>
                                        <input type="text" class="form-control required" id="Product_name" name="Product_name" value="<?php echo set_value('Product_name'); ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="Category_name">Category Name</label>
                                        <select class="form-control required" id="Category_name" name="Category_name">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($category))
                                            {
                                                foreach ($category as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->Category_name ?>" <?php if($rl->Category_name == set_value('Category_name')) {echo "selected=selected";} ?>><?php echo $rl->Category_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Brand_name">Brand Name</label>
                                        <input type="text" class="form-control required" id="Brand_name" name="Brand_name" maxlength="128"  value="<?php echo set_value('Brand_name'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Product_description">Product Description</label>
                                        <textarea class="form-control" id="Product_description" rows = 4 value="<?php echo set_value('Product_description'); ?>" name="Product_description" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Product_website_link">Product Website Link</label>
                                        <input type="text" class="form-control required" id="Product_website_link" value="<?php echo set_value('Product_website_link'); ?>" name="Product_website_link" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Product_Image">Product Image</label>
                                        <input type="text" class="form-control required" id="Product_Image" name="Product_Image" value="<?php echo set_value('Product_Image'); ?>" maxlength="128">
                                    </div>
                                </div>
                                </div> 
                              <!--  <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Creation_Timestamp">Creation TimeStamp</label>
                                        <input type="datetime-local" class="form-control" id="Creation_Timestamp" value="<?php echo date("m/d/y G.i:s<br>", time()); ?>" name="Creation_Timestamp" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Modification_Timestamp">Modification Time Stamp</label>
                                        <input type="datetime-local" class="form-control" id="Modification_Timestamp" value="<?php echo set_value('Modification_Timestamp'); ?>" name="Modification_Timestamp" maxlength="128">
                                    </div>
                                </div>
                            </div>  -->   
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <button type="reset" class="btn btn-default" value="Reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>