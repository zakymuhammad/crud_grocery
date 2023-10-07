<?= $this->extend('admin/templates/layout') ?>

<?= $this->section('content') ?>
<div id="map1" style="width: 90%; height: 80vh; margin: auto; border-radius: 10px; border: 5px solid black;"></div>

<script>
    const map1 = L.map('map-1').setView([-7.568471, 110.825211], 13);

    const tiles1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map1);

    <?php foreach ($outlet as $o) : ?>
        const outletMarker = L.marker([<?= $o['latitude'] ?>, <?= $o['longitude'] ?>]).addTo(map1);
        outletMarker.bindPopup('<b><?= $o['nama'] ?></b><br><?= $o['deskripsi'] ?>').openPopup();

        <?php foreach ($infoOutlet[$o['id']] as $info) : ?>
            const infoMarker = L.marker([<?= $info['latitude'] ?>, <?= $info['longitude'] ?>]).addTo(map1);
            infoMarker.bindPopup('<b><?= $o['nama'] ?> - Info</b><br><?= $info['link_instagram'] ?>').openPopup();
        <?php endforeach; ?>

    <?php endforeach; ?>
</script>
<?= $this->endSection() ?>