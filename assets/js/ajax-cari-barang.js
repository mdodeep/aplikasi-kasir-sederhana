
    $(document).ready(function() {
        $("#cari").change(function() {
            var nomor = $("#nomor_transaksi").val();
            var cari = $("#cari").val();
            $.ajax({
                type: "POST",
                url: "functions.php",
                data: {
                    keyword: cari,
                    ambil_nomor: nomor
                },
                beforeSend: function() {
                    $("#hasil_cari").hide();
                    $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html) {
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                }
            });
        });
    });