<?php 
require "config/Connection.php";
$conn = new Connection();
$template = date('Ymd');
$date = date('Y-m-d');
$datetime = date('Y-m-d H:i:s');
$sql = "select * from transaction where DATE(order_time) = '".$date."' order by order_time desc";
$query = mysqli_query($conn->getconnect(), $sql);

if($query == null){
$num = 0;
$struck = $template."0001";
}else{
$num = mysqli_num_rows($query);
$temp= str_pad($num+1, 4, "0", STR_PAD_LEFT);
$struck = $template."".$temp;
}

$totalarr = count($_POST['qty']);
$i = 0;
$templatearray = array();
$templatedetail = "Nama Pelanggan : ".$_POST['customer']."<br> Nomor Telepon : ".$_POST['phonenumber']." <br><h3>DETAIL : </h3>";
while($i < $totalarr){
    $getprodname = $_POST['productname'][$i];
    $getqty = $_POST['qty'][$i];
    $text = "Nama pesanan : ".$getprodname.".<br> Jumlah : ".$getqty."<br>";
    $templatearray['text'][$i] = $text;
    //echo $templatearray['text'];
    $i++;
}
$encode =  json_encode($templatearray['text']);
$replace1 = str_replace("[" , "", $encode);
$replace2 = str_replace('"' , '', $replace1);
$replace3 = str_replace("]" , "", $replace2);
$replace4 = str_replace("," , "", $replace3);

$templatedetailfix = $templatedetail."".$replace4;

$sqlsimpan = "insert into transaction VALUES('".$struck."','".$templatedetailfix."','".$_POST['total']."','".$datetime."','0')";
$query = mysqli_query($conn->getconnect(), $sqlsimpan);

if($query){ 
    echo "<SCRIPT type='text/javascript'>
    alert('Berhasil tersimpan, selamat pesanan anda sudah ada pada antrian');
    window.location.replace(\"/php/bakeryweb/\");
</SCRIPT>";
}else{
    echo "<SCRIPT type='text/javascript'>
    alert('Pesanan gagal, terjadi gangguan pada server.');
    window.location.replace(\"/php/bakeryweb\");
    </SCRIPT>";
}

?>