<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content>
    <meta name="author" content>

    <title>Topic Listing Bootstrap 5 Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

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

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Live Data</h1>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    <div id="user-content">
                                        <script>
                                            function updateUserContent() {
                                                $.ajax({
                                                    url: 'livedata.php',
                                                    method: 'GET',
                                                    success: function(data) {
                                                        $('#user-content').html(data);
                                                    },
                                                    error: function(error) {
                                                        console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
                                                    }
                                                });
                                            }
                                            setInterval(updateUserContent, 2000);
                                        </script>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/click-scroll.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>