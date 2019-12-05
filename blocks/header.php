

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Loka šaušanas sistēma</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <!-- <a class="p-2 text-dark" href="#">Features</a> -->
    </nav>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/">Galvena lapā</a>
    <a class="btn btn-outline-primary mr-2 mb-2" href="competition.php">sacensības un rezultāti</a>
    
    <?php if(isset($_COOKIE['login'])): ?>
    <a class="btn btn-outline-primary mr-2 mb-2" href="auth.php">Lietotaja kabinets</a>
    <?php endif; ?>
    
    <?php 
    if(isset($_COOKIE['login'])){
        $sql = "SELECT isAdmin from users WHERE login = '{$_COOKIE['login']}'";
        $isAdmin = mysqli_query($connection, $sql);
        $isAdmin = $isAdmin->fetch_assoc();
        echo mysqli_error($connection);
        if($isAdmin['isAdmin']):

    ?>
    
    <a class="btn btn-outline-primary mr-2 mb-2" href="competition_add.php">Pievienot sacensības</a>
    <a class="btn btn-outline-primary mr-2 mb-2" href="admin.php">rediget sacensības</a>
    
    <?php 
        endif;
    }
        
    
    
    ?>
    <!-- <a class="btn btn-outline-primary mr-2 mb-2" href="#">Archery database</a>
    <!-- <a class="btn btn-outline-primary mb-2" href="/reg.php">Registration</a> -->
</div>




