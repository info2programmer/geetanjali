<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="fa fa-th-large position-left"></i> Manage Review</h4>
			</div>										
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="active">Manage Review</li>
				<!--<li>Advanced</li>-->
			</ul>					
		</div>
	</div>
	<!-- /page header -->

   
<!-- Content area -->
	<div class="content">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php if($this->session->flashdata('error_message')) { ?>
                  <h5 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h5>
				<?php } ?>
                <?php if($this->session->flashdata('success_message')) { ?>
                      <h5 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h5>
                <?php } ?>
				<!-- Individual column searching (text fields) -->
				<div class="panel panel-flat">
               	 	<!--<div class="panel-heading">
                    	<a href="<?php echo base_url();?>index.php/admin/manage_coupon/add" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="fa fa-hand-o-right"></i></b>Add Coupon</a>												
					</div>-->
					
                    <?php if(empty($rows)) { ?>
					<div class="panel-body">
						<p><code>No records found...</code></p>
					</div>
                    <?php } else { 
					$s=1;
					?>
					<table class="table datatable datatable-column-search-inputs" id="">
						<thead>
							<tr>
								<th>#</th>
                                <th>College Name</th>
                                <th>Name</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th>Status</th>				
								<th class="text-center">Actions</th>
							</tr>
						</thead>                     
						<tbody>
                         <?php foreach($rows as $row) { ?>  
							<tr>
								<td><?php echo $s++; ?></td>
                                <td><?php $college_id = $row->college_id; 
								$product_details = $this->db->query("select * from td_users where id='$college_id'")->row();
								$college_name = $product_details->college_name;
								$college_details = $this->db->query("select * from td_colleges where id='$college_name'")->row();
								echo $college_details->college_name;
								?></td>
                                <td><?php echo $row->name. " (".$row->email.")"; ?></td>
                                <td><?php echo $row->review_content; ?></td>
                                <td><?php echo $row->rating; ?></td>
                                <td><?php echo date_format(date_create($row->review_date), "d-m-Y"); ?></td>
                                <td>
                                <?php if($row->published==1) { ?>
                                <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_review/deactive/<?php echo $row->id; ?>">
                                  <?php } else { ?>
                                  <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_review/active/<?php echo $row->id; ?>">
                                  <?php } ?>
                                  <span class="<?php echo ($row->published==1)?'label label-success':'label label-danger'; ?>"><?php echo ($row->published==1)?'Accepted':'Rejected'; ?></span></a>

                                </td>	
								<td class="text-center">
									<ul class="icons-list">
										
										<li class="dropdown">
											<a href="datatable_advanced.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">												
												<li class="divider"></li>
												<li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_review/confirmDelete/<?php echo $row->id; ?>"><i class="fa fa-trash"></i> Delete</a></li>                                               
                                                
                                
                                
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td>#</td>
                                <td>College Name</td>
                                <td>Name</td>
                                <td>Review</td>
                                <td>Rating</td>
                                <td>Date</td>
                                <td>Status</td>						
								<td></td>
							</tr>
						</tfoot>
					</table>
                    <?php } ?>
				</div>
				<!-- /Individual column searching (text fields) -->
				
				
			</div>										
		</div>
		
<script type='text/javascript'>
	$(document).ready(function() {				
		$(function() {
			
			// DataTable setup			
			$.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				columnDefs: [{ 
					orderable: false,
					width: '100px',
					targets: [ 1 ]
				}],
				dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
				language: {
					search: '<span>Search:</span> _INPUT_',
					lengthMenu: '<span>Show:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
				},
				
				lengthMenu: [ 5, 10, 25, 50 ],
				displayLength: 5,				
				
			});
									
			
			
			// Individual column searching with text inputs
			$('.datatable-column-search-inputs tfoot td').not(':last-child').each(function () {
				var title = $('.datatable-column-search-inputs thead th').eq($(this).index()).text();
				$(this).html('<input type="text" class="form-control input-sm" placeholder="'+title+'" />');
			});
			var table = $('.datatable-column-search-inputs').DataTable();
			table.columns().every( function () {
				var that = this;
				$('input', this.footer()).on('keyup change', function () {
					that.search(this.value).draw();
				});
			});
			
			// Individual column searching with selects
			$('.datatable-column-search-selects').DataTable({
				retrieve: true,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="filter-select" data-placeholder="Filter"><option value=""></option></select>')
							.appendTo($(column.footer()).not(':last-child').empty())							
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
		 
								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							} );
		 
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});
			
			// Single row selection
			var singleSelect = $('.datatable-selection-single').DataTable();
			$('.datatable-selection-single tbody').on('click', 'tr', function() {
				if ($(this).hasClass('success')) {
					$(this).removeClass('success');
				}
				else {
					singleSelect.$('tr.success').removeClass('success');
					$(this).addClass('success');
				}
			});

			// Multiple rows selection
			$('.datatable-selection-multiple').DataTable();
			$('.datatable-selection-multiple tbody').on('click', 'tr', function() {
				$(this).toggleClass('success');
			});

			
			// Add placeholder to the datatable filter option
			$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

			// Enable Select2 select for the length option
			$('.dataTables_length select').select2({
				minimumResultsForSearch: Infinity,
				width: 'auto'
			});

			// Enable Select2 select for individual column searching
			$('.filter-select').select2();
			
			$('.select').select2();
		});			
	});
</script>

<script type='text/javascript'>
	$(document).ready(function() {		
		$(function() {	
		
			

			// Checkboxes/radios (Uniform)
			// ------------------------------
			// Default initialization
			$(".styled, .multiselect-container input").uniform({
				radioClass: 'choice'
			});

			// File input
			$(".file-styled").uniform({
				wrapperClass: 'bg-blue',
				fileButtonHtml: '<i class="fa fa-plus"></i>'
			});

			//
			// Contextual colors
			// Primary
			$(".control-primary").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-primary-600 text-primary-800'
			});

			// Danger
			$(".control-danger").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-danger-600 text-danger-800'
			});

			// Success
			$(".control-success").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-success-600 text-success-800'
			});

			// Warning
			$(".control-warning").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-warning-600 text-warning-800'
			});

			// Info
			$(".control-info").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-info-600 text-info-800'
			});

			// Custom color
			$(".control-custom").uniform({
				radioClass: 'choice',
				wrapperClass: 'border-indigo-600 text-indigo-800'
			});

			// Bootstrap switch
			// ------------------------------
			$(".switch").bootstrapSwitch();
			
			// Switchery
			// ------------------------------
			// Initialize multiple switches
			if (Array.prototype.forEach) {
				var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
				elems.forEach(function(html) {
					var switchery = new Switchery(html);
				});
			}
			else {
				var elems = document.querySelectorAll('.switchery');
				for (var i = 0; i < elems.length; i++) {
					var switchery = new Switchery(elems[i]);
				}
			}

			// Colored switches
			var primary = document.querySelector('.switchery-primary');
			var switchery = new Switchery(primary, { color: '#2196F3' });

			var danger = document.querySelector('.switchery-danger');
			var switchery = new Switchery(danger, { color: '#EF5350' });

			var warning = document.querySelector('.switchery-warning');
			var switchery = new Switchery(warning, { color: '#FF7043' });

			var info = document.querySelector('.switchery-info');
			var switchery = new Switchery(info, { color: '#00BCD4'});
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