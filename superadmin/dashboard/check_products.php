<?php
            require '../admin/verify/config.php'; // Make sure this path is correct

            // Query the database for pending products
            $query = "SELECT COUNT(*) AS pending_count FROM Products WHERE ApprovalStatus = 'pending'";
            $result = $mysqli->query($query);
            $pendingProducts = $result->fetch_assoc();

            // Continue with your existing navbar and other HTML
            ?>