<h2>Daftar Barang di <?php echo $gudang->Nama_Gudang ?></h2>
<table class="ezy-table" id="table-gudang">
	<thead>
		<tr>
			<td>Kode Barang</td>
			<td>Nama Barang</td>
			<td>No Part.</td>
			<td>Jenis Barang</td>
			<td>Stok</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($daftar_barang as $row) { ?>
		<tr>
			<td><?php echo $row->Kode_Barang ?></td>
			<td><?php echo $row->Nama_Barang ?></td>
			<td><?php echo $row->No_Part ?></td>
			<td><?php echo $row->Nama_Jenis ?></td>
			<td><?php echo $row->stok; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>