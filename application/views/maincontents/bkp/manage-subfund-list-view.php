<div id="content" class="bg-container">
  <header class="head">
    <div class="main-bar row">
      <div class="col-lg-6 col-md-4 col-sm-4">
        <h4 class="nav_top_align"> <i class="fa fa-th"></i> Manage Subfund </h4>
      </div>
      <div class="col-lg-6 col-md-8 col-sm-8">
        <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
          <li class="breadcrumb-item"> 
          	<a href="<?php echo base_url(); ?>index.php/admin/user"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard </a> </li>
          <li class="breadcrumb-item active"> Manage Subfund</li>
        </ol>
      </div>
    </div>
  </header>
  <div class="outer">
    <div class="inner bg-light lter bg-container">
      <div class="row">
        <div class="col-xs-12 data_tables"> 
          <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
          <div class="card">
            <div class="card-header bg-white"> 
            <?php if($this->session->flashdata('error_message')) { ?>
                  <h5 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h5>
            <?php } ?>
            <?php if($this->session->flashdata('success_message')) { ?>
                  <h5 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h5>
            <?php } ?>
            <a href="<?php echo base_url(); ?>index.php/admin/manage_subfund/add" class="btn btn-primary">Add Subfund</a>
            </div>
            <div class="card-block p-t-25">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Subfund Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->fund_name; ?></td>
                    <td>
                    	<a href="<?php echo base_url(); ?>index.php/admin/manage_subfund/edit/<?php echo $row->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <?php if($row->published==1) { ?>
                        <a href="<?php echo base_url(); ?>index.php/admin/manage_subfund/deactive/<?php echo $row->id; ?>"><i class="fa fa-unlock" aria-hidden="true"></i></a>
                        <?php } ?>
                        <?php if($row->published==0) { ?>
                        <a href="<?php echo base_url(); ?>index.php/admin/manage_subfund/active/<?php echo $row->id; ?>"><i class="fa fa-lock" aria-hidden="true"></i></a>
                        <?php } ?>
                    </td>
                  </tr>
                <?php } } else { ?>
                	<tr>
                    	<td colspan="5" align="center">No records found</td>
                    </tr>
                <?php } ?>  
                </tbody>
              </table>
            </div>
          </div>
          <!-- END EXAMPLE1 TABLE PORTLET-->
        </div>
      </div>
    </div>
    <!-- /.inner --> 
  </div>
  <!-- /.outer --> 
</div>
<!-- /#content -->