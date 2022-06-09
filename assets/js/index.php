<?php header("Content-type: application/javascript"); ?>
<?php
require('../../config.php');
$tahun_ini = date('Y');
$jan = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_jan FROM laporan_transaksi WHERE bulan_bayar='January' AND tahun_bayar = '$tahun_ini'");
$get_jan = mysqli_fetch_assoc($jan);

$feb = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_feb FROM laporan_transaksi WHERE bulan_bayar='February' AND tahun_bayar = '$tahun_ini'");
$get_feb = mysqli_fetch_assoc($feb);

$mar = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_mar FROM laporan_transaksi WHERE bulan_bayar='March' AND tahun_bayar = '$tahun_ini'");
$get_mar = mysqli_fetch_assoc($mar);

$apr = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_apr FROM laporan_transaksi WHERE bulan_bayar='April' AND tahun_bayar = '$tahun_ini'");
$get_apr = mysqli_fetch_assoc($apr);

$may = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_may FROM laporan_transaksi WHERE bulan_bayar='May' AND tahun_bayar = '$tahun_ini'");
$get_may = mysqli_fetch_assoc($may);

$jun = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_jun FROM laporan_transaksi WHERE bulan_bayar='June' AND tahun_bayar = '$tahun_ini'");
$get_jun = mysqli_fetch_assoc($jun);

$jul = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_jul FROM laporan_transaksi WHERE bulan_bayar='July' AND tahun_bayar = '$tahun_ini'");
$get_jul = mysqli_fetch_assoc($jul);

$aug = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_aug FROM laporan_transaksi WHERE bulan_bayar='August' AND tahun_bayar = '$tahun_ini'");
$get_aug = mysqli_fetch_assoc($aug);

$sep = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_sep FROM laporan_transaksi WHERE bulan_bayar='September' AND tahun_bayar = '$tahun_ini'");
$get_sep = mysqli_fetch_assoc($sep);

$oct = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_oct FROM laporan_transaksi WHERE bulan_bayar='October' AND tahun_bayar = '$tahun_ini'");
$get_oct = mysqli_fetch_assoc($oct);

$nov = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_nov FROM laporan_transaksi WHERE bulan_bayar='November' AND tahun_bayar = '$tahun_ini'");
$get_nov = mysqli_fetch_assoc($nov);

$dec = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_jumlah_bulanan_dec FROM laporan_transaksi WHERE bulan_bayar='December' AND tahun_bayar = '$tahun_ini'");
$get_dec = mysqli_fetch_assoc($dec);

?>
$(function() {
"use strict";

// chart 5

var options = {
series: [{
name: "Pendapatan",
data:
[

<?php if (empty($get_jan['transaksi_jumlah_bulanan_jan'])) {
	echo "0";
} else {
	echo $get_jan['transaksi_jumlah_bulanan_jan'];
} ?>,
<?php if (empty($get_feb['transaksi_jumlah_bulanan_feb'])) {
	echo "0";
} else {
	echo $get_feb['transaksi_jumlah_bulanan_feb'];
} ?>,
<?php if (empty($get_mar['transaksi_jumlah_bulanan_mar'])) {
	echo "0";
} else {
	echo $get_mar['transaksi_jumlah_bulanan_mar'];
} ?>,
<?php if (empty($get_apr['transaksi_jumlah_bulanan_apr'])) {
	echo "0";
} else {
	echo $get_apr['transaksi_jumlah_bulanan_apr'];
} ?>,
<?php if (empty($get_may['transaksi_jumlah_bulanan_may'])) {
	echo "0";
} else {
	echo $get_may['transaksi_jumlah_bulanan_may'];
} ?>,
<?php if (empty($get_jun['transaksi_jumlah_bulanan_jun'])) {
	echo "0";
} else {
	echo $get_jun['transaksi_jumlah_bulanan_jun'];
} ?>,
<?php if (empty($get_jul['transaksi_jumlah_bulanan_jul'])) {
	echo "0";
} else {
	echo $get_jul['transaksi_jumlah_bulanan_jul'];
} ?>,

<?php echo $get_aug['transaksi_jumlah_bulanan_aug']; ?>,
<?php echo $get_sep['transaksi_jumlah_bulanan_sep']; ?>,
<?php echo $get_oct['transaksi_jumlah_bulanan_oct']; ?>,
<?php echo $get_nov['transaksi_jumlah_bulanan_nov']; ?>,
<?php echo $get_dec['transaksi_jumlah_bulanan_dec']; ?>
]

}],
chart: {
type: "area",
// width: 130,
stacked: true,
height: 280,
toolbar: {
show: !1
},
zoom: {
enabled: !1
},
dropShadow: {
enabled: 0,
top: 3,
left: 14,
blur: 4,
opacity: .12,
color: "#3461ff"
},
sparkline: {
enabled: !1
}
},
markers: {
size: 0,
colors: ["#3461ff"],
strokeColors: "#fff",
strokeWidth: 2,
hover: {
size: 7
}
},
grid: {
row: {
colors: ["transparent", "transparent"],
opacity: .2
},
borderColor: "#f1f1f1"
},
plotOptions: {
bar: {
horizontal: !1,
columnWidth: "25%",
//endingShape: "rounded"
}
},
dataLabels: {
enabled: !1
},
stroke: {
show: !0,
width: [2.5],
//colors: ["#3461ff"],
curve: "smooth"
},
fill: {
type: 'gradient',
gradient: {
shade: 'light',
type: 'vertical',
shadeIntensity: 0.5,
gradientToColors: ['#3461ff'],
inverseColors: false,
opacityFrom: 0.5,
opacityTo: 0.1,
// stops: [0, 100]
}
},
colors: ["#3461ff"],
xaxis: {
categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
},
responsive: [{
breakpoint: 1000,
options: {
chart: {
type: "area",
// width: 130,
stacked: true,
}
}
}],
legend: {
show: false
},
tooltip: {
theme: "dark"
}
};

var chart = new ApexCharts(document.querySelector("#chart5"), options);
chart.render();


// worl map

jQuery('#geographic-map').vectorMap({
map: 'world_mill_en',
backgroundColor: 'transparent',
borderColor: '#818181',
borderOpacity: 0.25,
borderWidth: 1,
zoomOnScroll: false,
color: '#009efb',
regionStyle: {
initial: {
fill: '#3461ff'
}
},
markerStyle: {
initial: {
r: 9,
'fill': '#fff',
'fill-opacity': 1,
'stroke': '#000',
'stroke-width': 5,
'stroke-opacity': 0.4
},
},
enableZoom: true,
hoverColor: '#009efb',
markers: [{
latLng: [21.00, 78.00],
name: 'Lorem Ipsum Dollar'

}],
hoverOpacity: null,
normalizeFunction: 'linear',
scaleColors: ['#b6d6ff', '#005ace'],
selectedColor: '#c9dfaf',
selectedRegions: [],
showTooltip: true,
});






});