<?php
require_once('doctype.php');
require_once ('src/Controller/PageController.php');
?>


    <body>
    <h4 class="inscriptionTitre"><u>Inscription</u></h4>
    <div class="main">
        <section class="pageInscription" role="contentinfo">

            <div class="mb-3 ms-5 me-5">
                <form method="post" action="">
                    <label for="prenom" class="form-label"><b>Prenom</b>
                        <input type="text" class="form-control" name="prenom"/>
                    </label>
                    <br>
                    <label for="nom" class="form-label"><b>Nom</b>
                        <input type="text" class="form-control" name="nom"/>
                    </label>
                    <br>
                    <label for="mail"><b>Mail</b>
                        <input type="email" name="mail" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"/>
                    </label>
                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Mot de passe</b>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"/>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </form>
            </div>
        </section>
    </div>
    </body>
<?php
require_once('footer.php');
?>