<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-envelope-o position-left"></i> Inbox <span class="text-warning"><?php if($unread>0) { ?>(<?php echo $unread; ?>)<?php } ?></span></h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li class="active">Manage Message</li>
    </ul>
  </div>
</div>

<!-- /page header --> 

<!-- Content area -->
	<div class="content page-email">
		<div class="row">
			<!--<div class="col-md-2">				
				<form action="page_email.htm#">				
					<div class="form-group-xlg has-feedback has-feedback-left">
						<input type="search" class="form-control input-xlg" placeholder="Search emails...">
						<div class="form-control-feedback">
							<i class="fa fa-search text-size-base text-muted"></i>
						</div>
					</div>					
					<button type="button" class="btn btn-primary btn-labeled btn-block mt-20"><b><i class="fa fa-pencil"></i></b> Compose new mail</button>				
				</form>	
				<div class="row mt-20">
					<div class="col-xs-6 pr-5">
						<button class="btn bg-success-700 btn-block btn-float btn-float-lg" type="button"><i class="fa fa-folder-open-o"></i> <span>Inbox</span></button>
						<button class="btn bg-purple-700 btn-block btn-float btn-float-lg" type="button"><i class="fa fa-upload"></i> <span>Sent</span></button>
					</div>
					
					<div class="col-xs-6 pl-5">
						<button class="btn bg-teal-700 btn-block btn-float btn-float-lg" type="button"><i class="fa fa-save"></i> <span>Draft</span></button>
						<button class="btn bg-danger-600 btn-block btn-float btn-float-lg" type="button"><i class="fa fa-trash"></i> <span>Trash</span></button>
					</div>
				</div>
											
			</div>-->
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-body">
						<div class="datepaginator-highlight-selected-date"></div>
						<!--<ul class="pager pager-rounded">
							<li class="previous"><a href="page_email.htm#">← Older</a></li>
							<li class="next"><a href="page_email.htm#">Newer →</a></li>
						</ul>-->
						<?php 
						if($rows) {
						?>
						<div class="" id="emails_list">
							<table class="table table-condensed table-striped table-fixed-layout table-hover" id="emails">
							<thead>
							<tr>
							<!--<th width="5%"></th>
							<th></th>-->
							<th width="15%"></th>
							<th></th>
							<th></th>
							</tr>
							</thead>
							<tbody>
                            <?php
							foreach($rows as $row) {
							?>
							<tr class="">
                            <?php
							$message_id = $row->message_id;
							$unread_count = $this->db->query("select * from td_message_details where message_id='$message_id' and is_read=0")->num_rows();	
							?>
                                <!--<td>
                                <div class="checkbox check-success ">
                                	<a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_discipline/confirmDelete/<?php //echo $row->discipline_id; ?>"><i class="fa fa-trash"></i></a
                                ></div>
                                </td>
                                <td>
                                <div class="star">
                                <?php if($row->is_important==1) { ?>
                                <a href="<?php echo base_url(); ?>admin/manage_message/deactive/<?php echo $row->id; ?>">
                                <input id="checkbox9" type="checkbox" value="1" checked="">
                                <label for="checkbox9"></label>
                                </a>
                                <?php } else { ?>
                                 <a href="<?php echo base_url(); ?>admin/manage_message/active/<?php echo $row->id; ?>">
                                <input id="checkbox9" type="checkbox" value="0">
                                <label for="checkbox9"></label>
                                <?php } ?>
                                </div>
                                </td>-->
                                
                                <td class="clickable" <?php if($unread_count>0) { ?>style="font-weight:800"<?php } ?>>
								<?php 
								$user_id = $row->user_id; 
								$user_detatils = $this->db->query("select * from td_users where id='$user_id'")->row();
								echo $user_detatils->student_name;
								?>
                                <?php
								
								if($unread_count>0) {
								?>
                                (<?php echo $unread_count; ?>)
                                <?php } ?>
                                </td>
                                <td class="clickable"><a href="<?php echo base_url(); ?>admin/manage_message/view/<?php echo $row->main_id; ?>"><span class="muted"  <?php if($unread_count>0) { ?>style="font-weight:800"<?php } ?>><?php echo $row->subject; ?></span></a></td>
                                <td class="clickable"  <?php if($unread_count>0) { ?>style="font-weight:800"<?php } ?>><span class="muted"><?php echo date_format(date_create($row->date), "d-m-Y"); ?> </span></td>
							</tr>
                            <?php } ?>
							</tbody>
							</table>                            
						</div>
                        <?php }  else { ?>
                        No messages are available
                        <?php } ?>
					</div>					
				</div>
			</div>
		</div>

<script type='text/javascript'>
	$(document).ready(function() {	
		/*$('body').addClass('sidebar-xs');*/
		$('.datepaginator-highlight-selected-date').datepaginator({
			itemWidth: 70,
			navItemWidth: 60,
			highlightSelectedDate: true,
			offDays:'',			
		});
		$(function() {
			$('.styled').uniform();
		});
	});
</script>
					<!-- Footer -->
					<div class="footer pt-20">
						<?php echo $footer; ?>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area --> 