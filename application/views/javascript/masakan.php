<script type="text/javascript">
    $("#makanan").DataTable({
    	'ajax'       : {
			"url"  : '<?=base_url()?>ajax/table_masakan/data/',
			"type" : "POST"
		}
    })

    function delete_masakan(id_masakan) {
		swal({
			title: 'Hapus Data',
			text: 'Apakah anda yakin',
			icon: 'warning',
			button: 'Hapus'
		})
		.then((oke) => {
			if(oke) {
				window.location = "<?=base_url()?>masakan/hapus/"+id_masakan
			}
		});
	}

	function edit_masakan(id_masakan) {
		$.ajax({
			type : 'ajax',
			url : '<?=base_url()?>ajax/table_masakan/'+id_masakan,
			dataType : 'JSON',
			success : function (data) {
				$('[name=id_masakan]').val(data[0].id_masakan)
				$('[name=nama]').val(data[0].nama_masakan)
				$('[name=harga]').val(data[0].harga_masakan)
				$('[name=status]').val(data[0].status_masakan).prop('selected', true)
				$('[name=jenis]').val(data[0].jenis).prop('selected', true)
			}
		})
	}
</script>