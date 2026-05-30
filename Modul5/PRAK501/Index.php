<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        .header p {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        .menu-container {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            width: 200px;
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        }
        .card-member { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-buku { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .card-peminjaman { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        
        .card-icon {
            font-size: 3rem;
            display: block;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Perpustakaan Online</h1>
        <p>Manajemen Data Perpustakaan</p>
    </div>

    <div class="menu-container">
        <a href="Member.php" class="card card-member">
            <span class="card-icon"></span>
            Member
        </a>
        <a href="Buku.php" class="card card-buku">
            <span class="card-icon"></span>
            Buku
        </a>
        <a href="Peminjaman.php" class="card card-peminjaman">
            <span class="card-icon"></span>
            Peminjaman
        </a>
    </div>

</body>
</html>