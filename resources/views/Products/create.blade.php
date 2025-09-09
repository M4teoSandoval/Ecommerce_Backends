<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce - Crear Producto</title>
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
      max-width: 600px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    label {
      font-weight: bold;
      color: #333;
      margin-bottom: 0.3rem;
      display: block;
    }

    input, textarea, select {
      padding: 0.7rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      width: 100%;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .btn {
      background: #0d6efd;
      color: white;
      padding: 0.8rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
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
  </style>
</head>
<body>
  <header>
    <h1>Crear Producto</h1>
  </header>

  <main class="container">
    <form action="#" method="post" enctype="multipart/form-data">
      <div>
        <label for="name">Nombre del Producto</label>
        <input type="text" id="name" name="name" placeholder="Ej: Laptop Gamer" required>
      </div>

      <div>
        <label for="price">Precio</label>
        <input type="number" id="price" name="price" placeholder="Ej: 1200" required>
      </div>

      <div>
        <label for="brand">Marca</label>
        <input type="text" id="brand" name="brand" placeholder="Ej: ASUS, HP, Samsung" required>
      </div>

      <div>
        <label for="category">Categoría</label>
        <select id="category" name="category" required>
          <option value="" disabled selected>-- Selecciona una categoría --</option>
          <option value="laptops">Laptops</option>
          <option value="smartphones">Smartphones</option>
          <option value="accesorios">Accesorios</option>
          <option value="audio">Audio</option>
          <option value="otros">Otros</option>
        </select>
      </div>

      <div>
        <label for="description">Descripción</label>
        <textarea id="description" name="description" placeholder="Agrega una descripción del producto..." required></textarea>
      </div>

      <div>
        <label for="image">Imagen</label>
        <input type="file" id="image" name="image" accept="image/*" required>
      </div>

      <button type="submit" class="btn">Guardar Producto</button>
      <a href="index.html" class="back">← Volver a la lista de productos</a>
    </form>
  </main>
</body>
</html>
