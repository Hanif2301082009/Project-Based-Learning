namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table = 'temperatures';

    public $timestamps = false;

    protected $fillable = [
        'value', 'timestamp'
    ];
}