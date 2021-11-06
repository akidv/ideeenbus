<?php 

session_start();

if (!isset($_SESSION["gebruikerId"])) {

} else {

    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
        exit();
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM stemmen WHERE gebruikerId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $stemId, $gebruikerId, $ideeId);
    mysqli_stmt_store_result($stmt);

    while (mysqli_stmt_fetch($stmt)) {
        
        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        $sql = 'UPDATE ideeen SET ideeHoeveelheidStemmen = ideeHoeveelheidStemmen - 1 WHERE ideeId = '.$ideeId;
        mysqli_query($conn, $sql);
        $sql = 'DELETE FROM stemmen WHERE stemId = '.$stemId;
        mysqli_query($conn, $sql);

    }

    $stmt = mysqli_prepare($conn, "DELETE FROM zoekopdrachten WHERE gebruikerId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt); 

    $stmt = mysqli_prepare($conn, "DELETE FROM berichten WHERE verstuurderId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($conn, "DELETE FROM ideeen WHERE gebruikerId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($conn, "DELETE FROM gebruikers WHERE gebruikerId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt);

    session_unset();
    session_destroy();

    header("location: ../Webpaginas/start.php");
    exit();

}