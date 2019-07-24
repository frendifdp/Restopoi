<script>
	$("#user").DataTable({
		'ajax'       : {
			"url"  : '<?=base_url()?>ajax/table_pengguna/',
			"type" : "POST"
		}
	});
	$("#pelanggan").DataTable({
		'ajax'       : {
			"url"  : '<?=base_url()?>ajax/table_pelanggan/',
			"type" : "POST"
		}
	});

	function delete_user(id_user) {
		swal({
			title: 'Hapus Data',
			text: 'Apakah anda yakin',
			icon: 'warning',
			button: 'Hapus'
		})
		.then((oke) => {
			if(oke) {
				window.location = "<?=base_url()?>pengguna/hapus/"+id_user
			}
		});
	}
</script>