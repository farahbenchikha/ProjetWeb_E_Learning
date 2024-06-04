<?php
include_once '../../Model/Quiz.php';
include_once '../../Controller/QuizC.php';

$error = "";

// create Quiz
$Quiz = null;

// create an instance of the controller
$QuizC = new QuizC();
if (
    isset($_POST["titre"])
) {
    if (
        !empty($_POST['titre'])
    ) {
        $Quiz = new Quiz(
            NULL,
            $_POST['titre']
        );
        $QuizC->ajouterQuiz($Quiz);
        header('Location:afficherListeQuiz.php');
    } else
       { $error = "Missing information";}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>ajouter un Quiz </title>
    <!-- Favicon-->
    <link rel="icon" type="../image/x-icon" href="logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
    <script>
    function validateForm() {
        var titre = document.getElementById("titre").value;

        // Check if the titre is empty
        if (titre.trim() === "") {
            alert("Veuillez saisir un titre pour le Quiz.");
            return false;
        }

        // You can add more validation rules here if needed

        return true;
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
                        <li class="nav-item"><a class="nav-link" href="afficherlisteQuiz.php">Liste des Quizs</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <div id="error">
                    <?php echo $error; ?>
                </div>

                <form action="" method="POST" onsubmit="return validateForm()">
                    <table class="table" border="1" align="center">
                        <tr>
                            <td>
                                <label for="titre">titre:
                                </label>
                            </td>
                            <td><input type="text" name="titre" id="titre" maxlength="20"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Envoyer">
                            </td>
                            <td>
                                <input type="reset" value="Annuler">
                            </td>
                        </tr>
                    </table>
                </form>
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