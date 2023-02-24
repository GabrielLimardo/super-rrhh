<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\ScopesTrait;

class JobPost extends Model
{
    use HasFactory, ScopesTrait;

    protected $table = 'job_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'job_category',
        'job_subcategory',
        'position_name',
        'position_description',
        'company_name',
        'work_modality',
        'job_location',
        'job_salary',
        'keywords',
    ];

    public static $rules = [
        'job_category' => "required",
        'position_name' => "required",
        'position_description' => "required",
        'company_name' => "required",
        'work_modality' => "required",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, "company_id");
    }

    public function scopeHasFilter(Builder $query)
    {
        if (!empty(request('hasfilter'))) {

            $filters = request('hasfilter');
            foreach ($filters as $filter => $value) {

                switch ($filter) {

                    case 'job_salary':
                        $validOperators = ['<', '>', "="];
                        $operator = request("operator", "=");
                        if (!in_array($operator, $validOperators)) {
                            throw new \Exception("Invalid operator.");
                        }
                        $query->where($filter, $operator, $value);
                        break;
                    case 'work_modality':
                        $validOptions = ['Remote', 'In Person', 'Hybrid'];
                        if (!in_array($value, $validOptions)) {
                            throw new \Exception("Invalid work modality.");
                        }
                        $query->where($filter, '=', $value);
                        break;
                    case 'fantasy_name':
                        $query->join('companies', 'companies.id', '=', 'job_posts.company_id')
                            ->where('companies.fantasy_name', 'LIKE', '%' . $value . '%');
                        break;
                    default:
                        $query->where($filter, 'LIKE', '%' . $value . '%');
                        break;
                }
            }
        }
        return $query;
    }
}
   