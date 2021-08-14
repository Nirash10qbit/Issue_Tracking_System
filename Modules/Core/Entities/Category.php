<?php

namespace Modules\Core\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Modules\Core\Entities\Category
 *
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @mixin Eloquent
 * @property-read Collection|Subcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @property-read Collection|Issue[] $issues
 * @property-read int|null $issues_count
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * @return HasMany
     */
    public function subcategories(): HasMany
    {
        return $this->HasMany(Subcategory::class, 'category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function issues(): BelongsToMany
    {
        return $this->BelongsToMany(
            Issue::class,
            'issue_categories',
            'category_id',
            'issues_id'
        );
    }

}
