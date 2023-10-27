<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT m.id, m.nama, m.jenis, m.harga, m.stok, p.nama as nama_penjual from menu m
inner join penjual p on p.id=m.id_penjual");
?>
 
<html>
<head>    
    <title>Menu</title>
</head>
 
<body>
<a href="add.php">Add New Menu</a><br/><br/>
 <a href="../index.php">Kembali ke menu</a>
    <table width='80%' border=1>
 
    <tr>
        <th>Nama Menu</th> <th>Jenis</th> <th>Harga</th> <th>Stok</th> <th>Penjual</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['jenis']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['stok']."</td>";
        echo "<td>".$user_data['nama_penjual']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>