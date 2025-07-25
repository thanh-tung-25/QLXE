public function up()
{
    Schema::table('cars', function (Blueprint $table) {
        $table->string('image')->nullable();
    });
}

public function down()
{
    Schema::table('cars', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
