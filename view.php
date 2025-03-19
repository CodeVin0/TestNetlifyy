<?php
$api_key = "Or3sonvOdH7LJUkBICH8LHUBr10np6xG8eCEWusL1IQuErJSi5S210uL7yq9"; // 🔥 Your API key (replace it securely)
$endpoint = "https://api.getform.io/v1/forms/bllyezwb/token=$api_key";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<pre>HTTP Status Code: " . $http_code . "</pre>"; // Show HTTP response code
echo "<pre>Raw API Response:</pre>";
echo "<pre>" . htmlspecialchars($response) . "</pre>"; // Show raw response

$data = json_decode($response, true);

if (!$data) {
    echo "<p>No submissions found or API error.</p>";
} else {
    echo "<h2>Submitted Data</h2>";
    echo "<ul>";
    foreach ($data['submissions'] as $entry) { // ✅ Adjust for Getform API structure
        echo "<li>Name: " . htmlspecialchars($entry['Nama'] ?? 'N/A') . ", Email: " . htmlspecialchars($entry['Email'] ?? 'N/A') . ", No. Hp: " . htmlspecialchars($entry['No_Hp'] ?? 'N/A') . ", Bersedia Membayar: " . htmlspecialchars($entry['bayar'] ?? 'N/A') . "</li>";
    }
    echo "</ul>";
}
?>