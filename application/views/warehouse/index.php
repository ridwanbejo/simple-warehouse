<form class="ezy-form" id="form-add-barang">
	<h3>Tambah Barang</h3>
	<div class="ezy-input">
		<label>Kode Barang</label>
		<input type="text" name="kode_barang" id="kode_barang" value="" placeholder="Masukkan Kode Barang..." />
	</div>
	<div class="ezy-input">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" id="nama_barang" value="" placeholder="Masukkan Nama Barang..." />
	</div>
	<div class="ezy-input">
		<label>Jenis</label>
		<select id="jenis_barang" name="jenis_barang">
			<option value="">Mohon pilih jenis barang...</option>
		</select>
	</div>
	<div class="ezy-input">
		<label>No. Part</label>
		<input type="text" name="no_part" id="no_part" value="" placeholder="Masukkan Kode Part..." />
	</div>
	<input type="hidden" id="form_status" value="add"/>
	<input  id="btn-submit-add-barang" class="ezy-input" type="submit" value="Tambah Barang" />
	<a id="btn-cancel-add-barang" href="javascript:void(0);" onclick="changeFormStatus();" class="ezy-input">Batal</a>
</form>

<table class="ezy-table" id="table-barang">
	<thead>
		<tr>
			<td>Kode Barang</td>
			<td>Nama Barang</td>
			<td>No. Part.</td>
			<td>Jenis Barang</td>
			<td>Mode</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($daftar_barang as $row) { ?>
		<tr>
			<td><?php echo $row->Kode_Barang ?></td>
			<td id="nama-barang-<?php echo $row->Kode_Barang ?>"><?php echo $row->Nama_Barang ?></td>
			<td id="no-part-<?php echo $row->Kode_Barang ?>"><?php echo $row->No_Part ?></td>
			<td><?php echo $row->Nama_Jenis ?></td>
			<td>
				<a href="javascript:void(0);" onclick="setEditBarang('<?php echo $row->Kode_Barang; ?>');">Edit</a> | 
				<a id="delete-barang-<?php echo $row->Kode_Barang; ?>" href="javascript:void(0);" onclick="deleteBarang('<?php echo $row->Kode_Barang ?>');">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>