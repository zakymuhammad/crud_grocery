<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <?= $this->renderSection('head'); ?>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Start Bootstrap</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('/map') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/map') ?>">Map</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Map</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/admin') ?>">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--  -->

        <!-- <div id="map" style="width: 90%; height: 80vh; margin: auto; border-radius: 10px; border: 5px solid black;"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
        <script>
            const map = L.map('map').setView([-7.568471, 110.825211], 13);

            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Ambil data outlet dari PHP
            const outlets = <?php echo json_encode($outlet); ?>;

            // Tambahkan marker untuk setiap outlet
            outlets.forEach(outlet => {
                const popupContent = `
                    <img src="${outlet.image_url}" width="100">
                    <h3>${outlet.name}</h3>
                    <p>${outlet.description}</p>
                    <a href="${outlet.instagram_link}" target="_blank">Instagram</a>`;
                marker.bindPopup(popupContent); // Tampilkan nama outlet sebagai popup
            });
        </script> -->

        <div id="map" style="width: 90%; height: 80vh; margin: auto; border-radius: 10px; border: 5px solid black;"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
        <script>
            const map = L.map('map').setView([-7.568471, 110.825211], 13);

            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Ambil data dari outlet dan info_outlet dari PHP
            const outlets = <?= json_encode($outlet); ?>;
            const infoOutlets = <?= json_encode($info_outlet); ?>;

            // Gabungkan data dari kedua model
            const combinedData = outlets.map(outlet => {
                const infoOutlet = infoOutlets.find(info => info.outlet_id === outlet.id);
                return {
                    latitude: outlet.latitude,
                    longitude: outlet.longitude,
                    // image_url: infoOutlet.image_url,
                    name: outlet.nama,
                    description: outlet.deskripsi,
                    instagram_link: infoOutlet.instagram_link
                };
            });

            // Tambahkan marker untuk setiap outlet
            combinedData.forEach(outlet => {
                const popupContent = `
                    <img src="${outlet.image_url}" width="100">
                    <h3>${outlet.name}</h3>
                    <p>${outlet.description}</p>
                    <a href="${outlet.instagram_link}" target="_blank">Instagram</a>`;
                const marker = L.marker([outlet.latitude, outlet.longitude]).addTo(map);
                marker.bindPopup(popupContent);
            });
        </script>

    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; by zkymuhm</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>/js/scripts.js"></script>

    <?= $this->renderSection('script'); ?>
</body>

</html>