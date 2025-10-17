<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Jika tabel tidak ada, buat tabel baru yang sesuai
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('product_name');
                $table->string('unit')->nullable();
                $table->string('type')->nullable();
                $table->text('information')->nullable();
                $table->integer('qty')->default(0);
                $table->string('producer')->nullable();
                $table->timestamps();
            });
            return;
        }

        // Jika tabel ada, tambahkan kolom yang mungkin hilang
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'product_name')) {
                $table->string('product_name')->nullable();
            }
            if (!Schema::hasColumn('products', 'unit')) {
                $table->string('unit')->nullable();
            }
            if (!Schema::hasColumn('products', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('products', 'information')) {
                $table->text('information')->nullable();
            }
            if (!Schema::hasColumn('products', 'qty')) {
                $table->integer('qty')->default(0);
            }
            if (!Schema::hasColumn('products', 'producer')) {
                $table->string('producer')->nullable();
            }
            if (!Schema::hasColumn('products', 'created_at')) {
                $table->timestamps();
            }
        });

        // Pindahkan data lama jika kolom name/description ada
        if (Schema::hasColumn('products', 'name')) {
            DB::table('products')->whereNotNull('name')->chunkById(100, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('products')->where('id', $row->id)->update([
                        'product_name' => $row->name,
                    ]);
                }
            });
        }

        if (Schema::hasColumn('products', 'description')) {
            DB::table('products')->whereNotNull('description')->chunkById(100, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('products')->where('id', $row->id)->update([
                        'information' => $row->description,
                    ]);
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hanya hapus kolom yang kita tambahkan (tidak akan menghapus data name/description)
        if (!Schema::hasTable('products')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'product_name')) {
                $table->dropColumn('product_name');
            }
            if (Schema::hasColumn('products', 'unit')) {
                $table->dropColumn('unit');
            }
            if (Schema::hasColumn('products', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('products', 'information')) {
                $table->dropColumn('information');
            }
            if (Schema::hasColumn('products', 'qty')) {
                $table->dropColumn('qty');
            }
            if (Schema::hasColumn('products', 'producer')) {
                $table->dropColumn('producer');
            }
        });
    }
};
