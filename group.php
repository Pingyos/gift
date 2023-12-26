<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

<body id="top">
    <main>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">ของรางวัล</h1>
                            <a href="index.php">
                                <h6>กลับหน้าหลัก</h6>
                            </a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <?php
                                    require_once 'connect.php';
                                    $stmt = $conn->prepare("SELECT * FROM `group`");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $t1) {
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-4">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="inputdata.php?id=<?= $t1['id']; ?>?giftname=<?= $t1['giftname']; ?>">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2"><?= $t1['giftname']; ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>