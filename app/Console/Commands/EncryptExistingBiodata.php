<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class EncryptExistingBiodata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'biodata:encrypt-existing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypt existing plaintext NIK, No HP, and Email in the biodata table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Prevent execution timeouts for large datasets
        set_time_limit(0);

        // Get total count of records
        $totalCount = DB::table('biodata')->count();

        if ($totalCount === 0) {
            $this->info('No biodata records found.');
            return 0;
        }

        $this->info("Scanning {$totalCount} existing biodata records for plaintext columns in chunks of 500...");

        $updatedCount = 0;
        $chunkIndex = 0;

        DB::table('biodata')->orderBy('id')->chunk(500, function ($biodatas) use (&$updatedCount, &$chunkIndex, $totalCount) {
            $chunkIndex++;
            $processedCount = min($chunkIndex * 500, $totalCount);
            
            $this->info("Processing chunk #{$chunkIndex} (up to record {$processedCount} of {$totalCount})...");

            foreach ($biodatas as $biodata) {
                $updates = [];

                foreach (['nik', 'no_hp', 'email'] as $column) {
                    $rawValue = $biodata->{$column};

                    if (empty($rawValue)) {
                        continue;
                    }

                    // Check if already encrypted
                    try {
                        Crypt::decryptString($rawValue);
                    } catch (DecryptException $e) {
                        // Decryption failed means it's plaintext. Let's encrypt it!
                        $updates[$column] = Crypt::encryptString($rawValue);
                    }
                }

                if (!empty($updates)) {
                    DB::table('biodata')->where('id', $biodata->id)->update($updates);
                    $updatedCount++;
                }
            }
        });

        $this->info("Successfully encrypted {$updatedCount} biodata records!");

        return 0;
    }
}
