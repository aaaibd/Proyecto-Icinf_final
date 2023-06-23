<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new PDO('sqlite:bdd.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $comentarios = $_POST['comentarios'];
        
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
            $comentarios = filter_var($comentarios, FILTER_SANITIZE_STRING);
        
            $query = "INSERT INTO formulario (nombre, email, telefono, comentarios) VALUES (:nombre, :email, :telefono, :comentarios)"; //insertar tabla correca (formulario)
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':comentarios', $comentarios);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {
                echo "Los datos se han guardado correctamente.";
            } else {
                echo "Error al guardar los datos.";
            }
        }
        ?>   