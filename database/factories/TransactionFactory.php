<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Warehouse;
use App\Models\TransactionType;
use App\Models\Transaction;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $itemId = Item::inRandomOrder()->value('id');
        $itemPrice=Item::find($itemId)->price;
        $warehouseId = Warehouse::inRandomOrder()->value('id');
        $transactiontypeId = TransactionType::inRandomOrder()->value('id');
        $transactionTypeName=TransactionType::find($transactiontypeId)->name;
        $quantity =random_int(1, 100);
        $randomDate =Carbon::instance($this->faker->dateTimeBetween('-1 month', 'now'))->startOfDay();;
        $transactionsInTheSameDate=Transaction::where('transaction_date',$randomDate)->get();
        $carbonDate = Carbon::parse($randomDate);
        $formattedDate = $carbonDate->format('YmdHis');
        return [
            'transaction_type_id' => $transactiontypeId,
            'item_id'=> $itemId,
            'warehouse_id'=> $warehouseId,
            'quantity' =>$quantity,
            'price' => $quantity*$itemPrice,
            'transaction_date' =>$randomDate,
            'created_at'=>now(),
            'updated_at'=>now(),
            'transction_code'=>$transactionTypeName.$formattedDate."Number".count($transactionsInTheSameDate)
        ];
    }
}
