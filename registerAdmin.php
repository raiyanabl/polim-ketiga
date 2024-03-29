<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $query = "SELECT * FROM admin WHERE username ='$username'";
        $result = $mysqli->query($query);
        if ($result === false) {
            die("Query error: " . $mysqli->error);
        }

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($mysqli, $insert_query)) {
                echo "<script>
                alert('Pendaftaran Berhasil'); 
                document.location='index.php?page=loginAdmin';
                </script>";
            } else {
                $error = "Pendaftaran gagal";
            }
        } else {
            $error = "Username sudah digunakan";
        }
    } else {
        $error = "Password tidak cocok";
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center" style="font-size: 32px;">Register Admin</div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=registerAdmin">
                        <?php
                        if (isset($error)) {
                            echo '<div class="alert alert-danger">' . $error . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" required placeholder="Username">
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" required placeholder="Password">
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control" required placeholder="Masukkan Ulang Password">
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="mt-3">Sudah Mempunyai Akun? <a href="index.php?page=loginAdmin">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>