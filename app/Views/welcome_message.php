<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas PHP</title>
	<!-- CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column h-100">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container">
				<a class="navbar-brand mx-auto" href="<?php echo base_url(); ?>">
					<img src="assets/img/logo.png" alt=""/>
				</a>
			</div>
		</nav>
	</header>
	<main role="main" class="flex-shrink-0">
		<div class="container">
			<form action="<?php echo base_url(); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Nama</label>
					<input type="text" class="<?php echo $validation->hasError('name') ? 'form-control is-invalid' : 'form-control'; ?>" id="name" name="name" placeholder="Masukkan Nama Anda" aria-describedby="nameinvalidfeedback" value="<?php echo $userdata['user_name']; ?>"/>
					<?php if ($validation->hasError('name')) : ?>
					<div id="nameinvalidfeedback" class="invalid-feedback">
						<?php echo $validation->getError('name'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="gender">Jenis Kelamin</label>
					<select class="<?php echo $validation->hasError('gender') ? 'form-control is-invalid' : 'form-control'; ?>" id="gender" name="gender" aria-describedby="genderinvalidfeedback">
						<option value="Tidak Memilih" <?php echo !$userdata['user_gender'] ? 'selected' : ''; ?>>Pilih Jenis Kelamin</option>
						<option value="Laki - laki" <?php echo $userdata['user_gender'] === 'Laki - laki' ? 'selected' : ''; ?>>Laki - laki</option>
						<option value="Perempuan" <?php echo $userdata['user_gender'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
					</select>
					<?php if ($validation->hasError('gender')) : ?>
					<div id="genderinvalidfeedback" class="invalid-feedback">
						<?php echo $validation->getError('gender'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="phone">No. HP</label>
					<input type="number" class="<?php echo $validation->hasError('phone') ? 'form-control is-invalid' : 'form-control'; ?>" id="phone" name="phone" placeholder="Masukkan Nomor HP Anda" aria-describedby="phoneinvalidfeedback" value="<?php echo $userdata['user_phone']; ?>"/>
					<?php if ($validation->hasError('phone')) : ?>
					<div id="phoneinvalidfeedback" class="invalid-feedback">
						<?php echo $validation->getError('phone'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="address">Alamat</label>
					<textarea class="<?php echo $validation->hasError('address') ? 'form-control is-invalid' : 'form-control'; ?>" id="address" name="address" rows="3" placeholder="Masukkan Alamat Anda" aria-describedby="addressinvalidfeedback"><?php echo $userdata['user_address']; ?></textarea>
					<?php if ($validation->hasError('address')) : ?>
					<div id="addressinvalidfeedback" class="invalid-feedback">
						<?php echo $validation->getError('address'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="photo">Foto</label>
					<input type="file" class="<?php echo $validation->hasError('photo') ? 'form-control-file is-invalid' : 'form-control-file'; ?>" id="photo" name="photo" aria-describedby="photoinvalidfeedback"/>
					<?php if ($validation->hasError('photo')) : ?>
					<div id="photoinvalidfeedback" class="invalid-feedback">
						<?php echo $validation->getError('photo'); ?>
					</div>
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</main>
	<section>
		<div class="container">
			<div class="table-responsive">
				<table class="table table-hover text-nowrap">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">No. HP</th>
							<th scope="col">Alamat</th>
							<th scope="col">Foto</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($users) === 0) : ?>
						<tr>
							<td colspan="6" class="text-center">Data Empty.</td>
						</tr>
						<?php else : ?>
						<?php $i = 1; ?>
						<?php foreach ($users as $row) : ?>
						<tr>
							<th scope="row" class="align-middle"><?php echo $i; $i++; ?></th>
							<td class="align-middle"><?php echo $row->user_name; ?></td>
							<td class="align-middle"><?php echo $row->user_gender; ?></td>
							<td class="align-middle"><?php echo $row->user_phone; ?></td>
							<td class="align-middle text-wrap"><?php echo $row->user_address; ?></td>
							<td>
								<img src="img/users/<?php echo $row->user_photo; ?>" alt="" class="photo"/>
							</td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<footer class="footer mt-auto py-3 bg-light">
		<div class="container">
			<span>&copy; 2020. Ahmad Auzan Varian S 14117007</span>
		</div>
	</footer>
	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>