<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Subscription</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li class="active">Manage Subscription</li>
      
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
        <div class="panel-heading"> <a href="<?php echo base_url();?>index.php/admin/manage_subscribe/add" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="fa fa-hand-o-right"></i></b>Send subscription mail to subscribers</a> </div>
        
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