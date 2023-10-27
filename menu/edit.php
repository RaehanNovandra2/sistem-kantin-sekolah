<?php
// include database connection file
include_once("../config.php");

$query = mysqli_query($mysqli, "SELECT nama, id FROM penjual");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
    $stok=$_POST['stok'];
    $id_penjual=$_POST['id_penjual'];    
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$nama',jenis='$jenis',harga='$harga',stok='$stok',id_penjual='$id_penjual' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $stok = $user_data['stok'];
    $id_penjual = $user_data['id_penjual'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td>
                    <select name="jenis">
                        <option value="makanan" <?php echo $jenis=="makanan"?"selected":""; ?>> makanan</option>
                        <option value="minuman" <?php echo $jenis=="minuman"?"selected":""; ?>>minuman</option>                </td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="number" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr> 
                <td>Nama Penjual</td>
                <td>
                    <select name="id_penjual">
                    <?php while($isi = mysqli_fetch_array($query)): ?>
                        <option value="<?= $isi['id'];?>" ><?= $isi['nama']; ?></option>
                        <?php
                        while($data = mysqli_fetch_array($query)) {
                            $selected = $id_penjual == $data['id_penjual'] ? "selected" : 'asdsa';
                            echo '<option value="'.$data['id_penjual'].'" '.$selected.'> 
                                    '.$data['nama'].'
                                </option>';
                        }
                    ?>
                    <?php endwhile; ?>
                    
                   
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html> 