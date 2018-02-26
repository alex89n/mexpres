<!-- <!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                // padding: 1px;
            }

            th {text-align: center;}
            tD {text-align: center;}
        </style>
    </head>
<body>
-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mexpres_red_voznje";


$pocetnaStanica = $_POST['start1'];
$krajnjaStanica = $_POST['end1'];

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql="SELECT * FROM MESTO WHERE id = '".$pocetnaStanica ."' OR id = '".$krajnjaStanica ."'";
/* $sql="select mes1.naziv, mes2.naziv, st.vreme_polaska, st.opis, st.cena, st.cena_povratne from RED_VOZNJE_STAVKA st 
							left join RED_VOZNJE rv ON rv.id = st.RED_VOZNJE_id
							left join MESTO mes1 on mes1.id = st.MESTO_DOLASKA_id
                            left join MESTO mes2 on mes2.id = st.MESTO_POLASKA_id
where st.MESTO_POLASKA_ID = '".$pocetnaStanica ."' and st.MESTO_DOLASKA_ID =  '".$krajnjaStanica ."' and rv.datum_vazenja = (select max(datum_vazenja) from RED_VOZNJE)
and rv.praznik = true and rv.vikend = true"; */




    // $sql="SELECT * FROM MESTO";

    $result = mysqli_query($con,$sql);

    echo "<table>
                <tr>
                <th>ID</th>
                <th>Mesto</th>
                <th>Drzava</th>
                </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['naziv'] . "</td>";
            echo "<td>" . $row['drzava'] . "</td>";
        }

    echo "</table>";

mysqli_close($con);

?>