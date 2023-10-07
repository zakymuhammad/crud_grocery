<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div id="map" style="width: 90%; height: 80vh; margin: auto; border-radius: 10px; border: 5px solid black;"></div>

<script>
    const map = L.map('map').setView([-7.568471, 110.825211], 13);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    <?php foreach ($outlet as $o) : ?>
        const outletMarker = L.marker([<?= $o['latitude'] ?>, <?= $o['longitude'] ?>]).addTo(map);
        outletMarker.bindPopup('<b><?= $o['nama'] ?></b><br><?= $o['deskripsi'] ?>').openPopup();

        <?php foreach ($infoOutlet[$o['id']] as $info) : ?>
            const infoMarker = L.marker([<?= $info['latitude'] ?>, <?= $info['longitude'] ?>]).addTo(map);
            infoMarker.bindPopup('<b><?= $o['nama'] ?> - Info</b><br><?= $info['link_instagram'] ?>').openPopup();
        <?php endforeach; ?>

    <?php endforeach; ?>
</script>
<?= $this->endSection() ?>