<html>
<head>
    <title>Add Users</title>
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
                <td>nohp</td>
                <td><input type="text" name="nohp"></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat"></td>
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
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("../config.php");
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(nama,nohp,alamat) VALUES('$nama','$nohp','$alamat')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>
