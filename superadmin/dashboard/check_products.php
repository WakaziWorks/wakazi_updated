
            <?php
            session_start(); // Start the session if not already started
            require "../admin/verify/config.php"; // Make sure this path is correct
            
            // Query the database for pending products
            $query = "SELECT COUNT(*) AS pending_count FROM Products WHERE ApprovalStatus = 'pending'";
            $result = $mysqli->query($query);
            $pendingProducts = $result->fetch_assoc();
            ?>
            