<?php

include "db.php";

$query = "SELECT program_subdomains FROM my_projects";
$result = mysqli_query($con, $query);

$subdomains = '';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subdomain_string = $row['program_subdomains'];
        $subdomain_array = explode(",", $subdomain_string); // Assuming subdomains are separated by commas
        foreach ($subdomain_array as $subdomain) {
            // Trim to remove leading/trailing whitespaces
            $subdomains .= trim($subdomain) . "\n";
        }
    }
}

$total_subdomains = count(explode("\n", trim($subdomains)));

?>

<p class="card-category">Total Subdomains</p>
<h3 class="card-title"><?php echo $total_subdomains; ?></h3>
