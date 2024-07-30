<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_settings->info('name') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .dashboard-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .info-box {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .info-box-icon {
            padding: 20px;
            font-size: 2.5rem;
        }

        .info-box-content {
            padding: 20px;
        }

        .info-box-text {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .info-box-number {
            font-size: 2rem;
            font-weight: 700;
        }

        .animate-number {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .animate-number.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center dashboard-title"><?php echo $_settings->info('name') ?></h1>
        
        <div class="row g-4">
            <?php
            $boxes = [
                ['title' => 'Nuevos Proyectos', 'icon' => 'fa-tasks', 'color' => 'primary', 'query' => "SELECT * FROM project_list where delete_flag=0 and status = 0"],
                ['title' => 'Proyectos en Curso', 'icon' => 'fa-tasks', 'color' => 'info', 'query' => "SELECT * FROM project_list where delete_flag=0 and status = 1"],
                ['title' => 'Proyectos Cerrados', 'icon' => 'fa-tasks', 'color' => 'secondary', 'query' => "SELECT * FROM project_list where delete_flag=0 and status = 2"],
                ['title' => 'Total de Empleados', 'icon' => 'fa-user-tie', 'color' => 'success', 'query' => "SELECT * FROM employee_list"],
                ['title' => 'Total de Reportes', 'icon' => 'fa-file-alt', 'color' => 'warning', 'query' => "SELECT * FROM report_list"]
            ];

            foreach ($boxes as $box):
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="info-box bg-<?php echo $box['color']; ?> text-white">
                    <div class="info-box-icon">
                        <i class="fas <?php echo $box['icon']; ?>"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo $box['title']; ?></span>
                        <span class="info-box-number animate-number">
                            <?php echo $conn->query($box['query'])->num_rows; ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Animación de números
            $('.animate-number').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                    complete: function() {
                        $(this).addClass('visible');
                    }
                });
            });

            // Efecto hover en las cajas de información
            $('.info-box').hover(
                function() {
                    $(this).find('.info-box-icon').addClass('animate_animated animate_rubberBand');
                },
                function() {
                    $(this).find('.info-box-icon').removeClass('animate_animated animate_rubberBand');
                }
            );
        });
    </script>
</body>
</html>