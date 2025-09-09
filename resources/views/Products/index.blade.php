<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce - Lista de Productos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    header {
      background: #0d6efd;
      color: white;
      padding: 1rem;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-body {
      padding: 1rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-body h3 {
      margin: 0 0 0.5rem;
      font-size: 1.2rem;
      color: #333;
    }

    .card-body p {
      flex: 1;
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 0.5rem;
    }

    .price {
      font-size: 1.1rem;
      font-weight: bold;
      color: #0d6efd;
      margin-bottom: 0.5rem;
    }

    .btn {
      display: inline-block;
      text-align: center;
      background: #0d6efd;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #084298;
    }
  </style>
</head>
<body>
  <header>
    <h1>Lista de Productos</h1>
  </header>

  <main class="container">
    <div class="card">
      <img src="https://dlcdnwebimgs.asus.com/gain/47be2296-5fde-4c9b-b262-8c6b8879a020/" alt="Laptop">
      <div class="card-body">
        <h3>Laptop Gamer</h3>
        <p>Potente laptop para gaming con procesador de última generación.</p>
        <div class="price">$1,200</div>
        <a href="/products/Asus tuf gaming F15/Laptop" class="btn">Ver Detalles</a>
      </div>
    </div>

    <div class="card">
      <img src="https://imagenes.elpais.com/resizer/v2/3D3VU4M4CRCSPD3QDSLR7UZJ7A.jpg?auth=8bb47a65ca7bbf8530a838f407baafb616652c5ca3b60bdbad1a6244b586ee2f&width=1200" alt="Smartphone">
      <div class="card-body">
        <h3>Smartphone</h3>
        <p>Teléfono inteligente con cámara de alta resolución y batería duradera.</p>
        <div class="price">$800</div>
        <a href="/products/Iphone 16/Smartphone" class="btn">Ver Detalles</a>
      </div>
    </div>

    <div class="card">
      <img src="https://i.blogs.es/385d90/_eln6316/1366_2000.jpeg" alt="Headphones">
      <div class="card-body">
        <h3>Audífonos</h3>
        <p>Audífonos inalámbricos con cancelación de ruido y sonido premium.</p>
        <div class="price">$200</div>
        <a href="/products/Airpods Pro 2 generacion/Audio" class="btn">Ver Detalles</a>
      </div>
    </div>
  </main>
</body>
</html>
