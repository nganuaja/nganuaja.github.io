<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nganuaja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
		html, body {
			height: 100%;
			margin: 0;
		}

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			margin: 0;
			padding: 0;
			background: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1534196511436-921a4e99f297?fit=crop&w=1500&q=80') no-repeat center center fixed;
			background-size: cover;
			color: #fff;
			text-align: center;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		h1 {
			font-size: 2.5rem;
			margin-bottom: 0px;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
		}

		p {
			font-size: 1.2rem;
			margin-bottom: 30px;
		}

		.container {
			padding: 20px;
			background-color: rgba(0, 0, 0, 0.5);
			border-radius: 0;
			width: 100%;
			min-height: 100vh;
			margin: 0;
			box-sizing: border-box;
			display: flex;
			flex-direction: column;
			position: relative;
			overflow: auto;
		}

		.content {
			flex-grow: 1;
		}

		.link-wrapper {
			position: relative;
			z-index: 1;
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 20px;
			max-width: 100%;
			flex-grow: 1;
		}

		.service-box {
			background-color: rgba(255, 255, 255, 0.2);
			padding: 15px 20px;
			border-radius: 15px;
			text-align: center;
			transition: background-color 0.3s ease, transform 0.3s ease;
			min-height: 150px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.service-box i {
			font-size: 2rem;
			color: #fff;
			margin-bottom: 10px;
		}

		.service-box h3 {
			font-size: 1.2rem;
			margin: 10px 0;
			color: #fff;
			margin-top: 10px;
			margin-bottom: 5px;
		}

		.service-box p {
			font-size: 1rem;
			margin: 0;
			padding: 1px 0;
			flex-grow: 1;
			overflow: hidden;
			text-overflow: ellipsis;
			word-break: break-word;
		}

		.service-box:hover {
			background-color: rgba(255, 255, 255, 0.4);
			// transform: translateY(-5px);
			transform: scale(1.05);
		}

		.container::before {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
		}
		a {
			text-decoration: none;
			color: inherit;
			pointer-events: auto;
		}

		@media (max-width: 768px) {
			h1 {
				font-size: 2rem;
			}
			p {
				font-size: 1rem;
			}
			.link-wrapper {
				grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
			}
		}

		@media (max-width: 480px) {
			h1 {
				font-size: 1.5rem;
			}
			p {
				font-size: 0.9rem;
			}
			.service-box i {
				font-size: 1.5rem;
			}
			.service-box h3 {
				font-size: 1rem;
			}
			.service-box p {
				font-size: 0.8rem;
			}
		}
    </style>
</head>
<body>
    <div class="container">
        <h1>Kakean Link Disatuin!</h1>
        <p>Monggo Dipilih Anunya Sesuai Selera :</p>

        <div class="link-wrapper">
            <?php
            $csvFile = 'data/links.csv';

            $rows = array();
            if (($handle = fopen($csvFile, 'r')) !== FALSE) {
                fgetcsv($handle);

                while (($data = fgetcsv($handle)) !== FALSE) {
                    $rows[] = $data;
                }
                fclose($handle);
            }

            foreach ($rows as $row):
                list($id, $icon, $link, $title, $description) = $row;
            ?>
                <a href="<?php echo htmlspecialchars($link); ?>" target="_blank">
                    <div class="service-box">
                        <i class="fas <?php echo htmlspecialchars($icon); ?>"></i>
                        <h3><?php echo htmlspecialchars($title); ?></h3>
                        <p><?php echo htmlspecialchars($description); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
		
       <!-- <div class="link-wrapper">
            <?php foreach ($rows as $row): ?>
                <?php
                list($icon, $link, $title, $description) = $row;
                ?>
                <a href="<?php echo htmlspecialchars($link); ?>" target="_blank">
                    <div class="service-box">
                        <i class="fas <?php echo htmlspecialchars($icon); ?>"></i>
                        <h3><?php echo htmlspecialchars($title); ?></h3>
                        <p><?php echo htmlspecialchars($description); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>-->
    </div>
</body>
</html>