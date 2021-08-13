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
 * Modules\Core\Entities\Subcategory
 *
 * @method static Builder|Subcategory newModelQuery()
 * @method static Builder|Subcategory newQuery()
 * @method static Builder|Subcategory query()
 * @mixin Eloquent
 * @property-read Category $categories
 * @property-read Collection|Issue[] $issues
 * @property-read int|null $issues_count
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Subcategory whereCategoryId($value)
 * @method static Builder|Subcategory whereCreatedAt($value)
 * @method static Builder|Subcategory whereDescription($value)
 * @method static Builder|Subcategory whereId($value)
 * @method static Builder|Subcategory whereName($value)
 * @method static Builder|Subcategory whereUpdatedAt($value)
 */
class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'name', 'description'];

    /**
     * @return BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function issues(): BelongsToMany
    {
        return $this->belongsToMany(Issue::class,
            'issue_subcategories',
            'subcategory_id',
            'issues_id'
        );
    }
}
