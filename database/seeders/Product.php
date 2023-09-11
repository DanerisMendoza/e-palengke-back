php <?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product as ProductModel;
class StoreTypeDetail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $StoreTypeDetail = new ProductModel();
        $StoreTypeDetail->name = 'fish';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new ProductModel();
        $StoreTypeDetail->name = 'vegetable';
        $StoreTypeDetail->save();
        
        $StoreTypeDetail = new ProductModel();
        $StoreTypeDetail->name = 'meat';
        $StoreTypeDetail->save();
     
        $StoreTypeDetail = new ProductModel();
        $StoreTypeDetail->name = 'school_supplies';
        $StoreTypeDetail->save();

        $StoreTypeDetail = new ProductModel();
        $StoreTypeDetail->name = 'hardware';
        $StoreTypeDetail->save();
    }
}
