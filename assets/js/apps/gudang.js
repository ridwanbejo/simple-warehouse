var base_url = $('#base_url').val();
	
$(function(){

	getBarang();
	getGudang();

	$('#form-add-mutasi').submit(function(e){
		e.preventDefault();
		console.log('add mutasi');
		console.log($(this).serialize());
		
		var post_data = $(this).serialize();
		var form_status = $('#form_status').val();
		var url = base_url+'/mutasi/ajax_add_mutasi';

		$.ajax({
			url: url,
			type: 'POST',
			data: post_data,
			success: function(res){
				if (res.status == 200)
				{
					alert(res.message);
					var forms = document.getElementById('form-add-mutasi');
					forms.reset();		
				}
				else
				{
					alert(res.message);
				}
			}
		});
	});
	

	function getBarang()
	{
		$.ajax({
			url: base_url+'/barang/ajax_get_barang_select',
			success: function(res){
				var elem = ""
				if (res.status == 200 )
				{
					for (var i = 0; i < res.data.length; i ++)
					{
						elem += "<option value='"+res.data[i].Kode_Barang+"'>"+res.data[i].Nama_Barang+"</option>";
					}
				}
				else
				{
					elem = "<option value=''>Tidak ada pilihan</option>";
				}
			
				$('#kode_barang').html(elem);
			}
		});
	}

	function getGudang()
	{
		$.ajax({
			url: base_url+'/barang/ajax_get_gudang',
			success: function(res){
				var elem = ""
				if (res.status == 200 )
				{
					for (var i = 0; i < res.data.length; i ++)
					{
						elem += "<option value='"+res.data[i].Kode_Gudang+"'>"+res.data[i].Nama_Gudang+"</option>";
					}
				}
				else
				{
					elem = "<option value=''>Tidak ada pilihan</option>";
				}
			
				$('#kode_gudang').html(elem);
			}
		});
	}

});

function changeFormStatus()
{
	var forms = document.getElementById('form-add-mutasi');
	forms.reset();		
}