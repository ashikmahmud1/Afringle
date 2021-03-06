<?php $this->load->view('inc/header'); ?>
<link href="<?=base_url('assets')?>/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="<?=base_url('assets')?>/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
</head>
<body>

<!-- Page container -->
<div class="page-container">

	<!-- Page Sidebar -->
<?php $this->load->view('inc/sidebar'); ?>
  <!-- /page sidebar -->

  <!-- Main container -->
  <div class="main-container">

	<!-- Main header -->
	<?php $this->load->view('inc/topnav'); ?>
	<!-- /main header -->

	<!-- Main content -->
  <!-- Main content -->
  <div class="main-content">
     <h1 class="page-title">Coupon List</h1>
     <p style="color: green;"><?=$this->session->flashdata('message');?></p>
     <!-- Breadcrumb -->

     <div class="row">
       <div class="col-lg-12">
         <div class="panel panel-default">

           <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover dataTables-example" >
                 <thead>
                   <tr>
                     <th>Coupon Type</th>
                     <th>Coupon Discount</th>
                     <th>Coupon Code</th>
                     <th>Coupon End</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php if(!empty($ListData)){
                      foreach($ListData as $list):
                      ?>
                           <tr role="row" class="odd">
                               <td><?=$list['type'];?></td>
                               <td><?=$list['discount'];?></td>
                               <td><?=$list['code'];?></td>
                               <td><?=$list['end_date'];?></td>
                               <td style="text-align: center;">

                               <a  href="<?=base_url('coupon/edit-coupon?id='.$list['coupon_code_id']);?>"><i class="ui-tooltip fa fa-pencil info" style="font-size: 22px;margin-right: 15px;color: #3f51b5;" data-original-title="Edit"></i></a>
                               <a  onclick="return confirm('Are you sure remove this? #<?=$list['code']?>')" href="<?=base_url('coupon/delete-coupon?id='.$list['coupon_code_id']);?>"><i class="ui-tooltip fa fa-trash-o" style="margin-right: 14px;color: red;font-size: 22px;" data-original-title="Delete"></i></a>
                               </td>
                           </tr>
                    <?php endforeach; } ?>
                 </tbody>
                 <tfoot>
                   <tr>
                     <th>Coupon Type</th>
                     <th>Coupon Discount</th>
                     <th>Coupon Code</th>
                     <th>Coupon End</th>
                     <th>Action</th>
                   </tr>
                 </tfoot>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>



   </div>
   <!-- /main content -->

		<!-- Footer -->

		<!-- /footer -->

	  </div>
	  <!-- /main content -->

  </div>
  <!-- /main container -->

</div>
<!-- /page container -->


<?php $this->load->view('inc/footer'); ?>

<script src="<?=base_url('assets')?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/jszip.min.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/pdfmake.min.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/vfs_fonts.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
<script>
	$(document).ready(function () {
		$('.dataTables-example').DataTable({
			dom: '<"html5buttons" B>lTfgitp',
			buttons: [
				{
					extend: 'copyHtml5',
					exportOptions: {
						columns: [ 0, ':visible' ]
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4 ]
					}
				},
				'colvis'
			]
		});
	});
</script>
</body>

</html>
