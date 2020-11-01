<?php
    $id = $id->Id;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Customer Management
        <small>Add / Edit Brands</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Customer Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addCustomer" action="<?php echo base_url(); ?>User/addNewCustomer" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="Id">Customer ID</label>
                                        <input type="text" class="form-control required" value="<?php echo $id + 1; ?>" id="Id" name="Id" maxlength="128" readonly>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Customer_email">Customer Email</label>
                                        <input type="text" class="form-control required" id="Customer_email" value="<?php echo set_value('Customer_email'); ?>" name="Customer_email" maxlength="128">
                                    </div>
                                </div>
                            </div>
                           <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Register_Timestamp">Register Timestamp</label>
                                        <input type="datetime-local" class="form-control required" id="Register_Timestamp" name="Register_Timestamp" maxlength="128"  value="<?php echo set_value('Register_Timestamp'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Last_login_Timestamp">Last login Timestamp</label>
                                        <input type="datetime-local" class="form-control required" id="Last_login_Timestamp" name="Last_login_Timestamp" value="<?php echo set_value('Last_login_Timestamp'); ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Session_count">Session count</label>
                                        <input type="text" class="form-control required digits" id="Session_count" name="Session_count" maxlength="128"  value="<?php echo set_value('Session_count'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Account_status">Account status</label>
                                        <input type="text" class="form-control required" id="Account_status" name="Account_status" value="<?php echo set_value('Account_status'); ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            
                            </div>
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
<!--<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>-->