<?php

namespace App\Models;

use Throwable;
use Traversable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bankaccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_holder',
        'card_type',
        'card_number',
        'card_branch',
        'card_city',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'model', 'model_has_label');
    }

    public function assignLabel($labels)
    {
        if (is_array($labels) or ($labels instanceof Traversable)) {
            foreach ($labels as $label) {
                try {
                    $this->labels()->save(Label::where('name', $label)->first());
                } catch (Throwable $th) {
                    return;
                }
            }
        } else {
            try {
                $this->labels()->attach(Label::where('name', $labels)->first());
            } catch (Throwable $th) {
                return;
            }
        }
    }

    public function getLabels()
    {
        $total = [];
        foreach ($this->labels as $label) {
            array_push($total, $label->name);
        }
        return $total;
    }

    public function hasLabelToDetach($labelTarget)
    {
        foreach ($this->labels as $label) {
            if ($label->name === $labelTarget) {
                $this->labels()->detach($label);
                return true;
            }
        }
        return false;
    }

    public function hasLabel($labelTarget)
    {
        foreach ($this->labels as $label) {
            if ($label->name === $labelTarget) {
                return true;
            }
        }
    }
}
