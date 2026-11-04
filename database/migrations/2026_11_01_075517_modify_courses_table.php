
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('courses');

        DB::statement("
            CREATE TABLE courses (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                code VARCHAR(20) NOT NULL UNIQUE,
                name VARCHAR(120) NOT NULL,
                description TEXT NULL,
                fee INT UNSIGNED NOT NULL DEFAULT 0,
                quota SMALLINT UNSIGNED NOT NULL DEFAULT 20,
                start_date DATE NOT NULL,
                status ENUM('draft', 'open', 'closed')
                    NOT NULL DEFAULT 'draft',
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
              COLLATE=utf8mb4_unicode_ci
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
