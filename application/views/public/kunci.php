<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Kunci Dong</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery.dataTables.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Hello World</h1>
		<form class="form-horizontal" id="form-kunci">
			<div class="form-group">
				<label for="input-kunci" class="col-sm-2 control-label">Nama Kunci</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="input-kunci" placeholder="Nama Kunci">
				</div>
			</div>
			<div class="form-group">
				<label for="input-status" class="col-sm-2 control-label">Status Kunci</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="input-status" placeholder="Status Kunci">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="button" class="btn btn-default" id="save-kunci"><span class="glyphicon glyphicon-send"></span> Add Kunci</button>
				</div>
			</div>
		</form>
		<table class="table table-striped table-bordered" id="data-table">
			<thead>
				<th>No</th>
				<th>Nama Kunci</th>
				<th>Status Kunci</th>
				<th>Aksi</th>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery-2.2.3.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript">
	var table = $('#data-table').DataTable({
		"data": null,
          // Load data for the table's content from an Ajax source
          "ajax": {
          	"url": "http://localhost/pinjamkunci/kunci/getkunci",
          	"type": "GET"
          },
      });

	$('#save-kunci').on('click', function() {
		var AddKunci = {};
		AddKunci.kunci = $('#input-kunci').val();
		AddKunci.stat = $('#input-status').val();
		$.ajax({
			url:'http://localhost/pinjamkunci/kunci/addkunci',
			data:AddKunci,
			type:'POST',
			dataType:'json',
			success: function(dt) {
				alert('Sukses');
				table.ajax.reload();
				$('#form-kunci').find('input:text').val('');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
			}
		});
	});
  </script>
  </html>