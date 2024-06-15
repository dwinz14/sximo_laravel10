<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo config("sximo.cnf_maps");?>&callback=initMap&libraries=&v=weekly"
      async
    ></script>
<script type="text/javascript">
let map;
function initMap() {
    map = new google.maps.Map(document.getElementById("<?php echo $id;?>"), {
        center: { lat: <?php echo $lat;?>, lng: <?php echo $long;?>},
        zoom: 8,
    });
}
	$(document).ready(function() { 
    initMap();
	});
</script>