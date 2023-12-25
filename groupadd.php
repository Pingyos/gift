<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

<body id="top">
    <main>
        <?php require_once 'nav.php' ?>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">ผู้ได้รับของรางวัล</h1>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-12 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                                        <form class="custom-form subscribe-form" action="#" method="post" role="form">
                                            <input type="text" name="giftname" id="giftname" class="form-control" placeholder="ของรางวัล" required>
                                            <div class="col-lg-12 col-12">
                                                <button type="submit" class="form-control">เพิ่ม</button>
                                            </div>
                                            <?php
                                            if (isset($_POST['giftname'])) {
                                                require_once 'connect.php';
                                                $giftname = $_POST['giftname'];
                                                $stmt = $conn->prepare("INSERT INTO `group` (giftname) VALUES (:giftname)");
                                                $stmt->bindParam(':giftname', $giftname, PDO::PARAM_STR);
                                                $result = $stmt->execute();
                                                echo '
                                                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                                                if ($result) {
                                                    echo '<script>
                                                        setTimeout(function() {
                                                        swal({
                                                            title: "เพิ่มข้อมูลสำเร็จ",
                                                            type: "success"
                                                        }, function() {
                                                            window.location = "groupadd.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
                                                } else {
                                                    echo '<script>
                                                        setTimeout(function() {
                                                        swal({
                                                            title: "เกิดข้อผิดพลาด",
                                                            type: "error"
                                                        }, function() {
                                                            window.location = "groupadd.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
                                                }
                                                $conn = null;
                                            }
                                            ?>
                                        </form>
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

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 Topic Listing Center. All rights reserved.
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