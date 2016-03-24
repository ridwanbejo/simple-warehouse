var base_url = $('#base_url').val();
	
$(function(){

	getJenisBarang();

	$('#form-add-barang').submit(function(e){
		e.preventDefault();
		console.log('add barang');
		console.log($(this).serialize());
		
		var post_data = $(this).serialize();
		var form_status = $('#form_status').val();
		var url = "";

		if (form_status == 'add')
		{
			url = base_url+'/barang/ajax_add_barang';
		}
		else
		{
			url = base_url+'/barang/ajax_edit_barang';
		}

		$.ajax({
			url: url,
			type: 'POST',
			data: post_data,
			success: function(res){
				if (res.status == 200)
				{
					if (form_status == 'add')
					{
						var forms = document.getElementById('form-add-barang');
						forms.reset();
						var barang = res.data;
						var elem = "<tr>"+
										"<td>"+barang.Kode_Barang+"</td>"+
										"<td>"+barang.Nama_Barang+"</td>"+
										"<td>"+barang.master_jenis_Kode_Jenis+"</td>"+
										"<td>"+barang.No_Part+"</td>"+
										"<td>"+
											"<a href='javascript:void(0);' onclick='setEditBarang(\'"+barang.Kode_Barang+"\');'>Edit</a> |"+ 
											"<a id='delete-barang-"+barang.Kode_Barang+"' href='javascript:void(0);' onclick='deleteBarang(\'"+barang.Kode_Barang+"\');'>Delete</a>"+
										"</td>"+
									"</tr>";
						$('#table-barang tbody').append(elem);
						alert(res.message);
					}
					else
					{
						var barang = res.data;
						console.log(barang);
						var forms = document.getElementById('form-add-barang');
						forms.reset();
						$('#btn-submit-add-barang').val('Tambah Barang');
						$('#nama-barang-'+barang.Kode_Barang).html(barang.Nama_Barang);
						$('#no-part-'+barang.Kode_Barang).html(barang.No_Part);
						$('#form_status').val('add');
					}
				}
				else
				{
					alert(res.message);
				}
			}
		});
	});

	function getJenisBarang()
	{
		$.ajax({
			url: base_url+'/barang/ajax_jenis_barang',
			success: function(res){
				var elem = ""
				if (res.length > 0 )
				{
					for (var i = 0; i < res.length; i ++)
					{
						elem += "<option value='"+res[i].Kode_Jenis+"'>"+res[i].Nama_Jenis+"</option>";
					}
				}
				else
				{
					elem = "<option value=''>Tidak ada pilihan</option>";
				}
			
				$('#jenis_barang').html(elem);
			}
		});
	}
});

function deleteBarang(kode)
{
	$.ajax({
		url: base_url+'/barang/ajax_delete_barang',
		type: 'POST',
		data: 'kode_barang='+kode,
		success: function(res){
			if (res.status == 200)
			{
				alert(res.message);
				$('#delete-barang-'+kode).parent().parent().remove();
			}
			else
			{
				alert(res.message);
			}
		}
	});
}

function setEditBarang(kode)
{
	$.ajax({
		url: base_url+'/barang/ajax_get_barang',
		type: 'POST',
		data: 'kode_barang='+kode,
		success: function(res){
			if (res.status == 200)
			{
				var barang = res.data;
				$('#kode_barang').val(barang.Kode_Barang);
				$('#nama_barang').val(barang.Nama_Barang);
				$('#no_part').val(barang.No_Part);
				$('#form_status').val('edit');
				$('#btn-submit-add-barang').val('Ubah Barang');
				$('#btn-cancel-add-barang').fadeIn();
			}
			else
			{
				alert(res.message);
			}
		}
	});
}

function changeFormStatus()
{
	var form_status = $('#form_status').val();
	console.log(form_status);
	if (form_status == 'edit')
	{
		var forms = document.getElementById('form-add-barang');
		forms.reset();		
		$('#form_status').val('add');
		$('#btn-submit-add-barang').val('Tambah Barang');
	}
	else
	{
		var forms = document.getElementById('form-add-barang');
		forms.reset();		
	}
}