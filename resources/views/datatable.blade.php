@extends('Admin.template')
<!DOCTYPE html>
<html>
<head>
	<title>Cara Menggunakan Datatables | Malas Ngoding</title>	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<center>
		<h1>Menampilkan data dengan datatables | Malas Ngoding</h1>
	</center>
	<br/>
	<br/>
	<div class="container">
		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Nama</th>
					<th>Alamat</th>
					<th>Pekerjaan</th>
					<th>Usia</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Malas Ngoding</td>
					<td>Bandung</td>
					<td>Web Developer</td>
					<td>26</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Malas Ngoding</td>
					<td>Bandung</td>
					<td>Web Developer</td>
					<td>26</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
				<tr>				
					<td>Andi</td>
					<td>Jakarta</td>
					<td>Web Designer</td>
					<td>21</td>
					<td>Aktif</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>