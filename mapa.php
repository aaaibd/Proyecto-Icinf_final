<?php 
    include 'mapa.php';
$dbFile = 'bdd.db';
try {  
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM linea";
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row){
        echo "id: " . $row['nombre'] . "<br>"; 
        echo "nombre: " . $row['id'] . "<br>";
        echo "<br>"; 
    }

    $query = "SELECT * FROM paradero";
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row){
        echo "id: " . $row['id'] . "<br>";
        echo "id: " . $row['latitud'] . "<br>";
        echo "id: " . $row['longitud'] . "<br>";
        echo "<br>"; 
    }

    $query = "SELECT * FROM recorrido";
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row){
        echo "id_linea: " . $row['latitud'] . "<br>";
        echo "id_linea: " . $row['longitud'] . "<br>";
        echo "numero: " . $row['numero'] . "<br>";
        echo "<br>"; 
    }

    $query = "SELECT * FROM recorrido_paradero";
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row){
        echo "id_paradero: " . $row['id_numero'] . "<br>";
        echo "id_numero: " . $row['id_paradero'] . "<br>";
        echo "<br>"; 
    }

    $db = null;
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos SQLite: " . $e->getMessage();
}
?>