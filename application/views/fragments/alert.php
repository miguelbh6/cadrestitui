<div class="row">
	<div class="col-md-12">
		<?php if ($this->session->flashdata('msg-sucess')) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?=$this->session->flashdata('msg-sucess'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('msg-error')) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?=$this->session->flashdata('msg-error'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
	</div>
</div>