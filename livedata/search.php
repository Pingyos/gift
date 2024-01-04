<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <title>gift2024</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="../logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Noto+Sans+Thai:wght@500&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link href="../css/templatemo-topic-listing.css" rel="stylesheet">
</head>

<body id="top">
    <main>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-12 mx-auto">
                                                <h1 class="text-white text-center">Search Prize Results</h1>
                                                <div class="text-white text-center">
                                                    <a href="index.php">
                                                        <h6>Return to Main Page</h6>
                                                    </a>
                                                </div>
                                                <form method="get" class="custom-form mt-4 pt-2 mb-lg-5 mb-5" role="search">
                                                    <div class="input-group input-group-lg">
                                                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Enter ticket number." aria-label="Search" required>
                                                        <button type="submit" class="form-control">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                        require_once '../connect.php';

                                        if (isset($_GET['keyword'])) {
                                            $keyword = $_GET['keyword'];
                                            $stmt = $conn->prepare("SELECT * FROM `user` WHERE `name` LIKE :keyword ORDER BY `id` DESC");
                                            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            if (count($result) > 0) {
                                                foreach ($result as $t1) {
                                                    echo '<div class="col-lg-8 col-12 mb-lg-2 mb-2 mx-auto">
                                                    <div class="custom-block bg-white shadow-lg">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">' . $t1['name'] . '</h5>
                                                                <h6 class="mb-2">' . $t1['giftname'] . '</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                }
                                            } else {
                                                echo '<div class="col-lg-8 col-12 mx-auto">
                                                        <div class="custom-block bg-white shadow-lg">
                                                            <div class="d-flex">
                                                                <div>
                                                                    <p>No results found for the search. "' . $keyword . '"</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                        } else {

                                            echo '<div class="col-lg-8 col-12 mx-auto">
                                                    <div class="custom-block bg-white shadow-lg">
                                                        <div class="d-flex">
                                                            <div>
                                                                <p>Enter search text.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                        ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 คณะกรรมการของรางวัล
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/click-scroll.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>