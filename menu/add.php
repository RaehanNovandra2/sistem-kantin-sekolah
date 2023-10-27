<html>
<head>
    <title>Add menu</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>id</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr> 
                <td>stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td>jenis</td>
                <td>
                    <select name="jenis">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>penjual</td>
                <td>
                    <select name="id_penjual">
                        <?php 
                        include_once ("../config.php");
                        $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id desc");
                        while ($data = mysqli_fetch_array($penjual)) {
                            echo '<option value='.$data ["id"].'>' .$data ["nama"].' </option>';} 
                     ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];        
        $harga = $_POST['harga'];
        $jenis = $_POST['jenis'];
        $stok = $_POST['stok'];
        $penjual = $_POST['id_penjual'];
        // include database connection file
        include_once("../config.php");
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(nama,harga,jenis,stok,id_penjual) VALUES('$nama','$harga','$jenis','$stok','$penjual')");
        
        // Show message when user added
        echo "Menu added successfully. <a href='index.php'>View Menu</a>";
    }
    ?>
</body>
</html>
