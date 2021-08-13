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
 * Modules\Core\Entities\IssueSubcategory
 *
 * @method static Builder|IssueSubcategory newModelQuery()
 * @method static Builder|IssueSubcategory newQuery()
 * @method static Builder|IssueSubcategory query()
 * @mixin Eloquent
 * @property-read Collection|Issue[] $issues
 * @property-read int|null $issues_count
 * @property-read Collection|Subcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @property int $id
 * @property int $issue_id
 * @property int $subcategory_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IssueSubcategory whereCreatedAt($value)
 * @method static Builder|IssueSubcategory whereId($value)
 * @method static Builder|IssueSubcategory whereIssueId($value)
 * @method static Builder|IssueSubcategory whereSubcategoryId($value)
 * @method static Builder|IssueSubcategory whereUpdatedAt($value)
 */
class IssueSubcategory extends Model
{
    use HasFactory;

    protected $fillable = ['issue_id', 'subcategory_id'];

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
    public function subcategories(): HasMany
    {
        return $this->HasMany(Subcategory::class, 'subcategory_id');
    }
}
