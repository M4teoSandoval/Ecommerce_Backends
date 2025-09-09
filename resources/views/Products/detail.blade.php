<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce - Detalle de Producto</title>
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
      max-width: 1000px;
      margin: 2rem auto;
      padding: 1rem;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    .product-image img {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
    }

    .product-details h2 {
      margin-top: 0;
      font-size: 1.8rem;
      color: #333;
    }

    .category {
      display: inline-block;
      background: #e9f2ff;
      color: #0d6efd;
      font-size: 0.9rem;
      font-weight: bold;
      padding: 0.3rem 0.6rem;
      border-radius: 5px;
      margin-bottom: 1rem;
    }

    .description {
      font-size: 1rem;
      line-height: 1.5;
      margin-bottom: 1rem;
      color: #555;
    }

    .price {
      font-size: 1.4rem;
      font-weight: bold;
      color: #0d6efd;
      margin-bottom: 1.5rem;
    }

    .btn {
      display: inline-block;
      text-align: center;
      background: #0d6efd;
      color: white;
      padding: 0.7rem 1.2rem;
      border-radius: 5px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #084298;
    }

    .back {
      display: inline-block;
      margin-top: 1rem;
      font-size: 0.9rem;
      text-decoration: none;
      color: #0d6efd;
    }

    .back:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Detalle del Producto</h1>
  </header>

  <main class="container">
    <div class="product-image">
      <img src="https://dlcdnwebimgs.asus.com/gain/47be2296-5fde-4c9b-b262-8c6b8879a020/" alt="Producto">
    </div>

    <div class="product-details">
      <h2> {{$id}}</h2>
      <div class="category">Categoría: {{$category}}</div>
      <p class="description">
        Este es un producto tecnológico innovador que ofrece un excelente rendimiento 
        y diseño moderno. Ideal para quienes buscan calidad y funcionalidad en un solo dispositivo.
      </p>
      <div class="price">$999</div>
      <a href="#" class="btn">Añadir al Carrito</a><br>
      <a href="/products" class="back">← Volver a la lista de productos</a>
    </div>
  </main>
</body>
</html>
