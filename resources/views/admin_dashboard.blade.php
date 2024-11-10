<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
           
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .navbar {
            display: flex;
            justify-content: flex-end;
            background-color: #007bff;
        }
        .navbar a {
            color: #fff;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
            text-decoration: none;
            text-align: center;
            justify-content: center;
        }
        .navbar button {
            background-color: #e74c3c;
            border: none;
            color: #fff;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .navbar a:hover { background-color: #0056b3; }
        .hero {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero img { width: 100%; height: auto; }
        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .hero-text h2 { font-size: 2.5em; margin: 0; }
        .search-bar {
            margin-top: 20px;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 300px;
            border: none;
            border-radius: 5px;
        }
        .search-bar button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .properties, .services, .agents, .contact, .footer {
            padding: 20px;
            text-align: center;
        }
        .property-list, .service-list, .agent-list {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .property-item, .service-item, .agent-item {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
        }
        .pagination {
            margin: 20px 0;
        }
        .pagination button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin: 0 5px;
        }
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>RealEstate</h1>
        <div class="navbar">
    <a href="{{ route('admin_dashboard')}}">Home</a>
    <a href="#">About</a>
    <a href="{{ route('properties.index') }}">Properties</a>
    <a href="#">Profile</a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

</div>

    </div>

    <div class="hero">
        <img src="https://storage.googleapis.com/a1aa/image/VNCByrMtD8q2D9t7QxoSH1ek4SlcT8c1XVLQQFkIJ2PDvo3JA.jpg" alt="Modern house with large windows and a pool" width="1440" height="500">
        <div class="hero-text">
            <h2>Please find your dream home</h2>
            <div class="search-bar">
                <input type="text" placeholder="Search Your Future Home">
                <button>Search</button>
            </div>
        </div>
    </div>

    

    <div class="properties">
        <h2>Our Properties</h2>
        <div class="property-list">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <div class="property-item">
                    <img src="https://storage.googleapis.com/a1aa/image/QRcfNQJoZq0AMyubpKuvIBMJxZHdVOzmhygEH6kcdr2Dvo3JA.jpg" alt="Modern house with large windows" width="200" height="150">
                    <h3>For Sale</h3>
                    <p>Bandar Lampung</p>
                </div>
            <?php endfor; ?>
        </div>
        <div class="pagination">
            <button>Prev</button>
            <button>Next</button>
        </div>
    </div>

    <div class="services">
        <h2>Our Services</h2>
        <div class="service-list">
            <?php 
            $services = [
                ["icon" => "building", "title" => "Our Properties", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."],
                ["icon" => "home", "title" => "Property For Sale", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."],
                ["icon" => "user-tie", "title" => "Real Estate Agent", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."],
                ["icon" => "sign", "title" => "House For Sale", "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."]
            ];
            foreach ($services as $service): ?>
                <div class="service-item">
                    <i class="fas fa-<?= $service['icon']; ?>"></i>
                    <h3><?= $service['title']; ?></h3>
                    <p><?= $service['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="agents">
        <h2>Our Agents</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div class="agent-list">
            <?php 
            $agents = [
                ["name" => "Amar Abie Pesah", "npm" => "2217051121"],
                ["name" => "M Akbar Baihaqi", "npm" => "2257051002"],
                ["name" => "Suntan Jundi", "npm" => "22"],
                ["name" => "Devinrina", "npm" => "22"]
            ];
            foreach ($agents as $agent): ?>
                <div class="agent-item">
                    <img src="https://storage.googleapis.com/a1aa/image/2v2JKnrbLwp0PtLSshQWHKiKFlQUec1uBODrQYD9pdJCvo3JA.jpg" alt="Agent photo" width="100" height="100">
                    <h3><?= $agent['name']; ?></h3>
                    <p>NPM: <?= $agent['npm']; ?></p>
                    <div>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="contact">
        <p>CONTACT</p>
        <p>Bandar Lampung</p>
        <p>+62 812 3456 78910</p>
        <p>+62 812 3456 78910</p>
    </div>

    <div class="footer">
        <p>Desain by kelompok 6 web lanjut</p>
    </div>
</body>
</html>
