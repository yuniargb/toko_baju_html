<!-- memanggil file proses login -->
<!-- <?php include(''); ?> -->
<!-- ui login -->
<div class="col-12">
    <h2 class="title text-center">SELAMAT DATANG</h2>
    <div class="card  m-auto">
        <h4 class="text-center">LOGIN</h4>
        <?php if(isset($_SESSION['pesan'])) {  ?>
        <label style="color:red;"><?php echo $_SESSION['pesan']; ?></label>
        <?php } ?>
        <form action="././action/proses_login.php" method="post">
            <input type="username" name="username" class="form-control" placeholder="Username">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn-primary w-100">LOGIN</button>
        </form>
    </div>
</div>
</div>
