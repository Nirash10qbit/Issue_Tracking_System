<?php

namespace Modules\Core\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * Modules\Core\Entities\Issue
 *
 * @method static Builder|Issue newModelQuery()
 * @method static Builder|Issue newQuery()
 * @method static Builder|Issue query()
 * @property-read Comment $comments
 * @property-read Collection|Subcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @mixin Eloquent
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $uuid
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Image|null $images
 * @method static Builder|Issue whereBody($value)
 * @method static Builder|Issue whereCreatedAt($value)
 * @method static Builder|Issue whereId($value)
 * @method static Builder|Issue whereSlug($value)
 * @method static Builder|Issue whereTitle($value)
 * @method static Builder|Issue whereUpdatedAt($value)
 * @method static Builder|Issue whereUuid($value)
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 */
class Issue extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'uuid', 'slug'];

    /**
     * @return BelongsTo
     */
    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'issue_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,
            'issue_categories',
            'issue_id',
            'category_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(Subcategory::class,
            'issue_subcategories',
            'issue_id',
            'subcategory_id'
        );
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable'); //
    }
}
