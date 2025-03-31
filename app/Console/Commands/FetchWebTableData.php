<?php

namespace App\Console\Commands;

use App\Models\WebTable;
use Illuminate\Console\Command;
use Exception;
use DOMDocument;

class FetchWebTableData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:web-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape table data from the given website and print it in the console';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = "https://merolagani.com/latestmarket.aspx"; // Replace with the actual URL

        try {
            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // Set user-agent header
            
            // Execute cURL session and get the content
            $response = curl_exec($ch);

            // Check for cURL errors
            if(curl_errno($ch)) {
                throw new Exception("Error fetching data: " . curl_error($ch));
            }

            // Close the cURL session
            curl_close($ch);

            // Load the HTML content into DOMDocument
            $dom = new DOMDocument();
            libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
            $dom->loadHTML($response);
            libxml_clear_errors();

            // Get all table rows (tr)
            $rows = $dom->getElementsByTagName('tr');

            if ($rows->length == 0) {
                $this->info("No table found on the page.");
                return;
            }

            WebTable::dropData();

            foreach ($rows as $row) {
                // Get all cells (td or th)
                $cells = $row->getElementsByTagName('td');
                if ($cells->length == 0) {
                    continue; // Skip rows without table data cells
                }

                // Collect cell data
                $symbol = trim($cells->item(0)->textContent); // Get symbol (first column)
                $ltp = trim($cells->item(1)->textContent); // Get last traded price (second column)

                // Insert the data into the WebTable model
                WebTable::create([
                    'symbol' => $symbol,
                    'ltp' => $ltp,
                ]);

                // Output to the console
                $this->info("Inserted: $symbol | $ltp");
            }

            // Iterate through each row
            foreach ($rows as $row) {
                // Get all cells (td or th)
                $cells = $row->getElementsByTagName('td');
                if ($cells->length == 0) {
                    continue; // Skip rows without table data cells
                }

                // Collect cell data
                $row_data = [];
                foreach ($cells as $cell) {
                    $row_data[] = trim($cell->textContent); // Get text content from each cell
                }

                // Print the row data to the console
                $this->info(implode(" | ", $row_data));
            }
        } catch (Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}
