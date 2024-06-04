<?php
include_once '../../config.php';
include_once '../../controller/transactionc.php';
$T= new TransactionC();
$listeTransaction = $T->afficherTransactions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mettez vos balises meta et liens de style ici -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="logo.png" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script>
        function Search() {
            let word = document.getElementById("searchInput").value.toLowerCase();

            for (let i = 0; i < document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4").length; i++) {
                document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "";
            }

            for (let i = 0; i < document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4").length; i++) {
                let arr = document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].innerText.toLowerCase().split("\n");
                let result = arr.some((elem) => {
                    return elem.includes(word);
                });
                !result ? document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "none" : document.getElementsByClassName("col-sm-3 col-md-6 col-lg-4")[i].style.display = "";
            }
        } 
    </script>
</head>
<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">apprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item"><a class="nav-link" href="paiement.php">Paiement</a></li>
                        <li class="nav-item"><a class="nav-link" href="ajoutertransaction.php">Transaction </a></li>
                        <li class="nav-item"><a class="nav-link" href="affichertransaction.php">afficher Liste Transaction </a></li>
                        <li class="nav-item dropdown">
                        <li>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                            <button class="btn btn-primary" onclick="Search()">Search</button>
                        </div>
                </div>
            </div>
            
        </nav>
        <br><br>
        <section>
        <article>
            <table border="1" align="center">
            <thead>
                <tr>
                    <th>ID Transaction</th>
                    <th>Id Cours</th>
                    <th>Id carte</th>
                    <th>Montant</th>
                    <th>Date de transaction</th>
                    </thead>
                    <tbody>
                <?php foreach ($listeTransaction as $transaction) { ?>
                    <tr class="col-sm-3 col-md-6 col-lg-4">
                        <td><?php echo $transaction['id_transaction']; ?></td>
                        <td><?php echo $transaction['id_cours']; ?></td>
                        <td><?php echo $transaction['id']; ?></td>
                        <td><?php echo $transaction['montant']; ?></td>
                        <td><?php echo $transaction['date_transaction']; ?></td>
                        <td>
                            <form method="POST" action="modifierTransaction.php">
                                <input type="submit" name="Modifier" value="Modifier">
                                <input type="hidden" value=<?PHP echo $transaction['id_transaction']; ?> name="id_transaction">
                            </form>
                        </td>
                        <td>
                      <a href="supprimertransaction.php?id=<?PHP echo $transaction['id_transaction']; ?>">supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </article>
       </section>
       
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>