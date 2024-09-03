<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana Amarou</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .calculator {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 auto;
            max-width: 400px;
        }
        input[type="text"] {
            width: calc(100% - 60px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
        .error {
            margin-top: 20px;
            font-size: 18px;
            color: red;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>AMAROU SIMPLE CALCULATOR</h1>
    <div class="calculator">
        <form method="post" autocomplete="off">
       <input type="text" name="expression" size="20" placeholder="Gasken masukin bang!" required> &nbsp;
            <input type="submit" value="Ayo Menghitung">
        </form>
        <?php
      
       class Calculator {
           public function calculate($expression) {
               // Cek dulu nih kalo ekspresi yang diinput cuma angka sama operator matematika
               if (!preg_match('/^[0-9+\-\/\*\(\)\. ]+$/', $expression)) {
                   return "GA KELUAR MASS :0"; // Kalo ada yang aneh, balikinnya "invalid expression"
               }
       
               // Ganti 'x' jadi '*' buat operasi perkalian
               $expression = str_replace('x', '*', $expression);
       
               // Konversi implisit perkalian ke eksplisit (misalnya 4(4+3) jadi 4*(4+3))
               $expression = preg_replace('/(\d)\(/', '$1*(', $expression);
               $expression = preg_replace('/\)(\d)/', ')*$1', $expression);
       
               // Pakai eval buat ngejalanin ekspresinya
               eval('$result = ' . $expression . ';');
       
               return $result; // Hasil dari ekspresi dihitung dan dibalikin
           }
       }
       
       // Bikin objek kalkulator
       $calculator = new Calculator();
       
       // Form buat input ekspresi
       echo '<form method="post" autocomplete="off">';
       
      
     
       echo '</form>';
       
       // Cek kalo form di-submit
       if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['expression'])) {
           $expression = $_POST['expression'];
       
           // Hitung ekspresinya
           $result = $calculator->calculate($expression);
       
           // Tampilkan hasilnya
           echo "Hasil: " . $expression . " = " . $result . "<br /><br />";
       }
       ?>
    </div>
    <div class="footer">
        <p>&copy; 2024 Amarou. Dibuat dengan cinta.</p>
    </div>
</body>
</html>