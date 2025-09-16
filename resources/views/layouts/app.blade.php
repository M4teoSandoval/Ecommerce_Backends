<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>

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
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
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

    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
      }
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

  </style>
</head>
<body>
    
    @include('layouts.navbar')

    @yield('content')
    @include('layouts.footer')




  
</body>
</html>