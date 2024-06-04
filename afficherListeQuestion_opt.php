<?php
include_once '../../Controller/Question_optC.php';
$q = new Question_optC();
$listeQuestion_opt = $q->afficherQuestion_opt();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Liste des Options </title>
    <!-- Favicon-->
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
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
        function toggleDarkMode() {
            // Sélectionnez le corps de la page
            const body = document.body;

            // Ajoutez ou supprimez la classe 'dark-mode' pour basculer entre les modes
            body.classList.toggle('dark-mode');
        }
        function sortTable() {
            let sortBy = document.getElementById("sortSelect").value;
            let columnIndex;

            if (sortBy === "alphabetic") {
                columnIndex = 1; // Indice de la colonne à trier alphabétiquement (option)
            } else if (sortBy === "latest") {
                columnIndex = 0; // Indice de la colonne à trier par dernier (id_opt)
            }

            let tableBody = document.querySelector('.table tbody');
            let rows = Array.from(tableBody.children);
            let sortedRows = rows.sort((a, b) => {
                let textA = a.children[columnIndex].innerText.trim().toLowerCase();
                let textB = b.children[columnIndex].innerText.trim().toLowerCase();
                return textA.localeCompare(textB);
            });

            tableBody.innerHTML = ""; // Clear the table body

            sortedRows.forEach(row => {
                tableBody.appendChild(row);
            });
        }
    </script>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">ApprenTech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="ajouterQuestion_opt.php">Ajouter Options</a></li>
                        <li>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                <button class="btn btn-primary" onclick="Search()">Search</button>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-dark" onclick="toggleDarkMode()">Mode Sombre</button>
                        </li>
                        <li class="nav-item">
                            <select class="form-control" onchange="sortTable()" id="sortSelect">
                                <option value="default">Default Sorting</option>
                                <option value="alphabetic">Sorting by alphabetic</option>
                                <option value="latest">Sorting latest</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <table class="table" border="1" align="center">
                    <thead>
                        <tr>
                            <th>ID option</th>
                            <th>option</th>
                            <th>ID Question</th>
                            <th>is right</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listeQuestion_opt as $Question_opt): ?>
                            <tr class="col-sm-3 col-md-6 col-lg-4">
                                <td>
                                    <?php echo $Question_opt['id_opt']; ?>
                                </td>
                                <td>
                                    <?php echo $Question_opt['opt']; ?>
                                </td>
                                <td>
                                    <?php echo $Question_opt['id_quest']; ?>
                                </td>
                                <td>
                                    <?php echo $Question_opt['is_right']; ?>
                                </td>
                                <td>
                                    <form method="POST" action="modifierQuestion_opt.php">
                                        <input type="submit" name="Modifier" value="Modifier">
                                        <input type="hidden" value=<?PHP echo $Question_opt['id_opt']; ?> name="id_opt">
                                    </form>
                                </td>
                                <td>
                                    <a href="supprimerQuestion_opt.php?id_opt=<?php echo $Question_opt['id_opt']; ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
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
