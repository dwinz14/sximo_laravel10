<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Hello, world!</title>
  </head>
  <style>
      

      .card {
          border-color: "#037F3D"
          font-family: "Poppins", sans-serif;
      }

      .card p{
          margin: 0%;
          font-size: 0.7rem;
      }

      .card-body {
          padding: 10px;
      }

      .card-body .col{
          padding: 16px;
      }
      
      .card-body h6{
        font-size: 0.8rem;
      }
      .card-footer {
          margin: 0px;
      }
      .card-footer h5{
          color:"#037F3D";
          margin: 0px;
          font-size: 0.8rem;
      }
  </style>
  <body>

    <div class="container-sm p-3 " style="margin-bottom: 70px;">
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <div> 
                                    <canvas id="GUNUNGPASANG" width="50" height="50"></canvas>
                                </div>
                            </div>
                            <div class="col p-3">
                                <h6>Area</h6>
                                <p>Afd : 4</p>
                                <p>Blok : 116</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                        <h5>GUNUNGPASANG  732,14 Ha</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <div>
                                    <canvas id="KALIMRAWAN" width="50" height="50"></canvas>
                                </div>                                
                            </div>
                            <div class="col">
                                <h6>Areal</h6>
                                <p>2 Afd</p>
                                <p>59 Blok</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                        <h5>KALIMRAWAN 447,975 Ha</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <div>
                                    <canvas id="SUMBERPANDAN" width="50" height="50"></canvas>
                                </div>                                
                            </div>
                            <div class="col">
                                <h6>Areal</h6>
                                <p>4 Afd</p>
                                <p>91 Blok</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                         <h5>SUMBERPANDAN 1131,66 Ha</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <div>
                                    <canvas id="SUMBERTENGGULUN" width="50" height="50"></canvas>
                                </div>
                            </div>
                            <div class="col">
                                <h6>Areal</h6>
                                <p>2 Afd</p>
                                <p>34 Blok</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                        <h5>SUMBERTENGGULUN 561,91 Ha</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <div>
                                    <canvas id="SUMBERWADUNG" width="50" height="50"></canvas>
                                </div>
                            </div>
                            <div class="col">
                                <h6>Areal</h6>
                                <p>3 Afd</p>
                                <p>106 Blok</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                          <h5>SUMBERWADUNG 1359,99 Ha</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card m-1">
                    <div class="card-body">
                        KOPI
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card m-1">
                    <div class="card-body">
                        CENGKEH
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card m-1">
                    <div class="card-body">
                        KARET
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card m-1">
                    <div class="card-body">
                        LAINNYA
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  

  <script>
    
    const plugins = {
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                }
            }
        };
    const labeltanaman = [
                'Kopi',
                'Karet',
                'Cengkeh',
                'lainya'
            ];
    const bcolor = [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(235,162,134)'
                ];
    const datagunungpasang = {
            labels: labeltanaman,
            datasets: [{
                label: 'Data Tanaman',
                data: [Math.random(), Math.random(), Math.random(), Math.random()],
                backgroundColor: bcolor,
                hoverOffset: 4
            }]
        };
    const ctxGUNUNGPASANG = document.getElementById('GUNUNGPASANG');
    const GUNUNGPASANG = new Chart(ctxGUNUNGPASANG, {
        type: 'pie',
        data: datagunungpasang,
        options: plugins
    
    });
    GUNUNGPASANG.canvas.parentNode.style.height = '120px';
    GUNUNGPASANG.canvas.parentNode.style.width = '120px';

    const datakalimrawan = {
            labels: labeltanaman,
            datasets: [{
                label: 'Data Tanaman',
                data: [Math.random(), Math.random(), Math.random(), Math.random()],
                backgroundColor: bcolor,
                hoverOffset: 4
            }]
        };
    const ctxKALIMRAWAN = document.getElementById('KALIMRAWAN');
    const KALIMRAWAN = new Chart(ctxKALIMRAWAN, {
        type: 'pie',
        data: datakalimrawan,
        options: plugins
    
    });
    KALIMRAWAN.canvas.parentNode.style.height = '120px';
    KALIMRAWAN.canvas.parentNode.style.width = '120px';

    const datasumberpandan = {
            labels: labeltanaman,
            datasets: [{
                label: 'Data Tanaman',
                data: [Math.random(), Math.random(), Math.random(), Math.random()],
                backgroundColor: bcolor,
                hoverOffset: 4
            }]
        };
    const ctxSUMBERPANDAN = document.getElementById('SUMBERPANDAN');
    const SUMBERPANDAN = new Chart(ctxSUMBERPANDAN, {
        type: 'pie',
        data: datasumberpandan,
        options: plugins
    
    }); 
    SUMBERPANDAN.canvas.parentNode.style.height = '120px';
    SUMBERPANDAN.canvas.parentNode.style.width = '120px'; 

    const datasumbertenggulun = {
            labels: labeltanaman,
            datasets: [{
                label: 'Data Tanaman',
                data: [Math.random(), Math.random(), Math.random(), Math.random()],
                backgroundColor: bcolor,
                hoverOffset: 4
            }]
        };
    const ctxSUMBERTENGGULUN = document.getElementById('SUMBERTENGGULUN');
    const SUMBERTENGGULUN = new Chart(ctxSUMBERTENGGULUN, {
        type: 'pie',
        data: datasumbertenggulun,
        options: plugins
    
    });  
    SUMBERTENGGULUN.canvas.parentNode.style.height = '120px';
    SUMBERTENGGULUN.canvas.parentNode.style.width = '120px';
    
    const datasumberwadung = {
            labels: labeltanaman,
            datasets: [{
                label: 'Data Tanaman',
                data: [Math.random(), Math.random(), Math.random(), Math.random()],
                backgroundColor: bcolor,
                hoverOffset: 4
            }]
        };
    const ctxSUMBERWADUNG = document.getElementById('SUMBERWADUNG');
    const SUMBERWADUNG = new Chart(ctxSUMBERWADUNG, {
        type: 'pie',
        data: datasumberwadung,
        options: plugins
    
    });
    SUMBERWADUNG.canvas.parentNode.style.height = '120px';
    SUMBERWADUNG.canvas.parentNode.style.width = '120px';
    
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</html>