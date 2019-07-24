<script>
	function get_order(param) {
		//var param = $().val();
		$.ajax({
			type : 'POST',
			url : '<?=base_url()?>ajax/order/',
			data : $('#o_form').serialize(),
			dataType : 'JSON',
			success : function (data) {
				$("#tbl_struk").html('');
				var jml = 0;
				var ttl = 0;
				for(i=0;i<data.length;i++){
					jml += Number(data[i].jumlah);
					ttl += Number(data[i].total);
					$("#tbl_struk").append("<tr><th>"+data[i].masakan+"</th><td class='ct'>"+data[i].jumlah+"</td><td>"+data[i].harga+"</td><td>"+data[i].total+"</td></tr>");
				}
				$("#jml").html(jml);
				$("#ttl").html(ttl);
			}
		})
	}

	function konfirmasi() {
		var no_meja = $('#no_meja').val();

		$.ajax({
			type : 'POST',
			url : '<?=base_url()?>kasir/konfirmasi_pembayaran/',
			data : {no_meja:no_meja},
			dataType : 'JSON',
			success : function (data) {
				cetak()
			}
		})

		return false;
	}

	function cetak() {
	    var cc = $("#struk").html();

	    var printContents = "<table class='table table-bordered'>"+cc+"</table>"
	    document.body.innerHTML = printContents;
	    window.print();
	    location.reload();
		// $("body").html("<table class='table table-striped'>"+h+"</table>");
		// print()
	}
</script>