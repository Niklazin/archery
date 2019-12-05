


<html>
    <head>
        <?php require 'blocks/head.php'; ?>
        <title>title</title>
    </head>
    <body>
        
        <?php 
        require 'includes/db.php';
        require 'blocks/header.php'; 
        ?>
        
         <main class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <form action="../pages/competition_add_action.php" method="POST">
                        <label for="competitionName">sacensibas nosaukums</label>
                        <input class="mb-2 form-control" type="text" name="competitionName">
                        
                        <label for="distances">distanču skaits</label>
                        <input class="mb-2 form-control" type="number" name="distances">
                        
                        <label for="city">pilsēta</label>
                        <input class="mb-2 form-control" type="text" name="city">
                        
                        <label for="country">info</label>
                        <textarea class="mb-2 form-control" type="text" name="info"></textarea>
                        
                        <label for="date">date</label>
                        <input class="mb-2 form-control" type="date" name="date">
                        
                        <button class="btn btn-success mt-5">gatavs</button>        
                    </form>
                </div>
            </div>
        </main>

    </body>
</html>





