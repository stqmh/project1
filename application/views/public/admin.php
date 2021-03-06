<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Kunci Dong</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery.dataTables.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>">
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Brand</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#">Admin</a></li>
						<li><a href="user">User</a></li>
						<li><a href="kunci">Kunci</a></li>
						<li><a href="pinjam">Peminjaman</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<div class="container">		
		<div class="button-header">
			<h1 class="text-center">Hello Admin</h1>
			<button type="button" data-toggle="modal" id="add-admin" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Admin</button>
		</div>
		<table class="table table-striped table-bordered" id="data-table">
			<thead>
				<th>No</th>
				<th>Nama Admin</th>
				<th>Username</th>
				<th>Aksi</th>
			</thead>
			<tbody></tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Data Admin</h4>
				</div>
				<div class="modal-body">
					<form id="form-add">
						<input type="text" hidden="true" id="operasi">
						<input type="text" hidden="true" id="idadmin">
						<div class="form-group">
							<label for="input-username">Username</label>
							<input type="text" class="form-control" id="input-username" name="" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="input-password">Password</label>
							<input type="password" class="form-control" id="input-password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="input-nama">Nama Lengkap</label>
							<input type="text" id="input-nama" placeholder="Nama Lengkap" class="form-control">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="button-add">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Data</h4>
				</div>
				<div class="modal-body">
					<form><input id="iddelete" hidden="true" type="text"></form>
					<p>Are you sure to delete ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" id="button-delete">Yes, Delete</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery-2.2.3.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript">
	var table = $('#data-table').DataTable({
		"data": null,
		"ajax": {
			"url": "http://localhost/pinjamkunciku/admin/getadmin",
			"type": "GET"
		},
	});


	$('#button-add').on('click', function(e) {
		e.preventDefault();
		var operasi = $('#operasi').val();
		var idadmin = $('#idadmin').val();

		var AddAdmin = {};
		AddAdmin.username = $('#input-username').val();
		AddAdmin.password = $('#input-password').val();
		AddAdmin.nama_admin = $('#input-nama').val();

		if (operasi == 'update') {
			$.ajax({
				url: 'http://localhost/pinjamkunciku/admin/updateadmin?id=' + idadmin,
				data: AddAdmin,
				type: 'POST',
				dataType: 'json',
				success: function(dt) {
					$('#form-add').find('input:text,input:password').val('');
					$('#myModal').modal('hide');
					alert('Admin Diperbarui');
					table.ajax.reload();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(jqXHR.status);
				}
			});
		} else {
			$.ajax({
				url: 'http://localhost/pinjamkunciku/admin/addadmin',
				data: AddAdmin,
				type: 'POST',
				dataType: 'json',
				success: function(dt) {
					$('#form-add').find('input:text,input:password').val('');
					$('#myModal').modal('hide');
					alert('Admin Ditambahkan');
					table.ajax.reload();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(jqXHR.status);
				}
			});
		}
	});

	$('#add-admin').on('click', function() {
		$('#operasi').val('add');
		$('#form-add').find('input:text,input:password').val('');
		$('#myModal').modal('show');
	});

	function EditAdmin(id) {
		$.ajax({
			url: 'http://localhost/pinjamkunciku/admin/getadminid?id='+id,
			type: 'GET',
			dataType: 'json',
			success: function(dt) {
				$('#input-username').val(dt[0].username);
				$('#input-password').val(dt[0].password);
				$('#input-nama').val(dt[0].nama_admin);
				$('#idadmin').val(dt[0].id);
				$('#operasi').val('update');
				$('#myModal').modal('show');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
			}
		});
	}

	$('#button-delete').on('click', function() {
		id = $('#iddelete').val();
		$.ajax({
			url: 'http://localhost/pinjamkunciku/admin/deleteadmin?id='+id,
			type: 'GET',
			dataType: 'json',
			success: function(dt) {
				$('#modal-delete').modal('hide');
				alert('Data Berhasil Dihapus');
				table.ajax.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
			}
		});
	});

	function DeleteAdmin(id) {
		$('#modal-delete').modal('show');
		$('#iddelete').val(id);
	}
</script>
</html>