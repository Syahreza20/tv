<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Your Website Title</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            overflow-x: hidden; /* Prevent horizontal scrolling */
            margin-bottom: 70px; /* Adjust based on the height of the running text */
        }

        .running-text-container {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            white-space: nowrap;
            overflow: hidden;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .running-text {
            display: inline-block;
            animation: marqueeAnimation 20s linear infinite; /* Adjust the duration as needed */
        }

        @keyframes marqueeAnimation {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Header -->
        <div class="row">
            <!-- Bagian Logo (di kiri) -->
            <div class="col-4">
                <img src="img/logo.png" alt="Your Logo" class="img-fluid" style="max-width: 100px; max-height: 75px;">
            </div>

            <!-- Bagian Judul "Papan Informasi" (di tengah) -->
            <div class="col-4 text-center">
                <h1 style="color: #007bff; font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold;">PAPAN INFORMASI</h1>
            </div>

            <!-- Bagian Jam (di kanan) -->
            <div class="col-4 text-right">
                <div id="clock" style="font-size: 24px; font-weight: bold;"></div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row mt-4">
            <!-- Left Column - Video -->
            <div class="col-lg-8">
                <!-- Your Video Player can be added here -->
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls loop autoplay>
                        <source src="img/2.mp4" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
            </div>

            <!-- Right Column - Announcement Information -->
            <div class="col-lg-4">
                <!-- Your Announcement Information can be added here -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Announcement</h5>
                        <div class="table-responsive">
                            <table id="announcement-table" class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Keterangan</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Placeholder for initial data -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="running-text-container">
        <div class="running-text">
            <?php
            $runningTexts = [
                'SELAMAT DATANG DI FMIPA UNAND!!!  ',
                'SELAMAT DATANG DI FMIPA UNAND!!!  ',
                'SELAMAT DATANG DI FMIPA UNAND!!!  '
            ];

            foreach ($runningTexts as $text) {
                // Memecah teks menjadi huruf-huruf
                $characters = str_split($text);
                foreach ($characters as $char) {
                    echo '<span class="highlight-text">' . $char . '</span>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript for Clock and Announcement Update -->
    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var formattedTime = hours + ':' + minutes + ':' + seconds;
            document.getElementById('clock').innerText = formattedTime;
            setTimeout(updateClock, 1000);
        }

        function updateAnnouncement() {
            $.ajax({
                url: 'update_announcement.php',
                type: 'GET',
                success: function(data) {
                    $('#announcement-table tbody').html(data);
                },
                complete: function() {
                    setTimeout(updateAnnouncement, 3000);
                }
            });
        }

        $(document).ready(function() {
            updateAnnouncement();
            updateClock();
        });
    </script>
</body>

</html>
