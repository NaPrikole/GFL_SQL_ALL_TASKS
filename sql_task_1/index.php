  <?php
  set_time_limit(0);
 
  $dbh = new PDO('pgsql:host=localhost;dbname=user1', 'user1', 'user1');
      if ($dbh != false)
      {
          echo "Connect to database";
      } else die ("Cant connect to database");
 
  function generateData($length = 100)
  {
      $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
      $numChars = strlen($chars);
      $string = '';
          for ($i = 0; $i < $length; $i++)
          {
              $string .= substr($chars, rand(1, $numChars) - 1, 1);
          }
              return $string;
  }
 
  for ($i = 1; $i <= 1000000; $i++)
  {
      $name = generateData(100);
      $description = str_repeat(generateData(100), 5);
      $dbh->query("INSERT INTO sql_practice VALUES ('$i','$name','$description')");
  }
  echo "</br>";
  echo "Success, we have 1000000 rows:)";
  echo "/br";
 
  ?>
