<?php

namespace Modules\Core\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Modules\Core\Entities\IssueCategory
 *
 * @method static Builder|IssueCategory newModelQuery()
 * @method static Builder|IssueCategory newQuery()
 * @method static Builder|IssueCategory query()
 * @mixin Eloquent
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|Issue[] $issues
 * @property-read int|null $issues_count
 * @property int $id
 * @property int $issue_id
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IssueCategory whereCategoryId($value)
 * @method static Builder|IssueCategory whereCreatedAt($value)
 * @method static Builder|IssueCategory whereId($value)
 * @method static Builder|IssueCategory whereIssueId($value)
 * @method static Builder|IssueCategory whereUpdatedAt($value)
 */
class IssueCategory extends Model
{
    use HasFactory;

    protected $fillable = ['issue_id', 'category_id'];

    /**
     * @return HasMany
     */
    public function issues(): HasMany
    {
        return $this->HasMany(Issue::class, 'issue_id');
    }

    /**
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->HasMany(Category::class, 'category_id');
    }
}
