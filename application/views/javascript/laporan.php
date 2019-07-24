<script type="text/javascript">
	$("#laporan_rentang").daterangepicker({
		"locale": {
			"format": "YYYY-MM-DD",
			"separator": " to ",
			"firstDay": 1
		}
	})
	$("#laporan_rentang").val('');
	function get_laporan(param) {
		//var param = $().val();
		$.ajax({
			type : 'POST',
			url : '<?=base_url()?>ajax/laporan/'+param,
			data : $('#l_form').serialize(),
			dataType : 'JSON',
			success : function (data) {
				$("#laporan_data").html('');
				var jml = 0;
				var ttl = 0;
				for(i=0;i<data.length;i++){
					jml += Number(data[i].jumlah);
					ttl += Number(data[i].total);
					$("#laporan_data").append("<tr><th>"+data[i].masakan+"</th><td class='ct'>"+data[i].jumlah+"</td><td>"+data[i].harga+"</td><td>"+data[i].total+"</td></tr>");
				}
				$("#jml").html(jml);
				$("#ttl").html(ttl);
			}
		})
	}

	function cetak() {
	    var cc = $("#laporan").html();
	    var originalContents = document.body.innerHTML;

	    var printContents = "<table class='table table-bordered'>"+cc+"</table>"
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
		// $("body").html("<table class='table table-striped'>"+h+"</table>");
		// print()
	}
</script>