<div class="app-content container-fluid">
	<div class="row dashboard-row">
		<div class="col-md-12" >
			<h1 class="pl-3 pl-md-0 mb-3 py-2">
				Add Artist
			</h1>
			<div class="card">
				<div class="card-body card-pwd">
					<?php $this->load->view('message_view');?>
					<form method="post" action="" id="forgotPass" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h3>Add New Artist</h3>
								<hr>
								<div class="form-group">
									<label>Artist Name</label>
									<input type="text" name="name" class="form-control" placeholder="Artis Name">
								</div>
								<div class="form-group">
									<button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

