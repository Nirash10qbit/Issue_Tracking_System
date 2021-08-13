<?php

namespace Modules\Core\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\Core\Entities\Comment
 *
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @property-read Collection|Issue[] $issues
 * @property-read int|null $issues_count
 * @mixin Eloquent
 * @property int $id
 * @property int $issue_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Core\Entities\Image|null $images
 * @method static Builder|Comment whereBody($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereIssueId($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 */
class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['issue_id', 'body'];

    /**
     * @return HasMany
     */
    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class, 'issue_id');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
