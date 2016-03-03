<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'status', 'note', 'deadline'];

    const STATUS_TODO = 'todo';
    const STATUS_DOING = 'doing';
    const STATUS_DONE = 'done';

    public static $vStatus = [
        self::STATUS_TODO => 'To Do',
        self::STATUS_DOING => 'Doing',
        self::STATUS_DONE => 'Done',
    ];


    public function isTodo ()
    {
        return $this->status == self::STATUS_TODO;
    }

    public function isDoing ()
    {
        return $this->status == self::STATUS_DOING;
    }

    public function isDone ()
    {
        return $this->status == self::STATUS_DONE;
    }

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
