<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
     * Scope a query to only include TODO tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTodo($query)
    {
        return $query->where('status', self::STATUS_TODO);
    }

    /**
     * Scope a query to only include DOING tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDoing($query)
    {
        return $query->where('status', self::STATUS_DOING);
    }

    /**
     * Scope a query to only include today tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeToday($query)
    {
        return $query->where('deadline',">=",Carbon::today())
        ->where('deadline',"<",Carbon::tomorrow());
    }

    /**
     * Scope a query to only include tasks owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id',$userId);
    }

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
