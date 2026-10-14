<?php
header("Content-Type: application/json; charset=UTF-8");

$action = $_GET['action'] ?? '';

// Mock Database Connection & Operations
$sample_data = [
    [
        "ticket_id" => 101,
        "guest_name" => "M. Schmidt",
        "party_size" => 4,
        "estimated_wait" => 15,
        "status" => "WAITING",
        "priority" => false
    ],
    [
        "ticket_id" => 102,
        "guest_name" => "K. Weber",
        "party_size" => 2,
        "estimated_wait" => 5,
        "status" => "SEATING",
        "priority" => true
    ],
    [
        "ticket_id" => 103,
        "guest_name" => "A. Becker",
        "party_size" => 6,
        "estimated_wait" => 25,
        "status" => "WAITING",
        "priority" => false
    ]
];

switch ($action) {
    case 'list_active':
        echo json_encode([
            "success" => true,
            "total_waiting" => count($sample_data),
            "entries" => $sample_data
        ]);
        break;

    case 'add_guest':
        $raw = file_get_contents("php://input");
        $payload = json_decode($raw, true);
        
        if (!empty($payload['guest_name'])) {
            echo json_encode([
                "success" => true,
                "ticket_number" => rand(104, 199),
                "estimated_wait_minutes" => 20,
                "message" => "Guest added to active queue successfully."
            ]);
        } else {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Invalid guest data."]);
        }
        break;

    default:
        echo json_encode([
            "service" => "Hotel Waiting Management System API",
            "version" => "1.2.0",
            "endpoints" => ["?action=list_active", "?action=add_guest"]
        ]);
        break;
}
?>
