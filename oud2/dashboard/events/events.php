<html>

<head>
  <title>Eventory registratie formulier</title>
  <link rel="stylesheet" href="../assets/css/styles-dashboard.css" />
</head>

<body>
  <div class="container">
    <div class="Header">
      <div class="part1">
        <img src="../assets/img/hoi.jpg" />
      </div>
    </div>

       <div class="Sidebar">
         <div class="navbar">
           <a href="../dashboard.php">Home</a>
           <a href="../users/gebruikers.php">Gebruikers</a>
           <a href="javascript:void(0)">Events</a>
           <a href="../inschrijvingen/inschrijvingen.php">Inschrijvingen</a>

         </div></div>
   <div class="Main">

      <div class="Graphgroup">

     <div class="graph1">
      <img src="../assets/img/pie.png" /></div>
       <div class="graph2">
       <img src="../assets/img/pie.png" /></div>
      </div>


      <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Event</th><th>Datum</th><th>Locatie</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "Welkom012";
$dbname = "eventory";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT naam, datum, locatie FROM events");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 

<div>
  <a href="nieuw-event.php">Maak een nieuw account aan.</a> 
</div>

         <div class="Graphgroup">

        <div class="graph3">
         <img src="../assets/img/pie.png" /></div>
          <div class="graph4">
          <img src="../assets/img/pie.png" /></div>
            </div></div></div>


<!-- HIER JE CONTENT VOOR DE MAIN -->



      <div class="footer">
        <img src="../assets/img/Knipsel.png" />
      </div>

  </div>
</body>

</html>
