<form class="ezy-form" id="form-add-mutasi">
	<h3>Tambah Mutasi</h3>
	<div class="ezy-input">
		<label>Barang</label>
		<select id="kode_barang" name="kode_barang">
			<option value="">Mohon pilih barang...</option>
		</select>
	</div>
	<div class="ezy-input">
		<label>Gudang</label>
		<select id="kode_gudang" name="kode_gudang">
			<option value="">Mohon pilih gudang...</option>
		</select>
	</div>
	<div class="ezy-input">
		<label>Jenis Mutasi</label>
		<select id="jenis_mutasi" name="jenis_mutasi">
			<option value="">Mohon pilih jenis mutasi...</option>
			<option value="debit">Barang Masuk</option>
			<option value="kredit">Barang Keluar</option>
		</select>
	</div>
	<div class="ezy-input">
		<label>Kuantitas (Qty)</label>
		<input type="text" name="kuantitas" id="kuantitas" value="" placeholder="Masukkan Kuantitas Barang..." />
	</div>
	<div class="ezy-input">
		<label>Keterangan</label>
		<textarea name="keterangan" id="keterangan" rows="5" cols="30"></textarea>
	</div>
	<input type="hidden" id="form_status" value="add"/>
	<input  id="btn-submit-add-barang" class="ezy-input" type="submit" value="Tambah Mutasi" />
	<a id="btn-cancel-add-mutasi" href="javascript:void(0);" onclick="changeFormStatus();" class="ezy-input">Batal</a>
</form>

<table class="ezy-table" id="table-gudang">
	<thead>
		<tr>
			<td>Kode Gudang</td>
			<td>Nama Gudang</td>
			<td>Mode</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($daftar_gudang as $row) { ?>
		<tr>
			<td><?php echo $row->Kode_Gudang ?></td>
			<td id="nama-gudang-<?php echo $row->Kode_Gudang ?>"><?php echo $row->Nama_Gudang ?></td>
			<td>
				<a href="<?php echo site_url("/warehouse/detail/".$row->Kode_Gudang);?>" >Lihat Barang</a> | 
				<a href="<?php echo site_url("/warehouse/history/".$row->Kode_Gudang);?>" >Lihat History Mutasi</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>