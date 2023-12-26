<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

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
                                                <h1 class="text-white text-center">ตรวจสอบของรางวัล</h1>
                                                <div class="text-white text-center">
                                                    <a href="index.php">
                                                        <h6>กลับหน้าหลัก</h6>
                                                    </a>
                                                </div>
                                                <form method="get" class="custom-form mt-4 pt-2 mb-lg-5 mb-5" role="search">
                                                    <div class="input-group input-group-lg">
                                                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="ระบุหมายเลข" aria-label="Search" required>
                                                        <button type="submit" class="form-control">ค้นหา</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php
                                            require_once 'connect.php';

                                            $itemsPerPage = 10;

                                            if (isset($_GET['keyword'])) {
                                                $keyword = $_GET['keyword'];

                                                $stmt = $conn->prepare("SELECT * FROM `user` WHERE `name` LIKE :keyword ORDER BY `id` DESC");
                                                $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();

                                                $totalResults = count($result);
                                                $pages = ceil($totalResults / $itemsPerPage);

                                                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                                $start = ($currentPage - 1) * $itemsPerPage;
                                                $end = $start + $itemsPerPage;

                                                $currentPageData = array_slice($result, $start, $itemsPerPage);

                                                foreach ($currentPageData as $t1) {
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

                                                // Display pagination links
                                                if ($pages > 1) {
                                                    echo '<div class="col-lg-8 col-12 mx-auto mt-4">
                        <ul class="pagination justify-content-center">';
                                                    for ($i = 1; $i <= $pages; $i++) {
                                                        echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '">
                            <a class="page-link" href="?keyword=' . $keyword . '&page=' . $i . '">' . $i . '</a>
                        </li>';
                                                    }
                                                    echo '</ul>
                    </div>';
                                                }
                                            } else {
                                                echo '<div class="col-lg-8 col-12 mx-auto">
                    <div class="custom-block bg-white shadow-lg">
                        <div class="d-flex">
                            <div>
                                <p>กรุณากรอกคำค้นหา.</p>
                            </div>
                        </div>
                    </div>
                </div>';
                                            }
                                            ?>
                                        </div>
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
                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2023 คณะกรรมการของรางวัล
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