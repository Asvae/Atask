<?php namespace Laravel_test;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
        ];

    /**
     * Task has many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function task(){
        return $this->belongsToMany('Laravel_test\Task');
    }
}
