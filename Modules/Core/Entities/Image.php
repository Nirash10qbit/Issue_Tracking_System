<?php

namespace Modules\Core\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * Modules\Core\Entities\Image
 *
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image query()
 * @mixin Eloquent
 * @property int $id
 * @property string $imageable_type
 * @property int $imageable_id
 * @property float $size
 * @property string $path
 * @property string $name
 * @property string $extension
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $imageable
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereExtension($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image whereImageableId($value)
 * @method static Builder|Image whereImageableType($value)
 * @method static Builder|Image whereName($value)
 * @method static Builder|Image wherePath($value)
 * @method static Builder|Image whereSize($value)
 * @method static Builder|Image whereUpdatedAt($value)
 */
class Image extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['imageable_type', 'imageable_id', 'size', 'path', 'name', 'extension'];

    /**
     * @return MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
