<?php
    include '../connect_server.php';
    $search = mysqli_real_escape_string($conn, $_POST['book_name']);
    $searchSplit = explode(' ', $search);

    $searchQueryItems = array();
    foreach ($searchSplit as $searchTerm) {
        /*
         * NOTE: Check out the DB connections escaping part 
         * below for the one you should use.
         */
        $searchQueryItems[] = "$book_name LIKE '%" . mysqli_real_escape_string($searchTerm) . "%'";
    }

    $query = 'SELECT * FROM pdf ' . (!empty($searchQueryItems) ? ' WHERE ' . implode(' AND ', $searchQueryItems) : '');
?>