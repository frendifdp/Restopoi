<script type="text/javascript">
	$("#meja").DataTable({
    	'ajax'       : {
			"url"  : '<?=base_url()?>ajax/table_meja/',
			"type" : "POST"
		}
    })

    function delete_meja(id_meja) {
    	swal({
			title: 'Hapus Data',
			text: 'Apakah anda yakin',
			icon: 'warning',
			button: 'Hapus'
		})
		.then((oke) => {
			if(oke) {
				window.location = "<?=base_url()?>meja/hapus/"+id_meja
			}
		});
	}

	function edit_meja(id_meja) {
		$.ajax({
			type : 'ajax',
			url : '<?=base_url()?>meja/get_meja/'+id_meja,
			dataType : 'JSON',
			success : function (data) {
				$('[name=id_meja]').val(data[0].id_meja)
				$('[name=no_meja]').val(data[0].no_meja)
				$('[name=kursi]').val(data[0].kursi)
				$('[name=status]').val(data[0].status).prop('selected', true)
			}
		})
	}
</script>