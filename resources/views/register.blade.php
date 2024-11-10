<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Styling for both the login and registration pages */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('{{ asset('real.jpg') }}'); /* Adjust image path if needed */
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
        }
        .auth-box {
            text-align: center;
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .auth-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .auth-box input[type="text"],
        .auth-box input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 20px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .auth-box input[type="text"]::placeholder,
        .auth-box input[type="password"]::placeholder {
            color: #666;
        }
        .auth-box button {
            width: 50%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 15px;
        }
        .auth-box button:hover {
            background-color: #0056b3;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-box">
            <h2>Register</h2>
           <!-- Form Register (register.blade.php) -->
           <form action="{{ route('register') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="name" placeholder="Nama" required>

    <!-- Dropdown untuk memilih role -->
    <select name="role" required>
        <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>User</option>
        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
    </select>

    <button type="submit">REGISTER</button>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</form>
        </div>
    </div>
    <div class="footer">
        Desain by kelompok 6 web lanjut
    </div>
</body>
</html>
