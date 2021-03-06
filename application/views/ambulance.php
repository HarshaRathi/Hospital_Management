<?php
    $this->load->helper('directory'); //load directory helper
    $dir = "images/"; // Your Path to folder
    $map = directory_map($dir); 
?>
<?php
$role = $this->session->userdata('email');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Ambulance Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
                
                <div class="col-md-4" style = "margin-top:20px;">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable" style = "width:1200px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?> 
                    <div class="box-body table-responsive no-padding">
                 </div>                   
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
            </div>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>User/addamb"> <i class="fa fa-plus"></i> Add New</a>
                     <!--<input type="text" id="txtCol" /><input type="button" value="Hide" onclick="hideCol();" />-->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ambulance List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>User/ambulance" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 100px;height:30px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="tblMain" style="cursor: pointer;">
                    <tr>
                        <th>Ambulance No.</th>
                        <th id="CN_col_head">Capacity</th>
                         <?php
				if ($role == "admin.hospital@gmail.com"){

			?>

                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                        <?php } ?>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->Am_no ?></td>
                        <td class="CN_col"><?php echo $record->Capacity?></td>
                        <?php
				if ($role == "admin.hospital@gmail.com"){

			?>

                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'User/editamb/'.$record->Am_no; ?>" title="Edit"><i class="fa fa-pencil"></i></a></td>
                            <td class="text-center">   <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url().'User/deleteAmbulance/'.$record->Am_no; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script>
$('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url: "<?php echo base_url();?>import/uploadData",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData:false,
        success:function(){
            redirect("User/ambulance");
        }
    })
});
</script>
<script type="text/javascript">
function hide_show_table(col_name)
{
 var checkbox_val=document.getElementById(col_name).value;
 if(checkbox_val=="hide")
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="none";
  }
  document.getElementById(col_name+"_head").style.display="none";
  document.getElementById(col_name).value="show";
 }
	
 else
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="table-cell";
  }
  document.getElementById(col_name+"_head").style.display="table-cell";
  document.getElementById(col_name).value="hide";
 }
}
</script>
