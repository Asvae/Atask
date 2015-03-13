<?php namespace Laravel_test;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'title',
            'body',
            'done',
            'finished_at',
            'user_id',
        ];

    /**
     * Query for tasks made by guest
     *
     * @param $query
     */
//    public function scopeProprietary($query)
//    {
//        $query->where('user_id', '=', '1');
//    }
//
//    public function setCreatedByAttribute()
//    {
//        $this['created_by'] = 1;
//    }

    /**
     * Task is owned by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Laravel_test\User');
    }

    /**
     * Task has many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag(){
        return $this->belongsToMany('Laravel_test\Tag');
    }

}