<?php

// Connect to MongoDB
$manager = new MongoDB\Driver\Manager(getenv('MONGODB_HOST'));

// Define the document to insert
$document = [
    'name' => 'New York',
    'lat' => '40.7128',
    'lon' => '-74.0060'
];

// Define the insert query
$bulk = new MongoDB\Driver\BulkWrite();
$bulk->insert($document);

// Insert the document into the collection
$result = $manager->executeBulkWrite(getenv('MONGODB_DB') . '.location', $bulk);

// Print the result
printf("Inserted %d document(s)\n", $result->getInsertedCount());

?>
<?php

// Connect to MongoDB
$manager = new MongoDB\Driver\Manager(getenv('MONGODB_HOST'));

// Define the query
$query = new MongoDB\Driver\Query([]);

// Execute the query and get the result set
$result = $manager->executeQuery(getenv('MONGODB_DB') . '.location', $query);

// Loop over the result set and display the documents
foreach ($result as $document) {
    echo json_encode($document) . "\n";
}

?>
