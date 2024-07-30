<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<head>
    <!-- Meta Tags and CSS Includes -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        .info-box {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .info-box:hover {
            transform: translateY(-10px);
        }
        .info-box-icon {
            border-radius: 10px 0 0 10px;
            padding: 20px;
        }
        .info-box-text {
            font-size: 1.2rem;
            font-weight: 600;
        }
        .info-box-number {
            font-size: 2rem;
            font-weight: 700;
        }
        .border-info {
            border-color: #17a2b8 !important;
        }
        .shadow {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <h1 class="text-info"><?php echo $_settings->info('name') ?></h1>
    <hr class="border-info">
    <?php
    function duration($dur = 0){
        if($dur == 0){
            return "00:00";
        }
        $hours = floor($dur / (60 * 60));
        $min = floor($dur / (60)) - ($hours*60);
        $dur = sprintf("%'.02d",$hours).":".sprintf("%'.02d",$min);
        return $dur;
    }
    ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-primary shadow">
                <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Nuevos Proyectos</span>
                    <span class="info-box-number text-right">
                        <?php 
                            echo $conn->query("SELECT * FROM `project_list` where delete_flag=0 and `status` = 0 ")->num_rows;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-info shadow">
                <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Proyectos en Progreso</span>
                    <span class="info-box-number text-right">
                        <?php 
                            echo $conn->query("SELECT * FROM `project_list` where delete_flag=0 and `status` = 1 ")->num_rows;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-secondary shadow">
                <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Proyectos Cerrados</span>
                    <span class="info-box-number text-right">
                        <?php 
                            echo $conn->query("SELECT * FROM `project_list` where delete_flag=0 and `status` = 2 ")->num_rows;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-warning shadow">
                <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total de Reportes</span>
                    <span class="info-box-number text-right">
                        <?php 
                            echo $conn->query("SELECT * FROM `report_list` where employee_id = '{$_settings->userdata('id')}'")->num_rows;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-success shadow">
                <span class="info-box-icon"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tiempo Total Asignado</span>
                    <span class="info-box-number text-right">
                        <?php 
                            echo duration($conn->query("SELECT sum(duration) FROM `report_list` where employee_id = '{$_settings->userdata('id')}'")->fetch_array()[0]);
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
