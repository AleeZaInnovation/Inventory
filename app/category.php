<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // public function categories(){
    //  return $this->hasMany(product::class);
    // }

    public function invoiceDetails(){
        return $this->hasMany(invoiceDetail::class);
    }
}

