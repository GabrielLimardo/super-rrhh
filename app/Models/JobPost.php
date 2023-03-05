<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\ScopesTrait;

class JobPost extends Model
{
    use HasFactory, ScopesTrait;

    protected $table = 'new_job_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_category',
        'job_subcategory',
        'position_name',
        'position_description',
        'company_id',
        'work_modality',
        'job_location',
        'job_salary',
        'keywords',
    ];

    public static $rules = [
        'job_category' => "required",
        'position_name' => "required",
        'position_description' => "required",
        'work_modality' => "required",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, "company_id")->select('id', 'fantasy_name');
    }

    public function scopeHasFilter(Builder $query)
    {
        if (!empty(request('hasfilter'))) {

            $filters = request('hasfilter');
            foreach ($filters as $filter => $value) {

                switch ($filter) {

                    case 'job_category':

                        $validOptions = ["Architecture and engineering", "Arts, culture and entertainment", "Business", "Communications", "Community and social services", "Education", "Farming, fishing and forestry", "Government", "Healthcare", "Installation, repairs and maintenance", "Law", "Media and entertainment", "Sales", "Science and technology"];
                        if (!in_array($value, $validOptions)) {
                            throw new \Exception("Invalid job category.");
                        }
                        $query->where($filter, '=', $value);

                        break;
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
                        $query->join('companies', 'companies.id', '=', 'new_job_posts.company_id')
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
