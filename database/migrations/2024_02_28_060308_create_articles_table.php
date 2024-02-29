<?php

// database/migrations/2024_02_28_060308_create_articles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('imglink');
            $table->text('content');
            $table->timestamps();

            // Tambahkan foreign key constraint dengan nama yang unik
            $table->foreign('user_id', 'fk_articles_user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Inserting 15 articles manually
        // Inserting 15 articles manually
        $articles = [
            [
                'user_id' => 1,
                'title' => 'The Importance of Bees in Agriculture',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Bees play a crucial role in agriculture by pollinating crops and flowers. Without bees, many plants would not be able to produce fruits and seeds, which are essential for human and animal consumption.'
            ],
            [
                'user_id' => 1,
                'title' => 'The Benefits of Crop Rotation',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Crop rotation is a farming practice that involves planting different crops in the same area over a sequence of growing seasons. It helps improve soil fertility, control pests and diseases, and reduce the need for chemical fertilizers.'
            ],
            [
                'user_id' => 1,
                'title' => 'Exploring Coral Reefs of the World',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Coral reefs are underwater ecosystems that support a diverse range of marine life. They are often called the rainforests of the sea due to their high levels of biodiversity and importance in maintaining ocean health.'
            ],
            [
                'user_id' => 1,
                'title' => 'Salmon Life Cycle',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Salmon are anadromous fish, which means they are born in freshwater rivers, migrate to the ocean to mature, and return to their natal rivers to spawn. Their life cycle plays a vital role in maintaining ecosystem health.'
            ],
            [
                'user_id' => 1,
                'title' => 'The Benefits of Composting',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Composting is a natural process that transforms organic waste into nutrient-rich soil conditioner. It helps reduce waste sent to landfills, improves soil structure, and enhances plant growth.'
            ],
            [
                'user_id' => 1,
                'title' => 'Rainforests: The Lungs of the Earth',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Rainforests are home to more than half of the world\'s plant and animal species. They provide vital ecosystem services, including regulating the climate, purifying water, and supporting indigenous communities.'
            ],
            [
                'user_id' => 1,
                'title' => 'Marine Conservation: Protecting Our Oceans',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Marine conservation aims to protect and preserve ocean ecosystems and biodiversity. It involves measures such as establishing marine protected areas, reducing pollution, and promoting sustainable fishing practices.'
            ],
            [
                'user_id' => 1,
                'title' => 'Aquaponics: Sustainable Farming Method',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Aquaponics is a sustainable farming method that combines aquaculture (fish farming) with hydroponics (soilless plant cultivation). It recycles nutrient-rich water from fish tanks to nourish plants, creating a closed-loop ecosystem.'
            ],
            [
                'user_id' => 1,
                'title' => 'Agroforestry: Integrating Trees into Agriculture',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Agroforestry integrates trees and shrubs into agricultural systems to enhance productivity, conserve resources, and improve resilience to climate change. It offers multiple benefits such as soil conservation, biodiversity conservation, and increased crop yields.'
            ],
            [
                'user_id' => 1,
                'title' => 'Sustainable Fisheries Management',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Sustainable fisheries management aims to ensure the long-term viability of fish stocks and marine ecosystems. It involves implementing science-based regulations, monitoring fishing activities, and promoting ecosystem-based approaches.'
            ],
            [
                'user_id' => 1,
                'title' => 'The Benefits of Cover Cropping',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Cover cropping is a practice of planting non-cash crops during fallow periods to improve soil health, prevent erosion, and suppress weeds. It enhances nutrient cycling, increases organic matter content, and provides habitat for beneficial organisms.'
            ],
            [
                'user_id' => 1,
                'title' => 'Protecting Endangered Species',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Protecting endangered species is essential for maintaining biodiversity and ecosystem balance. Conservation efforts include habitat restoration, captive breeding programs, anti-poaching measures, and public education.'
            ],
            [
                'user_id' => 1,
                'title' => 'The Role of Wetlands in Ecosystem Health',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Wetlands provide valuable ecosystem services such as flood control, water purification, and habitat for wildlife. They support a diverse range of plant and animal species and play a crucial role in maintaining water quality and biodiversity.'
            ],
            [
                'user_id' => 1,
                'title' => 'Renewable Energy Sources for a Sustainable Future',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Renewable energy sources, including solar, wind, hydro, and geothermal power, offer clean and sustainable alternatives to fossil fuels. They help reduce greenhouse gas emissions, combat climate change, and promote energy independence.'
            ],
            [
                'user_id' => 1,
                'title' => 'The Importance of Soil Conservation',
                'imglink' => 'https://ik.imagekit.io/tvlk/blog/2022/08/Lautan-Maldives.jpg',
                'content' => 'Soil conservation practices, such as contour plowing, terracing, and cover cropping, help prevent soil erosion, improve soil fertility, and protect natural resources. They are essential for sustainable agriculture and environmental stewardship.'
            ],
        ];

        foreach ($articles as $article) {
            DB::table('articles')->insert($article);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
