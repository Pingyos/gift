<!doctype html>
<html lang="en">

<?php require_once 'head.php' ?>

<body id="top">
    <main>
        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">ผู้ได้รับของรางวัล</h1>
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
                                    <div class="col-lg-12 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                                        <form class="custom-form subscribe-form" action="#" method="post" role="form">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="ระบุหมายเลข" required>
                                            <div class="col-lg-12 col-12">
                                                <button type="submit" class="form-control">ยืนยัน</button>
                                                <?php
                                                // echo '<pre>';
                                                // print_r($_POST);
                                                // echo '</pre>';
                                                ?>
                                            </div>
                                            <?php
                                            if (isset($_POST['name'])) {
                                                $groupId = isset($_GET['id']) ? $_GET['id'] : 0;
                                                require_once 'connect.php';
                                                $stmtGroup = $conn->prepare("SELECT giftname FROM `group` WHERE id = :groupId");
                                                $stmtGroup->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                                $stmtGroup->execute();
                                                $groupData = $stmtGroup->fetch(PDO::FETCH_ASSOC);

                                                if ($groupData) {
                                                    $giftname = $groupData['giftname'];
                                                    $name = $_POST['name'];

                                                    $stmtUser = $conn->prepare("INSERT INTO `user` (name, groupId, giftname) VALUES (:name, :groupId, :giftname)");
                                                    $stmtUser->bindParam(':name', $name, PDO::PARAM_STR);
                                                    $stmtUser->bindParam(':groupId', $groupId, PDO::PARAM_INT);
                                                    $stmtUser->bindParam(':giftname', $giftname, PDO::PARAM_STR);
                                                    $result = $stmtUser->execute();

                                                    echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                                                    if ($result) {
                                                        echo '<script>
                                                setTimeout(function() {
                                                    swal({
                                                        title: "บันทึกข้อมูลสำเร็จ", 
                                                        text: "กรุณารอสักครู่",
                                                        type: "success", 
                                                        timer: 500, 
                                                        showConfirmButton: false 
                                                    }, function() {
                                                        var redirectUrl = "inputdata.php?id=' . $_GET['id'] . '";
                                                        window.location = redirectUrl;
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
                                                        window.location = "inputdata.php"; 
                                                    });
                                                }, 1000);
                                            </script>';
                                                    }

                                                    $conn = null;
                                                } else {
                                                    echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                    title: "เกิดข้อผิดพลาด",
                                                    type: "error"
                                                }, function() {
                                                    window.location = "inputdata.php"; //หน้าที่ต้องการให้กระโดดไป
                                                });
                                                }, 1000);
                                            </script>';
                                                }
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