<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopesTrait
{ // Los trait son claces abtractas 


    public function scopeIncluded(Builder $query)
    {  //Este metodo relaciona mi resultados con otra tabla que tenga una relacion pre establecida

        if (!empty(request('included'))) {
            $relations = explode(',', request('included')); //


            if (!empty($this->allowIncluided)) {

                $allowIncluided = collect($this->allowIncluided);

                foreach ($relations as $key => $relationship) {
                    if (!$allowIncluided->contains($relationship)) {
                        unset($relations[$key]);  //Elimino de mi array principal las relaciones que esten mal escritas pasandoles el indice de la misma
                    }
                }
            }

            $query->with($relations);
        }
    }

    /**
     * Este metodo te filtra los resultados del modelo
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Http\Response
     */
    public function scopeFilter(Builder $query)
    { // Este metedo filtra los resultado de mi query mediante filter[propiedad a filtrar]

        if (!empty(request('filter'))) {

            $filters = request('filter');

            foreach ($filters as $filter => $value) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }


    public function scopeOrder(Builder $query)
    {

        if (!empty(request('order'))) {

            $orderfilters =  explode(',', request('order'));

            foreach ($orderfilters as $order) {

                $direccion = 'asc';

                if (substr($order, 0, 1) == '-') {
                    $direccion = 'desc';
                    $order = substr($order, 1);
                }

                $query->orderBy($order, $direccion);
            }
        }
    }

    public function scopeGetPaginate(Builder $query)
    {

        if (!empty(request('paginate'))) {

            $paginate = intval(request('paginate'));

            return $query->paginate($paginate);
        }

        return $query->get();
    }
}
