<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // 'invoice_number',
        // 'invoice_date',
        // 'due_date',
        // 'product',
        'product_id',
        'section_id',
        // 'amount_collection',
        // 'amount_commission',
        // 'discount',
        // 'rate_vat',
        // 'value_vat',
        // 'total',
        // 'status',
        // 'value_status',
        // 'note',
        // 'payment_date',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
