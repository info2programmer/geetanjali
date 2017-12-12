<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Forum Sticy</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li class="active">Manage Forum Sticy</li>
      
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
        <?php if(empty($rows)) { ?>
        <div class="panel-body">
          <p><code>No records found...</code></p>
        </div>
        <?php } else { 

					

					?>
        <table class="table datatable datatable-column-search-inputs" id="">
          <thead>
            <tr>
              <th>Sl No.</th>
              <th>Main Category</th>
              <th>Sub Category</th>
              <th>Post Title</th>
              <th>Publish</th>
              <th>Important</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php foreach($rows as $row) { ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php 			  
			  $maincat_id = $row->maincat_id; 
			  $main_details = $this->db->query("select * from td_category where cat_id='$maincat_id'")->row();
			  echo $main_details->cat_name;								  
			  ?></td>
              <td><?php 
			  $subcat_id = $row->subcat_id; 
			  $sub_details = $this->db->query("select * from td_category where cat_id='$subcat_id'")->row();
			  echo $sub_details->cat_name;	
			  ?></td>
              <td><?php echo $row->thread_title; ?></td>
              <td><span class="<?php echo ($row->published==1)?'label label-success':'label label-danger'; ?>"><?php echo ($row->published==1)?'Active':'Inactive'; ?></span></td>
              <td align="center">
              <?php if($row->thread_is_important==1) { ?>
              <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>admin/forum_post_sticky/non_important/<?php echo $row->thread_id; ?>"><i class="fa fa-star" aria-hidden="true"></i></a>
              <?php } else { ?>
              <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>admin/forum_post_sticky/important/<?php echo $row->thread_id; ?>"><i class="fa fa-star-o" aria-hidden="true"></i></a>
              <?php } ?>
              </td>
              <td class="text-center"><ul class="icons-list">
                  
                  <!--<li><a href="datatable_advanced.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>-->
                  
                  <li class="dropdown"> <a href="datatable_advanced.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="divider"></li>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/forum_post_sticky/confirmDelete/<?php echo $row->thread_id; ?>"><i class="fa fa-trash"></i> Delete</a></li>
                      <?php if($row->published==1) { ?>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/forum_post_sticky/deactive/<?php echo $row->thread_id; ?>"><i class="icon icon-cross2"></i> Deactivate</a></li>
                      <?php } else { ?>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/forum_post_sticky/active/<?php echo $row->thread_id; ?>"><i class="icon icon-checkmark3"></i> Activate</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul></td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td>Sl No.</td>
              <td>Main Category</td>
              <td>Sub Category</td>
              <td>Post Title</td>
              <td>Publish</td>
              <td>Important</td>
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
  
  <!-- Footer -->
  
  <div class="footer pt-20"> <?php echo $footer; ?> </div>
  
  <!-- /footer --> 
  
</div>

<!-- /content area --> 