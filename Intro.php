  <?php




//  $num = gethostname() . " : " .get_current_user();
//  echo $num;
//
//    echo "<br>";




//  $nume = "David";
//  echo $nume;
//
//    echo "<br>";
//  $a = 4 + 7;
//  echo $a;

//  function add ($a, $b){
//      return $a +$b;
//  }
//  $r = add (2,3);
//  echo "<br>";
//  echo $r;

  //  introduc cod HTML  in PHP cu echo


  ?>

<h3>Tabel inmultire</h3>
  <form action = "" >
      <input type="number" name="number" value="18">
      <button> Multiplica </button>
  </form>

  |
  <?php
    for ($i=1; $i<=10; $i++){
        echo "<a href='?number=$i'>$i</a> |";
    }
  ?>

  <table>
      <?php
      $numar = isset($_GET["number"]) ? $_GET["number"]:1 ;

//      if(isset($_GET["number"])){
//          $numar = $_GET["number"];
//      } else {
//
//      }

        for ($i = 1; $i <= 10; $i++ ) {
            $r = $numar * $i;
            echo "<tr><td>$i</td><td>* $numar = </td><td>$r</td></tr>";
//          echo "<tr><td>" . $i . "</td><td>* $numar = </td><td>$r</td></tr>";
        }

      ?>
  </table>