<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Header Ad</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li class="active">Manage Header Ad</li>
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
        <div class="panel-heading"> <a href="<?php echo base_url();?>index.php/admin/manage_ads/header_ad_add" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="fa fa-hand-o-right"></i></b>Add Header Ad</a> </div>
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
              <th>Sl No.</th>
              <th>Publish</th>
              <th>Ad Slot Name</th>
              <th>Ad File</th>
              <th>Ad Rank</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($rows as $row) { ?>
            <tr>
              <td><?php echo $s++; ?></td>
              <td><span class="<?php echo ($row->published==1)?'label label-success':'label label-danger'; ?>"><?php echo ($row->published==1)?'Active':'Inactive'; ?></span></td>
              <td><?php echo str_replace("_"," ",$row->slot_name); ?></td>
              <td>
              <img src="<?php echo base_url(); ?>uploads/header_ad/<?php echo $row->filename; ?>" width="250" height="70" />
              </td>
              <td><p><?php $existing_rank = $row->rank; ?>
                            <select name="rank" class="rank">
							<?php 	
									$slot_name = $row->slot_name;										
									$ranks = $this->db->query("select rank from td_header_ad WHERE slot_name='$slot_name'")->result();
									foreach($ranks as $r) { ?>
									<option value="<?php echo $r->rank; ?>/<?php echo $row->header_ad_id; ?>/<?php echo $row->rank; ?>" <?php if($existing_rank==$r->rank) { ?>selected="selected"<?php } ?>><?php echo $r->rank; ?></option>
                            <?php } ?>    
                    		</select></p>
              </td>
              <td class="text-center"><ul class="icons-list">
                  <!--<li><a href="datatable_advanced.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>-->
                  
                  <li class="dropdown"> <a href="datatable_advanced.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a target="_blank" href="<?php echo base_url(); ?>uploads/header_ad/<?php echo $row->filename; ?>"><i class="fa fa-download"></i> Download</a></li>
                      <!--<li><a href="datatable_advanced.htm#"><i class="fa fa-print"></i> Print</a></li>-->
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url(); ?>index.php/admin/manage_ads/header_ad_edit/<?php echo $row->header_ad_id; ?>"><i class="fa fa-edit"></i> Edit</a></li>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_ads/header_ad_confirmDelete/<?php echo $row->header_ad_id; ?>"><i class="fa fa-trash"></i> Delete</a></li>
                      <?php if($row->published==1) { ?>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_ads/header_ad_deactive/<?php echo $row->header_ad_id; ?>"><i class="icon icon-cross2"></i> Deactivate</a></li>
                      <?php } else { ?>
                      <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>index.php/admin/manage_ads/header_ad_active/<?php echo $row->header_ad_id; ?>"><i class="icon icon-checkmark3"></i> Activate</a></li>
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
              <td>Publish</td>
              <td>Ad Slot Name</td>
              <td>Ad File</td>
              <td>Ad Rank</td>
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

<script>
$(document).ready(function() {
	currurl = window.location.href;
	newurl = currurl.split('manage_ads')[0];
	//alert(newurl+"manage_image_category/area_view");
	$('.rank').on('change',function() {
		z = $(this).val();
		//alert(z);
		$.ajax({
				type: "POST",
				url: newurl+"manage_ads/ajax_rank_header",
				async: false,
				data: {valu:z},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
						location.reload();
                        //$('#city_id').html(data);
				}
			})	
	});
});
</script>
  <!-- Footer -->
  <div class="footer pt-20"> <?php echo $footer; ?> </div>
  <!-- /footer -->
</div>
<!-- /content area -->
