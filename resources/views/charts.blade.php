<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fitness Gym Tracker - Charts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <style>
        body {
            background-color: #121212;
            color: #eee;
            min-height: 100vh;
            padding: 2rem;
        }
        .header-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #f0a500;
            text-transform: uppercase;
        }
        .card {
            background: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
            padding: 1.5rem;
            margin: 1rem 0;
            height: 100%;
        }
        h2 {
            font-weight: 700;
            color: #f0a500;
            text-align: center;
            margin-bottom: 1rem;
        }
        canvas {
            max-height: 250px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="header-title">Fitness Gym Tracker</div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h2>Users by Role</h2>
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2>Exercises by Type</h2>
                    <canvas id="exercisesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h2>Workout Logs per Day</h2>
                    <canvas id="workoutLogsChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2>Workouts per Week</h2>
                    <canvas id="workoutsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const colors = [
            '#f87171', '#60a5fa', '#facc15', '#34d399', '#a78bfa', '#fbbf24', '#4ade80', '#f472b6'
        ];

        function createChartConfig(type, labels, data, label) {
            return {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: colors,
                        borderColor: '#222',
                        borderWidth: 1,
                        fill: type === 'line' ? false : true,
                        tension: type === 'line' ? 0.4 : 0,
                        pointRadius: type === 'line' ? 6 : 0,
                        pointHoverRadius: type === 'line' ? 8 : 0,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#eee',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: '#333',
                            titleColor: '#f0a500',
                            bodyColor: '#eee',
                            cornerRadius: 6,
                        }
                    },
                    scales: type === 'pie' || type === 'doughnut' || type === 'polarArea' ? {} : {
                        x: {
                            ticks: {
                                color: '#eee',
                                font: { size: 14 }
                            },
                            grid: {
                                color: '#333'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#eee',
                                font: { size: 14 }
                            },
                            grid: {
                                color: '#333'
                            }
                        }
                    }
                }
            };
        }

        const usersLabels = ['Member', 'Trainer', 'Admin'];
        const usersData = [120, 15, 5];

        const exercisesLabels = ['Cardio', 'Strength', 'Flexibility', 'Balance'];
        const exercisesData = [30, 50, 10, 5];

        const workoutLogsLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        const workoutLogsData = [20, 25, 30, 28, 24, 18, 15];

        const workoutsLabels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        const workoutsData = [12, 15, 18, 20];

        new Chart(document.getElementById('usersChart'), createChartConfig('doughnut', usersLabels, usersData, 'Users by Role'));
        new Chart(document.getElementById('exercisesChart'), createChartConfig('polarArea', exercisesLabels, exercisesData, 'Exercises by Type'));
        new Chart(document.getElementById('workoutLogsChart'), createChartConfig('bar', workoutLogsLabels, workoutLogsData, 'Workout Logs per Day'));
        new Chart(document.getElementById('workoutsChart'), createChartConfig('line', workoutsLabels, workoutsData, 'Workouts per Week'));
    </script>
</body>
</html>
