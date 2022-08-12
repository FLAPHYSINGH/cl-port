<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card overflow-hidden">
				<div class="card-body">
					<div class="">
						<div class="d-flex justify-content-between">
							<h4 class="card-title mg-b-10">Song Details</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<?php $this->load->view('message_view');?>
					<div class="table-responsive market-values">
						<div class="card-header">
							<div class="row">
								<div class="col-md-4 col-12">
									<h4 class="card-title"> Cases </h4>
								</div>
								<div class="col-2 text-right">
									<a href="<?php echo WEB_URL; ?>billing/downloadAllReport" class="btn btn-sm btn-success"><i class="ti-import"></i></a>
								</div>
								<div class="col-2 text-right">
									<a href="<?php echo WEB_URL; ?>billing/addnewArtist" class="btn btn-sm btn-info"><i class="ti-plus"></i>Add Artist</a>
								</div>
								<div class="col-2 text-right">
									<a href="<?php echo WEB_URL; ?>billing/addAlbum" class="btn btn-sm btn-info"><i class="ti-plus"></i>Add Album</a>
								</div>
								<div class="col-2 text-right">
									<a href="<?php echo WEB_URL; ?>billing/addSong" class="btn btn-sm btn-info"><i class="ti-plus"></i>Add Song</a>
								</div>
							</div>
						</div>
						<table  id="datatable"  class="table table-bordered table-hover table-striped">
							<colgroup>
								<col width="30%">
								<col width="30%">
								<col width="20%">
								<col width="20%">
							</colgroup>
							<thead>
							<tr>
								<th>Song Name</th>
								<th>Album Name</th>
								<th>Artist Name</th>
								<th>Year</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if(!empty($result)){
								foreach($result as $val){?>
									<tr class="border-bottom">
										<td><?=$val['song_name'];?></td>
										<td class="text-right"><?=$val['album_name'];?></td>
										<td class="text-right"><?=$val['artist_name'];?></td>
										<td class="text-right"><?=$val['song_year'];?></td>
									</tr>
									<?php
								}
							} else{
								echo "No Data";
							}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		var table = $('#datatable').DataTable({
			"pageLength": 10,
			"lengthChange": true,
			"processing": true,
			"bPaginate": true,
			"searching": true,
			"ordering": true
		});

	});

</script>


