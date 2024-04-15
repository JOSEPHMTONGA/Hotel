<?php

// Define the size of the data
$data_size = 1000;

// Generate data
$data = [];
for ($i = 0; $i < $data_size; $i++) {
    $data[] = rand(0, 100);
}

// Define the number of parallel processes
$num_processes = 4;

// Divide the data into chunks for each process
$data_chunks = array_chunk($data, ceil($data_size / $num_processes));

// Function to perform computation on a chunk of data
function compute($data_chunk) {
    return array_sum($data_chunk);
}

// Parallel processing
$results = parallel_map('compute', $data_chunks);

// Reduce the results to get the final result
$final_result = array_sum($results);

echo "Final result: $final_result\n";

?>
