<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4 card-body ">
        <h1 class="h2 mb-0 text-gray-800 "><b>DASHBOARD</b></h1>
    </div> -->

    <!-- =================================================== TAMBAHAN CHART ========================================= -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="card-title">Income Total</h6>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:40vh;">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    <!-- =================================================== TAMBAHAN CHART ========================================= -->

    <!---------------------------------------->
    <!-- End of Main Content -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- ============ PIE CHART ============ -->
    <script type="text/javascript">
        const backgroundColor = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(34, 197, 94,0.5)',
            'rgba(239, 68, 68, 0.5)',
            'rgb(169, 169, 169)'
        ];
        const borderColor = [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(34, 197, 94,1)',
            'rgba(239, 68, 68, 0.8)',
            'rgb(169, 169, 169)'
        ];
    </script>

    <script type="text/javascript">
        const data_bar = {
            labels:'',
            datasets: [{
                label: '',
                data: [],
                backgroundColor:[]
            }]
        };
        const configBar = {
            type: 'bar',
            data: data_bar,
            options: {
                maintainAspectRatio: false,
                responsive: true,
                // scales: {
                //     yAxes: [{
                //     stacked: true,
                //     gridLines: {
                //         display: true,
                //         color: "rgba(255,99,132,0.2)"
                //     }
                //     }],
                //     xAxes: [{
                //     gridLines: {
                //         display: false
                //     }
                //     }]
                // },
                // scales: {
                //     r: {
                //         pointLabels: {
                //             display: true,
                //             centerPointLabels: true,
                //             font: {
                //                 size: 10
                //             }
                //         }
                //     }
                // },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ''
                    }
                },
            }
        };

        var barChart = new Chart(
            document.getElementById('barChart'),
            configBar
        );
        $('#btn_tampil').click(function() {
            var tahun = $('#tahun').val();
            // var material = $('#material_barChart').val();
            $.ajax({
                url: "<?php echo base_url(); ?>/Home/get_data_income",
                method: "POST",
                data: {
                    tahun
                    // material
                },
                dataType: "JSON",
                success: function(result, textStatus, jqXHR) {
                    update_barChart_realisasi(barChart, tahun, result);
                    update_mean(result);
                    update_increase(result);
                    console.log(result);
                }
            })
        });
        // function update_mean(data){
        //     let sum_income = 0;
        //     let jum = 0;
        //     data.forEach(item=>{
        //         sum_income += parseInt(item.income);
        //         jum += 1;
        //     })
        //     console.log(sum_income/jum);
        // }
        // <!-- CHART UNIT PRODUKSI -->
        function update_barChart_realisasi(chart, tahun, data) {
            // let labelPie = [];
            // data.forEach(item => {
            //     if(!labelPie.includes(`${item.plant}`)) labelPie.push(`${item.plant}`);
            // })
            
            // let dataNama_produk = {}, jumlahPlant = 0, i = 0;
            // data.forEach(item => {
            //     if(`${item.plant}` == `${labelPie[i]}`){
            //         jumlahPlant = 0;
            //         i++;
            //     }
            //     jumlahPlant += parseInt(item.rkap);
            //     dataNama_produk[`${item.plant}`] = jumlahPlant;
                
            // });
            
            // let datasetPie = []
            // for (attr in dataNama_produk){
            //     datasetPie.push(dataNama_produk[`${attr}`]);
            // }
            var month= ["January","February","March","April","May","June","July",
            "August","September","October","November","December"];
            let bulan = []
            data.forEach(item=>{
                bulan.push(month[item.bulan-1]);
            })
            let income = []
            data.forEach(item=>{
                income.push(item.income);
            })
            // i = 0
            // labelPie.forEach(label => {
            //     label = `${label} - ${desc_plant[i]}`;
            //     desc_plant[i] = label;
            //     i++;
            // })
            const data_bar = {
                labels: bulan,
                datasets: [{
                    data: income,   
                    label: tahun,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                }]
            }
            chart.data = data_bar;
            chart.options.plugins.title.text = `${tahun}`;
            chart.update();
        }

    </script>
    <!-- ============ PIE CHART ============ -->