<?php
// checkip.php

// Allow cross-origin requests (for testing purposes, consider removing or restricting this in production)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Function to simulate checking an IP address against a VPN/proxy database or service
function check_ip($ip) {
    // In a real scenario, replace this with actual logic to check the IP address
    // This could be a database query, an API call to a third-party service, etc.
    
    // For demonstration purposes, we'll use a mock response
    $mock_response = [
        'status' => 'ok',
        $ip => [
            'risk' => 'low',
            'proxy' => 'no',
            'vpn' => 'no',
            'type' => 'residential',
        ]
    ];
    
    // Example: If the IP address is 1.1.1.1, mark it as a VPN
    if ($ip == '1.1.1.1') {
        $mock_response[$ip]['risk'] = 'high';
        $mock_response[$ip]['proxy'] = 'yes';
        $mock_response[$ip]['vpn'] = 'yes';
        $mock_response[$ip]['type'] = 'vpn';
    }
    
    return $mock_response;
}

// Get the IP address from the request
$ip = $_GET['ip'] ?? null;

// Check if IP address is provided
if (!$ip) {
    echo json_encode(['status' => 'error', 'message' => 'IP address not provided']);
    exit;
}

// Check the IP address
$response = check_ip($ip);

// Output the response as JSON
echo json_encode($response);
?>
